<?php

namespace App\Http\Controllers;

use App\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::orderBy('id',"DESC")->paginate(7);
        return view('admin.listBrands',compact('brands'));
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
    {   $dt = $request->all();
        $data =Brand::where('name','=',$request->name)->first();
        if(empty($data)){
            $brand =Brand::create($dt);
            $result = ['message'=>'Create Success!!'];
        }else{
            $result = ['message'=>'Create False!!'];
        }
        return response()->json($result);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Brand::findOrFail($id);
        $name = Brand::where('name','=',$request->name)->where('id','<>',$id)->first();
        if(!empty($name)){
            $result=['message'=>'Update False!!!'];
        }else{
            if($data->update(['name'=>$request->name,'description'=>$request->description])){
                $result=['message'=>'Update Success!!!'];
            }else{
               $result=['message'=>'Update False!!!'];
            }
        }
        
        return response()->json($result);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $brand = Brand::findOrFail($id);
        if($brand->delete()){
            $allBrand = Brand::orderBy('id',"DESC")->get();
            $result=['message'=>'Delete  Success!!!','data'=>$allBrand];
        }else{
            $result = ['message'=>'Delete False!!!'];
        }
        return response()->json($result);
    }
}
