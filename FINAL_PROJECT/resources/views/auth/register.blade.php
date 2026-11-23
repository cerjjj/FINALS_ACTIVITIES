<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Create staff account · Northstar POS</title>
    <style>
        *{box-sizing:border-box}body{margin:0;min-height:100vh;display:grid;place-items:center;padding:22px;background:#f6f7f4;color:#18221d;font:15px/1.5 Inter,ui-sans-serif,system-ui,"Segoe UI",sans-serif}.card{width:min(100%,480px);padding:32px;background:#fff;border:1px solid #e4e9e5;border-radius:16px;box-shadow:0 14px 40px #18221d0a}.brand{display:flex;align-items:center;gap:11px;color:#18221d;text-decoration:none;font-weight:750}.mark{width:35px;height:35px;display:grid;place-items:center;border-radius:11px;background:#1e6548;color:#fff}.brand small{display:block;color:#89948e;font-size:10px;letter-spacing:.13em;text-transform:uppercase}.eyebrow{margin-top:26px;color:#226b4b;font-size:10px;font-weight:750;letter-spacing:.14em;text-transform:uppercase}h1{margin:8px 0;font-size:29px;letter-spacing:-.04em}p{color:#718078;font-size:13px}.grid{display:grid;grid-template-columns:1fr 1fr;gap:0 14px}.field{display:grid;gap:6px;margin:14px 0}.field label{font-size:12px;font-weight:700}.field input{width:100%;padding:11px 12px;border:1px solid #dce3dd;border-radius:8px;font:inherit}.field input:focus{outline:2px solid #b9d8c4}.error{margin:0;color:#b33b3b;font-size:11px}.actions{display:flex;align-items:center;justify-content:space-between;gap:12px;margin-top:18px}.button{border:0;border-radius:8px;background:#226b4b;color:white;padding:11px 16px;font:inherit;font-size:12px;font-weight:700;cursor:pointer}.link{color:#226b4b;font-size:12px;font-weight:650;text-decoration:none}@media(max-width:540px){.grid{grid-template-columns:1fr}.card{padding:24px}}
    </style>
</head>
<body><main class="card">
    <a class="brand" href="{{ route('home') }}"><span class="mark">N</span><span>Northstar<small>Point of sale</small></span></a>
    <div class="eyebrow">New account</div><h1>Register a staff account</h1><p>Create a staff login for the POS.</p>
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="grid">
            <div class="field"><label for="full_name">Full name</label><input id="full_name" name="full_name" value="{{ old('full_name') }}" required autocomplete="name">@error('full_name')<p class="error">{{ $message }}</p>@enderror</div>
            <div class="field"><label for="username">Username</label><input id="username" name="username" value="{{ old('username') }}" required autocomplete="username">@error('username')<p class="error">{{ $message }}</p>@enderror</div>
            <div class="field" style="grid-column:1/-1"><label for="email">Email address</label><input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email">@error('email')<p class="error">{{ $message }}</p>@enderror</div>
            <div class="field"><label for="password">Password</label><input id="password" type="password" name="password" required autocomplete="new-password">@error('password')<p class="error">{{ $message }}</p>@enderror</div>
            <div class="field"><label for="password_confirmation">Confirm password</label><input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password"></div>
        </div>
        <div class="actions"><a class="link" href="{{ route('login') }}">Already registered? Sign in</a><button class="button" type="submit">Create account</button></div>
    </form>
</main></body></html>
