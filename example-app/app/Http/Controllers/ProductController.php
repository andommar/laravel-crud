<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //gets the 5 latest products
        $products = Product::latest()->paginate(5);
        
        // compact iterates the $products variable prints the data in a table
        // with(request()->input('page') is used for the pagination
        return view('products.index', compact('products'))->with(request()->input('page'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate input. Request from the user, we validate and
        $request->validate([ //taken from the input
            'name' => 'required',
            'detail' => 'required'
        ]);
        //create new Product in the database

        Product::create($request->all());

        //redirect the user and send friendly message

        return redirect()->route('products.index')->with('success', 'Product created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //with compact() we inject the variable $product
        //which has the info of the product we clicked on
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //validate input. Request from the user, we validate and
        $request->validate([ //taken from the input
            'name' => 'required',
            'detail' => 'required'
        ]);
        //create new Product in the database

        $product->update($request->all());

        //redirect the user and send friendly message

        return redirect()->route('products.index')->with('success', 'Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //delete the product
        $product->delete();

        //redirect user and display success message
        return redirect()->route('products.index')->with('success', 'Product deleted successfully');


    }
}
