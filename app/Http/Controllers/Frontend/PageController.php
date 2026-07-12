<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\SiteSetting;
use Illuminate\Http\Response;

class PageController extends Controller
{
    public function home()
    {
        $project = Project::query()->with(['amenities', 'galleryImages'])->where('is_featured', true)->firstOrFail();
        $settings = SiteSetting::query()->pluck('value', 'key')->all();

        return view('frontend.home', [
            'project' => $project,
            'settings' => $settings,
            'seo' => [
                'title' => $project->seo_title ?: 'Siddhipriya Gracia | 2 & 3 BHK Apartments in Bopal-Ghuma, Ahmedabad',
                'description' => $project->seo_description ?: 'Explore Siddhipriya Gracia, a premium 2 and 3 BHK residential project at Bopal-Ghuma Road, Ahmedabad with modern amenities, RERA details, plans and site visit inquiry.',
                'canonical' => route('home'),
            ],
        ]);
    }

    public function about()
    {
        $project = Project::query()->where('is_featured', true)->firstOrFail();
        return view('frontend.about', [
            'project' => $project,
            'seo' => [
                'title' => 'About Siddhipriya Gracia | Residential Project in Ahmedabad',
                'description' => 'Learn about Siddhipriya Gracia, its location, planning approach, RERA reference and lifestyle-focused residential development in Ghuma, Ahmedabad.',
                'canonical' => route('about'),
            ],
        ]);
    }

    public function project(Project $project)
    {
        $project->load(['amenities', 'galleryImages']);
        return view('frontend.project', [
            'project' => $project,
            'seo' => [
                'title' => $project->seo_title ?: $project->title.' | Project Details',
                'description' => $project->seo_description ?: $project->short_description,
                'canonical' => route('project.show', $project),
            ],
        ]);
    }

    public function contact()
    {
        $project = Project::query()->where('is_featured', true)->firstOrFail();
        return view('frontend.contact', [
            'project' => $project,
            'seo' => [
                'title' => 'Contact Siddhipriya Gracia | Book Site Visit',
                'description' => 'Contact Siddhipriya Gracia to request brochure, pricing, floor plan details or book a site visit at Bopal-Ghuma Road, Ahmedabad.',
                'canonical' => route('contact'),
            ],
        ]);
    }

    public function sitemap(): Response
    {
        $projects = Project::query()->select('slug', 'updated_at')->get();
        $urls = [
            ['loc' => route('home'), 'priority' => '1.00'],
            ['loc' => route('about'), 'priority' => '0.70'],
            ['loc' => route('contact'), 'priority' => '0.80'],
        ];

        foreach ($projects as $project) {
            $urls[] = ['loc' => route('project.show', $project->slug), 'priority' => '0.90'];
        }

        return response()->view('frontend.sitemap', compact('urls'))->header('Content-Type', 'application/xml');
    }
}
