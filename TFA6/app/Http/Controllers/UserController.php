<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::query()
            ->orderBy('full_name')
            ->get();

        return view('pages.users', compact('users'));
    }
}
