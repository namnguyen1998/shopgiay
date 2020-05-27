<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use DateTime;
use Session;
use Illuminate\Support\Facades\Redirect;
use DB,Cart;
session_start();

    // $subtotal = $_POST['subtotal'];
    // $city = $_POST['city'];
    // $district = $_POST['district'];
    // $word = $_POST['word'];
    
    // $urlCity = "https://thongtindoanhnghiep.co/api/city/$city";
    // $urlDistrict = "https://thongtindoanhnghiep.co/api/district/$district";
    // $urlWard = "https://thongtindoanhnghiep.co/api/ward/$word";

    // $getDataUrlCity = @file_get_contents($urlCity);
    // $convertDataCity = json_decode($getDataUrlCity);
    // $getCity = $convertDataCity->Title;

    // $getDataUrlDistrict = @file_get_contents($urlDistrict);
    // $convertDataDistrict = json_decode($getDataUrlDistrict);
    // $getDistrict = $convertDataDistrict->Title;

    // $getDataUrlWard = @file_get_contents($urlWard);
    // $convertDataWard = json_decode($getDataUrlWard);
    // $getWard = $convertDataWard->Title;


class SaveInvoice extends Controller
{
    public function getDataInvoice(Request $request){

        $date = new DateTime();
        $subtotal = $_POST['subtotal'];
        $city = $_POST['city'];
        $district = $_POST['district'];
        $word = $_POST['word'];
        
        $urlCity = "https://thongtindoanhnghiep.co/api/city/$city";
        $urlDistrict = "https://thongtindoanhnghiep.co/api/district/$district";
        $urlWard = "https://thongtindoanhnghiep.co/api/ward/$word";

        $getDataUrlCity = @file_get_contents($urlCity);
        $convertDataCity = json_decode($getDataUrlCity);
        $getCity = $convertDataCity->Title;

        $getDataUrlDistrict = @file_get_contents($urlDistrict);
        $convertDataDistrict = json_decode($getDataUrlDistrict);
        $getDistrict = $convertDataDistrict->Title;

        $getDataUrlWard = @file_get_contents($urlWard);
        $convertDataWard = json_decode($getDataUrlWard);
        $getWard = $convertDataWard->Title;

    //////////////////////////////////////////////////////////////
        $_name = $request->input('_name');
        $_no = $request->input('_no');
        $address = $_no . ", " . $getWard . ", " . $getDistrict . ", " . $getCity ;
        $_phone = $request->input('_phone');
        $_email = $request->input('_email');

        $cart = Cart::content();
        $idProduct = $cart->id;

        // $data=array('id_sanpham'=>$idProduct, 'soluong'=>2 ,'tennguoinhan'=>$_name,"sdt"=>$_phone,"diachi"=>$address,"email"=>$_email);

        $data = array();
        $data['id_sanpham'] = $idProduct;
        $data['soluong'] = '2';
        $data['tongtien'] = $subtotal;
        $data['tennguoinhan'] = $_name;
        $data['sdt'] = $_phone;
        $data['diachi'] = $address;
        $data['email'] = $_email;
        $data['ngaydat'] = $date->getTimestamp();
        $data['id_pttt'] = '1';

        DB::table('chitietdonhang')->insert($data);

        return Redirect::to('/checkout');
    }
}