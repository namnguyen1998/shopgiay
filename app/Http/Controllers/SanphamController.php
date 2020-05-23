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
    public function chitietsanpham($id)
    {
      $loai=DB::table('loaisanpham')->get();
      $hang=DB::table('hanggiay')->get();
      $size=DB::table('sanpham')->join('sanpham_size','sanpham.sanpham_id','=','sanpham_size.id_sp')->where('sanpham.sanpham_id',$id)->get();
      $sanphamlq=DB::table('sanpham')->join('loaisanpham','loaisanpham.id','=','sanpham.id_loaisp')->join('hanggiay','hanggiay.id','=','sanpham.id_hanggiay')->limit(4)->get();
      $ctsp=DB::table('sanpham')->join('loaisanpham','loaisanpham.id','=','sanpham.id_loaisp')->join('hanggiay','hanggiay.id','=','sanpham.id_hanggiay')->where('sanpham.sanpham_id',$id)->get();
      return view('sanpham.chitietsanpham')->with('loaisp',$loai)->with('hg',$hang)->with('chitietsp',$ctsp)->with('si',$size)->with('splq',$sanphamlq);
    }
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
                   ->select('sanpham.sanpham_id','sanpham.hinhsp','sanpham.mota','sanpham.giatien','sanpham.giakm','sanpham.tensanpham','loaisanpham.tenloai','hanggiay.tenhang')
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
    public function timkiemsanpham(Request $req){
      $keyword=$req->keyword_submit;
      $loai=  DB::table('loaisanpham')->get();
      $hang=DB::table('hanggiay')->get();
      $sanpham_timkiem=DB::table('sanpham')->where('tensanpham','like','%'.$keyword.'%')->get();
      return view('sanpham.timkiem')->with('loaisp',$loai)->with('hg',$hang)->with('sanphamtimkiem',$sanpham_timkiem);
    }
    public function ajaxtimkiem(Request $req)
    {
      $keyword=$req->keyword_submit;
      $loai=  DB::table('loaisanpham')->get();
      $hang=DB::table('hanggiay')->get();
      $sanpham_timkiem=DB::table('sanpham')->where('tensanpham','like','%'.$keyword.'%')->get();
      return $sanpham_timkiem;
    }
}
