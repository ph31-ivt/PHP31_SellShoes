<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Size;
use App\Product;
use App\Order;
use Validator;
class LoadPageController extends Controller
{

    public function order(Request $request){
        $validator = Validator::make($request->all(),[
            'name'=>'required',
            'tel'=>'numeric|required',
            'email'=>'email|required',
            'address'=>'required'
        ],[
            'name.required'=>'Name không được để trống',
            'tel.required'=>'Tel không được để trống',
            'email.required'=>'Email không được để trống',
            'address.required'=>'Address không được để trống',
        ]);
        if($validator->fails()){
            return response()->json(['errors'=>$validator->errors()->all()]);
        }else{
            $data = $request->except('size','productID','quantity');
            $data['status']=1;
            $size = explode(';', $request->get('size'));
            $quantity = explode(';', $request->get('quantity'));
            $productID = explode(';', $request->get('productID'));
            $user= \Auth::user();
            $userID = $user->id;
            $data['user_id']=$userID;
            for ($i=0; $i <count($size)-1 ; $i++) { 
                // $sizeID[$i]=;
                $sizeID[$i]= Size::select('id')->where('name','=',str_replace(array('{','}'), array('',''), $size[$i]))->get();
                $sl[$i]=str_replace(array('{','}'), array('',''),$quantity[$i]);
            }

            Order::create($data)->products()->sync([1=>['quantity'=>2000,'price'=>100,'size'=>1]]);



            
            // $t = Size::where('name','=',$size)->get('id');
            return response()->json($sl);
        }

        
    }

    //view checkout
    public function checkout(Request $request){
        $quantity = explode(';',$request->get('quantity'));
        $price = explode(';',trim($request->get('size')));
        $nameProduct = explode(';',trim($request->get('nameProduct')));
        $total =$request->get('total');
        $size = explode(';', $request->get('sizeAll'));
        $productID = explode(';', $request->get('productID'));
        return view('user.checkout',compact('quantity','price','nameProduct','total','productID','size'));
    }
    // delete product khỏi giỏ hàng
    public function deleteCart(Request $request){
        $productID = $request->get('id');
        $user = \Auth::user();
        $id = $user->id;
        $result= Session()->forget('user.'.$id.'.cart.'.$productID);
        $cart =$request->session()->get('user');
        foreach ($cart as $key => $value) {
            if($key == $id){
                $result = $value;
            }
        }
        $count = count($result['cart']);
        return response()->json($count);       
    }



    // load page cartDetail
    public function cartDetail(){
        $user = \Auth::user();
        $id = $user->id;

        $product = Session()->get('user');

        foreach ($product as $key => $value) {
            if($key == $id){
                $productID = $value;
            }
        }
        if(!empty($productID)){
            foreach ($productID['cart'] as $key => $value) {
               $allPro[]= Product::findOrFail($key);
            }
            if(empty($allPro)){
                return view('user.cart');
            }else{
                $sizeAll=Size::all();
                return view('user.cart',compact('allPro','sizeAll'));
            }
        }
        
        
    }


    // cartShopping
    public function cartShopping(Request $request){
        $user = \Auth::user();
        $id = $user->id;
        $idProduct = $request->get('id');
        // $request->session()->push('user.'.$id.'.cart.'.$idProduct.'.nameProduct',$request->get('product'));
        $request->session()->push('user.'.$id.'.cart.'.$idProduct.'.size',$request->get('size'));
        $cart =$request->session()->get('user');
         
        foreach ($cart as $key => $value) {
            if($key == $id){
                $result = $value;
            }
        }
        $count = count($result['cart']);
        return response()->json($count);
        
    }



    // Giá tiền khi thay đổi số lượng
    public function showPrice(Request $request){
        $data = $request->get('quantity');
        $id = $request->get('id');
        $quantity = Product::findOrFail($id)->price;
        // if($data>1){
            $out = $quantity*$data;
        // }else{
            // $out = $quantity;
        // }
        return response()->json($out);
    }




    // tìm kiếm sản phẩm
    public function search(Request $request){
        $data = $request->get('value');
        if(!empty($data)){
            $product = Product::where('name','like','%'.$data.'%')->orWhere('price','like','%'.$data.'%')->get();

        }else{
            $product =Product::paginate(12);
        }
        $count = count($product);
        $out="";
        if($count>=1){
            foreach ($product as $key => $value) {
                foreach ($value->images as $key => $val) {
                   $img = $val->path;
                   break;
                }
               $out.='
                        <div class="col-sm-6 col-lg-4 mb-4" data-aos="fade-up">
                        <div class="block-4 text-center border">
                        <figure class="block-4-image" data-id="'.$value->id.'">
                            <a href="http://phpshoes.com/user/showDetail/'.$value->id.'"><img src="http://phpshoes.com/upImage/'.$img.'" alt="Image placeholder" class="img-fluid"></a>
                        </figure>
                        <div class="block-4-text p-4">
                          <h3><a href="shop-single.html" data-id="'.$value->id.'">'.$value->name.'</a></h3>
                          <p class="text-primary font-weight-bold" data-id="'.$value->id.'">'.$value->price.' vnđ</p>
                        </div>
                      </div>
                    </div>
                    
                    ';
            }
        }else{
            $out.='<p>Sản phẩm này không được tìm thấy!</p>';
        }
        return response()->json($out);
    }

    // start show detail product
    public function showDetail($id){
        $product=Product::find($id);
        return view('user.detailProduct',compact('product'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product =Product::paginate(12);
        $category = Category::all();
        $size = Size::all();
        return view('user.home',compact('category','size','product'));
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
        //
    }
}
