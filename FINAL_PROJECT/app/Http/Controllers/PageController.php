<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Product;
use App\Models\Sale;
use App\Models\User;
use Illuminate\View\View;

class PageController extends Controller
{
    public function home(): View
    {
        $productCount = Product::count();
        $customerCount = Customer::count();
        $staffCount = User::count();
        $todaySales = Sale::whereDate('created_at', today())->sum('total_price');
        $recentSales = Sale::with(['product', 'customer', 'staff'])->latest()->take(6)->get();

        return view('pages.home', compact('productCount', 'customerCount', 'staffCount', 'todaySales', 'recentSales'));
    }

    public function about(): View
    {
        return view('pages.about');
    }
}
