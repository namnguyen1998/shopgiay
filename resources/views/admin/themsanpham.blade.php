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
<div class="card">
    <div class="card-header" style="text-align: center">
        <strong>THÊM SẢN PHẨM</strong>
    </div>
    <div class="card-body card-block">
        <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="text-input" class=" form-control-label">Tên sản phẩm</label>
                </div>
                <div class="col-12 col-md-9">
                    <input type="text" id="text-input" name="tensanpham" placeholder="Nhập tên sản phẩm" class="form-control">
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="textarea-input" class=" form-control-label">Mô tả</label>
                </div>
                <div class="col-12 col-md-9">
                    <textarea name="mota" id="textarea-input" rows="9" placeholder="Nhập mô tả sản phẩm" class="form-control"></textarea>
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="text-input" class=" form-control-label">Giá tiền</label>
                </div>
                <div class="col-12 col-md-9">
                    <input type="text" id="text-input" name="giatien" placeholder="Nhập giá sản phẩm" class="form-control">
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="text-input" class=" form-control-label">Giá khuyến mãi</label>
                </div>
                <div class="col-12 col-md-9">
                    <input type="text" id="text-input" name="giakm" placeholder="Nhập giá khuyến mãi sản phẩm" class="form-control">
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="select" class=" form-control-label">Loại sản phẩm</label>
                </div>
                <div class="col-12 col-md-9">
                    <select name="loaisanpham" id="select" class="form-control">
                    	@foreach($dsloaisp as $lsp)
                        <option value="{{$lsp->id}}">{{$lsp->tenloai}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="select" class=" form-control-label">Hãng giày</label>
                </div>
                <div class="col-12 col-md-9">
                    <select name="hanggiay" id="select" class="form-control">
                    	@foreach($dshang as $hang)
                        <option value="{{$hang->id}}">{{$hang->tenhang}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="file-input" class=" form-control-label">File ảnh</label>
                </div>
                <div class="col-12 col-md-9">
                    <input type="file" id="file-input" name="hinh" class="form-control-file">
                </div>
            </div>
    </div>
    <div class="card-footer"style="text-align: center">
        <button type="submit" class="btn btn-primary btn-sm">
            <i class="fa fa-dot-circle-o"></i> Thêm
        </button>
    </div>
    </form>
</div>
@endsection