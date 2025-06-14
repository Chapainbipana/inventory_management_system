<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\file;
use App\Models\product;
use App\Models\product_category;
use Illuminate\Http\Request;

class AdminProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $products = Product::with('category')->get();
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

              Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock,
            'category_id' => $request->category_id,
            'image' => $request->image,
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
