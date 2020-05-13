<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
use DB;
session_start();

class LoaisanphamController extends Controller
{
    public function AuthLogin(){
        $admin_id = Session::get('id');
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }
    public function themlsp(){
        $this->AuthLogin();
    	return view('admin.themloaisp');
    }
    public function dslsp(){
        $this->AuthLogin();
    	$danhsachloaisp = DB::table('loaisanpham')->get();
    	$quanlylsp = view('admin.danhsachloaisp')->with('danhsachloaisp',$danhsachloaisp);
    	return view('admin')->with('admin.danhsachloaisp',$quanlylsp);
    }

    public function save_loaisp(Request $request){
        $this->AuthLogin();
    	$data = array();
    	$data['tenloai'] = $request->tenloai;

    	// echo '<pre>';
    	// print_r($data);
    	// echo '</pre>';
    	DB::table('loaisanpham')->insert($data);
    	Session::put('message','Thêm danh mục thành công');
    	return Redirect::to('danh-sach-loai-san-pham');
    }

    public function delete_loaisp($id_loaisp){
        $this->AuthLogin();
        DB::table('loaisanpham')->where('id',$id_loaisp)->delete();
        Session::put('message','Xóa danh mục thành công');
        return Redirect::to('danh-sach-loai-san-pham');
    }

    public function edit_loaisp($id_loaisp){
        $this->AuthLogin();
        $id_loaisp = DB::table('loaisanpham')->where('id',$id_loaisp)->get();
        $quanlydslsp = view('admin.editloaisanpham')->with('id_loaisp',$id_loaisp);
        return view('admin')->with('admin.editloaisanpham',$quanlydslsp);
    }
    public function update_loaisp(Request $request,$id_loaisp){
        $this->AuthLogin();
        $data = array();
        $data['tenloai'] = $request->tenloai;
        // $data['loaisanpham_status'] =$request->loaisanpham_status;

        DB::table('loaisanpham')->where('id',$id_loaisp)->update($data);
        Session::put('message','Cập nhật danh mục thành công');
        return Redirect::to('danh-sach-loai-san-pham');
    }
}
