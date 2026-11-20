@extends('layouts.app')

@section('title', 'Profile')
@section('crumb', 'Profile')

@section('content')
    <div class="page-head"><div><div class="eyebrow">Account</div><h1>Profile</h1><p class="lead">The single user record stored in the application database.</p></div></div>
    <section class="info-card card" style="max-width:640px">
        <div class="person" style="margin-bottom:22px"><span class="avatar" style="width:52px;height:52px;font-size:16px">{{ collect(explode(' ', $user->full_name))->map(fn ($part) => strtoupper(substr($part, 0, 1)))->take(2)->join('') }}</span><span><strong style="font-size:17px">{{ $user->full_name }}</strong><small style="display:block;color:#89948e;font-weight:400">Task manager</small></span></div>
        <div class="principles"><div class="principle"><b>Username</b>{{ $user->username }}</div><div class="principle"><b>Email</b>{{ $user->email }}</div></div>
    </section>
    <p class="footnote">This profile is retrieved from the single seeded row in the <code>users</code> table.</p>
@endsection
