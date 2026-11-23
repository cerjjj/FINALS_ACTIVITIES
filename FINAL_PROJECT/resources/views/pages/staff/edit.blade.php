@extends('layouts.app')
@section('title','Edit staff')
@section('crumb','Edit staff')
@section('content')
<div class="page-head"><div><div class="eyebrow">Team</div><h1>Edit staff account</h1><p class="lead">Update {{ $staff->full_name }}'s account, password, or avatar.</p></div></div>
<section class="form-card card"><form method="POST" action="{{ route('staff.update',$staff) }}" enctype="multipart/form-data">@csrf @method('PUT') @include('pages.staff._form')<div class="form-actions"><a class="button" href="{{ route('staff.index') }}">Cancel</a><button class="button button-primary">Save changes</button></div></form></section>
@endsection
