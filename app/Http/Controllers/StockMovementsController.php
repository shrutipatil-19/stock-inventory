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

    public function createStockIn(Request $request)
    {
        $validate = $request->validate([
            'product_id'   => 'required|exists:products,id',
            'supplier_id'  => 'nullable|exists:suppliers,id',
            'quantity'     => 'required|integer|min:1',
            'reference_no' => 'nullable|string|max:255',
            'notes'        => 'nullable|string',
        ]);

        $sockIn = StockIn::create([
            'product_id' => $request->product_id,
            'user_id' => Auth::id(),
            'supplier_id' => $request->supplier_id,
            'quantity' => $request->quantity,
            'reference_no' => $request->reference_no,
            'notes' => $request->notes
        ]);
        $product = Product::find($request->product_id);
        $product->quantity += $request->quantity;
        $product->save();
        return redirect()->route('addStockIn')->with('success', 'Stock in added successfully');
    }
}
