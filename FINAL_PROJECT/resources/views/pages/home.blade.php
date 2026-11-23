@extends('layouts.app')

@section('title', 'Overview')
@section('crumb', 'Overview')

@section('content')
    <section class="card" style="padding:28px;background:#183e30;color:#fff">
        <div class="eyebrow" style="color:#a8d0b5">Point of sale</div>
        <h1 style="font-size:35px;margin:10px 0">Your store at a glance.</h1>
        <p style="margin:0;color:#cfddd4;max-width:550px">Manage products and people, record sales, and keep inventory current in one workspace.</p>
        <a class="button button-primary" style="margin-top:18px;background:#f0f6f0;color:#184631;border-color:#f0f6f0" href="{{ route('sales.create') }}">Record a sale</a>
    </section>
    <section class="stats" aria-label="POS summary">
        <article class="stat card"><div class="stat-top"><span>Products</span><span class="stat-icon">▦</span></div><strong>{{ $productCount }}</strong><small>In your catalog</small></article>
        <article class="stat card"><div class="stat-top"><span>Customers</span><span class="stat-icon">♧</span></div><strong>{{ $customerCount }}</strong><small>Customer records</small></article>
        <article class="stat card"><div class="stat-top"><span>Staff</span><span class="stat-icon">♙</span></div><strong>{{ $staffCount }}</strong><small>Team accounts</small></article>
        <article class="stat card"><div class="stat-top"><span>Sales today</span><span class="stat-icon">₱</span></div><strong style="font-size:20px">₱{{ number_format((float) $todaySales, 2) }}</strong><small>Recorded transactions</small></article>
    </section>
    <section class="section-card card">
        <div class="section-head"><h2>Recent sales</h2><a class="button" href="{{ route('sales.index') }}">View history</a></div>
        <div class="table-wrap"><table><thead><tr><th>Product</th><th>Customer</th><th>Staff</th><th>Qty</th><th>Total</th><th>Date</th></tr></thead><tbody>
            @forelse ($recentSales as $sale)
                <tr><td>{{ $sale->product->name }}</td><td>{{ $sale->customer?->full_name ?? 'Walk-in' }}</td><td>{{ $sale->staff->full_name }}</td><td>{{ $sale->quantity }}</td><td>₱{{ number_format((float) $sale->total_price, 2) }}</td><td>{{ $sale->created_at->format('M j, Y') }}</td></tr>
            @empty
                <tr><td colspan="6"><div class="task-empty" style="padding:22px;text-align:center;color:var(--muted)">No sales recorded yet. Start with a sale to see transactions here.</div></td></tr>
            @endforelse
        </tbody></table></div>
    </section>
    <p class="footnote">Inventory decreases in the same transaction that records each sale.</p>
@endsection
