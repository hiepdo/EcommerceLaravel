@extends('layout')
@section('content')
	<section id="form"><!--form-->
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
					<div class="login-form"><!--login form-->
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
					</div><!--/login form-->
				</div>
			</div>
		</div>
	</section><!--/form-->
@endsection