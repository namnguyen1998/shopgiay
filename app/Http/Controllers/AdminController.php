<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
use DB;
session_start();

class AdminController extends Controller
{
    public function AuthLogin(){
        $admin_id = Session::get('id');
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }
    public function getIndex(){
    	return view('admin.login');
    }

    //Trả về trang chính admin
    public function showDashboard(){
         $this->AuthLogin();
    	return view('admin.dashboard');
    }

    public function login(Request $request){
       
    	$username = $request ->username;
    	$password = $request ->password;

    	$result = DB::table('nhanvien')->where('username',$username)
    	->where('password',$password)->where('id_chucvu','=','1')->first();
    	if($result){
    		Session::put('ten',$result->ten);
    		Session::put('id',$result->id);
            Session::put('email',$result->email);
    		return Redirect::to('/dashboard');
    	}else{
    		Session::put('message','Tài khoản hoặc mật khẩu không đúng');
    		return Redirect::to('/admin');
    	}
    }
    public function logout(){
        $this->AuthLogin();
    	Session::forget('ten');//,null);
        Session::forget('email');
        Session::put('id');
        return Redirect::to('/admin');
    }
}
