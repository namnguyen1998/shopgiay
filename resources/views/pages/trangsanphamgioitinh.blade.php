@extends('trangphu')
@section('content')  
<div class="container">
			<div class="flex-w flex-sb-m p-b-52">

				
				
				<!-- Search product -->
				<div class="dis-none panel-search w-full p-t-10 p-b-15">
					<div class="bor8 dis-flex p-l-15">
						<button class="size-113 flex-c-m fs-16 cl2 hov-cl1 trans-04">
							<i class="zmdi zmdi-search"></i>
						</button>

						<input class="mtext-107 cl2 size-114 plh2 p-r-15" type="text" name="search-product" placeholder="Search">
					</div>	
				</div>

				<!-- Filter -->
				
			</div>

			<div id="pd-list" class="row isotope-grid">
				@foreach($product as $pd)

				<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item {{$pd->id_gioitinh}}">
					<!-- Block2 -->

					<div class="block2">
						<div class="block2-pic hov-img0">
							<a href="{{URL::to('/chitietsanpham/'.$pd->sanpham_id)}}">
                            <img src="{{URL::to('public/frontend/images/'.$pd->hinhsp)}}" alt="IMG-PRODUCT">
                            </a>
						</div>

						<div class="block2-txt flex-w flex-t p-t-14">
							<div class="block2-txt-child1 flex-col-l ">
								<a href="{{URL::to('/chitietsanpham/'.$pd->sanpham_id)}}" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
									{{$pd->tensanpham}}
								</a>

								<span class="stext-105 cl3">
								<span><?php 
									$number = $pd->giatien;
									echo number_format($number, 0, ',', '.') . "₫";
								?></span>

								<!-- Vue.js -->
								<!-- <i18n-n :value="{{$pd->giatien}}" :format="{ key: 'currency', currency: 'VND' }">
									<span  v-slot:currency="slotProps" styles="font-weight: bold">{{$pd->giatien}}</span>
								</i18n-n> -->
								
								<!-- Javascript -->
									<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.0/jquery.min.js"></script>
									<script>
										$(document).ready(function(){
										var number = "{{$pd->giatien}}";
										var giatien = Intl.NumberFormat('de-DE', { style: 'currency', currency: 'VND' }).format(number);										
										// console.log(giatien);
										$('#_giatien').append(giatien);
										
        							});
									</script> -->
								</span>
							</div>

							<div class="block2-txt-child2 flex-r p-t-3">
								<a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
									<img class="icon-heart1 dis-block trans-04" src="{{URL::to('public/frontend/images/icons/icon-heart-01.png')}}" alt="ICON">
									<img class="icon-heart2 dis-block trans-04 ab-t-l" src="{{URL::to('public/frontend/images/icons/icon-heart-02.png')}}" alt="ICON">
								</a>
							</div>
						</div>
					</div>
					<!--End Block2 -->
				</div>
				@endforeach
			</div>
			{!!$product->links()!!}			
		</div>
		@endsection
