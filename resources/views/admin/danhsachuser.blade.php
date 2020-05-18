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
            <li>
                <a href="{{URL::to('/danh-sach-ton-kho')}}">
                    <i class="fa fa-tasks"></i>Quản lý tồn kho</a>
            </li>
            <li class="active has-sub">
                <a href="{{URL::to('/danh-sach-user')}}">
                    <i class="fa fa-users"></i>Quản lý user</a>
            </li>                        
        </ul>
    </nav>
</div>
</aside>
<div class="user-data m-b-30">
    <h3 class="title-3 m-b-30">
        <i class="zmdi zmdi-account-calendar"></i>user data</h3>
    <div class="filters m-b-45">
        <div class="rs-select2--dark rs-select2--md m-r-10 rs-select2--border">
            <select class="js-select2" name="property">
                <option selected="selected">All Properties</option>
                <option value="">Products</option>
                <option value="">Services</option>
            </select>
            <div class="dropDownSelect2"></div>
        </div>
        <div class="rs-select2--dark rs-select2--sm rs-select2--border">
            <select class="js-select2 au-select-dark" name="time">
                <option selected="selected">All Time</option>
                <option value="">By Month</option>
                <option value="">By Day</option>
            </select>
            <div class="dropDownSelect2"></div>
        </div>
    </div>
    <div class="table-responsive table-data">
        <table class="table">
            <thead>
                <tr>
                    <td>
                        <label class="au-checkbox">
                            <input type="checkbox">
                            <span class="au-checkmark"></span>
                        </label>
                    </td>
                    <td>Tên</td>
                    <td>Số điện thoại</td>
                    <td>Địa chỉ</td>
                    <td>Chức vụ</td>
                    <td>Quyền Truy cập</td>
                </tr>
            </thead>
            <tbody>
            	@foreach($dsuser as $user)
                <tr>
                    <td>
                        <label class="au-checkbox">
                            <input type="checkbox">
                            <span class="au-checkmark"></span>
                        </label>
                    </td>
                    <td>
                        <div class="table-data__info">
                            <h6>{{$user->ten}}</h6>
                            <span>
                                <a href="#">{{$user->email}}</a>
                            </span>
                        </div>
                    </td>
                    <td>{{$user->sdt}}</td>
                    <td>{{$user->diachi}}</td>
                    <td>
						<?php
						if($user->id_chucvu==1){
						?>
						<span class="role admin">{{$user->tenchucvu}}</span></td>              
						<?php
						}else{
						?>  
						<span class="role user">{{$user->tenchucvu}}</span></td>
						<?php
						}
						?>
                    </td>
                    <td>
                        <div class="rs-select2--trans rs-select2--sm">
                            <select class="js-select2" name="property">
                                <option selected="selected">Full Control</option>
                                <option value="">Post</option>
                                <option value="">Watch</option>
                            </select>
                            <div class="dropDownSelect2"></div>
                        </div>
                    </td>
                    <td>
                        <span class="more">
                            <i class="zmdi zmdi-more"></i>
                        </span>
                    </td>
                    
                </tr>
            </tbody>
			@endforeach
        </table>
    </div>

    <div class="user-data__footer">
        <button class="au-btn au-btn-load">load more</button>
    </div>
</div>
@endsection