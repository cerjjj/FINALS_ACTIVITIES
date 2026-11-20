@extends('layouts.app')

@section('title', 'Create Task')
@section('crumb', 'Create task')

@section('content')
    <div class="page-head"><div><div class="eyebrow">Task management</div><h1>Create a task</h1><p class="lead">Add something to your schedule.</p></div></div>
    <section class="form-card card">
        <form method="POST" action="{{ route('tasks.store') }}">
            @csrf
            @include('pages.tasks._form')
            <div class="form-actions"><a class="button" href="{{ route('tasks.index') }}">Cancel</a><button class="button button-primary" type="submit">Create task</button></div>
        </form>
    </section>
@endsection
