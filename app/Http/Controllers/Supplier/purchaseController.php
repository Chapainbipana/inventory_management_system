<?php

namespace App\Http\Controllers\Supplier;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class purchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $purchases = Purchase::with('product')->latest()->get();
        return view('purchase.index', compact('purchases'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         $products = Product::all();
        return view('purchase.create', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $product = Product::findOrFail($request->product_id);

        $subtotal = $request->unit_price * $request->quantity;
        $discount = ($request->discount_percent / 100) * $subtotal;
        $afterDiscount = $subtotal - $discount;
        $tax = ($request->tax_percent / 100) * $afterDiscount;
        $total = $afterDiscount + $tax;

         // Create purchase
        Purchase::create([
            'product_id' => $product->id,
            'quantity' => $request->quantity,
            'unit_price' => $request->unit_price,
            'discount_percent' => $request->discount_percent,
            'tax_percent' => $request->tax_percent,
            'subtotal' => $subtotal,
            'total' => $total,
        ]);
        $product->stock_quantity += $request->quantity;
        $product->save();

        return redirect()->route('purchase.index')->with('success', 'Purchase created');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
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
          // Reverse stock
       $purchase = Purchase::findOrFail($id);

    // Reverse stock
    $product = $purchase->product;
    $product->stock_quantity -= $purchase->quantity;
    $product->save();

    $purchase->delete();

    return back()->with('success', 'Purchase deleted');
    
    }
}
