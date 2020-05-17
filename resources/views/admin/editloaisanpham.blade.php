@extends('admin')
@section('content')

<div class="card">
    <div class="card-header" style="text-align: center; font-size : 20px">
        <strong>EDIT LOẠI SẢN PHẨM</strong>
    @foreach($id_loaisp as $lsp)
    </div>
    <div class="card-body card-block">
        <form action="{{URL::to('/update-loai-san-pham/'.$lsp->id)}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                            {{csrf_field()}}
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="text-input" class=" form-control-label">Mã loại sản phẩm</label>
                </div>
                <div class="col-12 col-md-9">
                    <input type="text" id="text-input" value = "{{$lsp->id}}" name="ma_loai" style="width: 300px" placeholder="Nhập mã loại sản phẩm" class="form-control">
                </div>
            </div>
                <div class="row form-group">
                <div class="col col-md-3">
                    <label for="text-input" class=" form-control-label">Tên loại sản phẩm</label>
                </div>
                <div class="col-12 col-md-9">
                    <input type="text" id="text-input" value ="{{$lsp->tenloai}}" name="ten_loai" style="width: 300px" placeholder="Nhập tên loại sản phẩm" class="form-control">
                </div>
            </div>
    <div class="card-footer" style="text-align: center">
        <button type="submit" class="btn btn-primary btn-sm">
            <i class="fa fa-dot-circle-o"></i> Cập nhật
        </button>
    </div>
    </form>
    </div>
    @endforeach
</div>
@endsection