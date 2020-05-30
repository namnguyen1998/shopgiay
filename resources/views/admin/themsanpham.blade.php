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
        <strong>THÊM SẢN PHẨM</strong>
    </div>
    <div class="card-body card-block">
        <form action="{{URL::to('/save-product')}}" method="post" enctype="multipart/form-data" class="form-horizontal">
            @csrf
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
                    <label for="form-control" class=" form-control-label">Mô tả</label>
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
                    <label for="select" class=" form-control-label">Giới tính</label>
                </div>
                <div class="col-12 col-md-9">
                    <select name="gioitinh" id="select" class="form-control">
                    	@foreach($gioitinh as $gt)
                        <option value="{{$gt->id}}">{{$gt->gioitinh}}</option>
                        
                        @endforeach
                        <?php print_r($gt->id)?>
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