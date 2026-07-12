<!doctype html>
<html lang="en"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1"><meta name="robots" content="noindex,nofollow"><title>Admin Login · Siddhipriya Gracia</title><link rel="stylesheet" href="{{ asset('assets/css/admin.css') }}"></head>
<body class="login-body">
<form class="login-card" method="post" action="{{ route('admin.login.submit') }}">
    @csrf
    <div class="login-mark">SG</div>
    <h1>Admin Login</h1>
    <p>Manage project content, inquiries and SEO settings.</p>
    @if($errors->any())<div class="form-error">{{ $errors->first() }}</div>@endif
    <label>Email<input name="email" type="email" value="{{ old('email') }}" required autofocus></label>
    <label>Password<input name="password" type="password" required></label>
    <button type="submit">Login Securely</button>
</form>
</body></html>
