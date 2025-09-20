<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Product;
use App\Models\StockIn;
use App\Models\StockOut;
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

    public function listStockOut()
    {
        return view('stock-management.pages.stock-movement.stock-out.list-stock-out');
    }
    public function addStockOut()
    {
        $products = Product::get();
        $customers = Customer::get();
        return view('stock-management.pages.stock-movement.stock-out.add-stock-out', compact('products', 'customers'));
    }
    public function storeStockOut(Request $request)
    {
        $validate = $request->validate([
            'product_id' => 'required|exists:product,id',
            'customer_id' => 'required|exists:customer,id',
            'reason' => 'required|enum',
            'quantity'     => 'required|integer|min:1',
            'reference_no' => 'nullable|string|max:255',
            'notes' => 'nullable'
        ]);
        $stockOut = StockOut::create([
            'product_id' => $request->product_id,
            'user_id' => Auth::id(),
            'customer_id' => $request->customer_id,
            'quantity' => $request->quantity,
            'reference_no' => $request->reference_no,
            'notes' => $request->notes
        ]);
        $product = Product::findOrFail($request->product_id);
        $product->quantity -= $request->quantity;
        $product->save();
        return redirect()->route('addStockOut')->with('success', 'Stock Out added successfully');
    }
}

// | Field             | Type                  | Description                                                       |
// | ----------------- | --------------------- | ----------------------------------------------------------------- |
// | **id**            | BIGINT (PK)           | Unique record ID                                                  |
// | **product\_id**   | BIGINT (FK)           | Links to `products.id`                                            |
// | **user\_id**      | BIGINT (FK)           | Staff/Admin who processed stock out (from `users`)                |
// | **customer\_id**  | BIGINT (FK, nullable) | If linked to a specific customer (optional)                       |
// | **quantity**      | INT                   | How many units went out                                           |
// | **reason**        | ENUM / VARCHAR        | Why stock went out (e.g., `sale`, `return`, `damage`, `transfer`) |
// | **reference\_no** | VARCHAR(100)          | Invoice number, order ref, etc.                                   |
// | **notes**         | TEXT (nullable)       | Any additional remarks                                            |
// | **created\_at**   | TIMESTAMP             | Auto                                                              |
// | **updated\_at**   | TIMESTAMP             | Auto                                                              |
