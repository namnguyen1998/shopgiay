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
        <div class="table-responsive m-b-40">
            <table class="table table-borderless table-data3">
                <thead>
                    <tr>
                        <th>Ngày đặt</th>
                        <th>Tên người nhận</th>
                        <th>SDT</th>
                        <th>Địa chỉ</th>
                        <th>Sản phẩm</th>
                        <th>Số lượng</th>
                        <th>Tổng tiền</th>
                        <th>Phương thức thanh toán</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($donhang as $dh)
                    <tr>
                        <td><?php 
                            $date = date_create($dh->ngaydat);
                            echo date_format($date,"d-m-Y ");
                        ?></td>

                        <td>{{$dh->tennguoinhan}}</td>
                        <td>{{$dh->sdt}}</td>
                        <td>{{$dh->diachi}}</td>
                        <td>{{$dh->tensanpham}}</td>
                        <td class="denied">{{$dh->soluong}}</td>
                        <td class="process"><?php
                            $tongtien = $dh->tongtien;
                            echo number_format($tongtien, 0, ',', '.') . "₫";
                        ?></td>
                        <td>{{$dh->tenpttt}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- END DATA TABLE-->
    </div>
</div>
@endsection