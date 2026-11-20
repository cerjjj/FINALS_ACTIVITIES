@extends('layouts.app')

@section('title', 'Overview')
@section('crumb', 'Overview')

@section('content')
    <section class="hero card">
        <div class="eyebrow">Your store at a glance</div>
        <h1>A clearer view of your business.</h1>
        <p>Welcome to Northstar, a simple point of sale foundation for keeping your customer and team accounts in one place.</p>
        <a class="hero-link" href="{{ route('customers.index') }}">Explore customer accounts &nbsp;→</a>
    </section>

    <section class="stats" aria-label="Account summary">
        <article class="stat card"><div class="stat-top"><span>Customer accounts</span><span class="stat-icon">♧</span></div><strong>05</strong><small>Sample records in this demo</small></article>
        <article class="stat card"><div class="stat-top"><span>Team accounts</span><span class="stat-icon">♙</span></div><strong>05</strong><small>Sample records in this demo</small></article>
        <article class="stat card"><div class="stat-top"><span>Application pages</span><span class="stat-icon">▤</span></div><strong>04</strong><small>Overview, about and account lists</small></article>
    </section>

    <section class="section-card card">
        <div class="section-head"><h2>Quick access</h2><span style="color:#929d96;font-size:11px">Your workspace</span></div>
        <div class="principles">
            <a class="principle" href="{{ route('customers.index') }}"><b>Customer accounts &nbsp; →</b>Browse the sample customer directory.</a>
            <a class="principle" href="{{ route('users.index') }}"><b>User accounts &nbsp; →</b>Meet the sample store team.</a>
            <a class="principle" href="{{ route('about') }}"><b>About this project &nbsp; →</b>See how the Laravel pages fit together.</a>
        </div>
    </section>
    <p class="footnote">Account lists use static PHP arrays as temporary data sources, as required for this activity.</p>
@endsection
