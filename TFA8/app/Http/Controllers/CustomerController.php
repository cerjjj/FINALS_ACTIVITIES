<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::query()
            ->orderBy('full_name')
            ->get();

        return view('pages.customers', compact('customers'));
    }

    public function create()
    {
        return view('pages.customers.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'full_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['nullable', 'string', 'max:40'],
        ]);

        Customer::create($validated);

        return to_route('customers.index')->with('success', 'Customer account created.');
    }

    public function edit(Customer $customer)
    {
        return view('pages.customers.edit', compact('customer'));
    }

    public function show(Customer $customer)
    {
        return view('pages.customers.show', compact('customer'));
    }

    public function update(Request $request, Customer $customer)
    {
        $validated = $request->validate([
            'full_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['nullable', 'string', 'max:40'],
        ]);

        $customer->update($validated);

        return to_route('customers.index')->with('success', 'Customer account updated.');
    }

    public function destroy(Customer $customer)
    {
        $customer->delete();

        return to_route('customers.index')->with('success', 'Customer account deleted.');
    }
}
