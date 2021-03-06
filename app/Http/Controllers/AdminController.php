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
         $dsuser = DB::table('nhanvien')->get();
        
    	return view('admin.dashboard',compact('dsuser'));
    }

    public function login(Request $request){

    	$result = DB::table('nhanvien')->where('username',$request ->username)
    	->where('password',md5($request ->password))->first();

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
