@extends('layouts.app')
@section('title','Product details')
@section('crumb','Product details')
@section('content')
    <div class="page-head"><div><div class="eyebrow">Catalog</div><h1>{{ $product->name }}</h1><p class="lead">Product and inventory details.</p></div><a class="button button-primary" href="{{ route('products.edit',$product) }}">Edit product</a></div>
    <section class="form-card card">@if($product->image)<img class="preview" src="{{ Storage::disk('public')->url($product->image) }}" alt="{{ $product->name }}">@endif<dl class="detail-grid"><dt>Price</dt><dd>₱{{ number_format((float)$product->price,2) }}</dd><dt>Available stock</dt><dd>{{ $product->stock_quantity }} units</dd><dt>Added</dt><dd>{{ $product->created_at->format('M j, Y') }}</dd></dl><a class="button" href="{{ route('products.index') }}">Back to products</a></section>
@endsection
