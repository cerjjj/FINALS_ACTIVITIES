@extends('layouts.app')

@section('title', 'Users')
@section('crumb', 'User accounts')

@section('content')
    <div class="page-head">
        <div><div class="eyebrow">Team directory</div><h1>User accounts</h1><p class="lead">Create and maintain accounts for the people who run the store.</p></div>
        <a class="button button-primary" href="{{ route('users.create') }}">+ Add user</a>
    </div>

    @if (session('success'))<div class="notice">{{ session('success') }}</div>@endif

    <section class="section-card card" style="margin-top:0">
        <div class="section-head"><h2>All users</h2><span style="color:#929d96;font-size:11px">{{ $users->count() }} accounts</span></div>
        <div class="table-wrap"><table><thead><tr><th>User</th><th>Username</th><th>Email</th><th>Actions</th></tr></thead><tbody>
            @forelse ($users as $user)
                <tr><td><div class="person"><img class="avatar-image" src="{{ $user->avatar ? \Illuminate\Support\Facades\Storage::disk('public')->url($user->avatar) : asset('images/avatar-placeholder.svg') }}" alt="{{ $user->full_name }} avatar"><span>{{ $user->full_name }}</span></div></td><td>{{ $user->username }}</td><td>{{ $user->email }}</td><td class="row-actions"><a class="button button-light" href="{{ route('users.show', $user) }}">View</a><a class="button button-light" href="{{ route('users.edit', $user) }}">Edit</a><form method="POST" action="{{ route('users.destroy', $user) }}" onsubmit="return confirm('Delete this user?')">@csrf @method('DELETE')<button class="button button-danger" type="submit">Delete</button></form></td></tr>
            @empty
                <tr><td colspan="4"><div class="task-empty">No user accounts yet.</div></td></tr>
            @endforelse
        </tbody></table></div>
    </section>
@endsection
