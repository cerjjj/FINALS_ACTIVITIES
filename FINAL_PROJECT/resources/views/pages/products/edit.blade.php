@extends('layouts.app')
@section('title','Edit product')
@section('crumb','Edit product')
@section('content')
    <div class="page-head"><div><div class="eyebrow">Catalog</div><h1>Edit product</h1><p class="lead">Update details, price, available stock, or image.</p></div></div>
    <section class="form-card card"><form method="POST" action="{{ route('products.update',$product) }}" enctype="multipart/form-data">@csrf @method('PUT') @include('pages.products._form')<div class="form-actions"><a class="button" href="{{ route('products.index') }}">Cancel</a><button class="button button-primary" type="submit">Save changes</button></div></form></section>
@endsection
