@extends('layouts.app')
@section('title','Customer details')
@section('crumb','Customer details')
@section('content')
<div class="page-head"><div><div class="eyebrow">People</div><h1>{{ $customer->full_name }}</h1><p class="lead">Customer contact information.</p></div><a class="button button-primary" href="{{ route('customers.edit',$customer) }}">Edit customer</a></div>
<section class="form-card card"><dl class="detail-grid"><dt>Email</dt><dd>{{ $customer->email }}</dd><dt>Phone</dt><dd>{{ $customer->phone ?: 'Not provided' }}</dd><dt>Added</dt><dd>{{ $customer->created_at->format('M j, Y') }}</dd></dl><a class="button" href="{{ route('customers.index') }}">Back to customers</a></section>
@endsection
