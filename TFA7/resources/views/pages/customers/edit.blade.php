@extends('layouts.app')

@section('title', 'Edit Customer')
@section('crumb', 'Edit customer')

@section('content')
    <div class="page-head"><div><div class="eyebrow">Customer accounts</div><h1>Edit customer</h1><p class="lead">Update {{ $customer->full_name }}'s account details.</p></div></div>
    <section class="form-card card">
        <form method="POST" action="{{ route('customers.update', $customer) }}">
            @csrf
            @method('PUT')
            @include('pages.customers._form')
            <div class="form-actions"><a class="button button-light" href="{{ route('customers.index') }}">Cancel</a><button class="button button-primary" type="submit">Save changes</button></div>
        </form>
    </section>
@endsection
