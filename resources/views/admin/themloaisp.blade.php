@extends('admin')
@section('content')

<div class="card">
    <div class="card-header" style="text-align: center; font-size : 20px">
        <strong>THÊM LOẠI SẢN PHẨM</strong>
    </div>
    <div class="card-body card-block" style="padding-left: 200px">
        <form action="{{URL::to('/save-loai-san-pham')}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                            {{csrf_field()}}
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="text-input" class=" form-control-label">Mã loại sản phẩm</label>
                </div>
                <div class="col-12 col-md-9">
                    <input type="text" id="text-input" name="ma_loai" style="width: 300px" placeholder="Nhập mã loại sản phẩm" class="form-control">
                </div>
            </div>
                <div class="row form-group">
                <div class="col col-md-3">
                    <label for="text-input" class=" form-control-label">Tên loại sản phẩm</label>
                </div>
                <div class="col-12 col-md-9">
                    <input type="text" id="text-input" name="ten_loai" style="width: 300px" placeholder="Nhập tên loại sản phẩm" class="form-control">
                </div>
            </div>
    <div class="card-footer" style="text-align: center; width: 520px">
        <button type="submit" class="btn btn-primary btn-sm">
            <i class="fa fa-dot-circle-o"></i> Thêm
        </button>
    </div>
    </form>
    </div>

</div>
@endsection