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
<div class="user-data m-b-30">
    <h3 class="title-3 m-b-30">
        <i class="zmdi zmdi-account-calendar"></i>user data</h3>
    <div class="filters m-b-45">
        <div class="rs-select2--dark rs-select2--md m-r-10 rs-select2--border">
            <select class="js-select2" name="property">
                <option selected="selected">All Properties</option>
                <option value="">Products</option>
                <option value="">Services</option>
            </select>
            <div class="dropDownSelect2"></div>
        </div>
        <div class="rs-select2--dark rs-select2--sm rs-select2--border">
            <select class="js-select2 au-select-dark" name="time">
                <option selected="selected">All Time</option>
                <option value="">By Month</option>
                <option value="">By Day</option>
            </select>
            <div class="dropDownSelect2"></div>
        </div>
    </div>
    <?php
    $mess = Session::get('message');
    if($mess){
        echo "<div><div>".$mess."</div></div>";
        Session::put('message',null);
    }
    ?>
    <div class="table-responsive table-data">
        <table class="table">
            <thead>
                <tr>
                    <td>
                        <label class="au-checkbox">
                            <input type="checkbox">
                            <span class="au-checkmark"></span>
                        </label>
                    </td>
                    <td>Tên</td>
                    <td>Số điện thoại</td>
                    <td>Địa chỉ</td>
                    <td>Chức vụ</td>
                    <td>Quyền Truy cập</td>
                </tr>
            </thead>
           
               
                @foreach($dsuser as $user)
                <tbody>
                    
                <tr>
                    <td>
                        <label class="au-checkbox">
                            <input type="checkbox">
                            <span class="au-checkmark"></span>
                        </label>
                    </td>
                    <td>
                        <div class="table-data__info">
                            <h6>{{$user->ten}}</h6>
                            <span>
                                <a href="#">{{$user->email}}</a>
                            </span>
                        </div>
                    </td>
                    <td>{{$user->sdt}}</td>
                    <td>{{$user->diachi}}</td>
                    <td>
						<?php
						if($user->id_chucvu==1){
						?>
						<span class="role admin">{{$user->tenchucvu}}</span></td>              
						<?php
						}else{
						?>  
						<span class="role user">{{$user->tenchucvu}}</span></td>
						<?php
						}
						?>
                    </td>
                    <td>
                        <div class="rs-select2--trans rs-select2--sm">
                            {{-- <select class="js-select2" name="property">
                               
                                <option selected="selected">Full Control</option>

                                <option value="">Post</option>
                                <option value="">Watch</option>
                            </select> --}}
                            <form action="{{URL::to('sua_admin')}}" >
                                <input type="hidden" value="{{$user->id}}" name="id">
                            <select class="js-select2" name="property">
                               <?php
                                    $quyen = $user->roles;
                                    if($quyen == 0){
                                ?>
                                    <option selected="selected" value="0">Full Control</option>
                                    <option value="1">Post</option>
                                    <option value="-1">Delete</option>
                                    <option value="-2">Edit</option>
                                <?php 
                                    } else if($quyen == 1){
                                ?>
                                        <option value="0">Full Control</option>
                                        <option selected="selected" value="1">Post</option>  
                                        <option value="-1">Delete</option>
                                        <option value="-2">Edit</option>
                                    <?php 
                                        } else if($quyen == -1){
                                    ?>    
                                        <option value="0">Full Control</option>  
                                        <option value="1">Post</option>
                                        <option selected="selected" value="-1">Delete</option>
                                        <option value="-2">Edit</option>
                                        
                                    
                                    <?php 
                                        } 
                                    ?>
                            </select>

                            <div class="dropDownSelect2"></div>
                        </div>
                    </td>
                    <td>
                        <button type="submit">Cập nhật</button>
                    </td>
                    
                </form>
                </tr>
            
            </tbody>
            @endforeach
      
        </table>
    </div>

    <div class="user-data__footer">
        <button class="au-btn au-btn-load">load more</button>
    </div>
</div>
@endsection