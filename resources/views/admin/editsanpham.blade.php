@extends('admin')
@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
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
        <strong>SỬA SẢN PHẨM</strong>
    </div>
    <div class="card-body card-block">
     
        @foreach($edit_product as $key=>$v)
        
        <form action="{{URL::to('/update-product/'.$v->sanpham_id)}}" method="post" enctype="multipart/form-data" class="form-horizontal">
           @csrf
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="text-input" class=" form-control-label">Tên sản phẩm</label>
                </div>
                <div class="col-12 col-md-9">
                    <input type="text" id="text-input" name="tensanpham" value="{{$v->tensanpham}}" class="form-control">
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="form-control" class=" form-control-label">Mô tả</label>
                </div>
                <div class="col-12 col-md-9">
                    <textarea name="mota" id="textarea-input" rows="9"  class="form-control">{{$v->mota}}</textarea> 
                   
                    
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="text-input" class=" form-control-label">Giá tiền</label>
                </div>
                <div class="col-12 col-md-9">
                    <input type="text" id="text-input" name="giatien" value="{{$v->giatien}}" class="form-control">
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="text-input" class=" form-control-label">Giá khuyến mãi</label>
                </div>
                <div class="col-12 col-md-9">
                    <input type="text" id="text-input" name="giakm" value="{{$v->giakm}}" class="form-control">
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="select" class=" form-control-label">Loại sản phẩm</label>
                </div>
                <div class="col-12 col-md-9">
                    <select name="loaisanpham" id="select" class="form-control">

                        @foreach($dsloaisp as $lsp)
                        @if($lsp->id==$v->id_loaisp)
                        <option selected value="{{$lsp->id}}">{{$lsp->tenloai}}</option>
                        @else
                        <option value="{{$lsp->id}}">{{$lsp->tenloai}}</option>
                        @endif
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
                        @if($hang->id==$v->id_hanggiay)
                        <option selected value="{{$hang->id}}">{{$hang->tenhang}}</option>
                        @else
                        <option value="{{$hang->id}}">{{$hang->tenhang}}</option>
                        @endif
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="file-input" class=" form-control-label">File ảnh</label>
                </div>
                <img src="{{URL::to('public/frontend/images/'.$v->hinhsp)}}" alt="" height="50" width="50">
                <div class="col-12 col-md-9">
                    <input type="file" id="file-input" name="hinh" class="form-control-file">
                    
                </div>
                
            </div>
    </div>
    <div class="card-footer"style="text-align: center">
        <button type="submit" class="btn btn-primary btn-sm">
            <i class="fa fa-dot-circle-o"></i> Sửa
        </button>
    </div>
    </form>
    @endforeach
</div>
<script src="//cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script>
    CKEDITOR.replace( 'summary-ckeditor', {
        filebrowserUploadUrl: "{{route('upload', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form'
    });

    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
</script>


@endsection