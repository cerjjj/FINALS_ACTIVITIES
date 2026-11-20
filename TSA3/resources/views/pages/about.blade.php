@extends('layouts.app')

@section('title', 'About')
@section('crumb', 'About')

@section('content')
    <div class="page-head"><div><div class="eyebrow">About the project</div><h1>Tasks for Today</h1><p class="lead">A small Laravel task manager built with migrations, Eloquent and Blade.</p></div></div>
    <div class="info-grid">
        <section class="info-card card"><div class="empty-mark">✓</div><h2>Plan the day clearly</h2><p>This application shows today's tasks on the welcome page, keeps the full schedule on the task list, and displays the owner profile separately.</p><p>The <code>Task</code> model uses a query scope to filter tasks by date. The controllers retrieve records through Eloquent, and Blade renders the resulting models.</p></section>
        <section class="info-card card"><h2>Developer</h2><div class="principles"><div class="principle"><b>Jacer Castillo</b>Student developer</div><div class="principle"><b>Built with</b>Laravel 12, PHP 8.2, SQLite and Blade</div><div class="principle"><b>Data</b>Eight fictional tasks and one sample user are loaded by the database seeder.</div></div></section>
    </div>
    <p class="footnote">Task dates in the sample data are seeded relative to the current day.</p>
@endsection
