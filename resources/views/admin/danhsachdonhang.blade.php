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
            <li class="active has-sub">
                <a href="{{URL::to('/danh-sach-don-hang')}}">
                    <i class="far fa-check-square"></i>Quản lý đơn hàng</a>
            </li>
            <li>
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
                        <th>Ngày đặt</th>
                        <th>Tên sản phẩm</th>
                        <th>Địa chỉ</th>
                        <th>Tên người nhận</th>
                        <th>Số điện thoại</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>2018-09-29 05:57</td>
                        <td>Mobile</td>
                        <td>iPhone X 64Gb Grey</td>
                        <td class="process">Processed</td>
                        <td>$999.00</td>
                    </tr>
                    <tr>
                        <td>2018-09-28 01:22</td>
                        <td>Mobile</td>
                        <td>Samsung S8 Black</td>
                        <td class="process">Processed</td>
                        <td>$756.00</td>
                    </tr>
                    <tr>
                        <td>2018-09-27 02:12</td>
                        <td>Game</td>
                        <td>Game Console Controller</td>
                        <td class="denied">Denied</td>
                        <td>$22.00</td>
                    </tr>
                    <tr>
                        <td>2018-09-26 23:06</td>
                        <td>Mobile</td>
                        <td>iPhone X 256Gb Black</td>
                        <td class="denied">Denied</td>
                        <td>$1199.00</td>
                    </tr>
                    <tr>
                        <td>2018-09-25 19:03</td>
                        <td>Accessories</td>
                        <td>USB 3.0 Cable</td>
                        <td class="process">Processed</td>
                        <td>$10.00</td>
                    </tr>
                    <tr>
                        <td>2018-09-29 05:57</td>
                        <td>Accesories</td>
                        <td>Smartwatch 4.0 LTE Wifi</td>
                        <td class="denied">Denied</td>
                        <td>$199.00</td>
                    </tr>
                    <tr>
                        <td>2018-09-24 19:10</td>
                        <td>Camera</td>
                        <td>Camera C430W 4k</td>
                        <td class="process">Processed</td>
                        <td>$699.00</td>
                    </tr>
                    <tr>
                        <td>2018-09-22 00:43</td>
                        <td>Computer</td>
                        <td>Macbook Pro Retina 2017</td>
                        <td class="process">Processed</td>
                        <td>$10.00</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!-- END DATA TABLE-->
    </div>
</div>
@endsection