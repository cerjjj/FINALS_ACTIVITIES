@extends('layouts.app')

@section('title', 'About')
@section('crumb', 'About this project')

@section('content')
    <div class="page-head"><div><div class="eyebrow">Project notes</div><h1>About Northstar POS</h1><p class="lead">A Laravel POS app with authenticated account management, resource controllers, validation, and prepared profile images.</p></div><div class="date-pill">Laravel 12 · PHP 8.2+</div></div>
    <div class="info-grid">
        <section class="info-card card"><div class="empty-mark">✳</div><h2>Protected account management</h2><p>Customer and user CRUD endpoints are registered with Laravel resource routes and require an authenticated session. Registration and login use password hashing, session regeneration, and login throttling.</p><p>Each resource controller follows Laravel's conventional index, create, store, show, edit, update, and destroy methods.</p></section>
        <section class="info-card card"><h2>Account safeguards</h2><div class="principles"><div class="principle"><b>Unique accounts</b>Emails and usernames are validated as unique.</div><div class="principle"><b>Secure passwords</b>Passwords are hashed and never rendered back into forms.</div><div class="principle"><b>Session handling</b>Login regenerates the session; logout invalidates it and refreshes its CSRF token.</div><div class="principle"><b>Profile images</b>Previous avatar uploads are removed when replaced or deleted.</div></div></section>
    </div>
    <p class="footnote">This is a foundations demo. All displayed account records are fictional seed data.</p>
@endsection
