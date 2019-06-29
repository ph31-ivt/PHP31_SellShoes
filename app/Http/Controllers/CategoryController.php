<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $listCate = Category::all();
        $page = Category::orderBy('id','DESC')->paginate(7);
        
        return view('admin.listCategory',compact('listCate','page'));
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
        // $create = Category::firstOrCreate(['name'=>$name]);
        

        
        $data = $request->all();
        $name = $request->get('name');
        $find = Category::where('name','=',$name)->first();
        if(empty($find)){
            $cate = Category::create($data);
            $result = ['data'=>$cate,'message'=>'Create Category Success','status'=>200];
        }else{
            $result=['message'=>"Create Category false"];
        }
        
        return response()->json($result,200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $name = $request->all();
        $Cate = Category::findOrFail($id);
        // $Cate->name=$name;

        if($Cate->update($name)){
           
            $result = ['message'=>"Update Success!!!"];
        }else{
            $result=['message'=>'Update False!!!'];
        }
        return response()->json($result);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cate = Category::findOrFail($id);
        if($cate->delete()){
             $listCategory = Category::all();
            $result = ['message'=>'Xóa thành công!!!','data'=>$listCategory];
        }else{
            $result = ['message'=>'Xóa thất bại!!!'];
        }
        return response()->json($result,200);
    }

}
