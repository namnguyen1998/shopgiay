@extends('admin')
@section('content')
<aside class="menu-sidebar d-none d-lg-block">
<div class="logo">
    <a href="#">
        <img src="{{asset('public/backend/images/icon/logo.png')}}" alt="Cool Admin" />
    </a>
</div>
@include('/admin/menu');
</aside>
<div class="row m-t-30">
    <div class="col-md-12">
        <!-- DATA TABLE-->

        <h3 class="title-5 m-b-35" style="text-align: center">DANH SÁCH ĐƠN HÀNG</h3>
         
        <div class="table-data__tool">
            <div class="table-data__tool-left">
                <div class="rs-select2--light rs-select2--md ">
                    <select id="_trangthai" class="js-select2"  name="property">
                        <option selected="selected">Trạng thái ĐH</option>
                        <option value="1" id ="1">Đang xử lý</option>
                        <option value="2" id ="2">Đang vận chuyển</option>
                        <option value="3" id ="3">Đã giao</option>
                        <option value="4" id ="4">Hủy đơn hàng</option>
                    </select>
                    <div class="dropDownSelect2"></div>
                </div>
                
                <div class="rs-select2--dark rs-select2--md rs-select2--dark2">
                    <select class="js-select2" name="type">
                        <option selected="selected">Xuất hoá đơn</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="table-responsive m-b-40">
            <table class="table table-borderless table-data3">
                <thead>
                    <tr>
                        <th>Ngày đặt</th>
                        <th>Sản phẩm</th>
                        <th>Ghi chú</th>
                        <th>Trạng thái</th>
                        <th>Số lượng</th>
                        <th>Tổng tiền</th>
                        <th>Tên người nhận</th>
                        <th>Địa chỉ</th>
                        <th>SĐT</th>
                    </tr>
                </thead>
                <tbody>
                    <tr id="_show_data_trangthai"></tr>
            </table>
        </div>
        <!-- END DATA TABLE-->
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.0/jquery.min.js"></script>
<script>
    $(document).ready(function(){
            $("#_trangthai").change(function(){
                var c_id = $("#_trangthai").val();
                $.ajax({
                    url: '{{URL::to('/trang-thai-don-hang')}}',
                    method: 'get',
                    data: 'c_id=' + c_id,
                }).done(function(cate_books){
                    console.log(cate_books);
                    cate_books =JSON.parse(cate_books);

                    // làm mới lại 
                    $('#_show_data_trangthai').empty();
                    $.each(cate_books, function(key, value){
                    $('#_show_data_trangthai').append('<td>' + value.ngaydat + '</td>' 
                                                    + '<td>' + value.tensanpham + '</td>' 
                                                    + '<td>' + value.ghichu + '</td>' 
                                                    + '<td>' + value.tentrangthai + '</td>' 
                                                    + '<td>' + value.soluong + '</td>'
                                                    + '<td>' + value.tongtien + '</td>'
                                                    + '<td>' + value.tennguoinhan + '</td>'
                                                    + '<td>' + value.diachi + '</td>'
                                                    + '<td>' + value.sdt + '</td>'
                    )
                    })
                })
            })
        })
</script>
@endsection
<!-- + '<td><div class="table-data-feature"><button class="item" data-toggle="tooltip" data-placement="top" title="More"><a href="{{URL::to('/chi-tiet-don-hang/+value.id_chitietdh+')}}"><i class="zmdi zmdi-more"></i></a></button></div></td>') -->