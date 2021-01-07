
<!DOCTYPE html>
<head>
<title>Dashboard</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Visitors Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap-css -->
<link rel="stylesheet" href="{{asset('public/backend/css/bootstrap.min.css')}}" >
<!-- //bootstrap-css -->
<!-- get token  -->
<meta name="csrf-token" content="{{ csrf_token() }}">
<!-- //get token  -->
<!-- Custom CSS -->
<link href="{{asset('public/backend/css/style.css')}}" rel='stylesheet' type='text/css' />
<link href="{{asset('public/backend/css/style-responsive.css')}}" rel="stylesheet"/>
<!-- font CSS -->
<!-- <link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'> -->
<!-- font-awesome icons -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
<!-- <link rel="stylesheet" href="{{asset('public/backend/css/font.css')}}" type="text/css"/> -->
<!-- <link href="{{asset('public/backend/css/font-awesome.css')}}" rel="stylesheet">  -->
<link rel="stylesheet" href="{{asset('public/backend/css/morris.css')}}" type="text/css"/>
<!-- calendar -->
<link rel="stylesheet" href="{{asset('public/backend/css/monthly.css')}}">
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

<!-- //calendar -->
<!-- //font-awesome icons -->
<script src="{{asset('public/backend/js/jquery2.0.3.min.js')}}"></script>
<script src="{{asset('public/backend/js/raphael-min.js')}}"></script>
<script src="{{asset('public/backend/js/morris.js')}}"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script type="text/javascript">

    $( function() {
        $( "#datepicker" ).datepicker({
            dateFormat: "yy-mm-dd"
        });

        $( "#datepicker2" ).datepicker({
            dateFormat: "yy-mm-dd"
        });
    } );
    
    
</script>

</head>
<body>
<section id="container">
<!--header start-->
<header class="header fixed-top clearfix">
<!--logo start-->
<div class="brand">
    <a href="index.html" class="logo">
        ADMIN
    </a>
    <div class="sidebar-toggle-box">
        <div class="fa fa-bars"></div>
    </div>
</div>
<div class="top-nav clearfix">
    <!--search & user info start-->
    <ul class="nav pull-right top-menu">
        <li>
            <input type="text" class="form-control search" placeholder=" Search">
        </li>
        <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                <img alt="" src="{{asset('public/backend/images/2.png')}}">
                <span class="username">
				<?php
					$name= Session::get('admin_name');
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
        <!-- user login dropdown end -->
       
    </ul>
    <!--search & user info end-->
</div>
</header>
<!--header end-->
<!--sidebar start-->
<aside>
    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->
        <div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">
                <li>
                    <a class="active" href="{{URL::to('/dashboard')}}">
                        <i class="fa fa-dashboard"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Danh mục sản phẩm </span>
                    </a>
                    <ul class="sub">
						<li><a href="{{URL::to('/add-category-product')}}">Thêm danh mục sản phẩm</a></li>
						<li><a href="{{URL::to('/all-category-product')}}">Liệt kê danh mục sản phẩm</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Bình luận </span>
                    </a>
                    <ul class="sub">
						<!-- <li><a href="{{URL::to('/add-category-product')}}">Thêm danh mục sản phẩm</a></li> -->
						<li><a href="{{URL::to('/comment')}}">Liệt kê bình luận</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Thương hiệu sản phẩm </span>
                    </a>
                    <ul class="sub">
						<li><a href="{{URL::to('/add-brand-product')}}">Thêm thương hiệu sản phẩm</a></li>
                        <li><a href="{{URL::to('/all-brand-product')}}">Liệt kê thương hiệu sản phẩm</a></li>
                    </ul>
                </li>
				<li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Sản Phẩm </span>
                    </a>
                    <ul class="sub">
						<li><a href="{{URL::to('/add-product')}}">Thêm sản phẩm</a></li>
                        <li><a href="{{URL::to('/all-product')}}">Liệt kê sản phẩm</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="{{URL::to('/all-customer-account')}}">
                        <i class="fa fa-book"></i>
                        <span>Danh sách tài khoản</span>
                    </a>                    
                </li>
                
            </ul>         
        <!-- sidebar menu end-->
    </div>
</aside>
<!--sidebar end-->
<!--main content start-->
<section id="main-content">
	<section class="wrapper">
		@yield('admin_content')
	</section>
 <!-- footer -->
		  <div class="footer">
			<div class="wthree-copyright">
			  <p>© 2020.All rights reserved | Design by <a href="#"></a></p>
			</div>
		  </div>
  <!-- / footer -->
    </section>
<!--main content end-->
</section>
<script src="{{asset('public/backend/js/bootstrap.js')}}"></script>
<script src="{{asset('public/backend/js/jquery.dcjqaccordion.2.7.js')}}"></script>
<script src="{{asset('public/backend/js/scripts.js')}}"></script>
<script src="{{asset('public/backend/js/jquery.slimscroll.js')}}"></script>
<script src="{{asset('public/backend/js/jquery.nicescroll.js')}}"></script>
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
<script src="{{asset('public/backend/js/jquery.scrollTo.js')}}"></script>
<script type="text/javascript">
    $('.comment-check-btn').click(function(){
        var comment_status = $(this).data('comment_status');
        var comment_id = $(this).data('comment_id');
        var comment_product_id = $(this).attr('id');
        if(comment_status == 0)
        {
            var alert = 'Đã duyệt bình luận';
        }
        else
        {
            var alert = 'Đã bỏ duyệt bình luận';
        } 
        $.ajax({
				url : '{{url('/allow-comment')}}',
				method: "POST", 
				headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data:{comment_status:comment_status,comment_id:comment_id,comment_product_id:comment_product_id},
				success:function(data)
				{
                    location.reload();
					$('#notify_comment').html('<div class="alert alert-danger" role="alert">'+ alert +'</div>');     
                    /* $('#notify_comment ').fadeOut(10000); */
                    
                }
        });
    });
    $('.btn-reply-comment').click(function(){
        var comment_id = $(this).data('comment_id');

        var comment = $('.reply_comment_' + comment_id).val();

        var comment_product_id = $(this).data('product_id');

        var alert = 'Trả lời bình luận thành công';

        $.ajax({
				url : '{{url('/reply-comment')}}',
				method: "POST", 
				headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data:{comment:comment,comment_id:comment_id,comment_product_id:comment_product_id},
				success:function(data)
				{
					$('#notify_comment').html('<div class="alert alert-danger" role="alert">'+ alert +'</div>');     
                    $('.reply_comment_' + comment_id).val('');
                }
        });

        
    });
</script>

<script type="text/javascript">

    $('#btn-dashboard-filter').click( function(){
        //var token = $('input[name="_token"]').val();
        var from_date = $('#datepicker').val();
        var to_date = $('#datepicker2').val();
        
        $.ajax({
            url: "{{url('/filter-by-date')}}",
            method: "POST",
            dataType: "JSON",
            data: {from_date: from_date, to_date: to_date, "_token": "{{ csrf_token() }}",},

            success:function(data)
            {
                chart.setData(data);
            }
        });
    });
</script>
<script type="text/javascript">

    var chart = new Morris.Area({
    element: 'chart',
    
    pointFillColors: ['#ffffff'],
    pointStrokeColors: ['black'],
    hideHover: 'auto',
    fillOpacity: 1,
    parseTime: false,
    xkey: 'period',
    ykeys: ['order', 'sales', 'profit', 'quantity'],
    labels: ['đơn hàng', 'doanh số', 'lợi nhuận', 'số lượng']
    }); 

</script>
</body>
</html>