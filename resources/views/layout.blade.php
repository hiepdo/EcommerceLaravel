
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
										<img alt="" src="{{asset('public/frontend/images/icon-customer.png')}}" style="width:30px; height:30px;">
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
							<a href="{{ URL::to('/Home') }}" class="link-to-home"><img src="{{ asset('public/frontend/images/logo-top-4.png') }}" alt="mercado"></a>
						</div>

						<div class="wrap-search center-section">
							<div class="wrap-search-form">
								<form action="{{URL::to('/search')}}" method="GET" id="form-search-top" name="form-search-top">
									{{ csrf_field() }}
									<div class="search_box">
									<input type="text" name="search" id="keywords" placeholder="Tìm kiếm..."/>
									<div id="search_ajax"></div>
									<button type="submit" class="btn btn-primary" ><i class="fa fa-search"></i>
									</div>
								</form>	
							</div>
						</div>

						<div class="wrap-icon right-section">
							<div class="wrap-icon-section wishlist">
								<a href="{{ URL::to('/show-wishlist-localstorage') }}" class="link-direction">
									<i class="fa fa-heart" aria-hidden="true"></i>
									<div class="left-info">
									<?php $customer_id = session::get('customer_id'); 
										if($customer_id!=null){
										
									?>
										<span class="index">{{session::get('numberlike_customer')}} item</span>
										<?php } else { ?>
											<span class="index">0 item</span>
										<?php } ?>
										<span class="title">Wishlist</span>
									</div>
								</a>
							</div>
							<div class="wrap-icon-section minicart">
							
								<a href="{{URL::to('/show-cart-ajax')}}" class="link-direction">
									<i class="fa fa-shopping-cart" aria-hidden="true"></i>
									<div class="left-info">
										@if(Session::get('cart') == true)											
										<span class="index">{{count(Session::get('cart'))}} item</span>	
										@else
										<span class="index">0 sản phẩm</span>
										@endif
										<span class="title">Giỏ hàng</span>
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
								<li class="menu-item"><a href="{{ URL::to('/Home') }}" class="link-term">Nổi bật trong tuần</a><span class="nav-label hot-label">hot</span></li>
								<li class="menu-item"><a href="{{ URL::to('/Home') }}" class="link-term">Giảm giá sốc</a><span class="nav-label hot-label">hot</span></li>
								<li class="menu-item"><a href="{{ URL::to('/Home') }}" class="link-term">Sản phẩm mới</a><span class="nav-label hot-label">hot</span></li>
								<li class="menu-item"><a href="{{ URL::to('/Home') }}" class="link-term">Bán chạy</a><span class="nav-label hot-label">hot</span></li>
								<li class="menu-item"><a href="{{ URL::to('/Home') }}" class="link-term">Xếp hạng</a><span class="nav-label hot-label">hot</span></li>
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
									<a href="{{URL::to('/about-us')}}" class="link-term mercado-item-title">Giới thiệu</a>
								</li>
								<li class="menu-item">
									<a href="{{ URL::to('/shop') }}" class="link-term mercado-item-title">Sản phẩm</a>
								</li>
								<li class="menu-item">
									<a href="{{URL::to('/show-cart-ajax')}}" class="link-term mercado-item-title">Giỏ hàng</a>
								</li>
								<?php 
									$customer_id = Session::get('customer_id');
									$shipping_id = Session::get('shipping_id');
									if($customer_id!=NULL && $shipping_id == NULL)
									{
								?>
								<li class="menu-item">
									<a href="{{ URL::to('/checkout') }}" class="link-term mercado-item-title">Thanh toán</a>
								</li>
								<?php }elseif($customer_id != NULL && $shipping_id != NULL) { ?>
								<li class="menu-item">
									<a href="{{ URL::to('/payment') }}" class="link-term mercado-item-title">Thanh toán</a>
								</li>
								<?php }else { ?>
								<li class="menu-item">
									<a href="{{ URL::to('/login') }}" class="link-term mercado-item-title">Thanh toán</a>
								</li>
								<?php } ?>
								<li class="menu-item">
									<a href="{{ URL::to('/contact-us') }}" class="link-term mercado-item-title">Liên hệ</a>
								</li>																	
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>
	@yield('content')
	<footer id="footer">
		<div class="wrap-footer-content footer-style-1">

			<div class="wrap-function-info">
				<div class="container">
					<ul>
						<li class="fc-info-item">
							<i class="fa fa-truck" aria-hidden="true"></i>
							<div class="wrap-left-info">
								<h4 class="fc-name">Miễn phí giao hàng</h4>
								<p class="fc-desc">Miễn phí với đơn hàng từ 99k</p>
							</div>

						</li>
						<li class="fc-info-item">
							<i class="fa fa-recycle" aria-hidden="true"></i>
							<div class="wrap-left-info">
								<h4 class="fc-name">Bảo hành</h4>
								<p class="fc-desc">Miễn phí đổi trả 30 ngày</p>
							</div>

						</li>
						<li class="fc-info-item">
							<i class="fa fa-credit-card-alt" aria-hidden="true"></i>
							<div class="wrap-left-info">
								<h4 class="fc-name">Thanh toán an toàn</h4>
								<p class="fc-desc">Thanh toán trực tuyến an toàn</p>
							</div>

						</li>
						<li class="fc-info-item">
							<i class="fa fa-life-ring" aria-hidden="true"></i>
							<div class="wrap-left-info">
								<h4 class="fc-name">Hỗ trợ trực tuyến</h4>
								<p class="fc-desc">Chúng tôi hỗ trợ 24/7</p>
							</div>

						</li>
					</ul>
				</div>
			</div>
			<!--End function info-->

			<div class="main-footer-content">

				<div class="container">

					<div class="row">

						<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
							<div class="wrap-footer-item">
								<h3 class="item-header">Chi tiết liên hệ</h3>
								<div class="item-content">
									<div class="wrap-contact-detail">
										<ul>
											<li>
												<i class="fa fa-map-marker" aria-hidden="true"></i>
												<p class="contact-txt">227 Nguyễn Văn Cừ, phường 4, quận 5, Hồ Chí Minh</p>
											</li>
											<li>
												<i class="fa fa-phone" aria-hidden="true"></i>
												<p class="contact-txt">(+123) 456 789 - (+123) 666 888</p>
											</li>
											<li>
												<i class="fa fa-envelope" aria-hidden="true"></i>
												<p class="contact-txt">ltweb1082@gmail.com</p>
											</li>										
										</ul>
									</div>
								</div>
							</div>
						</div>

						<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">

							<div class="wrap-footer-item">
								<h3 class="item-header">Đường dây nóng</h3>
								<div class="item-content">
									<div class="wrap-hotline-footer">
										<span class="desc">Gọi miễn phí</span>
										<b class="phone-number">(+123) 456 789 - (+123) 666 888</b>
									</div>
								</div>
							</div>

							<!-- <div class="wrap-footer-item footer-item-second">
								<h3 class="item-header">Sign up for newsletter</h3>
								<div class="item-content">
									<div class="wrap-newletter-footer">
										<form action="#" class="frm-newletter" id="frm-newletter">
											<input type="email" class="input-email" name="email" value="" placeholder="Enter your email address">
											<button class="btn-submit">Subscribe</button>
										</form>
									</div>
								</div>
							</div> -->

						</div>

						<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12 box-twin-content ">
							<div class="row">
								<div class="wrap-footer-item twin-item">
									<h3 class="item-header">Tài khoản</h3>
									<div class="item-content">
										<div class="wrap-vertical-nav">
											<ul>
												<li class="menu-item"><a href="#" class="link-term">Tài khoản của tôi</a></li>
												<li class="menu-item"><a href="#" class="link-term">Thương hiệu</a></li>
												<li class="menu-item"><a href="#" class="link-term">Phiếu quà tặng</a></li>
												<li class="menu-item"><a href="#" class="link-term">Yêu thích</a></li>
											</ul>
										</div>
									</div>
								</div>
								<div class="wrap-footer-item twin-item">
									<h3 class="item-header">Thông tin</h3>
									<div class="item-content">
										<div class="wrap-vertical-nav">
											<ul>
												<li class="menu-item"><a href="#" class="link-term">Liên hệ</a></li>
												<li class="menu-item"><a href="#" class="link-term">Vị trí</a></li>
												<li class="menu-item"><a href="#" class="link-term">Lịch sử đặt hàng</a></li>
											</ul>
										</div>
									</div>
								</div>
							</div>
						</div>

					</div>
					</div>
				</div>
			</div>
		</div>
	</footer>

    
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
	<script src="{{ asset('public/frontend/js/jquery.form-validator.min.js')}}"></script>
	<script type="text/javascript">
		$.validate({
				
		});
	</script>
	<script type="text/javascript">
            function send() 
			{
                var payment = document.getElementsByName('payment_option');
				var paymentValue = false;

				for(var i=0; i<payment.length;i++){
					if(payment[i].checked == true){
						paymentValue = true;    
					}
				}
				if(!paymentValue){
					var msg = '<span style="color:red;">Bạn hãy chọn 1 trong 3 hình thức thanh toán ở trên!</span><br /><br />';
                    document.getElementById('msg').innerHTML = msg;
				}
			}

            function reset_msg() {
                document.getElementById('msg').innerHTML = '';
            }
    </script>
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
		function view()
		{
			if(localStorage.getItem('data')!=null)
			{
				var data = JSON.parse(localStorage.getItem('data'));
				data.reverse();
				document.getElementById('row_wishlist').style.overflow='scroll';
				document.getElementById('row_wishlist').style.height='600px';
				

				for(i=0;i<data.length;i++)
				{
					var name=data[i].name;
					var price=data[i].price;
					var image=data[i].image;
					var url=data[i].url;
					var id = data[i].id;
					$("#row_wishlist").append('<div class="row" style="margin:10px 0"><div class="col-md-4"><img id="wishlist_productimage{{'+image+'}}" width="100%" src="'
					+image+'"></div><div class="col-md-8 info_wishlist"><p id="wishlist_productname{{'+name+'}}" style="color:#444444">'
					+name+'</p><p id="wishlist_productprice{{'+price+'}} " style="color:#d9534f;font-weight: bold">'+price+' <button type="button"  class="btn btn-primary" id="'
					+id+'" onclick="delete_wishlist(this.id);" ><i class="fa fa-remove	" aria-hidden="true"></i></button></p><a id="wishlist_producturl{{'+url+'}}" href="'
					+url+'">Xem sản phẩm </a></div>');		

				}

			}
		}
		view();
		
		function add_wishlist(clicked_id)
		{
			var id=clicked_id;
			var name = document.getElementById('wishlist_productname'+id).value;
			var price = document.getElementById('wishlist_productprice'+id).value;
			var image = document.getElementById('wishlist_productimage'+id).src;
			var url = document.getElementById('wishlist_producturl'+id).href;
			var newItem = {
				'url':url,
				'id':id,
				'name':name,
				'price':price,
				'image':image
			}

			if(localStorage.getItem('data')==null){
				localStorage.setItem('data','[]');
			}

			var old_data=JSON.parse(localStorage.getItem('data'));

			var matches=$.grep(old_data,function(obj){
					return obj.id == id;
			});
			if(matches.length)
			{
				alert('Sản phẩm bạn đã yêu thích, không thể thêm');
			}
			else{
				old_data.push(newItem);
				$("#row_wishlist").append('<div class="row" style="margin:10px 0"><div class="col-md-4"><img id="wishlist_productimage{{'+newItem.image+'}}" width="100%" src="'
					+newItem.image+'"></div><div class="col-md-8 info_wishlist"><p id="wishlist_productname{{'+newItem.name+'}}" style="color:#444444">'
					+newItem.name+'</p><p id="wishlist_productprice{{'+newItem.price+'}} " style="color:#d9534f;font-weight: bold">'+newItem.price+' <button type="button"  class="btn btn-primary" id="'
					+newItem.id+'" onclick="delete_wishlist(this.id);" ><i class="fa fa-remove	" aria-hidden="true"></i></button></p><a id="wishlist_producturl{{'+newItem.url+'}}" href="'
					+newItem.url+'">Xem sản phẩm </a></div>');
				}
			localStorage.setItem('data',JSON.stringify(old_data));
			document.getElementById('row_wishlist').style.overflow='scroll';
			document.getElementById('row_wishlist').style.height='300px';
		}
		function all_clear_wishlist(){
			localStorage.clear();
			var url = document.getElementById('wishlist_deleteurl').href;
			window.location.href = url;
		}
		function delete_wishlist(clicked_id)
		{
			var id=clicked_id;
			var url = document.getElementById('wishlist_deleteurl'+id).href;
			var old_data=JSON.parse(localStorage.getItem('data'));
			localStorage.clear();
			localStorage.setItem('data','[]');
			var old_data_temp = JSON.parse(localStorage.getItem('data'));
			var matches=$.grep(old_data,function(obj){
					return obj.id == id;
			});
			if(matches.length)
			{
				for(i=0;i<old_data.length;i++)
				{
					if(old_data[i].id!=id)
					{
						old_data_temp.push(old_data[i]);
						localStorage.setItem('data',JSON.stringify(old_data_temp));
					}
					else{
						delete old_data[i];
						alert('Đã xóa sản phẩm thành công');
					}
				}
			}
             window.location.href = url;

		}
		$(document).ready(function()
		{
			$('.add-to-wishlist-product-detail').click(function()
			{
				var id_product = $(this).data('id_product');
				var product_id = $('.wishlist_product_id_' + id_product).val();
				var _token = $('input[name="_token"]').val();
				$.ajax({
					url: '{{url('/add-wishlist-ajax')}}',
                    method: 'POST',
					data:{product_id:product_id,
						_token:_token},
                    success:function(){
 					 	swal({
                                title: "Thêm yêu thích thành công",
                                confirmButtonClass: "btn-success",
                                confirmButtonText: "Xem tiếp",
                                closeOnConfirm: false
							});
						}
				});
			});
		});
		$(document).ready(function()
		{
			$('.add-to-wishlist-ajax').click(function()
			{
				var id_product = $(this).data('id_product');
				var product_id = $('.wishlist_product_id_' + id_product).val();
				var _token = $('input[name="_token"]').val();
				$.ajax({
					url: '{{url('/add-wishlist-ajax')}}',
                    method: 'POST',
					data:{product_id:product_id,
						_token:_token},
                    success:function(){
 					 	swal({
                                title: "Thêm yêu thích thành công",
                                confirmButtonClass: "btn-success",
                                confirmButtonText: "Xem tiếp",
                                closeOnConfirm: false
							});
						}
				});
			});
		});
		$(document).ready(function()
		{
			$('.delete-to-wishlist-ajax').click(function()
			{
				var id_product = $(this).data('id_product');
				var product_id = $('.wishlist_product_id_' + id_product).val();
				var _token = $('input[name="_token"]').val();
				$.ajax({
					url: '{{url('/delete-wishlist-ajax')}}',
                    method: 'POST',
					data:{product_id:product_id,
						_token:_token},
                    success:function(){
 					 	swal({
                                title: "Xóa yêu thích thành công",
                                confirmButtonClass: "btn-success",
                                confirmButtonText: "Xem tiếp",
                                closeOnConfirm: false
							});
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
					data:{cart_product_id:cart_product_id,
						cart_product_name:cart_product_name,
						cart_product_image:cart_product_image,
						cart_product_price:cart_product_price,
						cart_product_qty:cart_product_qty,
						_token:_token},
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
							}
						); 
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