@extends('layouts.app')
@section('title','Staff details')
@section('crumb','Staff details')
@section('content')
<div class="page-head"><div><div class="eyebrow">Team</div><h1>{{ $staff->full_name }}</h1><p class="lead">Staff account details.</p></div><a class="button button-primary" href="{{ route('staff.edit',$staff) }}">Edit staff</a></div>
<section class="form-card card">@if($staff->avatar)<img class="preview" src="{{ Storage::disk('public')->url($staff->avatar) }}" alt="{{ $staff->full_name }} avatar">@endif<dl class="detail-grid"><dt>Username</dt><dd>{{ $staff->username }}</dd><dt>Email</dt><dd>{{ $staff->email }}</dd><dt>Sales recorded</dt><dd>{{ $staff->sales()->count() }}</dd><dt>Joined</dt><dd>{{ $staff->created_at->format('M j, Y') }}</dd></dl><a class="button" href="{{ route('staff.index') }}">Back to staff</a></section>
@endsection
