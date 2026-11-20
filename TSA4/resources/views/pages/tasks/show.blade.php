@extends('layouts.app')

@section('title', 'Task Details')
@section('crumb', 'Task details')

@section('content')
    <div class="page-head"><div><div class="eyebrow">Task details</div><h1>{{ $task->title }}</h1><p class="lead">Scheduled task information.</p></div>@auth<a class="button button-primary" href="{{ route('tasks.edit', $task) }}">Edit task</a>@endauth</div>
    <section class="form-card card"><dl class="detail-list"><dt>Status</dt><dd><span class="badge {{ str_replace(' ', '-', $task->status) }}">{{ ucfirst($task->status) }}</span></dd><dt>Task date</dt><dd>{{ $task->task_date->format('l, F j, Y') }}</dd><dt>Created</dt><dd>{{ $task->created_at->format('M j, Y') }}</dd></dl><a class="button" href="{{ route('tasks.index') }}">Back to tasks</a></section>
@endsection
