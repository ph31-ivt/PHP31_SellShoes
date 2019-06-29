<?php

namespace App\Http\Controllers;

use App\Promotion;
use App\Product;
use Illuminate\Http\Request;

class PromotionController extends Controller
{
    public function ShowInfo($id){
        $promotion =Promotion::findOrFail($id);
        return response()->json($promotion);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $promotion=Promotion::paginate(7);
        $listProduct = Product::select('id','name')->get();
        return view('admin.listPromotion', compact('promotion','listProduct'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $promotion = Promotion::firstOrCreate(['name'=>$request->get('name'),'product_id'=>$request->product_id],$data);
        return response()->json($promotion);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Promotion  $promotion
     * @return \Illuminate\Http\Response
     */
    public function show(Promotion $promotion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Promotion  $promotion
     * @return \Illuminate\Http\Response
     */
    public function edit(Promotion $promotion,$id)
    {

        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Promotion  $promotion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $promotion = Promotion::findOrFail($id);
        $data=$request->all();
        if($promotion->update($data)){
            $result = ['message'=>"Update Success!!!"];
        }else{
             $result = ['message'=>"Update False!!!"];
        }

        return response()->json($result);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Promotion  $promotion
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $promotion=Promotion::findOrFail($id);
        if($promotion->delete()){
            $result = ['message'=>"Delete Success!!!"];
        }else{
             $result = ['message'=>"Delete False!!!"];
        }
       
        
        
        return response()->json($result);
    }
}
