@extends('trangphu')
@section('content') 
<div style="text-align: center">
    <img src="public/frontend/images/page404.gif">
    
</div>
<div style="text-align: center; color:#A8AFB1; font-size: 50px; background-color: lightblack">
    Không tìm thấy trang này
</div>

<div style="text-align: center; font-size: 50px; background-color: lightblack">
    <a style="color:#A8AFB1;"  href="{{URL::to('/')}}"> Quay về trang chủ</a>
</div>


@endsection