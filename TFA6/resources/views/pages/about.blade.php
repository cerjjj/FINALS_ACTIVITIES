@extends('layouts.app')

@section('title', 'About')
@section('crumb', 'About this project')

@section('content')
    <div class="page-head"><div><div class="eyebrow">Project notes</div><h1>About Northstar POS</h1><p class="lead">A four-page Laravel learning project using migrations, seeders and Eloquent models to power the account listings.</p></div><div class="date-pill">Laravel 12 · PHP 8.2+</div></div>
    <div class="info-grid">
        <section class="info-card card"><div class="empty-mark">✳</div><h2>Four pages, one clear structure</h2><p>This activity keeps each responsibility easy to find. A route chooses a controller action, the controller retrieves records, and a Blade view renders the page.</p><p>The overview and about pages use <code>PageController</code>. Customer and user lists query their Eloquent models and render each database record with Blade <code>@@foreach</code>.</p></section>
        <section class="info-card card"><h2>What is included</h2><div class="principles"><div class="principle"><b>Routes</b>Named routes connect all four pages.</div><div class="principle"><b>Controllers</b>Page, customer and user responsibilities stay separate.</div><div class="principle"><b>Models</b><code>Customer</code> and <code>User</code> map to the database tables.</div><div class="principle"><b>Data setup</b>Migrations define the schema and the seeder adds five records to each table.</div></div></section>
    </div>
    <p class="footnote">This is a foundations demo. All displayed account records are fictional seed data.</p>
@endsection
