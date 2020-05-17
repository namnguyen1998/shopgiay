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
    public function danhsachtonkho(){
    	$dssanphamtonkho = DB::table('sanpham')->join('tongsanpham_tonkho','tongsanpham_tonkho.id_sanpham','=','sanpham.id')->get();
    	$dstonkho = DB::table('sanpham')->join('tonkho','tonkho.id_sp','=','sanpham.id')->get();
    	$qlydstonkho = view('admin.danhsachtonkho')->with('dssanphamtonkho',$dssanphamtonkho)->with('dstonkho',$dstonkho);
    	return view('admin')->with('admin.danhsachtonkho',$qlydstonkho);
    }
}
