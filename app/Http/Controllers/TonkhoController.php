<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
use DB;
// use Excel;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ExportExport;

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
    	$dssanphamtonkho = DB::table('sanpham')->join('tonkho','tonkho.id_sp','=','sanpham.sanpham_id')->get();
    	$qlydstonkho = view('admin.danhsachtonkho')->with('dssanphamtonkho',$dssanphamtonkho);
    	return view('admin')->with('admin.danhsachtonkho',$qlydstonkho);
    }
    public function index(){
    	$this->AuthLogin();
    	$custom_data = DB::table('sanpham')->join('tonkho','tonkho.id_sp','=','sanpham.sanpham_id')->get();
        return view('admin')->with('admin.danhsachtonkho', $custom_data);
    }
    public function phieunhap(){
    	$this->AuthLogin();
    	return view('admin.phieunhap');
    }

    public function report(){
        return Excel::download(new ExportExport, 'Xuất Báo Cáo.xlsx');
        // return view('admin.danhsachtonkho');
    }

}


