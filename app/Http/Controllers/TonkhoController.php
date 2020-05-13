<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
use DB;
session_start();


class TonkhoController extends Controller
{
	 public function AuthLogin(){
        $admin_id = Session::get('id');
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }
    public function danhsachtonkho(){
    	$this->AuthLogin();
    	$dssanphamtonkho = DB::table('sanpham')->join('tonkho','tonkho.id_sp','=','sanpham.id')->get();
    	$qlydstonkho = view('admin.danhsachtonkho')->with('dssanphamtonkho',$dssanphamtonkho);
    	return view('admin')->with('admin.danhsachtonkho',$qlydstonkho);
    }
    public function phieunhap(){
    	$this->AuthLogin();
    	return view('admin.phieunhap');
    }
}
