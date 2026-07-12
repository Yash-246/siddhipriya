@extends('layouts.admin')
@section('title', 'Inquiry Detail')
@section('content')
<header class="admin-head"><div><p>Lead Detail</p><h1>{{ $inquiry->name }}</h1></div></header>
<section class="admin-card inquiry-detail">
    <p><strong>Phone:</strong> {{ $inquiry->phone }}</p>
    <p><strong>Email:</strong> {{ $inquiry->email ?: 'Not provided' }}</p>
    <p><strong>Interest:</strong> {{ $inquiry->interest ?: 'Not specified' }}</p>
    <p><strong>Budget:</strong> {{ $inquiry->budget ?: 'Not specified' }}</p>
    <p><strong>Message:</strong><br>{{ $inquiry->message ?: 'No message.' }}</p>
    <p><strong>Source:</strong> {{ $inquiry->source }}</p>
    <form method="post" action="{{ route('admin.inquiries.status', $inquiry) }}">
        @csrf @method('PATCH')
        <label>Status<select name="status"><option @selected($inquiry->status==='new')>new</option><option @selected($inquiry->status==='seen')>seen</option><option @selected($inquiry->status==='contacted')>contacted</option><option @selected($inquiry->status==='closed')>closed</option></select></label>
        <button class="admin-btn" type="submit">Update Status</button>
    </form>
</section>
@endsection
