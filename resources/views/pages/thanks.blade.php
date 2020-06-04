@extends('trangphu')
@section('content') 
<div style="text-align: center">
    <img src="public/frontend/images/thanks.jpg">
    
</div>
<div style="text-align: center; color:#A8AFB1; font-size: 50px; background-color: lightblack">
    Cảm ơn Bạn đã đặt sản phẩm của chúng tôi.
</div>

<div style="text-align: center; font-size: 50px; background-color: lightblack">
    <a style="color:#A8AFB1;"  href="{{URL::to('/')}}"> Quay về trang chủ</a>
</div>


@endsection