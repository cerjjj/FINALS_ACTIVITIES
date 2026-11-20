@extends('layouts.app')

@section('title', 'User Details')
@section('crumb', 'User details')

@section('content')
    <div class="page-head"><div><div class="eyebrow">User accounts</div><h1>{{ $user->full_name }}</h1><p class="lead">Store team account details.</p></div><a class="button button-light" href="{{ route('users.edit', $user) }}">Edit user</a></div>
    <section class="form-card card detail-card"><dl><dt>Username</dt><dd>{{ $user->username }}</dd><dt>Email</dt><dd>{{ $user->email }}</dd><dt>Created</dt><dd>{{ $user->created_at->format('M j, Y') }}</dd></dl><a class="button button-light" href="{{ route('users.index') }}">Back to users</a></section>
@endsection
