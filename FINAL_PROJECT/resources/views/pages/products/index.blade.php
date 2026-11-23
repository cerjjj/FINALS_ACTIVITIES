@extends('layouts.app')
@section('title','Products')
@section('crumb','Products')
@section('content')
    <div class="page-head"><div><div class="eyebrow">Catalog</div><h1>Products</h1><p class="lead">Manage products, pricing, inventory, and product photos.</p></div><a class="button button-primary" href="{{ route('products.create') }}">+ Add product</a></div>
    @if (session('error'))<div class="notice notice-error">{{ session('error') }}</div>@endif
    <section class="section-card card" style="margin-top:0">
        <div class="section-head"><h2>Product catalog</h2><span class="footnote" style="margin:0">{{ $products->total() }} products</span></div>
        <div class="table-wrap"><table><thead><tr><th>Product</th><th>Price</th><th>In stock</th><th>Actions</th></tr></thead><tbody>
            @forelse ($products as $product)
                <tr><td><div class="person"><img class="product-thumb" src="{{ $product->image ? Storage::disk('public')->url($product->image) : asset('images/product-placeholder.svg') }}" alt=""><a href="{{ route('products.show',$product) }}">{{ $product->name }}</a></div></td><td>₱{{ number_format((float) $product->price,2) }}</td><td><span class="badge {{ $product->stock_quantity < 5 ? 'low' : '' }}">{{ $product->stock_quantity }} units</span></td><td><div class="row-actions"><a class="button" href="{{ route('products.edit',$product) }}">Edit</a><form method="POST" action="{{ route('products.destroy',$product) }}" onsubmit="return confirm('Delete this product?')">@csrf @method('DELETE')<button class="button button-danger" type="submit">Delete</button></form></div></td></tr>
            @empty
                <tr><td colspan="4"><div style="padding:22px;text-align:center;color:var(--muted)">No products yet.</div></td></tr>
            @endforelse
        </tbody></table></div>
        <div class="pagination">{{ $products->links() }}</div>
    </section>
@endsection
