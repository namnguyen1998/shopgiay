<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
use DB;
session_start();

class UserController extends Controller
{
   public function AuthLogin(){
        $user_id = Session::get('id');
        if($user_id){
            return Redirect::to('/');
        }else{
            return Redirect::to('login')->send();
        }
    }
    public function getLogin(){
        return view('user.loginuser');
    }
    
    public function saveLogin(Request $request){
       
    	$rules=[
            'email' => 'required',
            'password' => 'required',
        ];

        $message = [
            'email.required' => 'Vui lòng nhập email',
            'password.required' => 'Vui lòng nhập password',

        ];

        $input = $request->all();

        $validator = \Validator::make($input, $rules, $message);

        if($validator->fails()){
            return redirect::to('/login')->withErrors($validator);
        }
       
    	$result = DB::table('users')->where('email',$input['email'])
        ->where('password',$input['password'])->first();
    	if($result){
    		Session::put('name',$result->name);
    		Session::put('id',$result->id);
    		return Redirect::to('/');
    	}else{
    		Session::put('message','Tài khoản hoặc mật khẩu không đúng');
    		return Redirect::to('/login');
    	}
    }

    public function getRegister(){
        return view('user.register');
    }

    public function saveRegister(Request $request){
       
        $rules=[
            'email' => 'required',
            'password' => 'required',
            'password_confirmation' => 'required|same:password',
            'name' => 'required',
        ];

        $message = [
            'email.required' => 'Vui lòng nhập email',
            'password.required' => 'Vui lòng nhập password',
            'password_confirmation.required' => 'Vui lòng xác nhận password',
            'password_confirmation.same' => 'Password không khớp',
            'name.required' => 'Vui lòng nhập tên',

        ];

        $input = $request->all();

        $validator = \Validator::make($input, $rules, $message);

        if($validator->fails()){
            return redirect::to('/register')->withErrors($validator);
        }

        $param=[
            'email' => $input['email'],
            'password' => $input['password'],
            'name' => $input['name'],
        ];


        $result = DB::table('users')
                    -> insert($param);
        
    	
            Session::put('message','Đăng ký thành công');
            
    		return Redirect::to('/register');
    	
    }
    public function logout(){
        $this->AuthLogin();
    	Session::forget('name');//,null);
        Session::put('id');
        return Redirect::to('./');
    }
    
    public function danhsachuser(){
    	$this->AuthLogin();
    	$dsuser = DB::table('chucvu')->join('nhanvien','nhanvien.id_chucvu','=','chucvu.id')->get();
    	$qlydsuser = view('admin.danhsachuser')->with('dsuser',$dsuser);
    	return view('admin')->with('admin.danhsachuser',$qlydsuser);

    }

}
