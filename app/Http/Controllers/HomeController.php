<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class HomeController extends Controller
{
    public function index(){
    	$slide=DB::table('slide')->get();
    	$product=DB::table('sanpham')->limit(16)->get();
        return view('pages.home',compact('slide','product'));
    }
    public function trangsanpham(){
    	$product=DB::table('sanpham')->paginate(12);
    	return view('pages.trangsanpham',compact('product'));


    }
    public function sanphamgioitinh($id)
    {
       $product=DB::table('sanpham')->join('gioitinh','gioitinh.id','=','sanpham.id_gioitinh')->where('id_gioitinh',$id)->paginate(12);
        return view('pages.trangsanphamgioitinh',compact('product'));
    }
    public function thanhvientrongnhom(){
    	return view('thanhvientrongnhom');
    }

	
}
