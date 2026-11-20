<?php

namespace App\Http\Controllers;

use App\Models\Customer;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::query()
            ->orderBy('full_name')
            ->get();

        return view('pages.customers', compact('customers'));
    }
}
