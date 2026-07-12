@extends('layouts.admin')
@section('title', 'Inquiries')
@section('content')
<header class="admin-head"><div><p>Leads</p><h1>Inquiries</h1></div></header>
<section class="admin-card">
<table><thead><tr><th>Name</th><th>Phone</th><th>Email</th><th>Interest</th><th>Status</th><th>Date</th><th></th></tr></thead><tbody>
@forelse($inquiries as $inquiry)
<tr><td>{{ $inquiry->name }}</td><td>{{ $inquiry->phone }}</td><td>{{ $inquiry->email }}</td><td>{{ $inquiry->interest }}</td><td><span class="pill">{{ $inquiry->status }}</span></td><td>{{ $inquiry->created_at->format('d M Y') }}</td><td><a href="{{ route('admin.inquiries.show', $inquiry) }}">View</a></td></tr>
@empty
<tr><td colspan="7">No inquiries found.</td></tr>
@endforelse
</tbody></table>
{{ $inquiries->links() }}
</section>
@endsection
