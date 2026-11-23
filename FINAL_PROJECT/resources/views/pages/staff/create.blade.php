@extends('layouts.app')
@section('title','Add staff')
@section('crumb','Add staff')
@section('content')
<div class="page-head"><div><div class="eyebrow">Team</div><h1>Add staff member</h1><p class="lead">Create a secure staff login account.</p></div></div>
<section class="form-card card"><form method="POST" action="{{ route('staff.store') }}" enctype="multipart/form-data">@csrf @include('pages.staff._form')<div class="form-actions"><a class="button" href="{{ route('staff.index') }}">Cancel</a><button class="button button-primary">Create staff account</button></div></form></section>
@endsection
