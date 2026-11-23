@extends('layouts.app')
@section('title','Add product')
@section('crumb','Add product')
@section('content')
    <div class="page-head"><div><div class="eyebrow">Catalog</div><h1>Add product</h1><p class="lead">Enter product details and starting inventory.</p></div></div>
    <section class="form-card card"><form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">@csrf @include('pages.products._form')<div class="form-actions"><a class="button" href="{{ route('products.index') }}">Cancel</a><button class="button button-primary" type="submit">Save product</button></div></form></section>
@endsection
