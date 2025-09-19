<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\StockIn;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StockMovementsController extends Controller
{
    public function stockIn()
    {
        $products = StockIn::get();
        return view('stock-management.pages.stock-movement.stock-in', compact('products'));
    }

    public function addStockIn()
    {
        $products = Product::get();
        $suppliers = Supplier::get();
        return view('stock-management.pages.stock-movement.add-stock-in', compact('products', 'suppliers'));
    }

    public function createStockIn(Request $requset)
    {
        $validate = $requset->validate([
            'product_id'   => 'required|exists:products,id',
            'supplier_id'  => 'nullable|exists:suppliers,id',
            'quantity'     => 'required|integer|min:1',
            'reference_no' => 'nullable|string|max:255',
            'notes'        => 'nullable|string',
        ]);

        $sockIn = StockIn::create([
            'product_id' => $requset->product_id,
            'user_id' => Auth::id(),
            'supplier_id' => $requset->supplier_id,
            'quantity' => $requset->quantity,
            'reference_no' => $requset->reference_no,
            'notes' => $requset->notes
        ]);
        return redirect()->route('addStockIn')->with('success', 'Stock in added successfully');
    }
}

        // 'product_id',
        // 'user_id',
        // 'supplier_id',
        // 'quantity',
        // 'reference_no',
        // 'notes'