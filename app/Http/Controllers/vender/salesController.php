<?php

namespace App\Http\Controllers\Vender;

use App\Http\Controllers\Controller;
use App\Models\product;
use Illuminate\Http\Request;

class salesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
          $sales = Sale::with('product')->latest()->get();
        return view('sale.index', compact('sales'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
          $products = Product::all();
        return view('sale.create', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $product = product::findOrFail($request->product_id);

        if ($request->quantity > $product->stock_quantity) {
            return back()->with('error', 'Not enough stock!');
        }

        $subtotal = $request->unit_price * $request->quantity;
        $discount = ($request->discount_percent / 100) * $subtotal;
        $afterDiscount = $subtotal - $discount;
        $tax = ($request->tax_percent / 100) * $afterDiscount;
        $total = $afterDiscount + $tax;

        // Create sale
        Sale::create([
            'product_id' => $product->id,
            'quantity' => $request->quantity,
            'unit_price' => $request->unit_price,
            'discount_percent' => $request->discount_percent,
            'tax_percent' => $request->tax_percent,
            'subtotal' => $subtotal,
            'total' => $total,
        ]);

        // Decrease stock
        $product->stock_quantity -= $request->quantity;
        $product->save();

        return redirect()->route('sale.index')->with('success', 'Sale completed');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $sale = Sale::findOrFail($id);

    // Revert stock
    $product = $sale->product;
    $product->stock_quantity += $sale->quantity;
    $product->save();

    $sale->delete();

    return back()->with('success', 'Sale deleted successfully!');
    }
}
