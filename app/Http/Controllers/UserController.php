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
        $admin_id = Session::get('id');
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }
    public function getIndex(){
        return view('user.loginuser');
    }
    public function danhsachuser(){
    	$this->AuthLogin();
    	$dsuser = DB::table('chucvu')->join('nhanvien','nhanvien.id_chucvu','=','chucvu.id')->get();
    	$qlydsuser = view('admin.danhsachuser')->with('dsuser',$dsuser);
    	return view('admin')->with('admin.danhsachuser',$qlydsuser);
    }
}
