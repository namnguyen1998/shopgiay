@extends('trangphu')
@section('content')  
	<!-- breadcrumb -->
	<div class="container">
		<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
			<a href="{{URL::to('/')}}" class="stext-109 cl8 hov-cl1 trans-04">
				Trang Chủ
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>

			<span class="stext-109 cl4">
				Giỏ hàng của bạn
			</span>
		</div>
	</div>
		

	<!-- Shoping Cart -->
	<form class="bg0 p-t-75 p-b-85">
		<div class="container">
			<?php
			$content=Cart::content();
			// echo '<pre>';
			// print_r($content);
			// echo '</pre>';
			?>
			<div class="row">
				<div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
					<div class="m-l-25 m-r--38 m-lr-0-xl">
						<div class="wrap-table-shopping-cart">
							<table class="table-shopping-cart">
								<tr class="table_head">
									<th class="column-1">Hình ảnh</th>
									<th class="column-2">Tên sản phẩm</th>
									<th class="column-3">Giá tiền</th>
									<th class="column-4">Số lượng</th>
									<th class="column-5">Tổng</th>
								</tr>
							@foreach($content as $v)
								<tr class="table_row">
									<td class="column-1">
										<a href="{{URL::to('/delete-to-cart'.$v->rowId)}}"><div class="how-itemcart1">
											<img src="{{URL::to('public/frontend/images/'.$v->options->image)}}" 
											width="200"alt="IMG">
										</div></a>
									</td>
									<td class="column-2">{{$v->name}}</td>
									<td class="column-3">{{number_format($v->price, 0, ',', '.') . "₫"}}</td>
									<td class="column-4">
										<form action="{{URL::to('/update-cart-quantity')}}" method="post">
											@csrf
										<div class="wrap-num-product flex-w m-l-auto m-r-0">
											<input type="submit" class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m" name="update_qty">
												
											<input type="hidden" name="rowID_cart" value="{{($v->rowId)}}">
											<input class="mtext-104 cl3 txt-center num-product" type="number" name="num_product1" value="{{$v->qty}}">

											
											
											<div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
												<i class="fs-16 zmdi zmdi-plus"></i>
												
											</div>
										</div>
										</form>
									</td>
									<td class="column-5">
										<?php
											$tong=$v->price*$v->qty;
											echo number_format($tong, 0, ',', '.') . "₫";
										?>
									</td>
								</tr>
							@endforeach

							
							</table>
						</div>

					</div>
				</div>

				<div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
					<div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
						<h4 class="mtext-109 cl2 p-b-30">
							Tổng Giỏ Hàng
						</h4>

						<div class="flex-w flex-t bor12 p-b-13">
							<div class="size-208">
								<span class="stext-110 cl2">
									Thành tiền:
								</span>
							</div>

							<div class="size-209">
								<span class="mtext-110 cl2">
								{{Cart::subtotal(0,',','.') . "₫"}}
								</span>
							</div>
						</div>

						
						<button class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer"><a style="color:white;" href="{{URL::to('/checkout')}}">
							Tiến hành đặt hàng
							</a>
						</button>
					</div>
				</div>
			</div>
		</div>
	</form>


@endsection