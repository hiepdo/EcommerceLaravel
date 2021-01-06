@extends('layout')
@section('content')
	<!--main area-->
	<main id="main" class="main-site">

		<div class="container">

			<div class="wrap-breadcrumb">
				<ul>
					<li class="item-link"><a href="{{ URL::to('/Home') }}" class="link">Home</a></li>
					<li class="item-link"><span>Thank You</span></li>
				</ul>
			</div>
		</div>
		
		<div class="container pb-60">
			<div class="row">
				<div class="col-md-12 text-center">
					<h2>Cảm ơn sự tin tưởng của bạn</h2>
                    <p>Chúng tôi sẽ liên hệ với bạn để xác nhận đơn hàng</p>
                    <a href="{{ URL::to('/shop') }}" class="btn btn-submit btn-submitx">Tiếp tục mua sắm</a>
				</div>
			</div>
		</div><!--end container-->

	</main>
	<!--main area-->
@endsection