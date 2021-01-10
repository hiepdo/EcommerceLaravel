@extends('layout')
@section('content')
<section id="form"><!--form-->
<div class="signin-form">
    <form action="{{URL::to('/login-user')}}" method="post">
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
							<div class="container">

<div class="wrap-breadcrumb">
	<ul>
		<li class="item-link"><a href="{{URL::to('Home')}}" class="link">Trang chủ</a></li>
		<li class="item-link"><span>Đăng nhập</span></li>
	</ul>
</div>
<div class="row">
	<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12 col-md-offset-3">
		<div class=" main-content-area">
			<div class="wrap-login-item ">						
				<div class="login-form form-item form-stl">
					<form name="frm-login">
						<fieldset class="wrap-title">
							<h2 class="form-title">Đăng nhập</h2>	
							<div class="social-btn">	
							<a href="{{URL::to('/login-facebook')}}" class="btn btn-primary b" title="Facebook"><i class="fa fa-facebook"></i></a>
							<a href="{{URL::to('/login-google')}}" class="btn btn-danger btn-lg" title="Google"><i class="fa fa-google"></i></a>		
							<div>						
						</fieldset>
						<fieldset class="wrap-input">
							<label for="frm-login-uname">Địa chỉ email</label>
							<input type="text" name="email_account" placeholder="Email">
						</fieldset>
						<fieldset class="wrap-input">
							<label for="frm-login-pass">Mật khẩu</label>
							<input type="password" name="password_account" placeholder="************">
						</fieldset>
						
						<fieldset class="wrap-input">
							<label class="remember-field">
								<input class="frm-input " name="rememberme" id="rememberme" value="forever" type="checkbox"><span>Remember me</span>
							</label>
							<a class="link-function left-position" href="{{URL::to('forget-password')}}" title="Forgotten password?">Quên mật khẩu</a>
						</fieldset>
						<input type="submit" class="btn btn-submit" value="Đăng nhập" name="submit">
						<a href="{{URL::to('register')}}" class="btn btn-submit">Đăng ký</a>
					</form>
				</div>												
			</div>
		</div><!--end main products area-->		
	</div>
</div><!--end row-->
</div><!--end container-->
@endsection