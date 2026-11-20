<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller
{
    public function profile()
    {
        $user = User::query()->firstOrFail();

        return view('pages.profile', compact('user'));
    }
}
