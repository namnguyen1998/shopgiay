<header>
        <!-- Header desktop -->
        <div class="container-menu-desktop">
            <!-- Topbar -->
            

            <div class="wrap-menu-desktop">
                <nav class="limiter-menu-desktop container">
                    
                    <!-- Logo desktop -->       
                    <a href="{{URL::to('/')}}" class="logo">
                        <img src="{{'public/frontend/images/icons/logo-02.png'}}" alt="IMG-LOGO">
                    </a>

                    <!-- Menu desktop -->
                    <div class="menu-desktop">
                        <ul class="main-menu">
                            <li class="active-menu">
                                <a href="{{URL::to('/')}}">Home</a>
                            </li>

                            <li>
                                <a href="{{URL::to('/trangsanpham')}}">Shop</a>
                            </li>

                            

                            </li>
                                <li>
                                <a href="{{URL::to('/thanhvientrongnhom')}}">Các Thành Viên Nhóm</a>
                            </li>

                        </ul>
                    </div> 
                     

                    <!-- Icon header -->
                    <div class="wrap-icon-header flex-w flex-r-m">
                        <div class="icon-header-item cl13 hov-cl1 trans-04 p-l-22 p-r-11 js-show-modal-search">
                            <i class="zmdi zmdi-search"></i>
                        </div>
                        
                        <div class="icon-header-item cl13 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti js-show-cart" data-notify="<?php  $i = 0;
																																		foreach(Cart::content() as $_count)
																																			$i ++;
																																		$count = $i; echo $count?>">
                            <i class="zmdi zmdi-shopping-cart"></i>
                        </div>
                        
                        <a href="#" class="dis-block icon-header-item cl13 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti" data-notify="0">
                            <i class="zmdi zmdi-favorite-outline"></i>
                        </a>
                        <div class="icon-header-item cl13 hov-cl1 trans-04 p-l-22 p-r-11" id="js-show-login">
                            <i class="zmdi  zmdi-account-circle "></i>
                        </div>
                            <div class="account-wrap">
                                <div class="account-item clearfix js-item-menu">
                                   
                                    <div class="content">
                                        <a class="js-acc-btn" href="#">{{Session::get('name')}}</a>
                                    </div>
                                    <div class="account-dropdown js-dropdown">
                                        <div class="account-dropdown__footer">
                                            @if(Session::get('name'))
                                            <a href="{{URL::to('/user-logout')}}">
                                                <i class="zmdi zmdi-power"></i>Logout</a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </nav>
                <div id="login"></div>
            </div>
        </div>
        

        <!-- Header Mobile -->
        <div class="wrap-header-mobile">
            <!-- Logo moblie -->        
            <div class="logo-mobile">
                <a href="{{URL::to('/')}}"><img src="{{'public/frontend/images/icons/logo-01.png'}}" alt="IMG-LOGO"></a>
            </div>

            <!-- Icon header -->
            <div class="wrap-icon-header flex-w flex-r-m m-r-15">
                <div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 js-show-modal-search">
                    <i class="zmdi zmdi-search"></i>
                </div>

                <div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti js-show-cart" data-notify="<?php  $i = 0;
																																		foreach(Cart::content() as $_count)
																																			$i ++;
																																		$count = $i; echo $count?>">
                    <i class="zmdi zmdi-shopping-cart"></i>
                </div>

                <a href="#" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti" data-notify="0">
                    <i class="zmdi zmdi-favorite-outline"></i>
                </a>
            </div>

            <!-- Button show menu -->
            <div class="btn-show-menu-mobile hamburger hamburger--squeeze">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </div>
        </div>


        <!-- Menu Mobile -->
        <div class="menu-mobile">

            <ul class="main-menu-m">
                <li>
                    <a href="{{URL::to('/')}}">Home</a>
                    <span class="arrow-main-menu-m">
                        <i class="fa fa-angle-right" aria-hidden="true"></i>
                    </span>
                </li>

                <li>
                    <a href="{{URL::to('/trangsanpham')}}">Shop</a>
                </li>

                <li>
                    <a href="{{URL::to('/login')}}">Login</a>
                </li>
                 <li>
                    <a href="{{URL::to('/thanhvientrongnhom')}}">Các Thành Viên Nhóm</a>
                </li>
            </ul>
        </div>

        <!-- Modal Search -->
        <div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
            <div class="container-search-header">
                <button class="flex-c-m btn-hide-modal-search trans-04 js-hide-modal-search">
                    <img src="{{asset('public/frontend/images/icons/icon-close2.png')}}" alt="CLOSE">
                </button>

                <form class="wrap-search-header flex-w p-l-15"  action="{{URL::to('/timkiem')}}" method="post">
                    {{csrf_field()}}
                    <button class="flex-c-m trans-04">
                        <i class="zmdi zmdi-search"></i>
                    </button>
                    <input class="plh3" type="text" name="keyword_submit" placeholder="Search...">
                </form>
            </div>
        </div>
    </header>