<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\SizeRequest;
use App\Http\Controllers\Auth;
class LoginController extends Controller
{
    public function login(Request $request){
        $request->validate([
            'email'=>'required|email',
            'password'=>'required|min:6|max:12'
        ],[
            'email.required'=>"Email không được để trống!",
            'password.required'=>"Password không được để trống!",
            'email.email'=>"Cần nhập vào là email!",
            'password.min'=>"Password cần ít nhất 6 kí tự!",
            'password.max'=>"Password nhiều nhất 12 kí tự!"
        ]);
        // $data=$request->except('_token','submit');
        // $password=$request->get('password');
        // $passwordOld = User::select('password')->where('email','=',$request->get('email'))->get();
        $data = $request->only('email','password');
        // dd($data);
        if(\Auth::attempt($data)){
            // $role = User::where('email','=',$request->get('email'))->get();
            // dd($role);
            // if($role == 1){
                return view('welcome');
            // }
            // else{

            // }
        }else{
            $loi = "Sai tài khoản hoặc mật khẩu";
            return view('auth.login',compact('loi'));
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('auth.login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('auth.register');
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
            'name'=>'required',
            'email'=>'required|email',
            'password'=>'required|min:6|max:12'
        ],[
            'name.required'=>"Name không được để trống!",
            'email.required'=>"Email không được để trống!",
            'password.required'=>"Password không được để trống!",
            'email.email'=>"Cần nhập vào là email!",
            'password.min'=>"Password cần ít nhất 6 kí tự!",
            'password.max'=>"Password nhiều nhất 12 kí tự!"
        ]);

        $data =$request->except('_token','submit');
        $user = User::where('email','=',$request->get('email'))->first();
        if(!$user){
            $data['password']=bcrypt($data['password']);
            $data['role_id']=1;
            User::create($data);
            return redirect()->route('formLogin');
        }else{
           $loi = "Email đã tồn tại";
           return view('auth.register',compact('loi'));
        }
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
