<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
use DB,Cart;
session_start();

class CartController extends Controller
{
    public function save_cart(Request $request)
    {
        $productId=$request->product_hidden;
        $quantity=$request->qty;
        
        $product_info=DB::table('sanpham')->where('sanpham_id',$productId)->get();
       
        
       
        //Cart::add('293ad', 'Product 1', 1, 9.99, 550);
        //Cart::destroy();
        
        $data['id']=$product_info[0]->sanpham_id;
        $data['qty']=$quantity;
        $data['name']=$product_info[0]->tensanpham;
        $data['price']=$product_info[0]->giatien;
        $data['description']=$product_info[0]->mota;
        $data['weight']='123';
        $data['options']['image']=$product_info[0]->hinhsp;
        Cart::add($data);

        return Redirect::to('/show_cart');


        //  echo'<pre>';
        // print_r($product_info[0]->sanpham_id);
        // echo'</pre>';
    }
    public function show_cart(){
        return view('pages.cart.show_cart');
    }

    public function delete_to_cart($rowID){
        Cart::update($rowID,0);
        return Redirect::to('/show_cart');

    }
    public function update_cart(Request $request){
        $rowID=$request->rowID_cart;
        $qty=$request->num_product1;
        Cart::update($rowID,$qty);
        return Redirect::to('/show_cart');

    }
}
