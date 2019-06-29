<?php

namespace App\Http\Controllers;

use App\Product;
use App\Brand;
use App\Size;
use App\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function Search(Request $request){
        $product = Product::where('name','LIKE','%'.$request->name.'%')->get();
        return response()->json($product);
    }

    public function ShowPopover($id){
         $info = Product::find($id);
         $brand=$info->brand();
         $out ='<p><lable>Category_ID: '.$info->category->name.'</label></p>
         <p><lable>Brand_ID: '.$info->brand->name.'</label></p>
         <p><lable>Description: '.$info->description.'</label></p>';
         return Response()->json($out);
    }

    public function UpdateQuantity(Request $request,$id){
        $info=Product::findOrFail($id);
        $data = $request->get('quantity');
        $size_id = $request->get('size_id');
        foreach ($info->sizes as $value) {
            $alo = $value->pivot->quantity;
        }
        $quantity = $alo+$data;
        if($info){
            $info->sizes()->sync([$size_id=>['quantity'=>$quantity]]);
        }else{

        }
        // $l =$info->sizes()->get();
        return response()->json($quantity);
    }

    public function ShowInfo($id){
        $info = Product::find($id);
        // $size_id = Product::only('size_id');
       // $pro= $info->sizes()->get();
        return Response()->json($info);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product=Product::orderBy('id','DESC')->paginate(7);
        $listBrand = Brand::select('id','name')->get();
        $listSize = Size::select('id','name')->get();
        $listCategory = Category::select('id','name')->get();
        return view('admin.listProduct',compact('product','listBrand','listCategory','listSize'));
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
        $data = $request->except('quantity');
        $quantity = $request->get('quantity');
        $size_id = $request->get('size_id');

        $product = Product::firstOrCreate(['name'=>$request->get('name'),'size_id'=>$size_id],$data)->sizes()->sync([$size_id=>['quantity'=>$quantity]]);
        // if(!$product){
        //     $result =['message'=>'Create Success!!!'];
        // }else{
        //      $result =['message'=>'Create False!!!'];
        // }
        return Response()->json($product);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->except('quantity');
        $product = Product::findOrFail($id);
        $size_id = $request->get('size_id');
        $quantity = $request->get('quantity');
        if($product->update($data)){
            $product->sizes()->sync([$size_id=>['quantity'=>$quantity]]);
             $result=["message"=>'Update Success!!!'];
        }else{
            $result=["message"=>'Update False!!!'];
        }
        return Response()->json($result);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        $product=Product::find($id);
        if($product->delete()){
            $product->sizes()->detach();
            $result=['message'=>'Delete Success!!!'];
        }
        return Response()->json($result);
    }
}
