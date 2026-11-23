<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\User;
use App\Support\ImageProcessor;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class StaffController extends Controller
{
    public function index(): View
    {
        $staff = User::query()->orderBy('full_name')->paginate(12);
        return view('pages.staff.index', compact('staff'));
    }

    public function create(): View
    {
        return view('pages.staff.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'username' => ['required', 'string', 'max:50', Rule::unique('users', 'username')],
            'full_name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'email', 'max:100', Rule::unique('users', 'email')],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'avatar' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        ]);

        $upload = $request->file('avatar');
        unset($validated['avatar']);
        $validated['password'] = Hash::make($validated['password']);
        $staff = User::create($validated);

        if ($upload) {
            $staff->update(['avatar' => ImageProcessor::storeSquare($upload, 'avatars', 256)]);
        }

        return to_route('staff.index')->with('success', 'Staff account created.');
    }

    public function show(User $staff): View
    {
        return view('pages.staff.show', compact('staff'));
    }

    public function edit(User $staff): View
    {
        return view('pages.staff.edit', compact('staff'));
    }

    public function update(Request $request, User $staff): RedirectResponse
    {
        $validated = $request->validate([
            'username' => ['required', 'string', 'max:50', Rule::unique('users', 'username')->ignore($staff->id)],
            'full_name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'email', 'max:100', Rule::unique('users', 'email')->ignore($staff->id)],
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
            'avatar' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        ]);

        $upload = $request->file('avatar');
        unset($validated['avatar']);
        if (filled($validated['password'] ?? null)) {
            $validated['password'] = Hash::make($validated['password']);
        } else {
            unset($validated['password']);
        }

        $oldAvatar = $staff->avatar;
        $staff->update($validated);

        if ($upload) {
            $path = ImageProcessor::storeSquare($upload, 'avatars', 256);
            $staff->update(['avatar' => $path]);
            if ($oldAvatar) {
                Storage::disk('public')->delete($oldAvatar);
            }
        }

        return to_route('staff.index')->with('success', 'Staff account updated.');
    }

    public function destroy(User $staff): RedirectResponse
    {
        if ($staff->id === auth()->id()) {
            return back()->with('error', 'You cannot delete the staff account you are currently signed in with.');
        }

        if (Sale::where('sold_by', $staff->id)->exists()) {
            return back()->with('error', 'This staff account is referenced by sales history and cannot be deleted.');
        }

        if ($staff->avatar) {
            Storage::disk('public')->delete($staff->avatar);
        }

        $staff->delete();
        return to_route('staff.index')->with('success', 'Staff account deleted.');
    }
}
