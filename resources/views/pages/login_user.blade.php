<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Đăng nhập</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<style>
body {
	color: #434343;
	background: #dfe7e9;
	font-family: 'Varela Round', sans-serif;
}
.form-control {
	font-size: 16px;
	transition: all 0.4s;
	box-shadow: none;
}
.form-control:focus {
	border-color: #5cb85c;
}
.form-control, .btn {
	border-radius: 50px;
	outline: none !important;
}
.signin-form {
	width: 400px;
	margin: 0 auto;
	padding: 10px 0;
}
.signin-form form {
	border-radius: 5px;
	margin-bottom: 20px;
	background: #fff;
	box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
	padding: 40px;
}
.signin-form a {
	color: #5cb85c;
}    
.signin-form h2 {
	text-align: center;
	font-size: 34px;
	margin: 10px 0 15px;
}
.signin-form .hint-text {
	color: #999;
	text-align: center;
	margin-bottom: 20px;
}
.signin-form .form-group {
	margin-bottom: 20px;
}
.signin-form .btn {        
	font-size: 18px;
	line-height: 26px;        
	font-weight: bold;
	text-align: center;
}
.signin-form .small {
	font-size: 13px;
}
.signin-btn {
	text-align: center;
	border-color: #5cb85c;
	transition: all 0.4s;
}
.signin-btn:hover {
	background: #5cb85c;
	opacity: 0.8;
}
.or-seperator {
	margin: 50px 0 15px;
	text-align: center;
	border-top: 1px solid #e0e0e0;
}
.or-seperator b {
	padding: 0 10px;
	width: 40px;
	height: 40px;
	font-size: 16px;
	text-align: center;
	line-height: 40px;
	background: #fff;
	display: inline-block;
	border: 1px solid #e0e0e0;
	border-radius: 50%;
	position: relative;
	top: -22px;
	z-index: 1;
}
.social-btn .btn {
	color: #fff;
	margin: 10px 0 0 30px;
	font-size: 15px;
	width: 55px;
	height: 55px;
	line-height: 45px;
	border-radius: 50%;
	font-weight: normal;
	text-align: center;
	border: none;
	transition: all 0.4s;
}	
.social-btn .btn:first-child {
	margin-left: 0;
}
.social-btn .btn:hover {
	opacity: 0.8;
}
.social-btn .btn-primary {
	background: #507cc0;
}
.social-btn .btn-info {
	background: #64ccf1;
}
.social-btn .btn-danger {
	background: #df4930;
}
.social-btn .btn i {
	font-size: 20px;
}
</style>
</head>
<body>
<section id="form"><!--form-->
<div class="signin-form">
    <form action="{{URL::to('/login-user')}}" method="post">
		<h2>Đăng nhập</h2>
		@if(session()->has('message'))
					<div class="alert alert-success">
						{!! session()->get('message') !!}
					</div>
					@elseif(session()->has('error'))
						<div class="alert alert-danger">
							{!! session()->get('error') !!}
						</div>
					@endif
					<form action="{{URL::to('/login-user')}}" method="POST">
							{{csrf_field()}}

        <p class="hint-text">Đăng nhập với mạng xã hội</p>
		<div class="social-btn text-center">
			<a href="{{URL::to('/login-facebook')}}" class="btn btn-primary btn-lg" title="Facebook"><i class="fa fa-facebook"></i></a>
			<a href="{{URL::to('/login-google')}}" class="btn btn-danger btn-lg" title="Google"><i class="fa fa-google"></i></a>
		</div>
		<div class="or-seperator"><b>hoặc</b></div>
        <div class="form-group">
        	<input type="text" class="form-control input-lg" name="email_account" placeholder="Tên đăng nhập" required="required">
        </div>
		<div class="form-group">
            <input type="password" class="form-control input-lg" name="password_account" placeholder="Mật khẩu" required="required">
        </div>  
        <div class="form-group">
            <button type="submit" class="btn btn-success btn-lg btn-block signin-btn">Đăng nhập</button>
        </div>
        <div class="text-center small"><a href="{{URL::to('forget-password')}}">Bạn quên mật khẩu?</a></div>
    </form>
    <div class="text-center small">Bạn chưa có tài khoản? <a href="{{URL::to('register')}}">Đăng ký</a></div>
</div>
</section><!--/form-->

</body>
</html>