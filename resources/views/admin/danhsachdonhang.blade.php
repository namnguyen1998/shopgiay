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
         <h3 class="title-5 m-b-35" style="text-align: center">DANH SÁCH ĐƠN HÀNG</h3>
        <div class="table-responsive m-b-40">
            <table class="table table-borderless table-data3">
                <thead>
                    <tr>
                        <th>Ngày</th>
                        <th>Sản phẩm</th>
                        <th>Tổng tiền</th>
                        <th>Ghi chú</th>
                        <th>Trạng thái</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($danhsachdonhang as $dh)
                    <tr>
                        <td><?php 
                            $date = date_create($dh->ngaydat);
                            echo date_format($date,"d-m-Y ");
                        ?></td>

                        <td>{{$dh->tensanpham}}</td>

                        <td><?php
                            $tongtien = $dh->tongtien;
                            echo number_format($tongtien, 0, ',', '.') . "₫";
                        ?></td>
                        <td>{{$dh->ghichu}}</td>
                        <td>
                        <?php
                        if($dh->id_trangthai==4){
                        ?>
                            <span class="status--denied">{{$dh->tentrangthai}}</span> 
                        <?php
                        }else{
                        ?>  
                            <span class="status--process">{{$dh->tentrangthai}}</span>
                        <?php
                        }
                        ?>
                        </td>
                        <td>
                            <div class="table-data-feature">                        
                                <button class="item" data-toggle="tooltip" data-placement="top" title="More">
                                    <a href="{{URL::to('/chi-tiet-don-hang/'.$dh->id_chitietdh)}}">
                                    <i class="zmdi zmdi-more"></i></a>
                                </button>
                            </div>
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