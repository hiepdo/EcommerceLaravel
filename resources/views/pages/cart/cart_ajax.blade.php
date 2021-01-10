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
    <form action="{{ url('/update-cart-ajax') }}" method="POST">
    @csrf
    @if(Session::get('cart') == true)
        <div class="wrap-iten-in-cart">
            <h3 class="box-title">Giỏ hàng</h3>
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
                            <div class="form-group">
                                <input type="number" name="cart_quatity[{{$cart['session_id']}}]" class="form-control" min="1" value="{{$cart['product_qty']}}">
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
        <div class="summary">
            <div class="order-summary">
                <h4 class="title-box">Phiếu thanh toán</h4>
                <p class="summary-info"><span class="title">Tạm tính</span><b class="index">{{number_format($total).' '.'VNĐ'}}</b></p>
                <p class="summary-info"><span class="title">Thuế</span><b class="index">0</b></p>
                <p class="summary-info"><span class="title">Phí ship</span><b class="index">Miễn phí</b></p>
                <p class="summary-info total-info "><span class="title">Thành tiền</span><b class="index">{{number_format($total).' '.'VNĐ'}}</b></p>
            </div>
            <div class="checkout-info">
                <?php 
                    $customer_id = Session::get('customer_id');
                    $shipping_id = Session::get('shipping_id');
				if($customer_id!=NULL && $shipping_id==NULL)
				{ ?>
                    <a class="btn btn-checkout" href="{{URL::to('/checkout')}}">Tiến hàng đặt hàng</a>
                <?php 
                }
                elseif($customer_id!=NULL && $shipping_id!=NULL) { ?>
                    <a class="btn btn-checkout" href="{{URL::to('/payment')}}">Tiến hàng đặt hàng</a>
                <?php }
                else{ ?>
                    <a class="btn btn-checkout" href="{{URL::to('/login')}}">Tiến hàng đặt hàng</a>
                <?php } ?>
                <a class="link-to-shop" href="{{ URL::to('/shop') }}">Tiếp tục mua sắm<i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>
            </div>
            <div class="update-clear">
                <input type="submit" value="Cập nhật giỏ hàng" name="update_qty" class="btn btn-update">
                <a class="btn btn-clear" href="{{url('/clear-all-cart-ajax')}}">Xóa giỏ hàng</a>
            </div>
        </div>
    @else
        <div class="alert alert-danger" role="alert"><p style="font-size:18px; text-align:center;">Không có sản phẩm nào trong giỏ hàng của bạn</p></div>
        <center><a class="btn btn-info" href="{{ URL::to('/shop') }}" style="font-size: 18px;">Tiếp tục mua sắm</a></center>
    @endif
    </form>

        <div class="wrap-show-advance-info-box style-1 box-in-site">
            <h3 class="title-box">Sản phẩm được xem nhiều nhất</h3>
            <div class="wrap-products">
            <div class="slide-carousel owl-carousel style-nav-1" data-items="4" data-loop="1" data-nav="true" data-dots="false">
                @foreach($product_topsale as $key => $pro_topsale)
                @foreach($all_product as $key => $product)
                <?php if($product->product_id == $pro_topsale->product_id) { ?>
                    <div class="product product-style-2 equal-elem ">
                        <div class="product-thumnail">
                            <a href="{{ URL::to('/detail-product/'.$pro_topsale->product_id)}}" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                <figure><img src="{{ URL::to('public/uploads/product/'.$product->product_image)}}" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                            </a>
                            <div class="group-flash">
                                <span class="flash-item new-label">Top Sale</span>
                            </div>
                            <div class="wrap-btn">
                                <a href="{{ URL::to('/detail-product/'.$pro_topsale->product_id)}}" class="function-link">quick view</a>
                            </div>
                        </div>
                        <div class="product-info">
                            <a href="#" class="product-name"><span>{{$product->product_name}}</span></a>
                            <div class="wrap-price"><span class="product-price">{{number_format($product->product_price)}} VNĐ</span></div>
                        </div>
                    </div>

                    <?php } ?>
                    @endforeach 
                    @endforeach 
                </div>
            </div><!--End wrap-products-->
        </div>

    </div><!--end main content area-->
</div><!--end container-->

</main>
<!--main area-->
@endsection