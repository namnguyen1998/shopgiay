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
<div class="row">
    <div class="col-md-12">
        <!-- DATA TABLE -->
        <h3 class="title-5 m-b-35">DANH SÁCH LOẠI SẢN PHẨM</h3>
        <?php
        $message = Session::get('message');
        if($message){
            echo'<span class = "text-alert ">'.$message.'</span>';
            Session::put('message',null);
        }
      ?>
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
                                <a href="{{URL::to('/them-loai-san-pham')}}">
                                <i class="zmdi zmdi-plus"></i>add item</button></a>
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
                        <th>Tên loại</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($danhsachloaisp as $lsp)
                    <tr class="tr-shadow">
                        <td>
                            <label class="au-checkbox">
                                <input type="checkbox">
                                <span class="au-checkmark"></span>
                            </label>
                        </td>
                        <td>{{$lsp->id}}</td>
                        </td>
                        <td class="desc">{{$lsp->tenloai}}</td>
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
                                <a href="{{URL::to('/edit-loai-san-pham/'.$lsp->id)}}"><i class="zmdi zmdi-edit"></i></a>
                                </button>
                                <?php
                                            } if($value->roles == 0 || $value->roles == -1 ){
                                                ?>
                            <button class="item" data-toggle="tooltip" data-placement="top" title="Delete" onclick="return confirm('Bạn có chắc muốn XOÁ sản phẩm này?')">
                                <a href="{{URL::to('/delete-loai-san-pham/'.$lsp->id)}}">
                                    <i class="zmdi zmdi-delete"></i></a>
                                </button>
                                                <?php
                                            }
                                        
                                        }
                                    }
                                }
                                 ?>




                               
                               
                                <!-- <script>
                                    function ConfirmDelete()
                                        {
                                        // var x = confirm("Are you sure you want to delete?");
                                            if(confirm("Do you want Delete!")==false){
                                                console.log("NO");
                                                return true;
                                            }return  window.location;
                                        }
                                </script> -->
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
</div>
@endsection