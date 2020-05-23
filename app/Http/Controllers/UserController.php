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
    public function getIndex(){
        return view('user.loginuser');
    }
    
    public function login(Request $request){
       
    	$username = $request ->username;
    	$password = $request ->password;
       
    	$result = DB::table('khachhang')->where('username',$username)
        ->where('password',$password)->first();
    	if($result){
    		Session::put('tenkhachhang',$result->tenkhachhang);
    		Session::put('id',$result->id);
    		return Redirect::to('/');
    	}else{
    		Session::put('message','Tài khoản hoặc mật khẩu không đúng');
    		return Redirect::to('/login');
    	}
    }

    public function danhsachuser(){
    	$this->AuthLogin();
    	$dsuser = DB::table('chucvu')->join('nhanvien','nhanvien.id_chucvu','=','chucvu.id')->get();
    	$qlydsuser = view('admin.danhsachuser')->with('dsuser',$dsuser);
    	return view('admin')->with('admin.danhsachuser',$qlydsuser);
    }

}
