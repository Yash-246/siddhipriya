@extends('layouts.admin')
@section('title', 'Projects')
@section('content')
<header class="admin-head"><div><p>CMS</p><h1>Projects</h1></div><a class="admin-btn" href="{{ route('admin.projects.create') }}">Add Project</a></header>
<section class="admin-card">
<table><thead><tr><th>Project</th><th>Location</th><th>Status</th><th>Featured</th><th></th></tr></thead><tbody>
@foreach($projects as $project)
<tr><td>{{ $project->title }}</td><td>{{ $project->city }}</td><td>{{ $project->status }}</td><td>{{ $project->is_featured ? 'Yes' : 'No' }}</td><td><a href="{{ route('admin.projects.edit', $project) }}">Edit</a></td></tr>
@endforeach
</tbody></table>
{{ $projects->links() }}
</section>
@endsection
