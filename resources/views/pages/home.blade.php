@extends('welcome')
@section('content')  
 <!-- Slider -->
 <section class="section-slide">
        <div class="wrap-slick1">
            <div class="slick1">
                @foreach($slide as $sl)
                <div class="item-slick1" style="background-image: url('public/frontend/images/{{$sl->url}}');">
                    <div class="container h-full">
                        <div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">
                            <div class="layer-slick1 animated visible-false" data-appear="fadeInDown" data-delay="0">
                                <span class="ltext-101 cl2 respon2" style="color:whitesmoke">
                                    Jordan Collection 2018
                                <span class="ltext-101 cl13 respon2">
                                    Sneaker Collection 2020
                                </span>
                            </div>
                                
                            <div class="layer-slick1 animated visible-false" data-appear="fadeInUp" data-delay="800">
                                <h2 class="ltext-201 cl2 p-t-19 p-b-43 respon1" style="color:whitesmoke">
                                <h2 class="ltext-201 cl13 p-t-19 p-b-43 respon1">
                                    NEW SEASON
                                </h2>
                            </div>
                                
                            <div class="layer-slick1 animated visible-false" data-appear="zoomIn" data-delay="1600">
                                <a href="{{URL::to('/trangsanpham')}}" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
                                    Shop Now
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
<!-- Banner -->
    <div class="sec-banner bg0 p-t-80 p-b-50">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-xl-4 p-b-30 m-lr-auto">
                    <!-- Block1 -->
                    <div class="block1 wrap-pic-w">
                        <img src="{{'public/frontend/images/banner4.jpg'}}" alt="IMG-BANNER">

                        <a href="{{URL::to('/trangsanphamgioitinh/1')}}" class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
                            <div class="block1-txt-child1 flex-col-l">
                                <span class="block1-name ltext-102 trans-04 p-b-8">
                                    Women
                                </span>

                                <span class="block1-info stext-102 trans-04">
                                    Spring 2018
                                </span>
                            </div>

                            <div class="block1-txt-child2 p-b-4 trans-05">
                                <div class="block1-link stext-101 cl0 trans-09">
                                    Shop Now
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-md-6 col-xl-4 p-b-30 m-lr-auto">
                    <!-- Block1 -->
                    <div class="block1 wrap-pic-w">
                        <img src="{{'public/frontend/images/banner2.jpg'}}" alt="IMG-BANNER">

                        <a href="{{URL::to('/trangsanphamgioitinh/2')}}" class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
                            <div class="block1-txt-child1 flex-col-l">
                                <span class="block1-name ltext-102 trans-04 p-b-8">
                                    Men
                                </span>

                                <span class="block1-info stext-102 trans-04">
                                    Spring 2018
                                </span>
                            </div>

                            <div class="block1-txt-child2 p-b-4 trans-05">
                                <div class="block1-link stext-101 cl0 trans-09">
                                    Shop Now
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-md-6 col-xl-4 p-b-30 m-lr-auto">
                    <!-- Block1 -->
                    <div class="block1 wrap-pic-w">
                        <img src="{{'public/frontend/images/banner3.jpg'}}" alt="IMG-BANNER">

                        <a href="{{URL::to('/trangsanphamgioitinh/3')}}" class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
                            <div class="block1-txt-child1 flex-col-l">
                                <span class="block1-name ltext-102 trans-04 p-b-8">
                                    Both
                                </span>

                                <span class="block1-info stext-102 trans-04">
                                    New Trend
                                </span>
                            </div>

                            <div class="block1-txt-child2 p-b-4 trans-05">
                                <div class="block1-link stext-101 cl0 trans-09">
                                    Shop Now
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Product -->
    <section class="bg0 p-t-23 p-b-140">
        <div class="container">
            <div class="p-b-10">
                <h3 class="ltext-103 cl5">
                    Product Overview
                </h3>
            </div>

            <div class="flex-w flex-sb-m p-b-52">
                <div class="flex-w flex-l-m filter-tope-group m-tb-10">
                    <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 how-active1" data-filter="*">
                        All Products
                    </button>

                    <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".1">
                        Women
                    </button>

                    <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".2">
                        Men
                    </button>

                    <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".3">
                        Both
                    </button>
                </div>

                <div class="flex-w flex-c-m m-tb-10">
                 

                    <div class="flex-c-m stext-106 cl6 size-105 bor4 pointer hov-btn3 trans-04 m-tb-4 js-show-search">
                        <i class="icon-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-search"></i>
                        <i class="icon-close-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
                        Search
                    </div>
                </div>
                
                <!-- Search product -->
                <div class="dis-none panel-search w-full p-t-10 p-b-15">
                    <div class="bor8 dis-flex p-l-15">
                        <button class="size-113 flex-c-m fs-16 cl2 hov-cl1 trans-04">
                            <i class="zmdi zmdi-search"></i>
                        </button>
                        <input class="mtext-107 cl2 size-114 plh2 p-r-15" type="text" id="search" name="keyword_submit" placeholder="Search">

                        <script src="{{asset('public/frontend/vendor/jquery/jquery-3.5.0.min.js')}}"></script>
                        <script> 
                        $(document).ready(function() {
                                $("#search").change(function() {
                                    $.ajax({
                                        url:"{{URL::to('/ajax')}}",
                                        data:$("#search").val(),
                                        type:"GET",
                                        success:function(ds)
                                        {
                                            console.log(ds);
                                    
                                        }

                                        })
                                })
                        })


                            </script>

                    </div>  
                </div>
      
                <script src="{{asset('public/frontend/vendor/jquery/jquery-3.5.0.min.js')}}"></script>
                <script type="text/javascript">
                    $('#search').on('keyup',function(){
                        $value=$(this).val();
                        $.ajax({
                            type:'get',
                            url:"{{URL::to('/ajax')}}",
                            data:{
                                'search':$value
                            },
                            success:function(data){
                                console.log(data);
                                $('#product-list').empty();
                                $('#product-list').html(data);
  
                          
                            }
                        })
                    })
                             $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
                </script>

                <!-- Filter -->
                
            </div>

            <div id="product-list" class="row isotope-grid">
               @foreach($product as $pd)
                <div  class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item {{$pd->id_gioitinh}}">
                    <!-- Block2 -->
                    <div class="block2">
                        <div class="block2-pic hov-img0">
                            <a href="{{URL::to('/chitietsanpham/'.$pd->sanpham_id)}}">
                            <img src="public/frontend/images/{{$pd->hinhsp}}" alt="IMG-PRODUCT">
                            </a>
                        </div>
                        <div id="product-details"></div>
                        <div class="block2-txt flex-w flex-t p-t-14">
                            <div class="block2-txt-child1 flex-col-l ">
                                <a href="{{URL::to('/chitietsanpham/'.$pd->sanpham_id)}}" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                    {{$pd->tensanpham}}
                                </a>

                                <span class="stext-105 cl3">
                                
                                <?php
                                    $giatien = $pd->giatien;
                                    echo number_format($giatien, 0, ',', '.') . "₫";
                                ?></span>
                            </div>

                            <div class="block2-txt-child2 flex-r p-t-3">
                                <a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
                                    <img class="icon-heart1 dis-block trans-04" src="{{'public/frontend/images/icons/icon-heart-01.png'}}" alt="ICON">
                                    <img class="icon-heart2 dis-block trans-04 ab-t-l" src="{{'public/frontend/images/icons/icon-heart-02.png'}}" alt="ICON">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach              
            </div>
            <div class="wrap-modal1 js-modal1 p-t-60 p-b-20">
            </div>
        </div>
    </section>
@endsection
