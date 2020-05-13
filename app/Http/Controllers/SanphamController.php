<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
use DB;
session_start();

class SanphamController extends Controller
{
   	public function AuthLogin(){
        $admin_id = Session::get('id');
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }
    public function danhsachsanpham(){
    	$this->AuthLogin();
    	$dssanpham = DB::table('sanpham')
                   ->join('hanggiay','hanggiay.id','=','sanpham.id_hanggiay')
                   ->join('loaisanpham','loaisanpham.id','=','sanpham.id_loaisp')
                   ->select('sanpham.id','sanpham.hinh','sanpham.mota','sanpham.giatien','sanpham.giakm','sanpham.tensanpham','loaisanpham.tenloai','hanggiay.tenhang')
                   ->get();
    	$qlydssanpham = view('admin.danhsachsanpham')->with('dssanpham',$dssanpham);
    	return view('admin')->with('admin.danhsachsanpham',$qlydssanpham);
    }
    public function themsanpham(){
    	$this->AuthLogin();
    	$dshang = DB::table('hanggiay')->orderby('id','desc')->get();
    	$dsloaisp = DB::table('loaisanpham')->orderby('id','desc')->get();
    	return view('admin.themsanpham')->with('dshang',$dshang)->with('dsloaisp',$dsloaisp);
    }
}
