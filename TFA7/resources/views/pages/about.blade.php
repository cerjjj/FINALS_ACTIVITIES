@extends('layouts.app')

@section('title', 'About')
@section('crumb', 'About this project')

@section('content')
    <div class="page-head"><div><div class="eyebrow">Project notes</div><h1>About Northstar POS</h1><p class="lead">A Laravel POS activity with validated customer and user forms, editable records, and prepared profile images.</p></div><div class="date-pill">Laravel 12 · PHP 8.2+</div></div>
    <div class="info-grid">
        <section class="info-card card"><div class="empty-mark">✳</div><h2>Validated account management</h2><p>Customer and user forms validate required fields on the server. Usernames must be unique, edit forms are prefilled, and validation errors return to the form.</p><p>The controllers validate incoming requests before creating or updating records with Eloquent.</p></section>
        <section class="info-card card"><h2>Profile image workflow</h2><div class="principles"><div class="principle"><b>Upload checks</b>Only images up to 2 MB are accepted.</div><div class="principle"><b>Prepared copy</b>Intervention Image crops uploads into 256 × 256 JPEG avatars.</div><div class="principle"><b>Public storage</b>Only the avatar path is stored in the users table.</div><div class="principle"><b>Fallback</b>Users without an avatar show a local placeholder.</div></div></section>
    </div>
    <p class="footnote">This is a foundations demo. All displayed account records are fictional seed data.</p>
@endsection
