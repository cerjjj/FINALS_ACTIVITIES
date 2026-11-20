@extends('layouts.app')

@section('title', 'Add User')
@section('crumb', 'Add user')

@section('content')
    <div class="page-head"><div><div class="eyebrow">User accounts</div><h1>Add a user</h1><p class="lead">Create a store team account.</p></div></div>
    <section class="form-card card">
        <form method="POST" action="{{ route('users.store') }}">
            @csrf
            @include('pages.users._form')
            <div class="form-actions"><a class="button button-light" href="{{ route('users.index') }}">Cancel</a><button class="button button-primary" type="submit">Create user</button></div>
        </form>
    </section>
@endsection
