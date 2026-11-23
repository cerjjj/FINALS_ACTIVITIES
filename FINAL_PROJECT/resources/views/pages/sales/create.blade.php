@extends('layouts.app')
@section('title','Record a sale')
@section('crumb','Record sale')
@section('content')
<div class="page-head"><div><div class="eyebrow">Checkout</div><h1>Record a sale</h1><p class="lead">Choose a product and quantity. Inventory will update with the transaction.</p></div></div>
<section class="form-card card"><form method="POST" action="{{ route('sales.store') }}">@csrf
    <div class="field"><label for="product_id">Product <span class="required">*</span></label><select id="product_id" name="product_id" required><option value="">Select a product</option>@foreach($products as $product)<option value="{{ $product->id }}" @selected(old('product_id') == $product->id)>{{ $product->name }} · ₱{{ number_format((float)$product->price,2) }} · {{ $product->stock_quantity }} in stock</option>@endforeach</select>@error('product_id')<p class="field-error">{{ $message }}</p>@enderror
        @if($products->isEmpty())<p class="field-hint">There are no products with stock available.</p>@endif
    </div>
    <div class="form-grid"><div class="field"><label for="customer_id">Customer <span class="optional">Optional · leave blank for walk-in</span></label><select id="customer_id" name="customer_id"><option value="">Walk-in customer</option>@foreach($customers as $customer)<option value="{{ $customer->id }}" @selected(old('customer_id') == $customer->id)>{{ $customer->full_name }}</option>@endforeach</select>@error('customer_id')<p class="field-error">{{ $message }}</p>@enderror</div><div class="field"><label for="quantity">Quantity <span class="required">*</span></label><input id="quantity" name="quantity" type="number" min="1" step="1" value="{{ old('quantity',1) }}" required>@error('quantity')<p class="field-error">{{ $message }}</p>@enderror</div></div>
    <div class="form-actions"><a class="button" href="{{ route('sales.index') }}">Cancel</a><button class="button button-primary" type="submit" @disabled($products->isEmpty())>Complete sale</button></div>
</form></section>
@endsection
