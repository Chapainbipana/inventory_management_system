<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\file;
use App\Models\product_category;
use Illuminate\Http\Request;

class AdminProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $ProductCategories = Product_category::all();
        // dd($ProductCategories);
        return view('admin.pages.ProductCategoryPages.index', compact('ProductCategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $files = file::all(); 
        return view('admin.pages.ProductCategoryPages.create', compact('files'));
   }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $request->validate([
            'title' => 'string|max:100|min:1|required',
            
            'image' => 'required|string',
        ]);
        $productCategory = new Product_category;
        $productCategory->name = $request->title;
        $productCategory->image = $request->image;
        $productCategory->save();
        return redirect()->route('productCategory.index')->with('message', 'Added Successfully');
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
        //
    }
}
