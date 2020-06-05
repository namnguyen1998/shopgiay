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
        // $getIdOrders = DB::table('donhang')->select('id_donhang')->orderby('id_donhang','desc')->limit(1)->get();
        // foreach($getIdOrders as $key => $value)
        //     $idOrders = $value->id_donhang + 1;

        // $name = $request->name;
        // $phone = $request->phone;
        // $email = $request->email;
        // $no = $request->no;

        // $subtotal = $request->subtotal;
        // $city = $request->city;
        // $district = $request->input('district');
        // $ward = $request->input('ward');
        // $urlCity = "https://thongtindoanhnghiep.co/api/city/$city";
        // $urlDistrict = "https://thongtindoanhnghiep.co/api/district/$district";
        // $urlWard = "https://thongtindoanhnghiep.co/api/ward/$ward";

        // $getDataUrlCity = @file_get_contents($urlCity);
        // $convertDataCity = json_decode($getDataUrlCity);
        // $getCity = $convertDataCity->Title;

        // $getDataUrlDistrict = @file_get_contents($urlDistrict);
        // $convertDataDistrict = json_decode($getDataUrlDistrict);
        // $getDistrict = $convertDataDistrict->Title;

        // $getDataUrlWard = @file_get_contents($urlWard);
        // $convertDataWard = json_decode($getDataUrlWard);
        // $getWard = $convertDataWard->Title;

        // $data = array();
        // $data['subtotal'] = $subtotal;
        // $data['city'] = $getCity;
        // $data['district'] = $getDistrict;
        // $data['ward'] = $getWard;
        // $address = $no . ", " . $data['ward'] . ", " . $data['district'] . ", " .  $data['city'];
        
        // foreach(Cart::content() as $cart){
        //     $dataCart = array();
        //     $dataCart['id_sanpham'] = $cart->id;
        //     $dataCart['soluong'] = $cart->qty;
        //     $dataCart['tongtien'] = $data['subtotal'];
        //     $dataCart['tennguoinhan'] = $name;
        //     $dataCart['sdt'] = $phone;
        //     $dataCart['diachi'] = $address;
        //     $dataCart['id_pttt'] = '1';
        //     $dataCart['id_donhang'] = $idOrders;
        //     DB::table('chitietdonhang')->insert($dataCart);
        // }

        // $dataOrders = array();
        // $dataOrders['ghichu'] = '';
        // $dataOrders['id_trangthai'] = '1';
        // $dataOrders['tongtien'] = $data['subtotal'];
        // DB::table('donhang')->insert($dataOrders);
        

        // check null
        // $rules=[
        //     'name' => 'required',
        //     'city' => 'required',
        //     'district' => 'required',
        //     'ward' => 'required',
        //     'no' => 'required',
        //     'phone' => 'required',
        //     'email' => 'required',
        //     'ship' => 'required',
        //     'pay' => 'required',
        // ];

        // $message = [
        //     'name.required' => 'Bạn chưa nhập Họ tên',
        //     'city.required' => 'Bạn chưa chọn Tỉnh/Thành phố',
        //     'district.required' => 'Bạn chưa chọn Quận/Huyện',
        //     'ward.required' => 'Bạn chưa chọn Phường/Xã',
        //     'no.required' => 'Bạn chưa nhập Số nhà',
        //     'phone.required' => 'Bạn chưa nhập Số diện thoại',
        //     'email.required' => 'Bạn chưa nhập Email',
        //     'ship.required' => 'Bạn chưa chọn Hình thức vận chuyển',
        //     'pay.required' => 'Bạn chưa chọn Hình thức thanh toán',
        // ];

        // $input = $request->all();

        // $validator = \Validator::make($input, $rules, $message);

        // if($validator->fails()){
        //     return redirect::to('/checkout')->withErrors($validator);
        // }
        
        Cart::destroy();
        return view('pages.thanks');

    }

}