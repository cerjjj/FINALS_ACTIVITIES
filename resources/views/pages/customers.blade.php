@extends('layouts.app')

@section('title', 'Customers')
@section('crumb', 'Customer accounts')

@section('content')
    <div class="page-head"><div><div class="eyebrow">Directory</div><h1>Customer accounts</h1><p class="lead">A quick look at the people who shop with your store.</p></div><div class="date-pill">{{ count($customers) }} sample accounts</div></div>
    <section class="section-card card" style="margin-top:0">
        <div class="section-head"><h2>All customers</h2><span style="color:#929d96;font-size:11px">Temporary sample data</span></div>
        <div class="table-wrap"><table><thead><tr><th>Customer</th><th>Account ID</th><th>Phone</th><th>Status</th></tr></thead><tbody>
            @foreach ($customers as $customer)
                <tr><td><div class="person"><span class="mini-avatar">{{ collect(explode(' ', $customer['name']))->map(fn ($part) => strtoupper(substr($part, 0, 1)))->take(2)->join('') }}</span><span>{{ $customer['name'] }}<small style="display:block;color:#909b94;font-weight:400">{{ $customer['email'] }}</small></span></div></td><td>{{ $customer['id'] }}</td><td>{{ $customer['phone'] }}</td><td><span class="badge {{ strtolower($customer['status']) }}">{{ $customer['status'] }}</span></td></tr>
            @endforeach
        </tbody></table></div>
    </section>
    <p class="footnote">This listing is passed from <code>CustomerController</code> and looped through with Blade <code>@@foreach</code>.</p>
@endsection
