@extends('layouts.app')
@section('title','Customers')
@section('crumb','Customers')
@section('content')
    <div class="page-head"><div><div class="eyebrow">People</div><h1>Customers</h1><p class="lead">Keep customer contact information up to date.</p></div><a class="button button-primary" href="{{ route('customers.create') }}">+ Add customer</a></div>
    <section class="section-card card" style="margin-top:0"><div class="section-head"><h2>Customer directory</h2><span class="footnote" style="margin:0">{{ $customers->total() }} customers</span></div>
        <div class="table-wrap"><table><thead><tr><th>Name</th><th>Email</th><th>Phone</th><th>Actions</th></tr></thead><tbody>
        @forelse($customers as $customer)
            <tr><td><a class="task-title" href="{{ route('customers.show',$customer) }}">{{ $customer->full_name }}</a></td><td>{{ $customer->email }}</td><td>{{ $customer->phone ?: '—' }}</td><td><div class="row-actions"><a class="button" href="{{ route('customers.edit',$customer) }}">Edit</a><form method="POST" action="{{ route('customers.destroy',$customer) }}" onsubmit="return confirm('Delete this customer?')">@csrf @method('DELETE')<button class="button button-danger">Delete</button></form></div></td></tr>
        @empty<tr><td colspan="4">No customers yet.</td></tr>@endforelse
        </tbody></table></div><div class="pagination">{{ $customers->links() }}</div>
    </section>
@endsection
