@extends('layout')
@section('content')

<main id="main" class="main-site">
    
<div class="container">
    <div class="wrap-breadcrumb">
        <ul>
            <li class="item-link"><a href="{{URL::to('/Home')}}" class="link">Home</a></li>
            <li class="item-link"><span>Checkout</span></li>
        </ul>
    </div>
    <div class=" main-content-area">
        <div class="wrap-address-billing">
        <form action="{{URL::to('/save-checkout-customer')}}" method="POST" name="frm-billing">
            {{ csrf_field() }}
            <h3 class="box-title">Thông tin giao hàng</h3>
                <p class="row-in-form">
                    <label for="fname">Họ tên<span>*</span></label>
                    <input id="fname" type="text" name="shipping_name" value="" placeholder="Họ tên của bạn">
                </p>
                <p class="row-in-form">
                    <label for="email">Địa chỉ email</label>
                    <input id="email" type="email" name="shipping_email" value="" placeholder="Email của bạn">
                </p>
                <p class="row-in-form">
                    <label for="phone">Số điện thoại<span>*</span></label>
                    <input id="phone" type="text" name="shipping_phone" value="" placeholder="Số điện thoại của bạn">
                </p>
                <p class="row-in-form">
                    <label for="add">Địa chỉ:</label>
                    <input id="add" type="text" name="shipping_address" value="" placeholder="Địa chỉ của bạn đang ở">
                </p>
                <div class="form-group">
                    <label style="font-weight: normal;" for="exampleFormControlTextarea1">Ghi chú thêm</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" name="shipping_notes" rows="3" placeholder="Ghi chú cho đơn hàng của bạn"></textarea>
                </div>
                <input type="submit" value="Tiến hành thanh toán" name="send_order" class="btn btn-danger">
        </form>
        </div>
       
        <div class="wrap-show-advance-info-box style-1 box-in-site">
            <h3 class="title-box">Most Viewed Products</h3>
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