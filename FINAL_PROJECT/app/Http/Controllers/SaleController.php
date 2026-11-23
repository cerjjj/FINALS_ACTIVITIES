<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Product;
use App\Models\Sale;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class SaleController extends Controller
{
    public function index(): View
    {
        $sales = Sale::with(['product', 'customer', 'staff'])->latest()->paginate(20);
        return view('pages.sales.index', compact('sales'));
    }

    public function create(): View
    {
        $products = Product::query()->where('stock_quantity', '>', 0)->orderBy('name')->get();
        $customers = Customer::query()->orderBy('full_name')->get();

        return view('pages.sales.create', compact('products', 'customers'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'product_id' => ['required', 'integer', 'exists:products,id'],
            'customer_id' => ['nullable', 'integer', 'exists:customers,id'],
            'quantity' => ['required', 'integer', 'min:1', 'max:1000000'],
        ]);

        try {
            DB::transaction(function () use ($validated): void {
                $product = Product::query()->lockForUpdate()->findOrFail($validated['product_id']);
                $quantity = (int) $validated['quantity'];

                if ($quantity > $product->stock_quantity) {
                    throw ValidationException::withMessages([
                        'quantity' => "Only {$product->stock_quantity} unit(s) of {$product->name} are currently in stock.",
                    ]);
                }

                $priceCents = (int) round(((float) $product->price) * 100);
                $totalPrice = number_format(($priceCents * $quantity) / 100, 2, '.', '');
                $product->decrement('stock_quantity', $quantity);

                Sale::create([
                    'product_id' => $product->id,
                    'customer_id' => $validated['customer_id'] ?: null,
                    'sold_by' => auth()->id(),
                    'quantity' => $quantity,
                    'total_price' => $totalPrice,
                ]);
            }, attempts: 3);
        } catch (ModelNotFoundException) {
            return back()->withInput()->withErrors(['product_id' => 'That product is no longer available.']);
        }

        return to_route('sales.index')->with('success', 'Sale recorded and inventory updated.');
    }
}
