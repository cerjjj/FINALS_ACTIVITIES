@extends('layouts.app')

@section('title', 'Edit Task')
@section('crumb', 'Edit task')

@section('content')
    <div class="page-head"><div><div class="eyebrow">Task management</div><h1>Edit task</h1><p class="lead">Update the title, status, or scheduled date.</p></div></div>
    <section class="form-card card">
        <form method="POST" action="{{ route('tasks.update', $task) }}">
            @csrf
            @method('PUT')
            @include('pages.tasks._form')
            <div class="form-actions"><a class="button" href="{{ route('tasks.index') }}">Cancel</a><button class="button button-primary" type="submit">Save changes</button></div>
        </form>
    </section>
@endsection
