<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
use DB;
session_start();

class SanphamController extends Controller
{
    
   	public function AuthLogin(){
        $admin_id = Session::get('id');
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }

    public function chitietsanpham($id)
    {
      $loai=DB::table('loaisanpham')->get();
      $hang=DB::table('hanggiay')->get();

      $size=DB::table('sanpham')->join('sanpham_size','sanpham.sanpham_id','=','sanpham_size.id_sp')->where('sanpham.sanpham_id',$id)->get();

      $sanphamlq=DB::table('sanpham')->join('loaisanpham','loaisanpham.id','=','sanpham.id_loaisp')->join('hanggiay','hanggiay.id','=','sanpham.id_hanggiay')->limit(4)->get();
      $ctsp=DB::table('sanpham')->join('loaisanpham','loaisanpham.id','=','sanpham.id_loaisp')->join('hanggiay','hanggiay.id','=','sanpham.id_hanggiay')->where('sanpham.sanpham_id',$id)->get();
      return view('sanpham.chitietsanpham')->with('loaisp',$loai)->with('hg',$hang)->with('chitietsp',$ctsp)->with('si',$size)->with('splq',$sanphamlq);
    }



    public function danhsachsanpham(){
    	$this->AuthLogin();
    	$dssanpham = DB::table('sanpham')
                   ->join('hanggiay','hanggiay.id','=','sanpham.id_hanggiay')
                   ->join('loaisanpham','loaisanpham.id','=','sanpham.id_loaisp')
                   ->select('sanpham.sanpham_id','sanpham.hinhsp','sanpham.mota','sanpham.giatien','sanpham.giakm','sanpham.tensanpham','loaisanpham.tenloai','hanggiay.tenhang')
                   ->get();
      $dsuser = DB::table('nhanvien')->get();
    	$qlydssanpham = view('admin.danhsachsanpham')->with('dssanpham',$dssanpham)->with('dsuser',$dsuser);
    	return view('admin')->with('admin.danhsachsanpham',$qlydssanpham);
    }

    public function themsanpham(){
    	$this->AuthLogin();
    	$dshang = DB::table('hanggiay')->orderby('id','desc')->get();
      $dsloaisp = DB::table('loaisanpham')->orderby('id','desc')->get();
      $dsuser = DB::table('nhanvien')->get();
      $gioitinh = DB::table('gioitinh')->get();
      return view('admin.themsanpham')->with('dshang',$dshang)->with('dsloaisp',$dsloaisp)
      ->with('dsuser',$dsuser)->with('gioitinh',$gioitinh);
    }
 
    public function timkiemsanpham(Request $req){
      $keyword=$req->keyword_submit;
      // $loai=  DB::table('loaisanpham')->get();
      // $hang=DB::table('hanggiay')->get();
      $sanphamtimkiem=DB::table('sanpham')->where('tensanpham','like','%'.$keyword.'%')->paginate(8);
      return view('sanpham.timkiem',compact('sanphamtimkiem'));
    }


    public function ajaxtimkiem(Request $req)
    {
      if($req->ajax())
      {
      $output='';
      $loai=  DB::table('loaisanpham')->get();
      $hang=DB::table('hanggiay')->get();
      $sanpham_timkiem=DB::table('sanpham')->where('tensanpham','like','%'.$req->search.'%')->limit(16)->get();
      if($sanpham_timkiem){
      foreach($sanpham_timkiem as $key=>$value)
          {
          $output .='<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
                            <div class="block2">
                                <div class="block2-pic hov-img0">
                                    <img src="public/frontend/images/'.$value->hinhsp. '" alt="IMG-PRODUCT"> 
                                    <a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
                                        Quick View
                                     </a>                   
                                </div>
                                <div class="block2-txt flex-w flex-t p-t-14">
                                      <div class="block2-txt-child1 flex-col-l ">
                                         <a href="#" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">'
                                            .$value->tensanpham.
                                          '</a>
                                          <span class="stext-105 cl3">'
                                            .$value->giatien.
                                          '</span>
                                      </div>
                                      <div class="block2-txt-child2 flex-r p-t-3">
                                          <a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
                                            <img class="icon-heart1 dis-block trans-04" src="public/frontend/images/icons/icon-heart-01.png" alt="ICON">
                                            <img class="icon-heart2 dis-block trans-04 ab-t-l" src="public/frontend/images/icons/icon-heart-02.png" alt="ICON">
                                           </a>
                                      </div>
                                 </div>
                            </div>
                       </div>';
          }
         return Response($output);
          //echo $output;
      }
      
    }


  } 


}
