@extends('layouts.app')

@section('title', 'Today')
@section('crumb', 'Today')

@section('content')
    <div class="page-head"><div><div class="eyebrow">Your daily plan</div><h1>Tasks for today</h1><p class="lead">A focused view of what is on your list today.</p></div><div class="date-pill">{{ today()->format('l, F j, Y') }}</div></div>

    <section class="stats" aria-label="Today's task summary">
        <article class="stat card"><div class="stat-top"><span>Scheduled today</span><span class="stat-icon">◷</span></div><strong>{{ $tasks->count() }}</strong><small>Tasks dated today</small></article>
        <article class="stat card"><div class="stat-top"><span>Still in progress</span><span class="stat-icon">↗</span></div><strong>{{ $tasks->whereIn('status', ['pending', 'in progress'])->count() }}</strong><small>Pending or underway</small></article>
        <article class="stat card"><div class="stat-top"><span>Completed</span><span class="stat-icon">✓</span></div><strong>{{ $tasks->where('status', 'completed')->count() }}</strong><small>Finished today</small></article>
    </section>

    <section class="section-card card">
        <div class="section-head"><h2>Today's list</h2><a href="{{ route('tasks.index') }}">View all tasks&nbsp; →</a></div>
        <div class="table-wrap"><table><thead><tr><th>Task</th><th>Status</th><th>Date</th></tr></thead><tbody>
            @forelse ($tasks as $task)
                <tr><td><span class="task-title">{{ $task->title }}</span></td><td><span class="badge {{ str_replace(' ', '-', $task->status) }}">{{ ucfirst($task->status) }}</span></td><td class="task-date">{{ $task->task_date->format('M j, Y') }}</td></tr>
            @empty
                <tr><td colspan="3"><div class="task-empty">Nothing is scheduled for today. Enjoy the breathing room.</div></td></tr>
            @endforelse
        </tbody></table></div>
    </section>
    <p class="footnote">This page uses the <code>Task::forToday()</code> Eloquent scope to show today's records only.</p>
@endsection
