
<div class="wrap-header-cart js-panel-cart">
<?php
			$content=Cart::content();
			// echo '<pre>';
			// print_r($content);
			// echo '</pre>';
			?>
    <div class="s-full js-hide-cart"></div>

    <div class="header-cart flex-col-l p-l-65 p-r-25">
        <div class="header-cart-title flex-w flex-sb-m p-b-8">
            <span class="mtext-103 cl2">
                Your Cart
            </span>

            <div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-cart">
                <i class="zmdi zmdi-close"></i>
            </div>
        </div>

        <div class="header-cart-content flex-w js-pscroll">
            <ul class="header-cart-wrapitem w-full">
            @foreach($content as $v)
                <li class="header-cart-item flex-w flex-t m-b-12">
                    <a href="{{URL::to('/delete-to-cart'.$v->rowId)}}"></a><div class="header-cart-item-img">
                        <img src="{{URL::to('public/frontend/images/'.$v->options->image)}}" alt="IMG">
                    </div></a>

                    <div class="header-cart-item-txt p-t-8">
                        <a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
                        {{$v->name}}
                        </a>

                        <span class="header-cart-item-info">
                        {{number_format($v->price, 0, ',', '.') . "₫"}}    
                        </span>
                        <span class="header-cart-item-info">
                        Số lượng: {{$v->qty}}
                        </span>
                    </div>
                </li>
            @endforeach
            </ul>

            <div class="w-full">
                <div class="header-cart-total w-full p-tb-40">
                {{Cart::subtotal(0,',','.') . "₫"}}
                </div>

                <div class="header-cart-buttons flex-w w-full">
                    <a href="{{URL::to('/show_cart')}}" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-r-8 m-b-10">
                        View Cart
                    </a>

                    <a href="shoping-cart.html" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-b-10">
                        Check Out
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
