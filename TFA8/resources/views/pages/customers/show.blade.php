@extends('layouts.app')

@section('title', 'Customer Details')
@section('crumb', 'Customer details')

@section('content')
    <div class="page-head"><div><div class="eyebrow">Customer accounts</div><h1>{{ $customer->full_name }}</h1><p class="lead">Customer account details.</p></div><a class="button button-light" href="{{ route('customers.edit', $customer) }}">Edit customer</a></div>
    <section class="form-card card detail-card"><dl><dt>Email</dt><dd>{{ $customer->email }}</dd><dt>Phone</dt><dd>{{ $customer->phone ?: 'Not provided' }}</dd><dt>Created</dt><dd>{{ $customer->created_at->format('M j, Y') }}</dd></dl><a class="button button-light" href="{{ route('customers.index') }}">Back to customers</a></section>
@endsection
