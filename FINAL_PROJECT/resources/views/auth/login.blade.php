<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign in · Northstar POS</title>
    <style>
        *{box-sizing:border-box}body{margin:0;min-height:100vh;display:grid;place-items:center;padding:22px;background:#f6f7f4;color:#18221d;font:15px/1.5 Inter,ui-sans-serif,system-ui,"Segoe UI",sans-serif}.card{width:min(100%,430px);padding:32px;background:#fff;border:1px solid #e4e9e5;border-radius:16px;box-shadow:0 14px 40px #18221d0a}.brand{display:flex;align-items:center;gap:11px;color:#18221d;text-decoration:none;font-weight:750}.mark{width:35px;height:35px;display:grid;place-items:center;border-radius:11px;background:#1e6548;color:#fff}.brand small{display:block;color:#89948e;font-size:10px;letter-spacing:.13em;text-transform:uppercase}.eyebrow{margin-top:28px;color:#226b4b;font-size:10px;font-weight:750;letter-spacing:.14em;text-transform:uppercase}h1{margin:8px 0;font-size:29px;letter-spacing:-.04em}p{color:#718078;font-size:13px}.field{display:grid;gap:6px;margin:18px 0}.field label{font-size:12px;font-weight:700}.field input{width:100%;padding:11px 12px;border:1px solid #dce3dd;border-radius:8px;font:inherit}.field input:focus{outline:2px solid #b9d8c4}.demo{margin:0;color:#718078;font-size:11px}.demo strong{color:#35443b;font-weight:700}.error{margin:0;color:#b33b3b;font-size:11px}.notice{padding:10px;background:#eef7f0;color:#28653e;border-radius:8px;font-size:12px}.remember{display:flex;align-items:center;gap:8px;color:#647168;font-size:12px}.actions{display:flex;align-items:center;justify-content:space-between;gap:12px;margin-top:22px}.button{border:0;border-radius:8px;background:#226b4b;color:white;padding:11px 16px;font:inherit;font-size:12px;font-weight:700;cursor:pointer}.link{color:#226b4b;font-size:12px;font-weight:650;text-decoration:none}.register{margin-top:24px;text-align:center;font-size:12px}
    </style>
</head>
<body><main class="card">
    <a class="brand" href="{{ route('home') }}"><span class="mark">N</span><span>Northstar<small>Point of sale</small></span></a>
    <div class="eyebrow">Welcome back</div><h1>Sign in to your account</h1><p>Use your staff email and password to open the sales workspace.</p>
    @if (session('status'))<div class="notice">{{ session('status') }}</div>@endif
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="field"><label for="email">Email address</label><input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username"><p class="demo">Demo email: <strong>mikaela@example.test</strong></p>@error('email')<p class="error">{{ $message }}</p>@enderror</div>
        <div class="field"><label for="password">Password</label><input id="password" type="password" name="password" required autocomplete="current-password"><p class="demo">Demo password: <strong>password</strong></p>@error('password')<p class="error">{{ $message }}</p>@enderror</div>
        <label class="remember"><input type="checkbox" name="remember"> Remember me</label>
        <div class="actions"><a class="link" href="{{ route('register') }}">Create an account</a><button class="button" type="submit">Sign in</button></div>
    </form>
    <div class="register"><a class="link" href="{{ route('home') }}">Back to overview</a></div>
</main></body></html>
