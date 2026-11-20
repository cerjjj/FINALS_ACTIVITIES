@extends('layouts.app')

@section('title', 'About')
@section('crumb', 'About this project')

@section('content')
    <div class="page-head"><div><div class="eyebrow">Project notes</div><h1>About Northstar POS</h1><p class="lead">A small Laravel learning project that rebuilds a four-page point of sale foundation using the MVC pattern.</p></div><div class="date-pill">Laravel 12 · PHP 8.2+</div></div>
    <div class="info-grid">
        <section class="info-card card"><div class="empty-mark">✳</div><h2>Four pages, one clear structure</h2><p>This activity keeps each responsibility easy to find. A route chooses a controller action, the controller prepares the response, and a Blade view renders the page.</p><p>The overview and about pages use <code>PageController</code>. Customer and user lists have their own controllers and pass sample arrays to views that render each record with Blade <code>@@foreach</code>.</p></section>
        <section class="info-card card"><h2>What is included</h2><div class="principles"><div class="principle"><b>Routes</b>Named routes connect all four pages.</div><div class="principle"><b>Controllers</b>Page, customer and user responsibilities stay separate.</div><div class="principle"><b>Views</b>Shared navigation and responsive page layouts use Blade.</div><div class="principle"><b>Data setup</b>Static arrays power the lists; migrations and a seeder provide an optional database starting point.</div></div></section>
    </div>
    <p class="footnote">This is a foundations demo. Sample account data is fictional and the lists are not connected to a live database.</p>
@endsection
