@extends('layouts.admin')
@section('title', $project->exists ? 'Edit Project' : 'Create Project')
@section('content')
<header class="admin-head"><div><p>Project CMS</p><h1>{{ $project->exists ? 'Edit Project' : 'Create Project' }}</h1></div></header>
@if($errors->any())<div class="form-error">Please fix the highlighted fields.</div>@endif
<form class="admin-form" method="post" action="{{ $project->exists ? route('admin.projects.update', $project) : route('admin.projects.store') }}">
@csrf
@if($project->exists) @method('PUT') @endif
<div class="form-grid">
<label>Title<input name="title" value="{{ old('title', $project->title) }}" required></label>
<label>Slug<input name="slug" value="{{ old('slug', $project->slug) }}"></label>
<label>Subtitle<input name="subtitle" value="{{ old('subtitle', $project->subtitle) }}"></label>
<label>Developer Name<input name="developer_name" value="{{ old('developer_name', $project->developer_name) }}"></label>
<label>Address<input name="address" value="{{ old('address', $project->address) }}"></label>
<label>City<input name="city" value="{{ old('city', $project->city) }}"></label>
<label>State<input name="state" value="{{ old('state', $project->state) }}"></label>
<label>Pincode<input name="pincode" value="{{ old('pincode', $project->pincode) }}"></label>
<label>Plus Code<input name="map_plus_code" value="{{ old('map_plus_code', $project->map_plus_code) }}"></label>
<label>RERA ID<input name="rera_id" value="{{ old('rera_id', $project->rera_id) }}"></label>
<label>Agent RERA ID<input name="rera_agent_id" value="{{ old('rera_agent_id', $project->rera_agent_id) }}"></label>
<label>Configuration<input name="configuration" value="{{ old('configuration', $project->configuration) }}"></label>
<label>Possession Date<input name="possession_date" value="{{ old('possession_date', $project->possession_date) }}"></label>
<label>Launch Date<input name="launch_date" value="{{ old('launch_date', $project->launch_date) }}"></label>
<label>Project Area<input name="project_area" value="{{ old('project_area', $project->project_area) }}"></label>
<label>Project Size<input name="project_size" value="{{ old('project_size', $project->project_size) }}"></label>
<label>Units<input type="number" name="units" value="{{ old('units', $project->units) }}"></label>
<label>Towers<input type="number" name="towers" value="{{ old('towers', $project->towers) }}"></label>
<label>Floors<input type="number" name="floors" value="{{ old('floors', $project->floors) }}"></label>
<label>Size Range<input name="size_range" value="{{ old('size_range', $project->size_range) }}"></label>
<label>Price Range<input name="price_range" value="{{ old('price_range', $project->price_range) }}"></label>
<label>Average Price<input name="avg_price" value="{{ old('avg_price', $project->avg_price) }}"></label>
<label>Status<input name="status" value="{{ old('status', $project->status ?: 'Under Construction') }}" required></label>
<label>Hero Image Path<input name="hero_image" value="{{ old('hero_image', $project->hero_image) }}"></label>
<label>SEO Title<input name="seo_title" value="{{ old('seo_title', $project->seo_title) }}"></label>
<label>SEO Description<input name="seo_description" value="{{ old('seo_description', $project->seo_description) }}"></label>
</div>
<label>Short Description<textarea name="short_description" rows="3">{{ old('short_description', $project->short_description) }}</textarea></label>
<label>Long Description<textarea name="long_description" rows="6">{{ old('long_description', $project->long_description) }}</textarea></label>
<div class="amenity-checks">
@foreach($amenities as $amenity)
<label><input type="checkbox" name="amenities[]" value="{{ $amenity->id }}" @checked(in_array($amenity->id, old('amenities', $selectedAmenities)))> {{ $amenity->name }}</label>
@endforeach
</div>
<label class="check-row"><input type="checkbox" name="is_featured" value="1" @checked(old('is_featured', $project->is_featured))> Featured project</label>
<button class="admin-btn" type="submit">Save Project</button>
</form>
@endsection
