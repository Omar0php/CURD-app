<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProductRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::latest()->paginate('8');
        return view('product.index', compact('products'));
    }

   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view(('product.creatNewProduct'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
         Product::create($request->all());
        return redirect()->route('products.index')
        ->with('sucsess','product added sucsessfully!');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        Product::find($product);
        return view('product.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {  
        return view('product.edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(StoreProductRequest $request, Product $product)
    {
        $request -> validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'details' => 'required',
        
        ]);

       $product->update($request->all());
       return redirect()->route('products.index')->with('sucsess',' Product Update seccessfully!');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::find($id)->forceDelete();
        return redirect()->route('products.index')->with('sucsess',' Product Deleted seccessfully!');
    }

    public function softDelete($id)
    {
        $product = Product::find($id)->delete();
        return redirect()->route('products.index')->with('sucsess',' Product Deleted seccessfully!');
    }


    public function getTrashedProducts()
    {
        $products = Product::onlyTrashed()->latest()->paginate('8');
        return view('product.trashedProducts', compact('products'));
    }

    public function restoreProductTrashed($id)
    {
         Product::onlyTrashed()->where('id',$id)->first()->restore();
        return redirect()->route('trashedProducts')->with('sucsess','Product Was Restored Successfully');
    }

    
    public function deleteProductFromRoot($id)
    {
        Product::onlyTrashed()->where('id',$id)->forceDelete();
         return redirect()->route('trashedProducts')->with('sucsess','Product Was deleted  Successfully');
    }
    
}
