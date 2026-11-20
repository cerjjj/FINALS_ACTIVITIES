@extends('layouts.app')

@section('title', 'About')
@section('crumb', 'About')

@section('content')
    <div class="page-head"><div><div class="eyebrow">About the project</div><h1>Tasks for Today</h1><p class="lead">A Laravel task manager with protected task editing, soft archiving, and completion email notifications.</p></div></div>
    <div class="info-grid">
        <section class="info-card card"><div class="empty-mark">✓</div><h2>Plan the day clearly</h2><p>The welcome page shows today's tasks, the task list shows the active schedule, and the profile and about pages remain public.</p><p>Signed-in users can create, update, and archive tasks. Archived tasks are hidden without being removed from the database.</p></section>
        <section class="info-card card"><h2>Completion notification</h2><div class="principles"><div class="principle"><b>Triggered on transition</b>An email is generated when a task first changes to done.</div><div class="principle"><b>No duplicate notification</b>Saving a task that is already done does not send another completion email.</div><div class="principle"><b>Safe local delivery</b>The default mail driver writes the message to the Laravel log.</div><div class="principle"><b>Built with</b>Laravel 12, PHP 8.2, SQLite, Blade and Laravel Breeze scaffolding.</div></div></section>
    </div>
    <p class="footnote">Task dates in the sample data are seeded relative to the current day.</p>
@endsection
