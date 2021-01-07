
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Home</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('public/frontend/images/favicon.ico') }}">
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,400italic,700,700italic,900,900italic&amp;subset=latin,latin-ext" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Open%20Sans:300,400,400italic,600,600italic,700,700italic&amp;subset=latin,latin-ext" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/css/animate.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/css/font-awesome.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/css/bootstrap.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/css/owl.carousel.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/css/flexslider.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/css/chosen.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/css/style.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/css/color-01.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/css/sweetalert.css') }}">
</head>
<body class="home-page home-01 detail page shopping-cart">
	<!-- mobile menu -->
    <div class="mercado-clone-wrap">
        <div class="mercado-panels-actions-wrap">
            <a class="mercado-close-btn mercado-close-panels" href="#">x</a>
        </div>
        <div class="mercado-panels"></div>
    </div>

	<!--header-->
	<header id="header" class="header header-style-1">
		<div class="container-fluid">
			<div class="row">
				<div class="topbar-menu-area">
					<div class="container">
						<div class="topbar-menu left-menu">
							<ul>
								<li class="menu-item" >
									<a title="Hotline: (+123) 456 789" href="#" ><span class="icon label-before fa fa-mobile"></span>Hotline: (+123) 456 789</a>
								</li>
							</ul>
						</div>
						<div class="topbar-menu right-menu">
							<ul>
								
								@if (Session::get('logged') == false)
								<li class="menu-item" ><a title="Register or Login" href="{{URL::to('/login')}}">Đăng nhập</a></li>
								<li class="menu-item" ><a title="Register or Login" href="{{URL::to('/register')}}">Đăng ký</a></li>
								@else
								<li class="dropdown">
									<a data-toggle="dropdown" class="dropdown-toggle" href="#">
										<img alt="" src="{{asset('public/backend/images/2.png')}}">
									<span class="username">
										<?php
											$name= Session::get('customer_name');
											if($name)
											{
												echo $name;
											}
										?>
									</span>
									<b class="caret"></b>
									</a>
									<ul class="dropdown-menu extended logout">
										<li><a href="#"><i class=" fa fa-suitcase"></i>Thông tin</a></li>
										<li><a href="#"><i class="fa fa-cog"></i> Cài đặt</a></li>
										<li><a href="{{URL::to('/logout')}}"><i class="fa fa-key"></i> Đăng xuất</a></li>
									</ul>
								</li>
								@endif
							</ul>
						</div>
					</div>
				</div>

				<div class="container">
					<div class="mid-section main-info-area">

						<div class="wrap-logo-top left-section">
							<a href="{{ URL::to('/Home') }}" class="link-to-home"><img src="{{ asset('public/frontend/images/logo-top-1.png') }}" alt="mercado"></a>
						</div>

						<div class="wrap-search center-section">
							<div class="wrap-search-form">
								<form action="{{URL::to('/search')}}" method="GET" id="form-search-top" name="form-search-top">
									{{ csrf_field() }}
									<div class="search_box">
									<input type="text" name="search" id="keywords" placeholder="Search here..."/>
									<div id="search_ajax"></div>
									<button type="submit" class="btn btn-primary" ><i class="fa fa-search"></i>
									</div>
								</form>	
							</div>
						</div>

						<div class="wrap-icon right-section">
							<div class="wrap-icon-section wishlist">
								<a href="#" class="link-direction">
									<i class="fa fa-heart" aria-hidden="true"></i>
									<div class="left-info">
										<span class="index">0 item</span>
										<span class="title">Wishlist</span>
									</div>
								</a>
							</div>
							<div class="wrap-icon-section minicart">
								<a href="#" class="link-direction">
									<i class="fa fa-shopping-cart" aria-hidden="true"></i>
									<div class="left-info">
										<span class="index">4 items</span>
										<span class="title">CART</span>
									</div>
								</a>
							</div>
							<div class="wrap-icon-section show-up-after-1024">
								<a href="#" class="mobile-navigation">
									<span></span>
									<span></span>
									<span></span>
								</a>
							</div>
						</div>

					</div>
				</div>

				<div class="nav-section header-sticky">
					<div class="header-nav-section">
						<div class="container">
							<ul class="nav menu-nav clone-main-menu" id="mercado_haead_menu" data-menuname="Sale Info" >
								<li class="menu-item"><a href="#" class="link-term">Weekly Featured</a><span class="nav-label hot-label">hot</span></li>
								<li class="menu-item"><a href="#" class="link-term">Hot Sale items</a><span class="nav-label hot-label">hot</span></li>
								<li class="menu-item"><a href="#" class="link-term">Top new items</a><span class="nav-label hot-label">hot</span></li>
								<li class="menu-item"><a href="#" class="link-term">Top Selling</a><span class="nav-label hot-label">hot</span></li>
								<li class="menu-item"><a href="#" class="link-term">Top rated items</a><span class="nav-label hot-label">hot</span></li>
							</ul>
						</div>
					</div>

					<div class="primary-nav-section">
						<div class="container">
							<ul class="nav primary clone-main-menu" id="mercado_main" data-menuname="Main menu" >
								<li class="menu-item home-icon">
									<a href="{{ URL::to('/Home') }}" class="link-term mercado-item-title"><i class="fa fa-home" aria-hidden="true"></i></a>
								</li>
								<li class="menu-item">
									<a href="about-us.html" class="link-term mercado-item-title">About Us</a>
								</li>
								<li class="menu-item">
									<a href="{{ URL::to('/shop') }}" class="link-term mercado-item-title">Shop</a>
								</li>
								<li class="menu-item">
									<a href="{{URL::to('/show-cart-ajax')}}" class="link-term mercado-item-title">Cart</a>
								</li>
								<?php 
									$customer_id = Session::get('customer_id');
									$shipping_id = Session::get('shipping_id');
									if($customer_id!=NULL && $shipping_id == NULL)
									{
								?>
								<li class="menu-item">
									<a href="{{ URL::to('/checkout') }}" class="link-term mercado-item-title">Checkout</a>
								</li>
								<?php }elseif($customer_id != NULL && $shipping_id != NULL) { ?>
								<li class="menu-item">
									<a href="{{ URL::to('/payment') }}" class="link-term mercado-item-title">Checkout</a>
								</li>
								<?php }else { ?>
								<li class="menu-item">
									<a href="{{ URL::to('/login') }}" class="link-term mercado-item-title">Checkout</a>
								</li>
								<?php } ?>
								<li class="menu-item">
									<a href="contact-us.html" class="link-term mercado-item-title">Contact Us</a>
								</li>																	
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>

	@yield('content')

    
	<script src="{{ asset('public/frontend/js/jquery-1.12.4.minb8ff.js?ver=1.12.4') }}"></script>
	<script src="{{ asset('public/frontend/js/jquery-ui-1.12.4.minb8ff.js?ver=1.12.4') }}"></script>
	<script src="{{ asset('public/frontend/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('public/frontend/js/jquery.flexslider.js') }}"></script>
	<script src="{{ asset('public/frontend/js/chosen.jquery.min.js') }}"></script>
	<script src="{{ asset('public/frontend/js/owl.carousel.min.js') }}"></script>
	<script src="{{ asset('public/frontend/js/jquery.countdown.min.js') }}"></script>
	<script src="{{ asset('public/frontend/js/jquery.sticky.js') }}"></script>
	<script src="{{ asset('public/frontend/js/functions.js') }}"></script>
	<script src="{{ asset('public/frontend/js/sweetalert.js') }}"></script>

	<script type="text/javascript">
		$('#keywords').keyup(function() {
			var query = $(this).val();
			if(query != '') {
				var _token = $('input[name="_token"]').val();
				$.ajax({
					url : "{{url('/autocomplete-ajax')}}",
					method: "POST",
					data:{query:query, _token:_token},
					success:function(data){
						$('#search_ajax').fedeIn();
						$('#search_ajax').html(data);
					}
				});
			}else{
				$('#search_ajax').fedeOut();
			}
		});
		$(document).on('click', 'li',function(){
			$('#keywords').val($(this).text());
			$('#search_ajax').fadeOut();
		});
	</script>
	<script type="text/javascript">
		$(document).ready(function()
		{
			load_comment();
			function load_comment()
			{
				var product_id = $('.comment_product_id').val();
				var _token = $('input[name="_token"]').val();
				$.ajax({
					url : '{{url('/load-comment')}}',
					method: "POST",
					data:{product_id:product_id,_token:_token},
					success:function(data)
					{
						$('#comment_show').html(data);     
					}
            	});
			}
			$('.sent-comment').click(function(){
				var product_id = $('.comment_product_id').val();
				var comment_name = $('.comment_name').val();
				var comment_content = $('.comment_content').val();
				var _token = $('input[name="_token"]').val();
				$.ajax({
					url : '{{url('/sent-comment')}}',
					method: "POST",
					data:{product_id:product_id,comment_name:comment_name,comment_content:comment_content,_token:_token},
					success:function(data)
					{
						$('#notify_comment ').html('<span class="text text-success">Thêm bình luận thành công. Bình luận đang chờ duyệt</span>');
						load_comment();
						$('#notify_comment ').fadeOut(5000);
						$('.comment_name').val('');
						$('.comment_content').val('');				
					}
            	});
			}); 
		});
	</script>
	<script type="text/javascript">
		//add product to cart in product page
		$(document).ready(function()
		{
			$('.add-to-cart').click(function()
			{
				var id_product = $(this).data('id_product');
				var cart_product_id = $('.cart_product_id_' + id_product).val();
				var cart_product_name = $('.cart_product_name_' + id_product).val();
				var cart_product_image = $('.cart_product_image_' + id_product).val();
				var cart_product_price = $('.cart_product_price_' + id_product).val();
				var cart_product_qty = $('.cart_product_qty_' + id_product).val();
				var _token = $('input[name="_token"]').val();
				$.ajax({
                    url: '{{url('/add-cart-ajax')}}',
                    method: 'POST',
                    data:{cart_product_id:cart_product_id,cart_product_name:cart_product_name,cart_product_image:cart_product_image,cart_product_price:cart_product_price,cart_product_qty:cart_product_qty,_token:_token},
                    success:function(){
 					 	swal({
                                title: "Thêm giỏ hàng thành công",
                                text: "Bạn có thể mua hàng tiếp hoặc tới giỏ hàng để tiến hành thanh toán",
                                showCancelButton: true,
                                cancelButtonText: "Xem tiếp",
                                confirmButtonClass: "btn-success",
                                confirmButtonText: "Đi đến giỏ hàng",
                                closeOnConfirm: false
                            },
                            function() {
                                window.location.href = "{{url('/show-cart-ajax')}}";
						}); 
                    }
                });
			});
		});
		
		//add product to cart in product detail page
		$(document).ready(function()
		{
			$('.add-to-cart-product-detail').click(function()
			{
				var cart_product_id = $('.cart_product_id').val();
				var cart_product_name = $('.cart_product_name').val();
				var cart_product_image = $('.cart_product_image').val();
				var cart_product_price = $('.cart_product_price').val();
				var cart_product_qty = $('.cart_product_qty').val();
				var _token = $('input[name="_token"]').val();
				$.ajax({
                    url: '{{url('/add-cart-ajax')}}',
                    method: 'POST',
                    data:{cart_product_id:cart_product_id,cart_product_name:cart_product_name,cart_product_image:cart_product_image,cart_product_price:cart_product_price,cart_product_qty:cart_product_qty,_token:_token},
                    success:function(){
 					 	swal({
                                title: "Thêm giỏ hàng thành công",
                                text: "Bạn có thể mua hàng tiếp hoặc tới giỏ hàng để tiến hành thanh toán",
                                showCancelButton: true,
                                cancelButtonText: "Xem tiếp",
                                confirmButtonClass: "btn-success",
                                confirmButtonText: "Đi đến giỏ hàng",
                                closeOnConfirm: false
                            },
                            function() {
                                window.location.href = "{{url('/show-cart-ajax')}}";
						}); 
                    }
                });
			});
		});

		//add product to cart in product category page
		$(document).ready(function()
		{
			$('.add-to-cart-product-category').click(function()
			{
				var product_id_cate = $(this).data('product_id_category');
				var cart_product_id = $('.cart_product_id_' + product_id_cate).val();
				var cart_product_name = $('.cart_product_name_' + product_id_cate).val();
				var cart_product_image = $('.cart_product_image_' + product_id_cate).val();
				var cart_product_price = $('.cart_product_price_' + product_id_cate).val();
				var cart_product_qty = $('.cart_product_qty_' + product_id_cate).val();
				var _token = $('input[name="_token"]').val();
				$.ajax({
                    url: '{{url('/add-cart-ajax')}}',
                    method: 'POST',
                    data:{cart_product_id:cart_product_id,cart_product_name:cart_product_name,cart_product_image:cart_product_image,cart_product_price:cart_product_price,cart_product_qty:cart_product_qty,_token:_token},
                    success:function(){
 					 	swal({
                                title: "Thêm giỏ hàng thành công",
                                text: "Bạn có thể mua hàng tiếp hoặc tới giỏ hàng để tiến hành thanh toán",
                                showCancelButton: true,
                                cancelButtonText: "Xem tiếp",
                                confirmButtonClass: "btn-success",
                                confirmButtonText: "Đi đến giỏ hàng",
                                closeOnConfirm: false
                            },
                            function() {
                                window.location.href = "{{url('/show-cart-ajax')}}";
						}); 
                    }
                });
			});
		});

		//add product to cart in product brand page
		$(document).ready(function()
		{
			$('.add-to-cart-product-brand').click(function()
			{
				var product_id_brand = $(this).data('product_id_brand');
				var cart_product_id = $('.cart_product_id_' + product_id_brand).val();
				var cart_product_name = $('.cart_product_name_' + product_id_brand).val();
				var cart_product_image = $('.cart_product_image_' + product_id_brand).val();
				var cart_product_price = $('.cart_product_price_' + product_id_brand).val();
				var cart_product_qty = $('.cart_product_qty_' + product_id_brand).val();
				var _token = $('input[name="_token"]').val();
				$.ajax({
                    url: '{{url('/add-cart-ajax')}}',
                    method: 'POST',
                    data:{cart_product_id:cart_product_id,cart_product_name:cart_product_name,cart_product_image:cart_product_image,cart_product_price:cart_product_price,cart_product_qty:cart_product_qty,_token:_token},
                    success:function(){
 					 	swal({
                                title: "Thêm giỏ hàng thành công",
                                text: "Bạn có thể mua hàng tiếp hoặc tới giỏ hàng để tiến hành thanh toán",
                                showCancelButton: true,
                                cancelButtonText: "Xem tiếp",
                                confirmButtonClass: "btn-success",
                                confirmButtonText: "Đi đến giỏ hàng",
                                closeOnConfirm: false
                            },
                            function() {
                                window.location.href = "{{url('/show-cart-ajax')}}";
						}); 
                    }
                });
			});
		});
	</script>
</body>
</html>