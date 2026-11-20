@extends('layouts.app')

@section('title', 'Users')
@section('crumb', 'User accounts')

@section('content')
    <div class="page-head"><div><div class="eyebrow">Team directory</div><h1>User accounts</h1><p class="lead">The people who help keep the store running day to day.</p></div><div class="date-pill">{{ $users->count() }} accounts from Eloquent</div></div>
    <section class="section-card card" style="margin-top:0">
        <div class="section-head"><h2>All users</h2><span style="color:#929d96;font-size:11px">Loaded from the users table</span></div>
        <div class="table-wrap"><table><thead><tr><th>Username</th><th>Full name</th></tr></thead><tbody>
            @foreach ($users as $user)
                <tr><td>{{ $user->username }}</td><td><div class="person"><span class="mini-avatar">{{ collect(explode(' ', $user->full_name))->map(fn ($part) => strtoupper(substr($part, 0, 1)))->take(2)->join('') }}</span><span>{{ $user->full_name }}</span></div></td></tr>
            @endforeach
        </tbody></table></div>
    </section>
    <p class="footnote">This listing is retrieved with <code>User::query()</code> and rendered with Blade <code>@@foreach</code>.</p>
@endsection
