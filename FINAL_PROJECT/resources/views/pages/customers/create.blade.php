@extends('layouts.app')
@section('title','Add customer')
@section('crumb','Add customer')
@section('content')
<div class="page-head"><div><div class="eyebrow">People</div><h1>Add customer</h1><p class="lead">Create a customer record.</p></div></div>
<section class="form-card card"><form method="POST" action="{{ route('customers.store') }}">@csrf @include('pages.customers._form')<div class="form-actions"><a class="button" href="{{ route('customers.index') }}">Cancel</a><button class="button button-primary">Save customer</button></div></form></section>
@endsection
