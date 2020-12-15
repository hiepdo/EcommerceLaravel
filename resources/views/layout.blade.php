<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | E-Shopper</title>
    <link href="{{ asset('public/frontend/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('public/frontend/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{ asset('public/frontend/css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{ asset('public/frontend/css/price-range.css')}}" rel="stylesheet">
    <link href="{{ asset('public/frontend/css/animate.css')}}" rel="stylesheet">
	<link href="{{ asset('public/frontend/css/main.css')}}" rel="stylesheet">
	<link href="{{ asset('public/frontend/css/responsive.css')}}" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="{{ asset('public/frontend/images/images/ico/favicon.ico') }}">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>
	<header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href="#"><i class="fa fa-phone"></i> +058 417 9899</a></li>
								<li><a href="#"><i class="fa fa-envelope"></i> ltw18ck1@gmail.com</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav" >
								<li><a href="https://www.facebook.com/groups/2966534243584019"><i class="fa fa-facebook"></i></a></li>
								<li><a href="http://twitter.com/home?status=E%20Shopper%20-%20https%3A%2F%2Fwww.free-css.com%2Ffree-css-templates%2Fpage203%2Fe-shopper"><i class="fa fa-twitter"></i></a></li>
								<li><a href="http://www.google.com/bookmarks/mark?op=edit&bkmk=https%3A%2F%2Fwww.free-css.com%2Ffree-css-templates%2Fpage203%2Fe-shopper&title=E%20Shopper&annotation=E%20Shopper"><i class="fa fa-google-plus"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header_top-->
		
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							<a href="{{ URL::to('/Trang-chu') }}"><img src="{{ asset('public/frontend/images/home/logo.png') }}" alt="" /></a>
						</div>
						<div class="btn-group pull-right">
							<div class="btn-group">
								<button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
									VietNam
									<span class="caret"></span>
								</button>
								<ul class="dropdown-menu">
									<li><a href="#">USA</a></li>
									<li><a href="#">Korea</a></li>
								</ul>
							</div>
							
							<div class="btn-group">
								<button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
									VND
									<span class="caret"></span>
								</button>
								<ul class="dropdown-menu">
									<li><a href="#">Dollar</a></li>
									<li><a href="#">Won</a></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
								<li><a href="#"><i class="fa fa-user"></i>Tài khoản</a></li>
								<li><a href="#"><i class="fa fa-star"></i>Yêu thích</a></li>
								<li><a href="checkout.html"><i class="fa fa-crosshairs"></i>Thanh toán</a></li>
								<li><a href="cart.html"><i class="fa fa-shopping-cart"></i>Giỏ hàng</a></li>
								<li><a href="{{URL::to('/login')}}"><i class="fa fa-lock"></i>Đăng nhập</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	
		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="{{ URL::to('/Trang-chu') }}" class="active">Trang chủ</a></li>
								<li class="dropdown"><a href="#">Sản phẩm<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="{{ URL::to('/shop') }}">Products</a></li>
										<li><a href="{{ URL::to('/product') }}">Product Details</a></li> 
										<li><a href="checkout.html">Checkout</a></li> 
										<li><a href="cart.html">Cart</a></li> 
										<li><a href="login.html">Login</a></li> 
                                    </ul>
                                </li> 
								<li class="dropdown"><a href="#">Tin tức<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="blog.html">Blog List</a></li>
										<li><a href="blog-single.html">Blog Single</a></li>
                                    </ul>
                                </li> 								
								<li><a href="contact-us.html">Liên hệ</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="pull-right">
							<form class="navbar-form pull-right" role="search">
								<div class="input-group">
								<input type="text" class="form-control" placeholder="Search">
								<div class="input-group-btn">
									<button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
								</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->
	
	<section id="slider"><!--slider-->
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div id="slider-carousel" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
							<li data-target="#slider-carousel" data-slide-to="1"></li>
							<li data-target="#slider-carousel" data-slide-to="2"></li>
						</ol>
						
						<div class="carousel-inner">
							<div class="item active">
								<div class="col-sm-6">
									<h1><span>More</span>-Shopping</h1>
									<h2>Giới thiệu</h2>
									<p>Không chỉ đơn thuần là tạo ra những sản phẩm chất lượng mà là "những sản phẩm hoàn hảo nhất do người Việt làm"</p>
									<button type="button" class="btn btn-default get">Xem thêm</button>
								</div>
								<div class="col-sm-6">
									<img src="{{ ('public/frontend/images/home/girl1.jpg') }}" class="girl img-responsive" alt="" />
									<img src="{{ ('public/frontend/images/home/pricing.png') }}"  class="pricing" alt="" />
								</div>
							</div>
							<div class="item">
								<div class="col-sm-6">
									<h1><span>More</span>-Shopping</h1>
									<h2>Giới thiệu</h2>
									<p>Không chỉ đơn thuần là tạo ra những sản phẩm chất lượng mà là "những sản phẩm hoàn hảo nhất do người Việt làm"</p>
									<button type="button" class="btn btn-default get">Xem thêm</button>
								</div>
								<div class="col-sm-6">
									<img src="{{ asset('public/frontend/images/home/girl2.jpg') }}" class="girl img-responsive" alt="" />
									<img src="{{ asset('public/frontend/images/home/pricing.png') }}"  class="pricing" alt="" />
								</div>
							</div>
							
							<div class="item">
								<div class="col-sm-6">
									<h1><span>More</span>-Shopping</h1>
									<h2>Giới thiệu</h2>
									<p>Không chỉ đơn thuần là tạo ra những sản phẩm chất lượng mà là "những sản phẩm hoàn hảo nhất do người Việt làm"</p>
									<button type="button" class="btn btn-default get">Xem thêm</button>
								</div>
								<div class="col-sm-6">
									<img src="{{ asset('public/frontend/images/home/girl3.jpg') }}" class="girl img-responsive" alt="" />
									<img src="{{ asset('public/frontend/images/home/pricing.png') }}" class="pricing" alt="" />
								</div>
							</div>
							
						</div>
						
						<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
							<i class="fa fa-angle-left"></i>
						</a>
						<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
							<i class="fa fa-angle-right"></i>
						</a>
					</div>
					
				</div>
			</div>
		</div>
	</section><!--/slider-->
	
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Danh mục</h2>
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordian" href="#sportswear">
											<span class="badge pull-right"><i class="fa fa-plus"></i></span>
											Đồ Thể Thao
										</a>
									</h4>
								</div>
								<div id="sportswear" class="panel-collapse collapse">
									<div class="panel-body">
										<ul>
											<li><a href="#">Nike </a></li>
											<li><a href="#">Under Armour </a></li>
											<li><a href="#">Adidas </a></li>
											<li><a href="#">Puma</a></li>
											<li><a href="#">ASICS </a></li>
										</ul>
									</div>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordian" href="#mens">
											<span class="badge pull-right"><i class="fa fa-plus"></i></span>
											Nam
										</a>
									</h4>
								</div>
								<div id="mens" class="panel-collapse collapse">
									<div class="panel-body">
										<ul>
											<li><a href="#">Fendi</a></li>
											<li><a href="#">Guess</a></li>
											<li><a href="#">Valentino</a></li>
											<li><a href="#">Dior</a></li>
											<li><a href="#">Versace</a></li>
										</ul>
									</div>
								</div>
							</div>
							
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordian" href="#womens">
											<span class="badge pull-right"><i class="fa fa-plus"></i></span>
											Nữ
										</a>
									</h4>
								</div>
								<div id="womens" class="panel-collapse collapse">
									<div class="panel-body">
										<ul>
											<li><a href="#">Fendi</a></li>
											<li><a href="#">Guess</a></li>
											<li><a href="#">Valentino</a></li>
											<li><a href="#">Dior</a></li>
											<li><a href="#">Versace</a></li>
											<li><a href="#">Armani</a></li>
											<li><a href="#">Prada</a></li>
											<li><a href="#">Dolce and Gabbana</a></li>
											<li><a href="#">Chanel</a></li>
											<li><a href="#">Gucci</a></li>
										</ul>
									</div>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="#">Trẻ em</a></h4>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="#">Thời Trang</a></h4>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="#">Gia Đình</a></h4>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="#">Thiết Kế</a></h4>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="#">Thịnh Hành</a></h4>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="#">Balo</a></h4>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="#">Giày</a></h4>
								</div>
							</div>
						</div><!--/category-products-->
					
						<div class="brands_products"><!--brands_products-->
							<h2>Thương hiệu</h2>
							<div class="brands-name">
								<ul class="nav nav-pills nav-stacked">
									<li><a href="#"> <span class="pull-right">(50)</span>Fendi</a></li>
									<li><a href="#"> <span class="pull-right">(56)</span>Guess</a></li>
									<li><a href="#"> <span class="pull-right">(27)</span>Valentino</a></li>
									<li><a href="#"> <span class="pull-right">(32)</span>Dior</a></li>
									<li><a href="#"> <span class="pull-right">(5)</span>Versace</a></li>
									<li><a href="#"> <span class="pull-right">(9)</span>Armani</a></li>
									<li><a href="#"> <span class="pull-right">(4)</span>Prada</a></li>
									<li><a href="#"> <span class="pull-right">(15)</span>Chanel</a></li>
									<li><a href="#"> <span class="pull-right">(7)</span>Dolce and Gabbana</a></li>
									<li><a href="#"> <span class="pull-right">(20)</span>Gucci</a></li>
								</ul>
							</div>
						</div><!--/brands_products-->
						
						<div class="price-range"><!--price-range-->
							<h2>Khoảng Giá</h2>
							<div class="well text-center">
								 <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="10000" data-slider-step="100" data-slider-value="[0,2500]" id="sl2" ><br />
								 <b class="pull-left">$ 0	</b> <b class="pull-right">$ 10.000.000</b>
							</div>
						</div><!--/price-range-->
						
						<div class="shipping text-center"><!--shipping-->
							<img src="{{ asset('public/frontend/images/home/shipping.jpg') }}" alt="" />
						</div><!--/shipping-->
					
					</div>
				</div>
				
				<div class="col-sm-9 padding-right">
				@yield('content')
										
				</div>
			</div>
		</div>
	</section>
	
	<footer id="footer"><!--Footer-->
		<div class="footer-top">
			<div class="container">
				<div class="row">
					<div class="col-sm-2">
						<div class="companyinfo">
							<h2><span>e</span>-shopper</h2>
							<p>Trang thương mại chuyên bán các mặt hàng thời trang nam,nữ, gia đình đầy đủ.</p>
						</div>
					</div>
					<div class="col-sm-7">
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<img src="{{ asset('public/frontend/images/home/iframe1.png') }}" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								<p>Thương Hiệu Nam</p>
								<h2>24 DEC 2014</h2>
							</div>
						</div>
						
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<img src="{{ asset('public/frontend/images/home/iframe2.png') }}" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								<p>Phụ Kiện Nữ</p>
								<h2>24 DEC 2014</h2>
							</div>
						</div>
						
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<img src="{{ asset('public/frontend/images/home/iframe3.png')}}" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								<p>Thời Trang Nữ</p>
								<h2>24 DEC 2014</h2>
							</div>
						</div>
						
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<img src="{{ asset('public/frontend/images/home/iframe4.png') }}" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								<p>Trang Sức Nữ</p>
								<h2>24 DEC 2014</h2>
							</div>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="address">
							<img src="{{ asset('public/frontend/images/home/map.png') }}" alt="" />
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="footer-widget">
			<div class="container">
				<div class="row">
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Dịch Vụ</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Hỗ trợ trực tuyến</a></li>
								<li><a href="#">Liên hệ chúng tôi</a></li>
								<li><a href="#">Tình trạng đặt hàng</a></li>
								<li><a href="#">Thay đổi địa điểm</a></li>
								<li><a href="#">Câu hỏi thường gặp</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Chính Sách</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Chính sách bảo mật thanh toán</a></li>
								<li><a href="#">Chính sách thanh toán</a></li>
								<li><a href="#">Chính sách giao hàng</a></li>
								<li><a href="#">Chính sách đổi trả</a></li>
								<li><a href="#">Chính sách bảo hành</a></li>
								<li><a href="#">Điều khoảng và điều kiện giao dịch</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>E - Shopper</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Giới Thiệu về E-Shop </a></li>
								<li><a href="#">Đánh Giá của Khách Hàng</a></li>
								<li><a href="#">Được Chứng Nhận bởi Bộ Công Thương</a></li>
							</ul>
						</div>

					</div>
					<div class="col-sm-3 col-sm-offset-1">
						<div class="single-widget">
							<h2>Liên Hệ với chúng tôi.</h2>
							<form action="#" class="searchform">
								<input type="text" placeholder="Your email address" />
								<button type="submit" class="btn btn-default"><i class="fa fa-arrow-circle-o-right"></i></button>
							</form>
						</div>
					</div>
					
				</div>
			</div>
		</div>
		<div class="footer-bottom">
			<div class="container">
				<div class="row">
				<p class="pull-left">© 2020 - Bản quyền của Nhóm Ku-Ma</p>
					<p class="pull-left">Lưu Phước Hậu - Phan Phi Hùng - Đỗ Tiến Hiệp - Nguyễn Mạnh Cường.</p>
					<p class="pull-right">Designed by <span><a target="_blank" href="http://www.themeum.com">Themeum</a></span></p>
				</div>
			</div>
		</div>
				
		<!-- <div class="footer-bottom">
			<div class="container">
				<div class="row">
					<p class="pull-left">Copyright © 2013 E-SHOPPER Inc. All rights reserved.</p>
					<p class="pull-right">Designed by <span><a target="_blank" href="http://www.themeum.com">Themeum</a></span></p>
				</div>
			</div>
		</div>
		 -->
	</footer><!--/Footer-->
    <script src="{{ asset('public/frontend/js/jquery.js') }}"></script>
	<script src="{{ asset('public/frontend/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('public/frontend/js/jquery.scrollUp.min.js') }}"></script>
	<script src="{{ asset('public/frontend/js/price-range.js') }}"></script>
    <script src="{{ asset('public/frontend/js/jquery.prettyPhoto.js') }}"></script>
    <script src="{{ asset('public/frontend/js/main.js') }}"></script>
</body>
</html>