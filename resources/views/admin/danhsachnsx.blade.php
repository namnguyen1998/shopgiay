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
        <h3 class="title-5 m-b-35" style="text-align: center">DANH SÁCH HÃNG SẢN XUẤT</h3>
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
                                    <a href="{{URL::to('/them-hang-san-xuat')}}">
                                    <i class="zmdi zmdi-plus"></i>add item
                                    </a>
                                </button>
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
                        <th>Tên hãng</th>
                        <th>Logo</th>
                        <th>Số lượng</th>
                        <th>Trạng thái</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($dshang as $hsx)
                    <tr class="tr-shadow">
                        <td>
                            <label class="au-checkbox">
                                <input type="checkbox">
                                <span class="au-checkmark"></span>
                            </label>
                        </td>
                        <td>{{$hsx->id}}</td>
                        <td>
                            {{$hsx->tenhang}}
                        </td>
                        <td><img src="public/frontend/images/{{$hsx->hinh}}" height="100" width="100"></td>
                        <td>{{$data["$hsx->id"]}}</td>
                        <td>
              <?php
               if($hsx->trangthai==1){
                ?>
                <a href="#"><span class="fa-thumb-styling fa fa-thumbs-up" style="font-size:22px"></span></a>
                <?php
                 }else{
                ?>  
                 <a href="#"><span class="fa-thumb-styling fa fa-thumbs-down" style="font-size:22px"></span></a>
                <?php
               }
              ?>
            </td>
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
                                <a href="{{URL::to('/edit-hang-san-xuat/'.$hsx->id)}}">
                                <i class="zmdi zmdi-edit"></i>
                            </button>
                                <?php
                                            } if($value->roles == 0 || $value->roles == -1 ){
                                                ?>
                            <button class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                <a href="{{URL::to('/delete-hang-san-xuat/'.$hsx->id)}}">
                                <i class="zmdi zmdi-delete"></i>
                            </button>
                                                <?php
                                            }
                                        
                                        }
                                    }
                                }
                                 ?>
                                
                               
                               
                                <button class="item" data-toggle="tooltip" data-placement="top" title="More">
                                    <i class="zmdi zmdi-more"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    <tr class="spacer"></tr>
                </tbody>
            </table>
        </div>
        <!-- END DATA TABLE -->
    </div>
</div>
@endsection