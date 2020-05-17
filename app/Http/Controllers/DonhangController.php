<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
use DB;
session_start();


class DonhangController extends Controller
{
    public function danhsachdonhang(){
    	$dstrangthaidh = DB::table('trangthaidonhang')->join('donhang','donhang.id_trangthaidonhang','=','trangthaidonhang.id')->get();
    	$dspttt = DB::table('phuongthucthanhtoan')->join('donhang','donhang.id_pttt','=','phuongthucthanhtoan.id')->get();
    	$dssanpham = DB::table('sanpham')->join('donhang','donhang.id_pttt','=','sanpham.id')->get();
    	$qlydsdonhang = view('admin.danhsachdonhang')->with('dstrangthaidh',$dstrangthaidh)->with('dspttt',$dspttt)->with('dssanpham',$dssanpham);
    	return view('admin')->with('admin.danhsachdonhang',$qlydsdonhang);
    }
}
