@extends('layouts.app')

@section('title', 'Add Customer')
@section('crumb', 'Add customer')

@section('content')
    <div class="page-head"><div><div class="eyebrow">Customer accounts</div><h1>Add a customer</h1><p class="lead">Enter the customer's account details.</p></div></div>
    <section class="form-card card">
        <form method="POST" action="{{ route('customers.store') }}">
            @csrf
            @include('pages.customers._form')
            <div class="form-actions"><a class="button button-light" href="{{ route('customers.index') }}">Cancel</a><button class="button button-primary" type="submit">Create customer</button></div>
        </form>
    </section>
@endsection
