@extends('layout')
@section('content')

<main id="main" class="main-site">
    
<div class="container">
    <div class="wrap-breadcrumb">
        <ul>
            <li class="item-link"><a href="{{URL::to('/Home')}}" class="link">Home</a></li>
            <li class="item-link"><span>Payment</span></li>
        </ul>
    </div>
    <div class=" main-content-area">
    @if(Session::get('cart') == true)
        <div class="wrap-iten-in-cart">
           <!--  @if(session()->has('message'))
                <div class="alert alert-success">
                    <p style="font-size:15px; text-align:center;">{{session()->get('message')}}</p>
                </div>
            @elseif(session()->has('error'))
                <div class="alert alert-danger">
                    <p style="font-size:15px; text-align:center;"> {{session()->get('error')}}</p>
                </div>
            @endif -->
            <h3 class="box-title">Giỏ hàng của bạn</h3>
            
                <?php $total = 0; ?>
                @foreach(Session::get('cart') as $key => $cart)       
                <?php 
                    $subtotal = $cart['product_qty'] * $cart['product_price'];
                    $total += $subtotal;
                ?>
                <ul class="products-cart">
                    <li class="pr-cart-item">
                        <div class="product-image">
                            <figure><img src="{{ asset('public/uploads/product/'.$cart['product_image'])}}" alt="{{$cart['product_name']}}"></figure>
                        </div>
                        <div class="product-name">
                            <a class="link-to-product" href="{{ URL::to('/detail-product/'.$cart['product_id'])}}">{{$cart['product_name']}}</a>
                        </div>
                        <div class="price-field produtc-price"><p class="price">{{number_format($cart['product_price']).' '.'VNĐ'}}</p></div>
                        <div class="quantity">
                            <div class="quantity-input">
                                <input type="text" name="cart_quatity[{{$cart['session_id']}}]" value="{{$cart['product_qty']}}" data-max="120" pattern="[0-9]*" >									
                                <a class="btn btn-increase" href="#"></a>
                                <a class="btn btn-reduce" href="#"></a>                         
                            </div>
                        </div>
                    
                        <div class="price-field sub-total"><p class="price">{{number_format($subtotal).' '.'VNĐ'}}</p></div>
                        <div class="delete">
                            <a href="{{url('/delete-cart-ajax/'.$cart['session_id'])}}" class="btn" title="">
                                <i class="fa fa-times-circle"></i>
                            </a>
                        </div>
                    </li>
                                                                
                </ul>
                @endforeach        
        </div>
    @else
        <div class="alert alert-danger" role="alert"><p style="font-size:18px; text-align:center;">Không có sản phẩm nào trong giỏ hàng của bạn</p></div>
    @endif
        <div class="wrap-address-billing">
        <h3>Thanh toán giỏ hàng</h3>
        
        </div>
        <div class="summary summary-checkout">
        <?php $total = 0; ?>
        @if(Session::get('cart') == true)
                @foreach(Session::get('cart') as $key => $cart)       
                <?php 
                    $subtotal = $cart['product_qty'] * $cart['product_price'];
                    $total += $subtotal;
                ?>
                @endforeach
        @else
           
        @endif
        <form action="{{URL::to('/order-place')}}" method="POST">
            <div class="summary-item payment-method">
                {{ csrf_field() }}
                <h4 class="title-box">Hình thức thanh toán</h4>
                <div class="choose-payment-methods">
                    <label class="payment-method">
                        <input name="payment_option" id="payment-method-bank" value="1" type="radio" onclick="reset_msg();" required>
                        <span>Thanh toán bằng thẻ tín dụng (ATM)</span>
                        <span class="payment-desc">Hình thức thanh toán áp dụng cho tất cả các ngân hàng được liên kết</span>
                        <div class="invalid-feedback"></div>
                    </label>
                    <label class="payment-method">
                        <input name="payment_option" id="payment-method-visa" value="2" type="radio" onclick="reset_msg();" required>
                        <span>Thanh toán bằng thẻ Visa</span>
                        <span class="payment-desc">Hình thức thanh toán chỉ áp dụng khi bạn sở hữu thẻ Visa</span>
                        <div class="invalid-feedback"></div>
                    </label>
                    <label class="payment-method">
                        <input name="payment_option" id="payment-method-paypal" value="3" type="radio" onclick="reset_msg();" required>
                        <span>Thanh toán khi nhận hàng</span>
                        <span class="payment-desc">Bạn có thể kiểm tra hàng trước khi trả tiền</span>
                        <div class="invalid-feedback"></div>
                    </label> 
                    <div id="msg"></div>                
                </div>
                <p class="summary-info grand-total"><span>Tổng Hóa đơn:</span> <span class="grand-total-price">{{number_format($total).' '.'VNĐ'}}</span></p>
                <input type="submit" name="order_place" class="btn btn-medium" value="Tiến hàng đặt hàng" onclick="return send();">
            </div>
        </form>
            <div class="summary-item shipping-method">
                <h4 class="title-box">Mã giảm giá</h4>
                <p class="row-in-form">
                    <label for="coupon-code">Nhập vào mã giảm giá của bạn:</label>
                    <input id="coupon-code" type="text" name="coupon-code" value="" placeholder="">	
                </p>
                <input type="submit" name="coupon_order_place" class="btn btn-small" value="Áp dụng">
            </div>
        </div>

        <div class="wrap-show-advance-info-box style-1 box-in-site">
            <h3 class="title-box">Most Viewed Products</h3>
            <div class="wrap-products">
                <div class="products slide-carousel owl-carousel style-nav-1 equal-container" data-items="5" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"3"},"1200":{"items":"5"}}' >

                    <div class="product product-style-2 equal-elem ">
                        <div class="product-thumnail">
                            <a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                <figure><img src="assets/images/products/digital_04.jpg" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                            </a>
                            <div class="group-flash">
                                <span class="flash-item new-label">new</span>
                            </div>
                            <div class="wrap-btn">
                                <a href="#" class="function-link">quick view</a>
                            </div>
                        </div>
                        <div class="product-info">
                            <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
                            <div class="wrap-price"><span class="product-price">$250.00</span></div>
                        </div>
                    </div>

                    <div class="product product-style-2 equal-elem ">
                        <div class="product-thumnail">
                            <a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                <figure><img src="assets/images/products/digital_17.jpg" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                            </a>
                            <div class="group-flash">
                                <span class="flash-item sale-label">sale</span>
                            </div>
                            <div class="wrap-btn">
                                <a href="#" class="function-link">quick view</a>
                            </div>
                        </div>
                        <div class="product-info">
                            <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
                            <div class="wrap-price"><ins><p class="product-price">$168.00</p></ins> <del><p class="product-price">$250.00</p></del></div>
                        </div>
                    </div>

                    <div class="product product-style-2 equal-elem ">
                        <div class="product-thumnail">
                            <a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                <figure><img src="assets/images/products/digital_15.jpg" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                            </a>
                            <div class="group-flash">
                                <span class="flash-item new-label">new</span>
                                <span class="flash-item sale-label">sale</span>
                            </div>
                            <div class="wrap-btn">
                                <a href="#" class="function-link">quick view</a>
                            </div>
                        </div>
                        <div class="product-info">
                            <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
                            <div class="wrap-price"><ins><p class="product-price">$168.00</p></ins> <del><p class="product-price">$250.00</p></del></div>
                        </div>
                    </div>

                    <div class="product product-style-2 equal-elem ">
                        <div class="product-thumnail">
                            <a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                <figure><img src="assets/images/products/digital_01.jpg" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                            </a>
                            <div class="group-flash">
                                <span class="flash-item bestseller-label">Bestseller</span>
                            </div>
                            <div class="wrap-btn">
                                <a href="#" class="function-link">quick view</a>
                            </div>
                        </div>
                        <div class="product-info">
                            <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
                            <div class="wrap-price"><span class="product-price">$250.00</span></div>
                        </div>
                    </div>

                    <div class="product product-style-2 equal-elem ">
                        <div class="product-thumnail">
                            <a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                <figure><img src="assets/images/products/digital_21.jpg" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                            </a>
                            <div class="wrap-btn">
                                <a href="#" class="function-link">quick view</a>
                            </div>
                        </div>
                        <div class="product-info">
                            <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
                            <div class="wrap-price"><span class="product-price">$250.00</span></div>
                        </div>
                    </div>

                    <div class="product product-style-2 equal-elem ">
                        <div class="product-thumnail">
                            <a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                <figure><img src="assets/images/products/digital_03.jpg" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                            </a>
                            <div class="group-flash">
                                <span class="flash-item sale-label">sale</span>
                            </div>
                            <div class="wrap-btn">
                                <a href="#" class="function-link">quick view</a>
                            </div>
                        </div>
                        <div class="product-info">
                            <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
                            <div class="wrap-price"><ins><p class="product-price">$168.00</p></ins> <del><p class="product-price">$250.00</p></del></div>
                        </div>
                    </div>

                    <div class="product product-style-2 equal-elem ">
                        <div class="product-thumnail">
                            <a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                <figure><img src="assets/images/products/digital_04.jpg" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                            </a>
                            <div class="group-flash">
                                <span class="flash-item new-label">new</span>
                            </div>
                            <div class="wrap-btn">
                                <a href="#" class="function-link">quick view</a>
                            </div>
                        </div>
                        <div class="product-info">
                            <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
                            <div class="wrap-price"><span class="product-price">$250.00</span></div>
                        </div>
                    </div>

                    <div class="product product-style-2 equal-elem ">
                        <div class="product-thumnail">
                            <a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                <figure><img src="assets/images/products/digital_05.jpg" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                            </a>
                            <div class="group-flash">
                                <span class="flash-item bestseller-label">Bestseller</span>
                            </div>
                            <div class="wrap-btn">
                                <a href="#" class="function-link">quick view</a>
                            </div>
                        </div>
                        <div class="product-info">
                            <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
                            <div class="wrap-price"><span class="product-price">$250.00</span></div>
                        </div>
                    </div>
                </div>
            </div><!--End wrap-products-->
        </div>

    </div><!--end main content area-->
</div><!--end container-->

</main>
<!--main area-->
@endsection