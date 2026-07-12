<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Amenity;
use App\Models\Project;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class ProjectController extends Controller
{
    public function index(): View
    {
        return view('admin.projects.index', [
            'projects' => Project::latest()->paginate(20),
        ]);
    }

    public function create(): View
    {
        return view('admin.projects.form', [
            'project' => new Project(),
            'amenities' => Amenity::orderBy('sort_order')->get(),
            'selectedAmenities' => [],
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $project = Project::create($this->validated($request));
        $project->amenities()->sync($request->input('amenities', []));

        return redirect()->route('admin.projects.index')->with('success', 'Project created successfully.');
    }

    public function edit(Project $project): View
    {
        return view('admin.projects.form', [
            'project' => $project,
            'amenities' => Amenity::orderBy('sort_order')->get(),
            'selectedAmenities' => $project->amenities()->pluck('amenities.id')->toArray(),
        ]);
    }

    public function update(Request $request, Project $project): RedirectResponse
    {
        $project->update($this->validated($request, $project->id));
        $project->amenities()->sync($request->input('amenities', []));

        return redirect()->route('admin.projects.edit', $project)->with('success', 'Project updated successfully.');
    }

    public function destroy(Project $project): RedirectResponse
    {
        $project->delete();
        return redirect()->route('admin.projects.index')->with('success', 'Project deleted.');
    }

    private function validated(Request $request, ?int $projectId = null): array
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:180'],
            'slug' => ['nullable', 'string', 'max:180', Rule::unique('projects', 'slug')->ignore($projectId)],
            'subtitle' => ['nullable', 'string', 'max:220'],
            'developer_name' => ['nullable', 'string', 'max:180'],
            'address' => ['nullable', 'string', 'max:255'],
            'city' => ['nullable', 'string', 'max:80'],
            'state' => ['nullable', 'string', 'max:80'],
            'pincode' => ['nullable', 'string', 'max:12'],
            'map_plus_code' => ['nullable', 'string', 'max:80'],
            'rera_id' => ['nullable', 'string', 'max:255'],
            'rera_agent_id' => ['nullable', 'string', 'max:255'],
            'configuration' => ['nullable', 'string', 'max:120'],
            'possession_date' => ['nullable', 'string', 'max:80'],
            'launch_date' => ['nullable', 'string', 'max:80'],
            'project_area' => ['nullable', 'string', 'max:80'],
            'project_size' => ['nullable', 'string', 'max:120'],
            'units' => ['nullable', 'integer', 'min:0'],
            'towers' => ['nullable', 'integer', 'min:0'],
            'floors' => ['nullable', 'integer', 'min:0'],
            'size_range' => ['nullable', 'string', 'max:120'],
            'price_range' => ['nullable', 'string', 'max:120'],
            'avg_price' => ['nullable', 'string', 'max:120'],
            'short_description' => ['nullable', 'string', 'max:500'],
            'long_description' => ['nullable', 'string'],
            'hero_image' => ['nullable', 'string', 'max:255'],
            'status' => ['required', 'string', 'max:50'],
            'is_featured' => ['nullable', 'boolean'],
            'seo_title' => ['nullable', 'string', 'max:180'],
            'seo_description' => ['nullable', 'string', 'max:255'],
        ]);

        $data['slug'] = $data['slug'] ?: Str::slug($data['title']);
        $data['is_featured'] = $request->boolean('is_featured');

        return $data;
    }
}
