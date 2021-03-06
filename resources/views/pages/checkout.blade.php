@extends('trangphu')
@section('content') 

<!-- Checkout -->
<link rel="stylesheet" type="text/css" href="{{asset('public/frontend/styles/bootstrap4/bootstrap.min.css')}}">
<link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="{{asset('public/frontend/styles/checkout.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('public/frontend/styles/checkout_responsive.css')}}">	
<link rel="stylesheet" type="text/css" href="{{asset('public/frontend/styles/cart.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('public/frontend/styles/cart_responsive.css')}}">


<div class="checkout">
		<div class="container">
			<div class="row">

				<!-- Billing Info -->
				<div class="col-lg-6">
					<div class="billing checkout_section">
						<div class="section_title">Thông tin khách hàng</div>
						<div class="section_subtitle">Nhập thông tin </div>
						<div class="checkout_form_container">

						
							<form action="{{URL::to('/saveInvoice')}}" id="checkout_form" name="frmthongtin" class="checkout_form" method="GET">
							@csrf
                            <div>
									<!-- Name -->
									<label for="checkout_zipcode">Họ tên*</label>
									<input type="text" id="name" name="name" class="checkout_input" required="required">
									<!-- @if($errors->has('name'))
									<p style="position:absolute;font-size: 12px;color: red;margin-left:150px;margin-top:-10%;}">{!!$errors->first('name')!!}</p>
                					@endif -->
								</div>
								
								<div>
									<!-- City / Town -->
									<label  for="checkout_city">Tỉnh/Thành phố*  </label>
									<select  name="_checkout_city" id="checkout_city"  class="dropdown_item_select checkout_input" require="required" onChange="F2(this.value)">
										<option>Chọn Tỉnh/Thành phố</option>
									</select>
									<!-- @if($errors->has('city'))
									<p style="position:absolute;font-size: 12px;color: red;margin-left:150px;margin-top:-10%;}">{!!$errors->first('city')!!}</p>
                					@endif -->
								</div>
								
								<div>
									 <!-- District --> 
									<label for="checkout_country">Quận/Huyện*</label>
									<select name="_checkout_district" id="checkout_district" class="dropdown_item_select checkout_input" require="required" onChange="F3(this.value)" >
										<option>Chọn Quận/Huyện</option>
										
									</select>
									<!-- @if($errors->has('district'))
									<p style="position:absolute;font-size: 12px;color: red;margin-left:150px;margin-top:-10%;}">{!!$errors->first('district')!!}</p>
                					@endif -->
                                </div>


								<div>
									<!-- Province -->
									<label for="checkout_province">Phường/Xã*</label>
									<select name="_checkout_word" id="checkout_word" class="dropdown_item_select checkout_input" require="required">
										<option>Chọn Phường/Xã</option>
										
									</select>
									<!-- @if($errors->has('ward'))
									<p style="position:absolute;font-size: 12px;color: red;margin-left:150px;margin-top:-10%;}">{!!$errors->first('ward')!!}</p>
                					@endif -->
                                </div>
								<div>
									<!-- Zipcode -->
									<label for="checkout_zipcode">Số nhà*</label>
									<input type="text" id="no" name="no" class="checkout_input" required="required">
									<!-- @if($errors->has('no'))
									<p style="position:absolute;font-size: 12px;color: red;margin-left:150px;margin-top:-10%;}">{!!$errors->first('no')!!}</p>
                					@endif -->
								</div>
								
                                
								<div>
									<!-- Phone no -->
									<label for="checkout_phone">Số điện thoại*</label>
									<input type="phone" id="phone" name="phone" class="checkout_input" required="required">
									<!-- @if($errors->has('phone'))
									<p style="position:absolute;font-size: 12px;color: red;margin-left:150px;margin-top:-10%;}">{!!$errors->first('phone')!!}</p>
                					@endif -->
								</div>
								<div>
									<!-- Email -->
									<label for="checkout_email">Email*</label>
									<input type="email" id="email" name="email" class="checkout_input" required="required">
									<!-- @if($errors->has('email'))
									<p style="position:absolute;font-size: 12px;color: red;margin-left:150px;margin-top:-10%;}">{!!$errors->first('email')!!}</p>
                					@endif -->
                                </div>

                                <!-- Ship -->
                                <div class="delivery">
                                    <div class="section_title">Hình thức vận chuyển</div>
                                    <div class="section_subtitle">Chọn hình thức</div>
                                    <div class="delivery_options">
                                        <label class="delivery_option clearfix">Giao hàng nhanh
                                            <input id="phiVanChuyen" type="radio" name="radio" value="50000" onclick="myFunction()">
                                            <span class="checkmark"></span>
                                            <span class="delivery_price">50.000₫</span>
                                        </label>
                                        <label class="delivery_option clearfix">Giao hàng tiêu chuẩn
                                            <input id="phiVanChuyen1" type="radio" name="radio" value="22000" onclick="myFunction1()">
                                            <span class="checkmark"></span>
                                            <span class="delivery_price">22.000₫</span>
                                        </label>
                                        <label class="delivery_option clearfix">Giao hàng tiết kiệm
                                            <input id="phiVanChuyen2" type="radio" checked="checked" name="radio" value="0" onclick="myFunction2()">
                                            <span class="checkmark"></span>
                                            <span class="delivery_price">0₫</span>
										</label>
										<!-- @if($errors->has('ship'))
										<p style="position:absolute;font-size: 12px;color: red;margin-left:150px;margin-top:-10%;}">{!!$errors->first('ship')!!}</p>
										@endif -->
                                    </div>
								</div>
								
							</form>
						</div>
					</div>
				</div>

				<!-- Order Info -->
                <?php
                    $content=Cart::content();
                   
                ?>
				<div class="col-lg-6">
					<div class="order checkout_section">
						<div class="section_title">Đơn đặt hàng của bạn</div>
						<div class="section_subtitle">Chi tiết đơn hàng</div>

						<!-- Order details -->
						<div class="order_list_container">
							<div class="order_list_bar d-flex flex-row align-items-center justify-content-start">
								<div class="order_list_title">Sản phẩm 
                                    </br>
									@foreach($content as $sp1)
                                        {{$sp1->name}}</br>
                                    @endforeach
                                </div>

								<div class="order_list_value ml-auto">Thành tiền
                                    </br>
                                    @foreach($content as $sp2)
										<?php
											$tong=$sp2->price*$sp2->qty;
											echo number_format($tong, 0, ',', '.') . "₫";
										?></br>
                                    @endforeach
                                </div>
                                
							</div>
							<ul class="order_list">
								
								<li id="aaa" value="aaa" class="d-flex flex-row align-items-center justify-content-start">
									<div class="order_list_title">Vận chuyển</div>
									<div id="ship" value="0" class="order_list_value ml-auto">0₫</div>
								</li>
								<li id="content_total" value="{{Cart::subtotal(0,'.','')}}" class="d-flex flex-row align-items-center justify-content-start">
									<div  class="order_list_title">Tổng</div>
									<div id="total" class="order_list_value ml-auto">{{Cart::subtotal(0,',','.')}}₫</div>
								</li>
							</ul>
						</div>

						<!-- Payment Options -->
						<div class="payment">
							<div class="payment_options">
                            <div class="section_subtitle">Chọn hình thức thanh toán</div>
                            <br>
								<label class="payment_option clearfix">Thanh toán bằng ví điện tử
									<input type="radio" name="radio">
									<span class="checkmark"></span>
								</label>
								<label class="payment_option clearfix">Thanh toán khi nhận hàng
									<input type="radio" name="radio">
									<span class="checkmark"></span>
								</label>
								<label class="payment_option clearfix">Thanh toán bằng thẻ tín dụng
									<input type="radio" name="radio">
									<span class="checkmark"></span>
								</label>
								<label id="checkmark" class="payment_option clearfix">Thanh toán trực tiếp qua ngân hàng
									<input type="radio" checked="checked" name="radio">
									<span class="checkmark"></span>
								</label>
							</div>

						</div>
						             
                        <div id="saveInvoice"  class="button order_button" ><a href="{{URL::to('/saveInvoice')}}" onclick="return confirm('Bạn chắc chắn muốn đặt hàng?')">ĐẶT HÀNG</a></div>


					</div>
				</div>
			</div>
		</div>
	</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.0/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="{{asset('public/frontend/styles/jquery-3.5.0.min.js')}}">
<script src="https://momentjs.com/downloads/moment.min.js"></script>
<script>

    function myFunction() {
        var ship, total, convert, subtotal;
        ship = document.getElementById("phiVanChuyen").value;
		
		total = document.getElementById("content_total").value;
		convert  = parseInt(ship) + parseInt(total)
		document.getElementById("aaa").value = convert;
		ship = Intl.NumberFormat('de-DE', { style: 'currency', currency: 'VND' }).format(ship);
        subtotal = Intl.NumberFormat('de-DE', { style: 'currency', currency: 'VND' }).format(convert);
        document.getElementById("ship").innerHTML = ship;
		document.getElementById("total").innerHTML = subtotal;
		
    }

    function myFunction1() {
        var ship, total, convert, subtotal;
        ship = document.getElementById("phiVanChuyen1").value;
		total = document.getElementById("content_total").value;
		convert  = parseInt(ship) + parseInt(total)
		document.getElementById("aaa").value = convert;
		ship = Intl.NumberFormat('de-DE', { style: 'currency', currency: 'VND' }).format(ship);
        subtotal = Intl.NumberFormat('de-DE', { style: 'currency', currency: 'VND' }).format(convert);
        document.getElementById("ship").innerHTML = ship;
		document.getElementById("total").innerHTML = subtotal;
    }

    function myFunction2() {
        var ship, total, convert, subtotal;
        ship = document.getElementById("phiVanChuyen2").value;
		total = document.getElementById("content_total").value;
		convert  = parseInt(ship) + parseInt(total)
		document.getElementById("aaa").value = convert;
		ship = Intl.NumberFormat('de-DE', { style: 'currency', currency: 'VND' }).format(ship);
        subtotal = Intl.NumberFormat('de-DE', { style: 'currency', currency: 'VND' }).format(convert);
        document.getElementById("ship").innerHTML = ship;
		document.getElementById("total").innerHTML = subtotal;
    }

	$(document).ready(function(){
		$("#checkout_city").click(function(){
		$.ajax({
			url:'app/Http/Controllers/GetCity.php',
			type:'json',
			success:function(GetCity)
			{
				GetCity= JSON.parse(GetCity);
				listItem = GetCity.LtsItem;
				$.each(listItem, function(key, value){
					City= "<option value='" + value.ID + "'>" + value.Title + "</option>";
					$("#checkout_city").append(City);

				});
			}
			})
		})
	})
	
	function F2(checkout_district){
		$("#checkout_district").html('');
		$.ajax({
		url:'app/Http/Controllers/GetDistrict.php?ID='+checkout_district,
		type:'json',
		success:function(GetDistrict)
		{
			
			GetDistrict	= JSON.parse(GetDistrict);
			$.each(GetDistrict, function(key,value){
				District= "<option value='" + value.ID + "'>" + value.Title + "</option>";
				$("#checkout_district").append(District);
				
			});
		}
		})
	}

	function F3(checkout_province){
		$("#checkout_word").html('');
		$.ajax({
		url:'app/Http/Controllers/GetWard.php?ID='+checkout_province,
		type:'json',
		success:function(GetWard)
		{
			GetWard= JSON.parse(GetWard);
			$.each(GetWard, function(key, value){
				Ward= "<option value='" + value.ID + "'>" + value.Title + "</option>";
				$("#checkout_word").append(Ward);
				
			});
		}
		})
	}
	

	// $(document).ready(function(){
	// 	$("#name").keyup(function(){
		
	// 		subtotal = document.getElementById("name").value;

	// 		// Ship
	// 		$.ajax({
	// 			url: '{{URL::to('/saveInvoice')}}',
	// 			method: 'get',
	// 			data:{
	// 					'name':name,
						

	// 				}
    //         	})	
	// 	})
	// })
	
	// $(document).ready(function(){
	// 	$("#phone").keyup(function(){
		
	// 		subtotal = document.getElementById("phone").value;

	// 		// Ship
	// 		$.ajax({
	// 			url: '{{URL::to('/saveInvoice')}}',
	// 			method: 'get',
	// 			data:{
	// 					'phone':phone,
						

	// 				}
    //         	})	
	// 	})
	// })


	$(document).ready(function(){
		$("#saveInvoice").click(function(){
		
			subtotal = document.getElementById("aaa").value;
			city = document.getElementById("checkout_city").value;
			district = document.getElementById("checkout_district").value;
			ward = document.getElementById("checkout_word").value;

			// Ship
			$.ajax({
				url: '{{URL::to('/saveInvoice')}}',
				method: 'get',
				data:{
						'subtotal':subtotal,
						'city': city,
						'district': district,
						'ward': ward,

					}
            	}).done(function(don_hang){
                    console.log(don_hang);
                    
            	})
				
		})
	})

</script>


@endsection