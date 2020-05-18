<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;

class HangsxController extends Controller
{
    public function AuthLogin(){
        $admin_id = Session::get('id');
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }
    public function themhsx(){
        $this->AuthLogin();
    	$dsloaisp = DB::table('loaisanpham')->orderby('id','desc')->get();
    	return view('admin.themhsx')->with('dsloaisp',$dsloaisp);
    }
    public function save_hsx(Request $request){
        $this->AuthLogin();
    	$data = array();
    	$data['tenhang'] = $request->tenhang;
        $data['trangthai'] = $request->trangthai;
    	$get_image = $request->file('hinh');
      
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image =  $name_image.'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/frontend/images/logo/',$new_image);
            $data['hinh'] = $new_image;
            DB::table('hanggiay')->insert($data);
            Session::put('message','Thêm hãng thành công');
            return Redirect::to('danh-sach-hang-san-xuat');
        }

        $data['hinh'] = '';


        // echo '<pre>';
    	// print_r($data);
    	// echo '</pre>';
    	// die();
    	DB::table('hanggiay')->insert($data);
    	Session::put('message','Thêm hãng sản xuất thành công');
    	return Redirect::to('danh-sach-hang-san-xuat');
    }
    public function dshsx(){
        $this->AuthLogin();
       $dshang = DB::table('hanggiay')->get();
       return view('admin.danhsachnsx')->with('dshang', $dshang);
    }

    public function delete_hangsx($id_hang){
        $this->AuthLogin();
        DB::table('hanggiay')->where('id',$id_hang)->delete();
        Session::put('message','Xóa danh mục thành công');
        return Redirect::to('danh-sach-hang-san-xuat');
    }

    public function edit_hangsx($id_hang){
        $this->AuthLogin();
        $id_hang = DB::table('hanggiay')->where('id',$id_hang)->get();
        $quanlyhangsx = view('admin.edithsx')->with('id_hang',$id_hang);
        return view('admin')->with('admin.edithsx',$quanlyhangsx);
    }
    public function update_hangsx(Request $request,$id_hang){
        $data = array();
        $data['tenhang'] = $request->tenhang;
        $data['trangthai'] = $request->trangthai;
        $get_image = $request->file('hinh');
      
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image =  $name_image.'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/frontend/images/',$new_image);
            $data['hinh'] = $new_image;
            DB::table('hanggiay')->where('id',$id_hang)->update($data);
            Session::put('message','Cập nhật thành công');
            return Redirect::to('danh-sach-hang-san-xuat');
        }

        $data['hinh'] = '';

        DB::table('hanggiay')->update($data);
        Session::put('message','Cập nhật thành công');
        return Redirect::to('danh-sach-hang-san-xuat');
    }
}