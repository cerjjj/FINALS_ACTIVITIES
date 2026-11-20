@extends('layouts.app')

@section('title', 'Customers')
@section('crumb', 'Customer accounts')

@section('content')
    <div class="page-head">
        <div><div class="eyebrow">Directory</div><h1>Customer accounts</h1><p class="lead">Create and maintain the people who shop with your store.</p></div>
        <a class="button button-primary" href="{{ route('customers.create') }}">+ Add customer</a>
    </div>

    @if (session('success'))<div class="notice">{{ session('success') }}</div>@endif

    <section class="section-card card" style="margin-top:0">
        <div class="section-head"><h2>All customers</h2><span style="color:#929d96;font-size:11px">{{ $customers->count() }} accounts</span></div>
        <div class="table-wrap"><table><thead><tr><th>Customer</th><th>Email</th><th>Phone</th><th>Actions</th></tr></thead><tbody>
            @forelse ($customers as $customer)
                <tr><td><div class="person"><span class="mini-avatar">{{ collect(explode(' ', $customer->full_name))->map(fn ($part) => strtoupper(substr($part, 0, 1)))->take(2)->join('') }}</span><span>{{ $customer->full_name }}</span></div></td><td>{{ $customer->email }}</td><td>{{ $customer->phone ?: '—' }}</td><td class="row-actions"><a class="button button-light" href="{{ route('customers.show', $customer) }}">View</a><a class="button button-light" href="{{ route('customers.edit', $customer) }}">Edit</a><form method="POST" action="{{ route('customers.destroy', $customer) }}" onsubmit="return confirm('Delete this customer?')">@csrf @method('DELETE')<button class="button button-danger" type="submit">Delete</button></form></td></tr>
            @empty
                <tr><td colspan="4"><div class="task-empty">No customer accounts yet.</div></td></tr>
            @endforelse
        </tbody></table></div>
    </section>
@endsection
