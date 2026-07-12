@extends('layouts.admin')
@section('title', 'Dashboard')
@section('content')
<header class="admin-head"><div><p>Overview</p><h1>Dashboard</h1></div></header>
<section class="metric-grid">
    <div><span>{{ $totalProjects }}</span><p>Projects</p></div>
    <div><span>{{ $totalInquiries }}</span><p>Total inquiries</p></div>
    <div><span>{{ $newInquiries }}</span><p>New inquiries</p></div>
</section>
<section class="admin-card">
    <h2>Recent inquiries</h2>
    <table><thead><tr><th>Name</th><th>Phone</th><th>Interest</th><th>Status</th><th></th></tr></thead><tbody>
    @forelse($recentInquiries as $inquiry)
        <tr><td>{{ $inquiry->name }}</td><td>{{ $inquiry->phone }}</td><td>{{ $inquiry->interest }}</td><td><span class="pill">{{ $inquiry->status }}</span></td><td><a href="{{ route('admin.inquiries.show', $inquiry) }}">View</a></td></tr>
    @empty
        <tr><td colspan="5">No inquiries yet.</td></tr>
    @endforelse
    </tbody></table>
</section>
@endsection
