@extends('layouts.app')

@section('title', 'About')
@section('crumb', 'About this project')

@section('content')
    <div class="page-head"><div><div class="eyebrow">Project notes</div><h1>About Northstar POS</h1><p class="lead">A Laravel POS foundation that brings catalog management, people records, staff access and checkout together.</p></div><div class="date-pill">Laravel 12 · PHP 8.2+</div></div>
    <div class="stats" style="grid-template-columns:repeat(2,minmax(0,1fr))">
        <section class="info-card card" style="padding:23px"><h2>Sales and stock</h2><p style="color:var(--muted);font-size:12px">Each sale snapshots the current product price, saves the staff member, and reduces stock in one database transaction. Requests larger than available inventory are rejected.</p></section>
        <section class="info-card card" style="padding:23px"><h2>Images and accounts</h2><p style="color:var(--muted);font-size:12px">Product photos and staff avatars are validated, resized to square JPEG thumbnails with GD, and stored on Laravel's public disk. Passwords are hashed by Laravel.</p></section>
        <section class="info-card card" style="padding:23px"><h2>Relational records</h2><p style="color:var(--muted);font-size:12px">Products, customers, users and sales are related by foreign keys. Sales history remains linked to the product and staff member that recorded each transaction.</p></section>
        <section class="info-card card" style="padding:23px"><h2>Built for learning</h2><p style="color:var(--muted);font-size:12px">Laravel controllers handle requests, Eloquent models represent the data, migrations define the schema, and Blade views render the management screens.</p></section>
    </div>
@endsection
