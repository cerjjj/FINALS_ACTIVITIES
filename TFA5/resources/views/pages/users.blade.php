@extends('layouts.app')

@section('title', 'Users')
@section('crumb', 'User accounts')

@section('content')
    <div class="page-head"><div><div class="eyebrow">Team directory</div><h1>User accounts</h1><p class="lead">The people who help keep the store running day to day.</p></div><div class="date-pill">{{ count($users) }} sample accounts</div></div>
    <section class="section-card card" style="margin-top:0">
        <div class="section-head"><h2>All users</h2><span style="color:#929d96;font-size:11px">Temporary sample data</span></div>
        <div class="table-wrap"><table><thead><tr><th>Team member</th><th>Account ID</th><th>Role</th><th>Status</th></tr></thead><tbody>
            @foreach ($users as $user)
                <tr><td><div class="person"><span class="mini-avatar">{{ collect(explode(' ', $user['name']))->map(fn ($part) => strtoupper(substr($part, 0, 1)))->take(2)->join('') }}</span><span>{{ $user['name'] }}<small style="display:block;color:#909b94;font-weight:400">{{ $user['email'] }}</small></span></div></td><td>{{ $user['id'] }}</td><td>{{ $user['role'] }}</td><td><span class="badge {{ strtolower($user['status']) }}">{{ $user['status'] }}</span></td></tr>
            @endforeach
        </tbody></table></div>
    </section>
    <p class="footnote">This listing is passed from <code>UserController</code> and looped through with Blade <code>@@foreach</code>.</p>
@endsection
