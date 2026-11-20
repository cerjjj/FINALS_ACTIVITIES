@extends('layouts.app')

@section('title', 'Edit User')
@section('crumb', 'Edit user')

@section('content')
    <div class="page-head"><div><div class="eyebrow">User accounts</div><h1>Edit user</h1><p class="lead">Update {{ $user->full_name }}'s details and profile picture.</p></div></div>
    <section class="form-card card">
        <form method="POST" action="{{ route('users.update', $user) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            @include('pages.users._form')

            <div class="field avatar-upload">
                <label for="avatar">Profile picture <span class="optional">Optional · JPG, PNG, GIF or WebP · up to 2 MB</span></label>
                @if ($user->avatar)
                    <img class="avatar-preview" src="{{ \Illuminate\Support\Facades\Storage::disk('public')->url($user->avatar) }}" alt="Current profile picture">
                @endif
                <input id="avatar" name="avatar" type="file" accept="image/jpeg,image/png,image/gif,image/webp">
                @error('avatar')<p class="field-error">{{ $message }}</p>@enderror
                <p class="field-hint">The image will be cropped to a square thumbnail before it is saved.</p>
            </div>

            <div class="form-actions"><a class="button button-light" href="{{ route('users.index') }}">Cancel</a><button class="button button-primary" type="submit">Save changes</button></div>
        </form>
    </section>
@endsection
