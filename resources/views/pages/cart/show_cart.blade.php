@extends('layout')
@section('content')
<!--main area-->
<main id="main" class="main-site">

<div class="container">
    
    <div class="wrap-breadcrumb">
        <ul>
            <li class="item-link"><a href="{{ URL::to('/Home') }}" class="link">Trang chủ</a></li>
            <li class="item-link"><span>Giỏ hàng của bạn</span></li>
        </ul>
    </div>
    <div class=" main-content-area">
        <?php $content = Cart::content(); ?>
        <div class="wrap-iten-in-cart">
            <h3 class="box-title">Products Name</h3>
            @foreach($content as $v_content)
            <ul class="products-cart">
                <li class="pr-cart-item">
                    <div class="product-image">
                        <figure><img src="{{URL::to('public/uploads/product/'.$v_content->options->image)}}" alt=""></figure>
                    </div>
                    <div class="product-name">
                        <a class="link-to-product" href="{{ URL::to('/chi-tiet-san-pham/'.$v_content->id)}}">{{$v_content->name}}</a>
                    </div>
                    <div class="price-field produtc-price"><p class="price">{{number_format($v_content->price).' '.'VNĐ'}}</p></div>
                    <div class="quantity">
                    <form action="{{URL::to('/update-cart')}}" method="POST">
                        {{ csrf_field() }}
                        <div class="quantity-input">
                            <input type="text" name="cart_quatity" value="{{$v_content->qty}}" data-max="120" pattern="[0-9]*" >									
                            <a class="btn btn-increase" href="#"></a>
                            <a class="btn btn-reduce" href="#"></a>
                            
                        </div>
                        <input type="submit" value="Update" name="update_qty" class="btn btn-info btn-sm">
                        <input type="hidden" value="{{$v_content->rowId}}" name="rowId_cart" class="form-control">
                    </form>
                    </div>
                   
                    <div class="price-field sub-total"><p class="price"><?php $subtotal = $v_content->price * $v_content->qty; echo number_format($subtotal).' '.'VNĐ'; ?></p></div>
                    <div class="delete">
                        <a href="{{URL::to('/delete-cart/'.$v_content->rowId)}}" class="btn" title="">
                            <i class="fa fa-times-circle"></i>
                        </a>
                    </div>
                </li>
                											
            </ul>
            @endforeach
        </div>

        <div class="summary">
            <div class="order-summary">
                <h4 class="title-box">Order Summary</h4>
                <p class="summary-info"><span class="title">Subtotal</span><b class="index">{{Cart::subtotal().' '.'VNĐ'}}</b></p>
                <p class="summary-info"><span class="title">Tax</span><b class="index">{{Cart::tax().' '.'VNĐ'}}</b></p>
                <p class="summary-info"><span class="title">Shipping</span><b class="index">Free Shipping</b></p>
                <p class="summary-info total-info "><span class="title">Total</span><b class="index">{{Cart::total().' '.'VNĐ'}}</b></p>
            </div>
            <div class="checkout-info">
                <label class="checkbox-field">
                    <input class="frm-input " name="have-code" id="have-code" value="" type="checkbox"><span>I have promo code</span>
                </label>
                <a class="btn btn-checkout" href="checkout.html">Check out</a>
                <a class="link-to-shop" href="shop.html">Continue Shopping<i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>
            </div>
            <div class="update-clear">
                <a class="btn btn-clear" href="#">Clear Shopping Cart</a>
                <a class="btn btn-update" href="#">Update Shopping Cart</a>
            </div>
        </div>

        <div class="wrap-show-advance-info-box style-1 box-in-site">
            <h3 class="title-box">Most Viewed Products</h3>
            <div class="wrap-products">
                <div class="products slide-carousel owl-carousel style-nav-1 equal-container" data-items="5" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"3"},"1200":{"items":"5"}}' >

                    <div class="product product-style-2 equal-elem ">
                        <div class="product-thumnail">
                            <a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                <figure><img src="{{ asset('public/frontend/images/products/digital_17.jpg')}}" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
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
                                <figure><img src="{{ asset('public/frontend/images/products/digital_17.jpg')}}" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
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
                                <figure><img src="{{ asset('public/frontend/images/products/digital_17.jpg')}}" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
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
                                <figure><img src="{{ asset('public/frontend/images/products/digital_17.jpg')}}" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
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
                                <figure><img src="{{ asset('public/frontend/images/products/digital_17.jpg')}}" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
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
                                <figure><img src="{{ asset('public/frontend/images/products/digital_17.jpg')}}" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
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
                                <figure><img src="{{ asset('public/frontend/images/products/digital_17.jpg')}}" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
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