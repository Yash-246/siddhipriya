@extends('layouts.admin')
@section('title', 'Settings')
@section('content')
<header class="admin-head"><div><p>Website</p><h1>Settings</h1></div></header>
<form class="admin-form" method="post" action="{{ route('admin.settings.update') }}">
@csrf @method('PUT')
@foreach($settings as $setting)
<label>{{ str_replace('_', ' ', ucfirst($setting->key)) }}<textarea name="settings[{{ $setting->key }}]" rows="2">{{ old('settings.'.$setting->key, $setting->value) }}</textarea></label>
@endforeach
<button class="admin-btn" type="submit">Save Settings</button>
</form>
@endsection
