
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="{{ asset('public/frontend/logincss/all.css') }}" rel="stylesheet">
	<link href="{{ asset('public/frontend/logincss/bootstrap.min.css') }}" rel="stylesheet">
	<link href="{{ asset('public/frontend/logincss/css.css') }}" rel="stylesheet">
	<title>Document</title>
</head>
<body>
	<section id="form"><!--form-->
  	<div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
		<div class="logo pull-left">
			<img src="{{ asset('public/frontend/images/home/logo.png') }}" alt="" /></a>
		</div>
          <div class="card-body">
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
            <form class="form-signin">
              <div class="form-label-group">
                <input type="email" name="email_account" class="form-control" placeholder="Điền email của bạn">
                <!-- <label for="email_account">Địa chỉ email</label> -->
              </div>

              <div class="form-label-group">
                <input type="password" name="password_account" class="form-control" placeholder="Điền mật khẩu">
                <!-- <label for="password_account">Mật khẩu</label> -->
              </div>

              <div class="custom-control custom-checkbox mb-3">
                <input type="checkbox" class="custom-control-input" id="customCheck1">
				<label class="custom-control-label" for="customCheck1">Nhớ mật khẩu</label>
              </div>
			  <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Đăng nhập</button>
			<span>
			Bạn chưa có tài khoản ?
			<a href="{{URL::to('register-user')}}">Đăng kí</a>
			<br>
			Bạn quên mật khẩu ? 
			<a href="{{URL::to('forget-password')}}">Lấy mật khẩu </a>
			</span> 
			  
              <hr class="my-4">
            </form>
          </div>
        </div>
      </div>
	</div>
  </div>
  </section><!--/form-->
  <script src="{{ asset('public/logincss/jquery.slim.min.js') }}"></script>
  <script src="{{ asset('public/logincss/bootstrap.bundle.min.js') }}"></script>
  

</body>
</html>
