<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class StockMovementsController extends Controller
{
    public function stockIn()
    {
        $products = Product::get();
        return view('stock-management.pages.stock-movement.stock-in', compact('products'));
    }
}
// I’m available for an interview at your convenience. Please let me know a date and time that works best for you.