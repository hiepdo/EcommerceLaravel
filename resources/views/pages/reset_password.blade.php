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
                                @php
                                    $token = $_GET['token'];
                                    $email = $_GET['email'];
                                @endphp
                                <form action="{{URL::to('/update-password')}}" method="POST">
								{{csrf_field()}}
									<fieldset class="wrap-title">
										<h3 class="form-title">Đổi mật khẩu mới</h3>										
									</fieldset>
									<fieldset class="wrap-input">
                                        <input type="hidden" name="email" value="{{$email}}">
                                        <input type="hidden" name="token" value="{{$token}}">
										<label for="frm-reset-password">Mật khẩu mới:</label>
										<input type="password" name="new-password" class="frm-newletter" placeholder="mật khẩu mới">
                                        <label for="frm-reset-password-verify">Nhập lại mật khẩu mới:</label>
										<input type="password" name="retype-password" class="frm-newletter" placeholder="Nhập lại mật khẩu mới">
									</fieldset>
									<input type="submit" class="btn btn-submit" value="Đổi mật khẩu" name="submit">
								</form>
							</div>												
						</div>
					</div><!--end main products area-->		
				</div>
			</div><!--end row-->

		</div><!--end container-->

	</main>

@endsection


<!-- <section id="form">
		<div class="container">
			<div class="row 12">
				<div class="col-sm-12 col-sm-offset-1">
                    @if(session()->has('message'))
                    <div class="alert alert-success">
                        {!! session()->get('message') !!}
                    </div>
                    @elseif(session()->has('error'))
                        <div class="alert alert-danger">
                            {!! session()->get('error') !!}
                        </div>
                    @endif
					<div class="login-form">
                        @php
                            $token = $_GET['token'];
                            $email = $_GET['email'];
                        @endphp
						<h2>Đổi mật khẩu mới</h2>
						<form action="{{URL::to('/update-password')}}" method="POST">
							{{csrf_field()}}
                            <input type="hidden" name="email" value="{{$email}}">
                            <input type="hidden" name="token" value="{{$token}}">
							<input type="password" name="new-password" placeholder="mật khẩu mới"/>
                            <input type="password" name="retype-password" placeholder="nhập lại mật khẩu mới"/>
							<button type="submit" class="btn btn-default">Đổi mật khẩu</button>
						</form>
					</div>
				</div>
			</div>
		</div>
</section> -->