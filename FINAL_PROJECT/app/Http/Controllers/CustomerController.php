<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CustomerController extends Controller
{
    public function index(): View
    {
        $customers = Customer::query()->orderBy('full_name')->paginate(12);
        return view('pages.customers.index', compact('customers'));
    }

    public function create(): View
    {
        return view('pages.customers.create');
    }

    public function store(Request $request): RedirectResponse
    {
        Customer::create($this->validatedCustomer($request));
        return to_route('customers.index')->with('success', 'Customer added.');
    }

    public function show(Customer $customer): View
    {
        return view('pages.customers.show', compact('customer'));
    }

    public function edit(Customer $customer): View
    {
        return view('pages.customers.edit', compact('customer'));
    }

    public function update(Request $request, Customer $customer): RedirectResponse
    {
        $customer->update($this->validatedCustomer($request));
        return to_route('customers.index')->with('success', 'Customer updated.');
    }

    public function destroy(Customer $customer): RedirectResponse
    {
        $customer->delete();
        return to_route('customers.index')->with('success', 'Customer deleted.');
    }

    private function validatedCustomer(Request $request): array
    {
        return $request->validate([
            'full_name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'email', 'max:100'],
            'phone' => ['nullable', 'string', 'max:20'],
        ]);
    }
}
