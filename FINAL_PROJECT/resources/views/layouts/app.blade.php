<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#f5f7f4">
    <title>@yield('title', 'Overview') · Northstar POS</title>
    <style>
        :root{--ink:#18221d;--muted:#718078;--line:#e3e9e4;--paper:#fff;--wash:#f5f7f4;--green:#226b4b;--mint:#e9f4ee;--red:#a73c37}
        *{box-sizing:border-box}body{margin:0;background:var(--wash);color:var(--ink);font:14px/1.55 Inter,ui-sans-serif,system-ui,-apple-system,"Segoe UI",sans-serif}a{color:inherit;text-decoration:none}.shell{min-height:100vh;display:grid;grid-template-columns:245px minmax(0,1fr)}
        .sidebar{background:#fff;border-right:1px solid var(--line);padding:26px 17px;display:flex;flex-direction:column}.brand{display:flex;align-items:center;gap:11px;padding:0 10px 30px;font-weight:760;font-size:16px;letter-spacing:-.03em}.brand-mark{width:36px;height:36px;border-radius:11px;background:#1e6548;color:#fff;display:grid;place-items:center}.brand small{display:block;color:#89948e;font-size:10px;font-weight:600;letter-spacing:.13em;text-transform:uppercase}.nav-label{padding:0 11px;margin:10px 0 8px;color:#9aa39e;font-size:10px;font-weight:750;text-transform:uppercase;letter-spacing:.13em}.nav a{display:flex;align-items:center;gap:11px;padding:10px 12px;margin:3px 0;border-radius:9px;color:#68766e;font-size:12px;font-weight:650}.nav a:hover,.nav a.active{background:#edf5ef;color:#1e6548}.nav-icon{width:19px;text-align:center}.sidebar-foot{margin-top:auto;border-top:1px solid var(--line);padding:15px 10px 0;color:#87928b;font-size:10px}.main{min-width:0}.topbar{height:68px;background:#fff;border-bottom:1px solid var(--line);display:flex;align-items:center;justify-content:space-between;padding:0 34px}.crumb{color:#8b968f;font-size:11px}.profile{display:flex;align-items:center;gap:10px;font-size:11px;font-weight:650}.content{max-width:1240px;margin:0 auto;padding:34px}.eyebrow{font-size:10px;font-weight:750;letter-spacing:.14em;text-transform:uppercase;color:var(--green)}h1{font-size:29px;line-height:1.2;letter-spacing:-.045em;margin:7px 0 8px}h2{font-size:16px;letter-spacing:-.02em;margin:0}.lead{color:var(--muted);margin:0;max-width:650px}.page-head{display:flex;align-items:flex-end;justify-content:space-between;gap:18px;margin-bottom:24px}.card{background:var(--paper);border:1px solid var(--line);border-radius:13px}.stats{display:grid;grid-template-columns:repeat(4,minmax(0,1fr));gap:13px;margin:16px 0}.stat{padding:18px}.stat-top{display:flex;justify-content:space-between;align-items:center;color:#7d8981;font-size:10px}.stat-icon{width:29px;height:29px;background:#edf5ef;color:#236a4c;display:grid;place-items:center;border-radius:8px}.stat strong{display:block;font-size:25px;letter-spacing:-.04em;margin-top:11px}.stat small{color:#87928b;font-size:10px}.section-card{margin-top:17px;padding:19px}.section-head{display:flex;justify-content:space-between;align-items:center;gap:12px;margin-bottom:13px}.table-wrap{overflow-x:auto}table{width:100%;border-collapse:collapse;text-align:left}th{font-size:9px;letter-spacing:.08em;text-transform:uppercase;color:#8b968f;font-weight:750;padding:10px 11px;border-bottom:1px solid var(--line);white-space:nowrap}td{padding:12px 11px;border-bottom:1px solid #eff2ef;color:#55635b;font-size:11px;vertical-align:middle}tbody tr:last-child td{border-bottom:0}.person{display:flex;align-items:center;gap:9px;color:var(--ink);font-weight:650}.mini-avatar{width:30px;height:30px;border-radius:9px;background:#edf3ef;display:grid;place-items:center;color:#397656;font-size:10px;font-weight:750}.badge{display:inline-flex;align-items:center;gap:6px;padding:4px 8px;border-radius:99px;background:#edf6ef;color:#3b7751;font-size:9px;font-weight:750}.badge:before{content:"";width:5px;height:5px;border-radius:50%;background:currentColor}.badge.low{background:#fff3df;color:#946019}.footnote{color:#9aa39e;font-size:10px;margin-top:17px}.button{display:inline-flex;align-items:center;justify-content:center;gap:6px;padding:8px 11px;border:1px solid #dce3dd;border-radius:8px;background:#fff;color:#526159;font:inherit;font-size:10px;font-weight:750;cursor:pointer;white-space:nowrap}.button-primary{border-color:#226b4b;background:#226b4b;color:#fff}.button-primary:hover{background:#18583c}.button-danger{border-color:#f0d5d4;background:#fff;color:var(--red)}.button-quiet{background:transparent}.row-actions{display:flex;align-items:center;gap:5px;white-space:nowrap}.row-actions form{display:inline}.notice{padding:11px 14px;margin:0 0 15px;border:1px solid #cfe6d5;border-radius:9px;background:#eef7f0;color:#28653e;font-size:11px}.notice-error{border-color:#f0d5d4;background:#fff4f3;color:#a63a36}.form-card{max-width:760px;padding:24px}.form-grid{display:grid;grid-template-columns:1fr 1fr;gap:0 16px}.field{display:grid;gap:6px;margin-bottom:16px}.field label{font-size:11px;font-weight:750;color:#34443a}.field input,.field select{width:100%;padding:10px 11px;border:1px solid #dce3dd;border-radius:8px;background:#fff;color:var(--ink);font:inherit;font-size:12px}.field input:focus,.field select:focus{outline:2px solid #b9d8c4;border-color:#5f9a74}.field input[type=file]{padding:8px;background:#fafbf9}.required{color:#c44545}.optional,.field-hint{color:#8b978f;font-size:10px;font-weight:400}.field-error{margin:0;color:#b33b3b;font-size:10px}.form-actions{display:flex;justify-content:flex-end;gap:8px;border-top:1px solid var(--line);padding-top:16px;margin-top:6px}.detail-grid{display:grid;grid-template-columns:160px 1fr;gap:9px 14px;margin:0 0 20px}.detail-grid dt{color:#849087;font-size:11px}.detail-grid dd{margin:0;color:#27382e;font-size:12px;font-weight:650}.product-thumb{width:42px;height:42px;object-fit:cover;border-radius:9px;background:#edf3ef;border:1px solid #e3ebe4}.preview{width:100px;height:100px;object-fit:cover;border-radius:12px;background:#edf3ef;border:1px solid var(--line)}.pagination{display:flex;justify-content:center;gap:6px;margin-top:16px}.pagination a,.pagination span{padding:6px 9px;background:#fff;border:1px solid var(--line);border-radius:7px;font-size:10px}.top-actions{display:flex;align-items:center;gap:8px}.top-actions form{margin:0}.stock{font-variant-numeric:tabular-nums}.auth-links{display:flex;gap:7px}
        @media(max-width:900px){.shell{grid-template-columns:1fr}.sidebar{padding:11px 15px;border-right:0;border-bottom:1px solid var(--line)}.brand{padding:0 5px 9px}.nav-label,.sidebar-foot{display:none}.nav{display:flex;overflow:auto;gap:3px}.nav a{white-space:nowrap;padding:8px 10px}.topbar{height:56px;padding:0 18px}.content{padding:26px 18px}.stats{grid-template-columns:repeat(2,minmax(0,1fr))}}
        @media(max-width:580px){.page-head{align-items:flex-start;flex-direction:column}.stats{grid-template-columns:1fr 1fr;gap:8px}.stat{padding:13px}.content{padding:22px 13px}.section-card{padding:14px}.form-card{padding:17px}.form-grid{grid-template-columns:1fr}.profile span{display:none}h1{font-size:26px}.top-actions{flex-wrap:wrap}}
    </style>
</head>
<body>
<div class="shell">
    <aside class="sidebar">
        <a class="brand" href="{{ auth()->check() ? route('home') : route('about') }}"><span class="brand-mark">N</span><span>Northstar<small>Point of sale</small></span></a>
        @auth
            <div class="nav-label">Workspace</div>
            <nav class="nav" aria-label="POS navigation">
                <a class="{{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}"><span class="nav-icon">⌂</span>Overview</a>
                <a class="{{ request()->routeIs('products.*') ? 'active' : '' }}" href="{{ route('products.index') }}"><span class="nav-icon">▦</span>Products</a>
                <a class="{{ request()->routeIs('customers.*') ? 'active' : '' }}" href="{{ route('customers.index') }}"><span class="nav-icon">♧</span>Customers</a>
                <a class="{{ request()->routeIs('staff.*') ? 'active' : '' }}" href="{{ route('staff.index') }}"><span class="nav-icon">♙</span>Staff</a>
                <a class="{{ request()->routeIs('sales.create') ? 'active' : '' }}" href="{{ route('sales.create') }}"><span class="nav-icon">＋</span>Record sale</a>
                <a class="{{ request()->routeIs('sales.index') ? 'active' : '' }}" href="{{ route('sales.index') }}"><span class="nav-icon">▤</span>Sales history</a>
            </nav>
        @endauth
        <div class="nav-label" style="margin-top:22px">Company</div>
        <nav class="nav"><a class="{{ request()->routeIs('about') ? 'active' : '' }}" href="{{ route('about') }}"><span class="nav-icon">ⓘ</span>About</a></nav>
        <div class="sidebar-foot">Laravel · PHP · SQLite<br>Point-of-sale learning project</div>
    </aside>
    <main class="main">
        <header class="topbar"><div class="crumb">Northstar POS&nbsp; / &nbsp;@yield('crumb', 'Overview')</div><div class="profile top-actions">
            @auth
                <span>{{ auth()->user()->full_name }}</span><form method="POST" action="{{ route('logout') }}">@csrf<button class="button" type="submit">Sign out</button></form>
            @else
                <div class="auth-links"><a class="button" href="{{ route('login') }}">Sign in</a><a class="button button-primary" href="{{ route('register') }}">Staff sign-up</a></div>
            @endauth
        </div></header>
        <div class="content">
            @if (session('success'))<div class="notice">{{ session('success') }}</div>@endif
            @if (session('error'))<div class="notice notice-error">{{ session('error') }}</div>@endif
            @yield('content')
        </div>
    </main>
</div>
</body>
</html>
