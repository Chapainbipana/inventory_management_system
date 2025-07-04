<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\file;
use App\Models\price;
use App\Models\product;
use App\Models\product_category;
use App\Models\stock;
use Illuminate\Http\Request;

class AdminProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
           $products = Product::with('price','category' ,'stock')->get();
        return view('admin.pages.product.index', compact('products'));
        //    foreach ($products as $product) {
        //     dd($product->category->title);
        //    }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         $category = product_category::all();
        $files = file::all(); // or however you fetch the files
        return view('admin.pages.product.create', compact('category', 'files'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:1',
            'stock' => 'required|integer|min:1',
            'category_id' => 'required',
            'image' => 'required|string',
              ]);
        //  dd($request->price,);

             $product = Product::create([
               'name' => $request->name,
               'description' => $request->description,
                'image' => $request->image,
                'category_id' => $request->category_id,
                ]);
//  dd($request->price);
             Price::create([
               'product_id' => $product->id,
                'amount' =>$request->price,
                ]);

             Stock::create([
                'product_id' => $product->id,
                 'quantity' => $request->stock,
    ]);
        return redirect()->route('product.index')->with('success', 'Product add successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
         $product = Product::find($id);
        if (!$product) {
            return redirect()->back()->with('error', 'Product not found.');
        }

        $categoryName = $product->category->name ?? 'No Category';
        // dd('$catetgory');
        return view('admin.pages.product.show', compact('product', 'categoryName'));
  
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::with('category:id,title')->findOrFail($id); // Fetch the product with its category
        $categories = Product_category::all(['id', 'name']); // Fetch all categories for the dropdown
        $files = File::all(); // or however you fetch the files
        
        return view('admin.pages.product.edit', compact('product', 'categories', 'files'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
        'name' => 'required|string',
        'description' => 'required|string',
        'price' => 'required|numeric|min:0',
        'stock' => 'required|integer|min:0',
        'image' => 'nullable|string',
        'category_id' => 'required|exists:product_category,id',
    ]);
     $product = Product::findOrFail($id);
     $product->update([
        'name' => $request->name,
        'description' => $request->description,
        'image' => $request->image,  // assuming you pass the image name from modal
        'category_id' => $request->category_id,
    ]);
    if ($product->price) {
        $product->price->update(['price' => $request->price]);
    } else {
        Price::create([
            'product_id' => $product->id,
            'price' => $request->price,
        ]);
    }
    if ($product->stock) {
        $product->stock->update(['quantity' => $request->stock]);
    } else {
        Stock::create([
            'product_id' => $product->id,
            'quantity' => $request->stock,
        ]);
    }

     return redirect()->route('product.index')->with('success', 'Product add successfully!');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
