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
<div class="col-md-12">
    <!-- DATA TABLE -->
    <h3 class="title-5 m-b-35" style="text-align: center">DANH SÁCH SẢN PHẨM</h3>
    <div class="table-data__tool">
        <div class="table-data__tool-left">
            <div class="rs-select2--light rs-select2--md">
                <select class="js-select2" name="property">
                    <option selected="selected">All Properties</option>
                    <option value="">Option 1</option>
                    <option value="">Option 2</option>
                </select>
                <div class="dropDownSelect2"></div>
            </div>
            <div class="rs-select2--light rs-select2--sm">
                <select class="js-select2" name="time">
                    <option selected="selected">Today</option>
                    <option value="">3 Days</option>
                    <option value="">1 Week</option>
                </select>
                <div class="dropDownSelect2"></div>
            </div>
            <button class="au-btn-filter">
                <i class="zmdi zmdi-filter-list"></i>filters</button>
        </div>
        <?php
            $mess = Session::get('success');
            if($mess){
                echo $mess;
                Session::put('success',null);
            }

        ?>

        <div class="table-data__tool-right">

            <?php
            $id_nhanvien = Session::get('id');
            if($dsuser){
                foreach ($dsuser as $key => $value) {
                    if($value->id == $id_nhanvien){
                        //echo $value->roles;
                        if ($value->roles == 0 || $value->roles == 1 ) {
        ?>
                           <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                            <a href="{{URL::to('/add-product')}}">
                            <i class="zmdi zmdi-plus"></i>add item</button>
                        </a>
        <?php
                    } 
                
                }
            }
        }
            ?>
            
            <div class="rs-select2--dark rs-select2--sm rs-select2--dark2">
                <select class="js-select2" name="type">
                    <option selected="selected">Export</option>
                    <option value="">Option 1</option>
                    <option value="">Option 2</option>
                </select>
                <div class="dropDownSelect2"></div>
            </div>
        </div>

    </div>
    <div class="table-responsive table-responsive-data2">
        <table class="table table-data2">
            <thead>
                <tr>
                    <th>
                        <label class="au-checkbox">
                            <input type="checkbox">
                            <span class="au-checkmark"></span>
                        </label>
                    </th>
                    <th>ID</th>
                    <th>Tên sản phẩm</th>
                    <th>Hình ảnh</th>
                    <th>Mô tả</th>
                    <th>Giá tiền</th>
                    <th>Giá khuyến mãi</th>
                    <th>Loại sản phẩm</th>
                    <th>Hãng giày</th>
                    <th></th>
                </tr>
            </thead>
              @foreach($dssanpham as $sanpham)
            <tbody>
                <tr class="tr-shadow">
                    <td>
                        <label class="au-checkbox">
                            <input type="checkbox">
                            <span class="au-checkmark"></span>
                        </label>
                    </td>
                    <td>{{$sanpham->sanpham_id}}</td>
                    <td>
                        <span class="block-email">{{$sanpham->tensanpham}}</span>
                    </td>
                    <td><img src="public/frontend/images/{{$sanpham->hinhsp}}" height="100" width="100"></td>
                    
                    <td>{{$sanpham->mota}}</td>
                    <td><?php
                            $giatien = $sanpham->giatien;
                            echo number_format($giatien, 0, ',', '.') . "₫";
                        ?></td>
                    <td>
                        <span class="status--process">{{$sanpham->giakm}}</span>
                    </td>
                    <td>{{$sanpham->tenloai}}</td>
                    <td>{{$sanpham->tenhang}}</td>
                    <td>
                        <div class="table-data-feature">
                            <?php
                            $id_nhanvien = Session::get('id');
                            if($dsuser){
                                foreach ($dsuser as $key => $value) {
                                    if($value->id == $id_nhanvien){
                                        //echo $value->roles;
                                        if ($value->roles == 0 || $value->roles == -2 ) {
                                            ?>
                            <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                <a href="{{URL::to('/edit-product/' .$sanpham->sanpham_id)}}">
                                <i class="zmdi zmdi-edit"></i>
                            </button>
                            <?php
                                        } if($value->roles == 0 || $value->roles == -1 ){
                                            ?>
                        <button class="item " data-toggle="tooltip" data-placement="top"  title="Delete" onclick="return confirm('Bạn có chắc muốn XOÁ sản phẩm này?')" >
                            <a href="{{URL::to('/delete-product/' .$sanpham->sanpham_id)}}">
                            <i class="zmdi zmdi-delete"></i>
                        </button>
                                            <?php
                                        }
                                    
                                    }
                                }
                            }
                             ?>



                         
                           
                        </div>
                    </td>
                </tr>
                <tr class="spacer"></tr>
            </tbody>
            @endforeach
        </table>
    </div>
    <!-- END DATA TABLE -->
</div>
@endsection