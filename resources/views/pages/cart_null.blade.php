@extends('trangphu')
@section('content') 
<div style="text-align: center">
    <img src="public/frontend/images/empty-cart.png">
    
</div>
<div style="text-align: center; font-size: 100px; background-color: lightblack">
    <a style="color:#A8AFB1;"  href="{{URL::to('/trangsanpham')}}">Đi đến trang mua sắm</a>
</div>


@endsection