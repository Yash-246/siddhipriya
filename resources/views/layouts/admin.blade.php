<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex,nofollow">
    <title>@yield('title', 'Admin') · Siddhipriya Gracia</title>
    <link rel="stylesheet" href="{{ asset('assets/css/admin.css') }}">
</head>
<body>
<aside class="admin-sidebar">
    <a class="admin-logo" href="{{ route('admin.dashboard') }}">SG<span>Admin</span></a>
    <nav>
        <a href="{{ route('admin.dashboard') }}">Dashboard</a>
        <a href="{{ route('admin.projects.index') }}">Projects</a>
        <a href="{{ route('admin.inquiries.index') }}">Inquiries</a>
        <a href="{{ route('admin.settings.edit') }}">Settings</a>
        <a href="{{ route('home') }}" target="_blank">View Site</a>
    </nav>
    <form method="post" action="{{ route('admin.logout') }}">@csrf<button type="submit">Logout</button></form>
</aside>
<main class="admin-main">
    @if(session('success'))<div class="admin-flash">{{ session('success') }}</div>@endif
    @yield('content')
</main>
</body>
</html>
