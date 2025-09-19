<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index()
    {
        return view('stock-management.pages.supplier.add-supplier');
    }

    public function create(Request $request)
    {

        $validated = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|user:unique',
            'phone' => 'required|max:10|min:10',
            'address' => 'required'
        ]);
        $supplier = Supplier::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address
        ]);
        return redirect()->route('addSupplier')->with('success', 'Supplier added successfully');
    }
}
// | Field       | Type      | Description        |
// | ----------- | --------- | ------------------ |
// | id          | BIGINT PK | Unique supplier ID |
// | name        | VARCHAR   | Supplier name      |
// | email       | VARCHAR   | Contact email      |
// | phone       | VARCHAR   | Contact number     |
// | address     | TEXT      | Address (optional) |
// | created\_at | TIMESTAMP | Auto               |
// | updated\_at | TIMESTAMP | Auto               |