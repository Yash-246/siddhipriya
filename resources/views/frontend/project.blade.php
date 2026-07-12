@extends('layouts.front')

@section('content')
<section class="page-hero compact">
    <div>
        <div class="eyebrow">Project details</div>
        <h1>{{ $project->title }}</h1>
        <p>{{ $project->long_description }}</p>
    </div>
</section>

<section class="section project-table-wrap">
    <div class="section-label">Verified information structure</div>
    <h2>Project snapshot</h2>
    <div class="project-table glass">
        <div><span>Developer / Brand</span><strong>{{ $project->developer_name }}</strong></div>
        <div><span>Configuration</span><strong>{{ $project->configuration }}</strong></div>
        <div><span>Project Size</span><strong>{{ $project->project_size }}</strong></div>
        <div><span>Area</span><strong>{{ $project->project_area }}</strong></div>
        <div><span>Size Range</span><strong>{{ $project->size_range }}</strong></div>
        <div><span>Price Range</span><strong>{{ $project->price_range }}</strong></div>
        <div><span>Average Price</span><strong>{{ $project->avg_price }}</strong></div>
        <div><span>Status</span><strong>{{ $project->status }}</strong></div>
        <div><span>Possession</span><strong>{{ $project->possession_date }}</strong></div>
        <div><span>Launch</span><strong>{{ $project->launch_date }}</strong></div>
        <div><span>RERA ID</span><strong>{{ $project->rera_id }}</strong></div>
        <div><span>Address</span><strong>{{ $project->address }}, {{ $project->city }}</strong></div>
    </div>
</section>

<section class="section">
    <div class="section-head">
        <div><div class="section-label">Visual gallery</div><h2>Project visuals</h2></div>
        <p>Original artwork included. Replace with official renders/photos after approval.</p>
    </div>
    <div class="gallery-grid">
        @foreach($project->galleryImages as $image)
            <figure class="gallery-card" data-tilt>
                <img src="{{ asset($image->image_path) }}" alt="{{ $image->alt_text }}">
                <figcaption>{{ $image->title }}</figcaption>
            </figure>
        @endforeach
    </div>
</section>

<section class="section amenities">
    <div class="section-label">Amenity detail</div>
    <h2>Resident features</h2>
    <div class="amenity-grid">
        @foreach($project->amenities as $amenity)
            <article class="amenity-card"><span>{{ $amenity->icon }}</span><h3>{{ $amenity->name }}</h3><p>{{ $amenity->description }}</p></article>
        @endforeach
    </div>
</section>

@include('frontend.partials_inquiry')
@endsection
