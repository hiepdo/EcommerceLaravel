@extends('layout')
@section('content')
<section id="form"><!--form-->
<div class="signin-form">
<form action="{{URL::to('/register-user')}}" method="POST">
		@if(session()->has('message'))
					<div class="alert alert-success">
						{!! session()->get('message') !!}
					</div>
					@elseif(session()->has('error'))
						<div class="alert alert-danger">
							{!! session()->get('error') !!}
						</div>
					@endif
					<form action="{{URL::to('/register-user')}}" method="POST">
							{{csrf_field()}}
<div class="container">
	<div class="wrap-breadcrumb">
	<ul>
		<li class="item-link"><a href="{{URL::to('Home')}}" class="link">Trang chủ</a></li>
		<li class="item-link"><span>Đăng ký</span></li>
	</ul>
	</div>
	<div class="row">
	<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12 col-md-offset-3">							
		<div class=" main-content-area">
			<div class="wrap-login-item ">
				<div class="register-form form-item ">
					<form class="form-stl" action="#" name="frm-login" method="get" >
						<fieldset class="wrap-title">
							<h3 class="form-title">Đăng ký tài khoản</h3>
							<a href="{{URL::to('/login-facebook')}}" class="btn btn-primary btn-lg" title="Facebook"><i class="fa fa-facebook"></i></a>
							<a href="{{URL::to('/login-google')}}" class="btn btn-danger btn-lg" title="Google"><i class="fa fa-google"></i></a>
						</fieldset>									
						<fieldset class="wrap-input">
							<label for="frm-reg-lname">Tên người dùng</label>
							<input type="text" name="customer_name" placeholder="Họ và tên">
						</fieldset>
						<fieldset class="wrap-input">
							<label for="frm-reg-email">Email người dùng</label>
							<input type="email"  name="customer_email" placeholder="Địa chỉ email">
						</fieldset>
						<fieldset class="wrap-input">
							<label for="frm-reg-cfpass">Mật khẩu</label>
							<input type="password" name="customer_password" placeholder="Mật khẩu">
						</fieldset>
						<fieldset class="wrap-input">
							<label for="frm-reg-cfphone">Mật khẩu</label>
							<input type="text" name="customer_phone" placeholder="Số điện thoại">
						</fieldset>
						<input type="submit" class="btn btn-sign" value="Register" name="register">
					</form>
				</div>											
			</div>
		</div><!--end main products area-->		
	</div>
</div><!--end row-->

</div><!--end container-->
@endsection