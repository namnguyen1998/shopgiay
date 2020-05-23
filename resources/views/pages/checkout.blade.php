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
							<form action="#" id="checkout_form" name="frmthongtin" class="checkout_form" method="POST">
                            <div>
									<!-- Name -->
									<label for="checkout_zipcode">Họ tên*</label>
									<input type="text" id="checkout_zipcode" name="sonha" class="checkout_input" required="required">
								</div>
								
								<div>
									<!-- City / Town -->
									<label for="checkout_city">Tỉnh/Thành phố*  </label>
									<select name="checkout_city" id="checkout_city"  class="dropdown_item_select checkout_input" require="required">
										<option>
										
										</option>
									</select>
								</div>
								
								<div>
									 <!-- District --> 
									<label for="checkout_country">Quận/Huyện*</label>
									<select name="checkout_country" id="checkout_country" class="dropdown_item_select checkout_input" require="required">
										<option> 

                                        </option>
										
									</select>
                                </div>


								<div>
									<!-- Province -->
									<label for="checkout_province">Phường/Xã*</label>
									<select name="checkout_province" id="checkout_province" class="dropdown_item_select checkout_input" require="required">
										<option> 

                                        </option>
										
									</select>
                                </div>
								<div>
									<!-- Zipcode -->
									<label for="checkout_zipcode">Số nhà*</label>
									<input type="text" id="checkout_zipcode" name="sonha" class="checkout_input" required="required">
								</div>
								
                                
								<div>
									<!-- Phone no -->
									<label for="checkout_phone">Số điện thoại*</label>
									<input type="phone" id="checkout_phone" name="sdt" class="checkout_input" required="required">
								</div>
								<div>
									<!-- Email -->
									<label for="checkout_email">Email*</label>
									<input type="phone" id="checkout_email" name="email" class="checkout_input" required="required">
                                </div>

                                <!--  -->
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
                                    </div>
                                </div>
							</form>
						</div>
					</div>
				</div>

				<!-- Order Info -->
                <?php
                    $content=Cart::content();
                    // echo '<pre>';
                    // print_r($content);
                    // echo '</pre>';
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
                                        {{number_format($sp2->price, 0, ',', '.') . "₫"}}</br>
                                    @endforeach
                                </div>
                                
							</div>
							<ul class="order_list">
								
								<li class="d-flex flex-row align-items-center justify-content-start">
									<div class="order_list_title">Vận chuyển</div>
									<div id="ship" value="ship" class="order_list_value ml-auto">0₫</div>
								</li>
								<li class="d-flex flex-row align-items-center justify-content-start">
									<div class="order_list_title">Tổng</div>
									<div class="order_list_value ml-auto">₫</div>
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
								<label class="payment_option clearfix">Thanh toán trực tiếp qua ngân hàng
									<input type="radio" checked="checked" name="radio">
									<span class="checkmark"></span>
								</label>
							</div>
                        </div>
                        

						
                        <div  class="button order_button" ><a href="index.php" onclick="return confirm('Bạn đã đặt hàng thành công.')">ĐẶT HÀNG</a></div>
					</div>
				</div>
			</div>
		</div>
	</div>
<script>

    function myFunction() {
        var x;
        x = document.getElementById("phiVanChuyen").value;
        x = Intl.NumberFormat('de-DE', { style: 'currency', currency: 'VND' }).format(x);
        document.getElementById("ship").innerHTML = x;
    }
    function myFunction1() {
        var x;
        x = document.getElementById("phiVanChuyen1").value;
        x = Intl.NumberFormat('de-DE', { style: 'currency', currency: 'VND' }).format(x)
        document.getElementById("ship").innerHTML = x;
    }
    function myFunction2() {
        var x;
        x = document.getElementById("phiVanChuyen2").value;
        x = Intl.NumberFormat('de-DE', { style: 'currency', currency: 'VND' }).format(x)
        document.getElementById("ship").innerHTML = x;
    }

</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.0/jquery.min.js"></script>
<script>
    $(document).ready(function(){
    var number = document.getElementById("phiVanChuyen1").value;
    // var giatien = Intl.NumberFormat('de-DE', { style: 'currency', currency: 'VND' }).format(number);										
    console.log(number);
    // $('#_giatien').append(giatien);
    
});
</script>

@endsection