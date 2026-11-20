<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Intervention\Image\Laravel\Facades\Image;

class UserController extends Controller
{
    public function index()
    {
        $users = User::query()
            ->orderBy('full_name')
            ->get();

        return view('pages.users', compact('users'));
    }

    public function create()
    {
        return view('pages.users.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'username' => ['required', 'string', 'max:80', Rule::unique('users', 'username')],
            'full_name' => ['required', 'string', 'max:255'],
        ]);

        User::create($validated);

        return to_route('users.index')->with('success', 'User account created.');
    }

    public function edit(User $user)
    {
        return view('pages.users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'username' => ['required', 'string', 'max:80', Rule::unique('users', 'username')->ignore($user->id)],
            'full_name' => ['required', 'string', 'max:255'],
            'avatar' => ['nullable', 'image', 'max:2048'],
        ]);

        $oldAvatarPath = $user->avatar;
        $newAvatarPath = null;

        if ($request->hasFile('avatar')) {
            $upload = $request->file('avatar');
            $prepared = Image::read($upload)->cover(256, 256)->encodeByExtension('jpg', quality: 85);
            $newAvatarPath = 'avatars/'.Str::uuid().'.jpg';
            Storage::disk('public')->put($newAvatarPath, (string) $prepared);
            $validated['avatar'] = $newAvatarPath;
        }

        $user->update($validated);

        if ($newAvatarPath && $oldAvatarPath) {
            Storage::disk('public')->delete($oldAvatarPath);
        }

        return to_route('users.index')->with('success', 'User account updated.');
    }
}
