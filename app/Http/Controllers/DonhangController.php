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
    	$danhsachdonhang = DB::table('donhang')
    	->join('chitietdonhang','chitietdonhang.id','=','donhang.id_chitietdh')
    	->join('sanpham','sanpham.sanpham_id','=','donhang.id_sp')
    	->join('trangthaidonhang','trangthaidonhang.id','=','donhang.id_trangthai')
    	->select('donhang.id','donhang.ngaydat','donhang.tongtien','donhang.ghichu','donhang.id_trangthai','sanpham.tensanpham','trangthaidonhang.tentrangthai','donhang.id_chitietdh')
    	->get();
    	$qlydsdonhang = view('admin.danhsachdonhang')->with('danhsachdonhang',$danhsachdonhang);
    	return view('admin')->with('admin.danhsachdonhang',$qlydsdonhang);
    }

    public function chitietdonhang($id_donhang){
        $this->AuthLogin();
        $donhang = DB::table('chitietdonhang')
        ->join('sanpham','sanpham.sanpham_id','=','chitietdonhang.id_sanpham')
        ->join('phuongthucthanhtoan','phuongthucthanhtoan.id','=','chitietdonhang.id_pttt')
        ->select('chitietdonhang.id','chitietdonhang.soluong','chitietdonhang.tongtien','chitietdonhang.tennguoinhan','chitietdonhang.sdt','chitietdonhang.diachi','chitietdonhang.ngaydat','sanpham.tensanpham','phuongthucthanhtoan.tenpttt')
        ->where('chitietdonhang.id','like','%'.$id_donhang.'%')
        ->get();
        $qlychitietdonhang = view('admin.chitietdonhang')->with('donhang',$donhang);
        return view('admin')->with('admin.chitietdonhang',$qlychitietdonhang);
    }
    
    public function trangthaidonhang(){
        if(isset($_GET['c_id'])){
            $a = $_GET['c_id'];
            $dstrangthai = DB::table('donhang')
            ->join('chitietdonhang','chitietdonhang.id','=','donhang.id_chitietdh')
            ->join('sanpham','sanpham.sanpham_id','=','donhang.id_sp')
            ->join('trangthaidonhang','trangthaidonhang.id','=','donhang.id_trangthai')
            ->select('donhang.id','donhang.ngaydat','donhang.tongtien','donhang.ghichu','donhang.id_trangthai','sanpham.tensanpham','trangthaidonhang.tentrangthai','donhang.id_chitietdh','chitietdonhang.soluong','chitietdonhang.tennguoinhan','chitietdonhang.sdt','chitietdonhang.diachi')
            ->where('id_trangthai','like','%'.$a.'%')
            ->get();
            echo ($dstrangthai);
            
        }
    }
}
