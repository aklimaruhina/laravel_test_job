<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attribute;
use App\Models\AttributeValue;
use App\Models\ProductAttribut;
use App\Models\ProductVarient;
use App\Models\Product;
use Response;

class AttributeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $attrib = Attribute::paginate();
        return view('attrib.index', compact('attrib'));
    }

    public function add_attrb_val($id){
        $attrib = AttributeValue::with('parents')->where('attribute_id', $id)->get();
        return view('attrib.add', compact('attrib'));
    }
    public function store_attrb_val(Request $request, $id){
        
        $attribe = new AttributeValue;
        $attribe->name = $request->name;
        $attribe->attribute_id = $id;
        $attribe->save();
        return redirect()->back()->with([
            'message' => $attribe->name . ' Were added.'
        ]);
    }
    public function add_varients($id){
        $attrib = Attribute::get();
        $attrib_product = ProductAttribut::with('attributes.values')->where('product_id', $id)->get();
        $json_data = ProductVarient::get();
        // foreach ($json_data as $val) {
        //    $data = json_decode($val->details);
        //    foreach($data as $vl){
        //     echo $vl. '<br>';
        //    }
        // }
        // $data_type_content->product_attribute[$attr->name] == $val->name
        // dd($attrib_product);
        return view('attrib.add_varients', compact('attrib', 'attrib_product'));

    }
    public function show_product($id){
        $product = Product::with('varients')->where('id', $id)->first();
        $attrib_product = ProductAttribut::with('attributes')->where('product_id', $id)->get();
        
        // return Response::json($product);
        return view('attrib.view', compact('product', 'attrib_product'));
    }
    public function fetch_attribute(Request $request, $id){
        
        $attrib = AttributeValue::where('attribute_id', $id)->get();
        return Response::json($attrib);
    }
    public function store_varients(Request $request, $id){
        
        $varients = new ProductVarient;
        $varients->details = json_encode($request->attr_val);
        $varients->price = $request->price;
        $varients->stock = $request->quantity;
        $varients->product_id = $id;

        $varients->save();
        return redirect(route('show_product', $id));
    }
    public function store_attribute(Request $request, $id){
        $attrib = new ProductAttribut;
        $attrib->product_id = $id;
        $attrib->attribute_id = $request->attribute_id;
        $attrib->save();
        return redirect()->back()->with([
            'message' => 'Data Were added.'
        ]);
    }
    public function edit_varient($id){
        $varients = ProductVarient::findOrFail($id);
        $attrib_product = ProductAttribut::with('attributes')->where('product_id', $varients->product_id)->get();

        return view('attrib.edit_varients', compact('varients', 'attrib_product'));
    }
    public function update_varient(Request $request, $id){
        $varients = ProductVarient::findOrFail($id);
        $varients->details = json_encode($request->attr_val);
        $varients->price = $request->price;
        $varients->stock = $request->quantity;
        $varients->save();
        return redirect(route('show_product', $varients->product_id))->with([
            'message' => 'Data Were Updated.'
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
        //
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }
}
