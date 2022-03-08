<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductAttribut;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::where('status', 1)->get();
        return view('products.index', compact('products'));

    }
    public function enableDisable($id){
        $product = Product::findOrFail($id);
        $product->status = !$product->status;
        $product->save();
        return redirect(route('products.index'))->with([
            'message' => $product->product_name . ' Status updated.'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255']
        ]);
        $product = new Product;
        $product->product_name = $request->name;
        $str = strtolower($request->name);
        $product->slug = preg_replace('/\s+/', '-', $str);
        $product->status = 1;
        $product->save();
        return redirect()->back()->with([
            'message' => $product->product_name . ' Were Added.'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $attrib_product = ProductAttribut::with('attributes')->where('product_id', $product->id)->get();
        return view('attrib.edit', compact('product', 'attrib_product'));        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255']
        ]);
        $product->product_name = $request->name;
        $product->save();
        return redirect()->back()->with([
            'message' => $product->product_name . ' Were Update.'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect(route('products.index'))->with([
            'message' => $product->product_name . ' Has Been Deleted.'
        ]);
    }
}
