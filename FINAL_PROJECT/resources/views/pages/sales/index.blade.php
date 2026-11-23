@extends('layouts.app')
@section('title','Sales history')
@section('crumb','Sales history')
@section('content')
<div class="page-head"><div><div class="eyebrow">Transactions</div><h1>Sales history</h1><p class="lead">Recorded sales with product, customer, staff, quantity, total, and time.</p></div><a class="button button-primary" href="{{ route('sales.create') }}">+ Record sale</a></div>
<section class="section-card card" style="margin-top:0"><div class="section-head"><h2>Transactions</h2><span class="footnote" style="margin:0">{{ $sales->total() }} sales</span></div>
<div class="table-wrap"><table><thead><tr><th>Product</th><th>Customer</th><th>Staff</th><th>Quantity</th><th>Total</th><th>Date</th></tr></thead><tbody>
@forelse($sales as $sale)
<tr><td>{{ $sale->product->name }}</td><td>{{ $sale->customer?->full_name ?? 'Walk-in' }}</td><td>{{ $sale->staff->full_name }}</td><td>{{ $sale->quantity }}</td><td>₱{{ number_format((float)$sale->total_price,2) }}</td><td>{{ $sale->created_at->format('M j, Y g:i A') }}</td></tr>
@empty<tr><td colspan="6"><div style="padding:22px;text-align:center;color:var(--muted)">No transactions recorded yet.</div></td></tr>@endforelse
</tbody></table></div><div class="pagination">{{ $sales->links() }}</div></section>
@endsection
