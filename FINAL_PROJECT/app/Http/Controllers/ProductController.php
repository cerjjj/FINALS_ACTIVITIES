<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Support\ImageProcessor;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function index(): View
    {
        $products = Product::query()->orderBy('name')->paginate(12);
        return view('pages.products.index', compact('products'));
    }

    public function create(): View
    {
        return view('pages.products.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'price' => ['required', 'numeric', 'min:0.01', 'max:99999999.99'],
            'stock_quantity' => ['required', 'integer', 'min:0', 'max:1000000'],
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        ]);

        $upload = $request->file('image');
        unset($validated['image']);
        $product = Product::create($validated);

        if ($upload) {
            $product->update(['image' => ImageProcessor::storeSquare($upload, 'products', 600)]);
        }

        return to_route('products.index')->with('success', 'Product added.');
    }

    public function show(Product $product): View
    {
        return view('pages.products.show', compact('product'));
    }

    public function edit(Product $product): View
    {
        return view('pages.products.edit', compact('product'));
    }

    public function update(Request $request, Product $product): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'price' => ['required', 'numeric', 'min:0.01', 'max:99999999.99'],
            'stock_quantity' => ['required', 'integer', 'min:0', 'max:1000000'],
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        ]);

        $upload = $request->file('image');
        unset($validated['image']);
        $oldImage = $product->image;
        $product->update($validated);

        if ($upload) {
            $path = ImageProcessor::storeSquare($upload, 'products', 600);
            $product->update(['image' => $path]);
            if ($oldImage) {
                Storage::disk('public')->delete($oldImage);
            }
        }

        return to_route('products.index')->with('success', 'Product updated.');
    }

    public function destroy(Product $product): RedirectResponse
    {
        if ($product->sales()->exists()) {
            return back()->with('error', 'This product is in sales history and cannot be deleted.');
        }

        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }

        $product->delete();
        return to_route('products.index')->with('success', 'Product deleted.');
    }
}
