
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

			<h1><Center>Đăng ký tài khoản</Center></h1><br>
			<form action="{{URL::to('/register-user')}}" method="POST">
							{{csrf_field()}}
            <form class="form-signin">
              <div class="form-label-group">
                <input type="text" name="customer_name" class="form-control" placeholder="Họ và tên">
              </div>
              <div class="form-label-group">
                <input type="email" name="customer_email" class="form-control" placeholder="Địa chỉ email">
              </div>
              <div class="form-label-group">
                <input type="password" name="customer_password" class="form-control" placeholder="Mật khẩu">
              </div>
              <div class="form-label-group">
                <input type="text" name="customer_phone" class="form-control" placeholder="Số điện thoại">
              </div>
			  <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Đăng ký</button>
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
