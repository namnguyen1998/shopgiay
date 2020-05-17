@extends('admin')
@section('content')
<aside class="menu-sidebar d-none d-lg-block">
<div class="logo">
<a href="#">
    <img src="{{asset('public/backend/images/icon/logo.png')}}" alt="Cool Admin" />
</a>
</div>
<div class="menu-sidebar__content js-scrollbar1">
<nav class="navbar-sidebar">
    <ul class="list-unstyled navbar__list">
        <li>
            <a class="js-arrow" href="{{URL::to('/dashboard')}}">
                <i class="fas fa-tachometer-alt"></i>Tổng quan</a>
        </li>
         <li>
            <a href="{{URL::to('/danh-sach-hang-san-xuat')}}">
                <i class="fa fa-inbox"></i>Quản lý hãng sản xuất</a>
        </li>
        <li>
            <a href="{{URL::to('/danh-sach-loai-san-pham')}}">
                <i class="fa fa-archive"></i>Quản lý loại sản phẩm</a>
        </li>
        <li>
            <a href="{{URL::to('/danh-sach-san-pham')}}">
                <i class="fas fa-th"></i>Quản lý sản phẩm</a>
        </li>                       
        <li>
            <a href="{{URL::to('/danh-sach-don-hang')}}">
                <i class="far fa-check-square"></i>Quản lý đơn hàng</a>
        </li>
        <li class="active has-sub">
            <a href="{{URL::to('/danh-sach-ton-kho')}}">
                <i class="fa fa-tasks"></i>Quản lý tồn kho</a>
        </li>
        <li>
            <a href="{{URL::to('/danh-sach-user')}}">
                <i class="fa fa-users"></i>Quản lý user</a>
        </li>                        
    </ul>
</nav>
</div>
</aside>
<div class="row m-t-30">
    <div class="col-md-12">
        <!-- DATA TABLE-->
        <div class="table-responsive m-b-40">
            <table class="table table-borderless table-data3">
                <thead>
                    <tr>
                        <th>Sản phẩm</th>
                        <th>Tổng số</th>
                        <th>Ngày nhập</th>
                        <th>Nhập</th>
                        <th>Ngày xuất</th>
                        <th>Xuất</th>
                        <th>Tồn kho</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($dstonkho as $sp)
                    <tr>
                        <td>{{$sp->tensanpham}}</td>
                        @foreach($dssanphamtonkho as $sptk)
                        <td>
                            <?php
                             $tongsp = ($sptk->tongsp)+($sp->sl_nhap);
                             echo $tongsp;
                            ?></td>
                        <td>{{$sp->ngay_nhap}}</td>
                        <td class="process">{{$sp->sl_nhap}}</td>
                        <td>{{$sp->ngay_xuat}}</td>
                        <td class="denied">{{$sp->sl_xuat}}</td>
                        <td>
                            <?php
                             $slton = (($sptk->tongsp)+($sp->sl_nhap))-($sp->sl_xuat);
                             echo $slton;
                            ?>
                        </td>
                        @endforeach
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- END DATA TABLE-->
    </div>
</div>
@endsection