<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\User;

class PageController extends Controller
{
    public function home()
    {
        return view('pages.home', [
            'customerCount' => Customer::count(),
            'userCount' => User::count(),
        ]);
    }

    public function about() { return view('pages.about'); }
}
