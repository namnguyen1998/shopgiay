<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class ProductController extends Controller
{
    public function AuthLogin(){
        $admin_id = Session::get('id');
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }
    public function add_product(){
        $this->AuthLogin();
        $dsloaisp = DB::table('loaisanpham')->orderby('id','desc')->get();
        $dshang = DB::table('hanggiay')->get();
        $gioitinh = DB::table('gioitinh')->get();
        $dsuser = DB::table('nhanvien')->get();
        
        return view('admin.themsanpham')->with('dsloaisp',$dsloaisp)->with('dshang', $dshang)
               ->with('gioitinh',$gioitinh)->with('dsuser',$dsuser);
    }
 
    public function save_product(Request $request){
        $this->AuthLogin();
    	$data = array();
    	$data['tensanpham'] = $request->tensanpham;
        $data['mota'] = $request->mota;
        $data['giatien'] = $request->giatien;
        $data['giakm'] = $request->giakm;
        $data['id_loaisp'] = $request->loaisanpham;
        $data['id_hanggiay'] = $request->hanggiay;
        $data['id_gioitinh'] = $request->gioitinh;
    	$get_image = $request->file('hinh');
      
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image =  $name_image.'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/frontend/images/',$new_image);
            $data['hinhsp'] = $new_image;
            DB::table('sanpham')->insert($data);
            Session::put('message','Thêm sp thành công');
            return Redirect::to('/danh-sach-san-pham');
        }

        $data['hinhsp'] = '';
    	DB::table('sanpham')->insert($data);
    	Session::put('message','Thêm sp thành công');
    	return Redirect::to('/danh-sach-san-pham');
    }
    // public function dshsx(){
    //     $this->AuthLogin();
    //    $dshang = DB::table('hanggiay')->get();
    //    return view('admin.danhsachnsx')->with('dshang', $dshang);
    // }

    public function delete_product($sanpham_id){
        $this->AuthLogin();
        DB::table('sanpham')->where('sanpham_id',$sanpham_id)->delete();
        Session::put('message','Xóa sp thành công');
        return Redirect::to('/danh-sach-san-pham');
    }

    public function edit_product($sanpham_id){
        $this->AuthLogin();
        $dsloaisp = DB::table('loaisanpham')->orderby('id','desc')->get();
        $dshang = DB::table('hanggiay')->get();
        $gioitinh = DB::table('gioitinh')->get();
        $edit_product = DB::table('sanpham')->where('sanpham_id',$sanpham_id)->get();
        $dsuser = DB::table('nhanvien')->get();
        $quanlysanpham = view('admin.editsanpham')->with('edit_product',$edit_product)->with('dsloaisp',$dsloaisp)
        ->with('dsuser',$dsuser)->with('dshang', $dshang)->with('gioitinh',$gioitinh);
        
        return view('admin')->with('admin.editsanpham',$quanlysanpham);
    }
    public function update_product(Request $request,$sanpham_id){
        
    	$data = array();
    	$data['tensanpham'] = $request->tensanpham;
        $data['mota'] = $request->mota;
        $data['giatien'] = $request->giatien;
        $data['giakm'] = $request->giakm;
        $data['id_loaisp'] = $request->loaisanpham;
        $data['id_hanggiay'] = $request->hanggiay;
        $data['id_gioitinh'] = $request->gioitinh;
        $get_image = $request->file('hinh');
      
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image =  $name_image.'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/frontend/images/',$new_image);
            $data['hinhsp'] = $new_image;
            DB::table('sanpham')->where('sanpham_id',$sanpham_id)->update($data);
            Session::put('message','sửa sp thành công');
            return Redirect::to('/danh-sach-san-pham');
        }

        DB::table('sanpham')->where('sanpham_id',$sanpham_id)->update($data);
    	Session::put('message','sửa sp sản xuất thành công');
    	return Redirect::to('/danh-sach-san-pham');
    }
    
}
