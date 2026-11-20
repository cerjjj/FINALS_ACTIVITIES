@extends('layouts.app')

@section('title', 'Customers')
@section('crumb', 'Customer accounts')

@section('content')
    <div class="page-head"><div><div class="eyebrow">Directory</div><h1>Customer accounts</h1><p class="lead">A quick look at the people who shop with your store.</p></div><div class="date-pill">{{ $customers->count() }} accounts from Eloquent</div></div>
    <section class="section-card card" style="margin-top:0">
        <div class="section-head"><h2>All customers</h2><span style="color:#929d96;font-size:11px">Loaded from the customers table</span></div>
        <div class="table-wrap"><table><thead><tr><th>Customer</th><th>Email</th><th>Phone</th></tr></thead><tbody>
            @foreach ($customers as $customer)
                <tr><td><div class="person"><span class="mini-avatar">{{ collect(explode(' ', $customer->full_name))->map(fn ($part) => strtoupper(substr($part, 0, 1)))->take(2)->join('') }}</span><span>{{ $customer->full_name }}</span></div></td><td>{{ $customer->email }}</td><td>{{ $customer->phone }}</td></tr>
            @endforeach
        </tbody></table></div>
    </section>
    <p class="footnote">This listing is retrieved with <code>Customer::query()</code> and rendered with Blade <code>@@foreach</code>.</p>
@endsection
