<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class HomeController extends Controller
{
    public function index(){
    	$slide= DB::table('slide')->get();
    	$product=DB::table('sanpham')->limit(12)->get();
    	return view('pages.home',compact('slide','product'));
    }
    public function trangsanpham(){
    	$product=DB::table('sanpham')->get();
    	return view('pages.trangsanpham',compact('product'));
	}

}
