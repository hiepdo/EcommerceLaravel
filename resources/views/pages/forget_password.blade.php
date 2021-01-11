@extends('layout')
@section('content')

<main id="main" class="main-site left-sidebar">
		<div class="container">
			<div class="wrap-breadcrumb">
				<ul>
					<li class="item-link"><a href="{{ URL::to('/Home') }}" class="link">Home</a></li>
					<li class="item-link"><span>Forget Password</span></li>
				</ul>
			</div>
			<div class="row">
			  	@if(session()->has('message'))
					<div class="alert alert-success">
						<p style="font-size:15px; text-align:center;">{{session()->get('message')}}</p>
					</div>
            	@elseif(session()->has('error'))
					<div class="alert alert-danger">
						<p style="font-size:15px; text-align:center;"> {{session()->get('error')}}</p>
					</div>
           	 	@endif
				<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12 col-md-offset-3">
					<div class=" main-content-area">
						<div class="wrap-login-item ">						
							<div class="login-form form-item form-stl">
								<form action="{{URL::to('/recover-pass')}}" method="POST">	
								{{csrf_field()}}
									<fieldset class="wrap-title">
										<h3 class="form-title">Tìm lại mật khẩu</h3>										
									</fieldset>
									<fieldset class="wrap-input">
										<label for="frm-login-uname">Địa chỉ email:</label>
										<input type="email" class="frm-newletter" name="email_account" placeholder="Nhập địa chỉ email của bạn">
									</fieldset>
									<input type="submit" class="btn btn-submit" value="Tìm lại mật khẩu" name="submit">
								</form>
							</div>												
						</div>
					</div><!--end main products area-->		
				</div>
			</div><!--end row-->

		</div><!--end container-->

	</main>
	<!--main area-->
@endsection


