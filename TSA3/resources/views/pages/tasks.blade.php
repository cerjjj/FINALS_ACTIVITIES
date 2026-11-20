@extends('layouts.app')

@section('title', 'All Tasks')
@section('crumb', 'All tasks')

@section('content')
    <div class="page-head"><div><div class="eyebrow">Full schedule</div><h1>All tasks</h1><p class="lead">Every task, ordered by its scheduled date.</p></div><div class="date-pill">{{ $tasks->count() }} tasks</div></div>
    <section class="section-card card" style="margin-top:0">
        <div class="section-head"><h2>Task list</h2><span style="color:#929d96;font-size:11px">Ordered by date</span></div>
        <div class="table-wrap"><table><thead><tr><th>Task</th><th>Status</th><th>Date</th></tr></thead><tbody>
            @forelse ($tasks as $task)
                <tr><td><span class="task-title">{{ $task->title }}</span></td><td><span class="badge {{ str_replace(' ', '-', $task->status) }}">{{ ucfirst($task->status) }}</span></td><td class="task-date">{{ $task->task_date->format('M j, Y') }}</td></tr>
            @empty
                <tr><td colspan="3"><div class="task-empty">No tasks have been added yet.</div></td></tr>
            @endforelse
        </tbody></table></div>
    </section>
    <p class="footnote">The list is retrieved through Eloquent and ordered by <code>task_date</code>.</p>
@endsection
