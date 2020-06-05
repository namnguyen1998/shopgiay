@extends('admin')
@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
<aside class="menu-sidebar d-none d-lg-block">
<div class="logo">
    <a href="#">
        <img src="{{asset('public/backend/images/icon/logo.png')}}" alt="Cool Admin" />
    </a>
</div>
@include('/admin/menu');
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
                    <label for="select" class=" form-control-label">Giới tính</label>
                </div>
                <div class="col-12 col-md-9">
                    <select name="gioitinh" id="select" class="form-control">
                        @foreach($gioitinh as $lsp)
                        @if($lsp->id==$v->id_gioitinh)
                        <option selected value="{{$lsp->id}}">{{$lsp->gioitinh}}</option>
                        @else
                        <option value="{{$lsp->id}}">{{$lsp->gioitinh}}</option>
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
                <?php
            $mess = Session::get('success');
            if($mess){
                echo $mess;
                Session::put('success',null);
            }

        ?>
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