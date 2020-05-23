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
         <h3 class="title-5 m-b-35" style="text-align: center">DANH SÁCH TỒN KHO</h3>
         <!-- <span class="text-alert" style="font-size: 17px;
                        color: blue;
                        text-align: center;
                        width: 100%;
                        font-style: italic"> -->
                <div class="alert alert-primary" role="alert">
                     Hiện tại trong kho có
                    <a class="alert-link">
                    <?php
                        $tong = 0;
                        foreach($dssanphamtonkho as $sp)
                        $tong += (($sp->tongsp)+($sp->sl_nhap))-($sp->sl_xuat);
                        echo $tong;
                    ?>
                    </a> sản phẩm
                </div>
         <!-- </span> -->
  <div class="table-data__tool">
    <div class="table-data__tool-left">
        <div class="rs-select2--light rs-select2--md">
            <select class="js-select2" name="property">
                <option selected="selected">All Properties</option>
                <option value="">Option 1</option>
                <option value="">Option 2</option>
            </select>
            <div class="dropDownSelect2"></div>
        </div>
        <div class="rs-select2--light rs-select2--sm">
            <select class="js-select2" name="time">
                <option selected="selected">Today</option>
                <option value="">3 Days</option>
                <option value="">1 Week</option>
            </select>
            <div class="dropDownSelect2"></div>
        </div>
        <button class="au-btn-filter">
            <i class="zmdi zmdi-filter-list"></i>filters</button>
    </div>
    <div class="table-data__tool-right">
        <button class="au-btn au-btn-icon au-btn--green au-btn--small">
            <a href="{{URL::to('/phieu-nhap')}}">
            <i class="zmdi zmdi-plus"></i>Phiếu nhập</button>
            </a>
            <button class="btn btn-dark au-btn-icon au-btn--small">
            <a href="{{URL::to('/report')}}">
            <i class="zmdi"></i>Xuất Excel</button>
            </a>
    </div>
</div>
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
            @foreach($dssanphamtonkho as $sp)
            <tr>
                <td>{{$sp->tensanpham}}</td>
                <td><?php
                     $tongsl = ($sp->tongsp)+($sp->sl_nhap);
                     echo $tongsl;
                    ?></td>
                <td>{{ date('d-m-Y', strtotime($sp->ngay_nhap)) }}</td>

                <td class="process">{{$sp->sl_nhap}}</td>
                <td>{{ date('d-m-Y', strtotime($sp->ngay_xuat)) }}</td>
                
                <td class="denied">{{$sp->sl_xuat}}</td>
                <td>
                    <?php
                     $slton = (($sp->tongsp)+($sp->sl_nhap))-($sp->sl_xuat);
                     echo $slton;
                    ?>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    </div>
    <!-- END DATA TABLE-->
</div>
</div>
    @endsection