<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use DateTime;
use Session;
use Illuminate\Support\Facades\Redirect;
use DB,Cart;
session_start();


class SaveInvoice extends Controller
{
    public function getDataInvoice(Request $request){
        // $name = $request->name;
        // $no = $request->no;
        // $phone = $request->phone;
        // $email = $request->email;

        // $dataName = array();
        // $dataName['name'] = $name;

        // $dataNo = array();
        // $dataNo['no'] = $no;

        // $dataPhone = array();
        // $dataPhone['phone'] = $phone;

        // $dataEmail = array();
        // $dataEmail['email'] = $email;

        // $data = array();
        // $data['name'] = $dataName;
        // $data['no'] = $dataNo;
        // $data['phone'] = $dataPhone;
        // $data['email'] = $dataEmail;




        $subtotal = $request->subtotal;
        $city = $request->city;
        $district = $request->input('district');
        $ward = $request->input('ward');
        $urlCity = "https://thongtindoanhnghiep.co/api/city/$city";
        $urlDistrict = "https://thongtindoanhnghiep.co/api/district/$district";
        $urlWard = "https://thongtindoanhnghiep.co/api/ward/$ward";

        $getDataUrlCity = @file_get_contents($urlCity);
        $convertDataCity = json_decode($getDataUrlCity);
        $getCity = $convertDataCity->Title;

        $getDataUrlDistrict = @file_get_contents($urlDistrict);
        $convertDataDistrict = json_decode($getDataUrlDistrict);
        $getDistrict = $convertDataDistrict->Title;

        $getDataUrlWard = @file_get_contents($urlWard);
        $convertDataWard = json_decode($getDataUrlWard);
        $getWard = $convertDataWard->Title;

        $data = array();
        $data['subtotal'] = $subtotal;
        $data['city'] = $getCity;
        $data['district'] = $getDistrict;
        $data['ward'] = $getWard;
        $address = $data['ward'] . ", " . $data['district'] . ", " .  $data['city'];
        
        foreach(Cart::content() as $cart){
            $dataCart = array();
            $dataCart['id_sanpham'] = $cart->id;
            $dataCart['soluong'] = $cart->qty;
            $dataCart['tongtien'] = $data['subtotal'];
            $dataCart['tennguoinhan'] = 'nam';
            $dataCart['sdt'] = '0987654321';
            $dataCart['diachi'] = $address;
            $dataCart['id_pttt'] = '1';
            DB::table('chitietdonhang')->insert($dataCart);
        }
        // echo'<pre>';
        // print_r($dataName);
        // echo'</pre>';
        // echo'<pre>';
        // print_r($dataNo);
        // echo'</pre>';
        // echo'<pre>';
        // print_r($dataPhone);
        // echo'</pre>';
        // echo'<pre>';
        // print_r($dataEmail);
        // echo'</pre>';
        // return view('/checkout');
    }

}