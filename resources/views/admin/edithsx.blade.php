@extends('admin')
@section('content')

<div class="card">
    <div class="card-header" style="text-align: center; font-size : 20px">
        <strong>EDIT HÃNG SẢN XUẤT</strong>
    </div>
    @foreach($id_hang as $hsx)
    <div class="card-body card-block" style="padding-left: 200px">
        <form action="{{URL::to('/update-hang-san-xuat/'.$hsx->id)}}" method="post" enctype="multipart/form-data" class="form-horizontal">
            @csrf
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="text-input" class=" form-control-label">Tên hãng sản xuất</label>
                </div>
                <div class="col-12 col-md-9">
                    <input type="text" id="text-input" name="tenhang" value="{{$hsx->tenhang}}" class="form-control"style="width: 300px" placeholder="Nhập tên hãng sản xuất" class="form-control">
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="file-input" class=" form-control-label">File input</label>
                </div>
                <div class="col-12 col-md-9">
                    <input type="file" id="file-input" name="hinh" class="form-control-file">
                    <img src="{{URL::to('public/frontend/images/'.$hsx->hinh)}}" height="200" width="200">
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="select" class=" form-control-label">Trạng thái</label>
                </div>
                <div class="col-12 col-md-9">
                    <select name="trangthai" id="select" class="form-control" style="width: 300px">
                        <option value="0">Ẩn</option>
                        <option value="1">Hiển thị</option>
                    </select>
                </div>
            </div>
    </div>
    @endforeach
    <div class="card-footer" style="text-align: center">
        <button type="submit" class="btn btn-primary btn-sm">
            <i class="fa fa-dot-circle-o"></i> Cập nhật 
        </button>
    </div>
    </form>
</div>
@endsection