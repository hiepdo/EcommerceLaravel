@extends('layout')
@section('content')

	<section id="form"><!--form-->
		<div class="container">
			<div class="row 12">
				<div class="col-sm-12 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						@if(session()->has('message'))
						<div class="alert alert-success">
							{!! session()->get('message') !!}
						</div>
						@elseif(session()->has('error'))
							<div class="alert alert-danger">
								{!! session()->get('error') !!}
							</div>
						@endif
						<h2>Lấy lại mật khẩu</h2>
						<form action="{{URL::to('/recover-pass')}}" method="POST">
							{{csrf_field()}}
							<input type="email" name="email_account" placeholder="Email" />
							<button type="submit" class="btn btn-default">Gửi Mail</button>
						</form>
					</div><!--/login form-->
				</div>
			</div>
		</div>
	</section><!--/form-->

@endsection