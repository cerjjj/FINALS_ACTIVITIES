@extends('layouts.app')
@section('title','Staff')
@section('crumb','Staff')
@section('content')
<div class="page-head"><div><div class="eyebrow">Team</div><h1>Staff accounts</h1><p class="lead">Manage the people authorized to use the POS.</p></div><a class="button button-primary" href="{{ route('staff.create') }}">+ Add staff member</a></div>
<section class="section-card card" style="margin-top:0"><div class="section-head"><h2>Staff directory</h2><span class="footnote" style="margin:0">{{ $staff->total() }} accounts</span></div>
<div class="table-wrap"><table><thead><tr><th>Staff member</th><th>Username</th><th>Email</th><th>Actions</th></tr></thead><tbody>
@forelse($staff as $member)
<tr><td><div class="person"><img class="product-thumb" src="{{ $member->avatar ? Storage::disk('public')->url($member->avatar) : asset('images/avatar-placeholder.svg') }}" alt=""><a href="{{ route('staff.show',$member) }}">{{ $member->full_name }}</a></div></td><td>{{ $member->username }}</td><td>{{ $member->email }}</td><td><div class="row-actions"><a class="button" href="{{ route('staff.edit',$member) }}">Edit</a><form method="POST" action="{{ route('staff.destroy',$member) }}" onsubmit="return confirm('Delete this staff account?')">@csrf @method('DELETE')<button class="button button-danger">Delete</button></form></div></td></tr>
@empty<tr><td colspan="4">No staff accounts yet.</td></tr>@endforelse
</tbody></table></div><div class="pagination">{{ $staff->links() }}</div></section>
@endsection
