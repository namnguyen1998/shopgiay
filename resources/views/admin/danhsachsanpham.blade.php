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
            <li class="active has-sub">
                <a href="{{URL::to('/danh-sach-san-pham')}}">
                    <i class="fas fa-th"></i>Quản lý sản phẩm</a>
            </li>                       
            <li>
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
<div class="col-md-12">
    <!-- DATA TABLE -->
    <h3 class="title-5 m-b-35" style="text-align: center">DANH SÁCH SẢN PHẨM</h3>
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
                <a href="{{URL::to('/them-san-pham')}}">
                <i class="zmdi zmdi-plus"></i>add item</button>
            </a>
            <div class="rs-select2--dark rs-select2--sm rs-select2--dark2">
                <select class="js-select2" name="type">
                    <option selected="selected">Export</option>
                    <option value="">Option 1</option>
                    <option value="">Option 2</option>
                </select>
                <div class="dropDownSelect2"></div>
            </div>
        </div>
    </div>
    <div class="table-responsive table-responsive-data2">
        <table class="table table-data2">
            <thead>
                <tr>
                    <th>
                        <label class="au-checkbox">
                            <input type="checkbox">
                            <span class="au-checkmark"></span>
                        </label>
                    </th>
                    <th>ID</th>
                    <th>Tên sản phẩm</th>
                    <th>Hình ảnh</th>
                    <th>Mô tả</th>
                    <th>Giá tiền</th>
                    <th>Giá khuyến mãi</th>
                    <th>Loại sản phẩm</th>
                    <th>Hãng giày</th>
                    <th></th>
                </tr>
            </thead>
              @foreach($dssanpham as $sanpham)
            <tbody>
                <tr class="tr-shadow">
                    <td>
                        <label class="au-checkbox">
                            <input type="checkbox">
                            <span class="au-checkmark"></span>
                        </label>
                    </td>
                    <td>{{$sanpham->id}}</td>
                    <td>
                        <span class="block-email">{{$sanpham->tensanpham}}</span>
                    </td>
                    <td><img src="public/frontend/images/{{$sanpham->hinh}}" height="100" width="100"></td>
                    <!-- <td class="desc">Samsung S8 Black</td> -->
                    <td>{{$sanpham->mota}}</td>
                    <td>{{$sanpham->giatien}}</td>
                    <td>
                        <span class="status--process">{{$sanpham->giakm}}</span>
                    </td>
                    <td>{{$sanpham->tenloai}}</td>
                    <td>{{$sanpham->tenhang}}</td>
                    <td>
                        <div class="table-data-feature">
                            <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                <i class="zmdi zmdi-edit"></i>
                            </button>
                            <button class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                <i class="zmdi zmdi-delete"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                <tr class="spacer"></tr>
            </tbody>
            @endforeach
        </table>
    </div>
    <!-- END DATA TABLE -->
</div>
@endsection