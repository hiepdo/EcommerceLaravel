@extends('layout')
@section('content')
<main id="main">
		<div class="container">
			<!--MAIN SLIDE-->
			<div class="wrap-main-slide">
				<div class="slide-carousel owl-carousel style-nav-1" data-items="1" data-loop="1" data-nav="true" data-dots="false">
					<div class="item-slide">
						<img src="{{ asset('public/frontend/images/main-slider-1-1.jpg') }}" alt="" class="img-slide">
						<div class="slide-info slide-1">
							<h2 class="f-title">Kid Smart <b>Watches</b></h2>
							<span class="subtitle">Compra todos tus productos Smart por internet.</span>
							<p class="sale-info">Only price: <span class="price">$59.99</span></p>
							<a href="{{ URL::to('/shop')}}" class="btn-link">Shop Now</a>
						</div>
					</div>
					<div class="item-slide">
						<img src="{{ asset('public/frontend/images/main-slider-1-2.jpg') }}" alt="" class="img-slide">
						<div class="slide-info slide-2">
							<h2 class="f-title">Extra 25% Off</h2>
							<span class="f-subtitle">On online payments</span>
							<p class="discount-code">Use Code: #FA6868</p>
							<h4 class="s-title">Get Free</h4>
							<p class="s-subtitle">TRansparent Bra Straps</p>
						</div>
					</div>
					<div class="item-slide">
						<img src="{{ asset('public/frontend/images/main-slider-1-3.jpg') }}" alt="" class="img-slide">
						<div class="slide-info slide-3">
							<h2 class="f-title">Great Range of <b>Exclusive Furniture Packages</b></h2>
							<span class="f-subtitle">Exclusive Furniture Packages to Suit every need.</span>
							<p class="sale-info">Stating at: <b class="price">$225.00</b></p>
							<a href="#" class="btn-link">Shop Now</a>
						</div>
					</div>
				</div>
			</div>

			<!--BANNER-->
			<div class="wrap-banner style-twin-default">
				<div class="banner-item">
					<a href="#" class="link-banner banner-effect-1">
						<figure><img src="{{ asset('public/frontend/images/home-1-banner-1.jpg') }}" alt="" width="580" height="190"></figure>
					</a>
				</div>
				<div class="banner-item">
					<a href="#" class="link-banner banner-effect-1">
						<figure><img src="{{ asset('public/frontend/images/home-1-banner-2.jpg') }}" alt="" width="580" height="190"></figure>
					</a>
				</div>
			</div>

			<!--Best seller products-->
			<div class="single-advance-box col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="wrap-show-advance-info-box style-1 box-in-site">
				<h3 class="title-box">Sản phẩm bán chạy nhất</h3>
				<div class="wrap-products">
				<div class="products slide-carousel owl-carousel style-nav-1 equal-container" data-items="5" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"3"},"1200":{"items":"5"}}'>
				@foreach($all_product_topsale as $key => $pro_topsale)
				@foreach($all_product as $key => $product)
					<?php if($product->product_id == $pro_topsale->product_id) { ?>
								<form>
                                    @csrf
										<input type="hidden" name="" value="{{$product->product_id}}" class="cart_product_id_{{$product->product_id}}">
                                        <input type="hidden" name="" value="{{$product->product_name}}" class="cart_product_name_{{$product->product_id}}">
                                        <input type="hidden" name="" value="{{$product->product_image}}" class="cart_product_image_{{$product->product_id}}">
                                        <input type="hidden" name="" value="{{$product->product_price}}" class="cart_product_price_{{$product->product_id}}">
                                        <input type="hidden" name="" value="1" class="cart_product_qty_{{$product->product_id}}">
										<div class="product product-style-2 equal-elem ">
											<div class="product-thumnail">
												<a href="{{ URL::to('/detail-product/'.$product->product_id)}}" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
													<img src="{{ URL::to('public/uploads/product/'.$product->product_image)}}" alt="" >
												</a>
											</div>
											<div class="product-info">
												<a href="{{ URL::to('/detail-product/'.$product->product_id)}}" title="T-Shirt Raw Hem Organic Boro Constrast Denim" class="product-name"><span>{{($product->product_name)}}</span></a>
												<div class="wrap-price"><span class="product-price">{{number_format($product->product_price)}} VNĐ</span></div>
											</div>	
										</div>
                                </form>			
					<?php } ?>
				@endforeach
				@endforeach
				</div>
				</div>
			</div>
			</div>
			<!--Latest Products-->
			<div class="single-advance-box col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="wrap-show-advance-info-box style-1 box-in-site">
				<h3 class="title-box">Sản phẩm mới ra mắt</h3>
				<div class="wrap-products">
				<div class="products slide-carousel owl-carousel style-nav-1 equal-container" data-items="5" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"3"},"1200":{"items":"5"}}'>
				@foreach($all_product_new as $key => $product)
								<form>
                                    @csrf
										<input type="hidden" name="" value="{{$product->product_id}}" class="cart_product_id_{{$product->product_id}}">
                                        <input type="hidden" name="" value="{{$product->product_name}}" class="cart_product_name_{{$product->product_id}}">
                                        <input type="hidden" name="" value="{{$product->product_image}}" class="cart_product_image_{{$product->product_id}}">
                                        <input type="hidden" name="" value="{{$product->product_price}}" class="cart_product_price_{{$product->product_id}}">
                                        <input type="hidden" name="" value="1" class="cart_product_qty_{{$product->product_id}}">
                                        <div class="product product-style-2 equal-elem ">
										<div class="product-thumnail">
                                            <a href="{{ URL::to('/detail-product/'.$product->product_id)}}" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                                <img src="{{ URL::to('public/uploads/product/'.$product->product_image)}}" alt="" >
                                            </a>
                                        </div>
										<div class="product-info">
                                            <a href="{{ URL::to('/detail-product/'.$product->product_id)}}" title="T-Shirt Raw Hem Organic Boro Constrast Denim" class="product-name"><span>{{($product->product_name)}}</span></a>
                                            <div class="wrap-price"><span class="product-price">{{number_format($product->product_price)}} VNĐ</span></div>
                                        </div>	
										</div>	
                                </form>
				@endforeach
				</div>
				</div>
				
			</div>
			</div>

			<!--Hot Products-->
			<div class="wrap-show-advance-info-box style-1">
				<h3 class="title-box">Sản phẩm được yêu thích nhất</h3>
			</div>
		</div>

</main>
@endsection