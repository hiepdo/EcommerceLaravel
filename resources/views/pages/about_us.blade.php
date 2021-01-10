@extends('layout')
@section('content')
<div class="our-team-info">
<div class="container">
    <div class="wrap-breadcrumb">
        <ul>
            <li class="item-link"><a href="{{URL::to('/Home')}}" class="link">Trang chủ</a></li>
            <li class="item-link"><span>Giới thiệu</span></li>
        </ul>
    </div>
					<h4 class="title-box">Our teams</h4>
					<div class="our-staff">
						<div 
							class="slide-carousel owl-carousel style-nav-1 equal-container" 
							data-items="5" 
							data-loop="false" 
							data-nav="true" 
							data-dots="false"
							data-margin="30"
							data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"3"},"1200":{"items":"4"}}' >

							<div class="team-member equal-elem">
								<div class="media">
									<a href="#" title="LEONA">
										<figure><img src="{{ asset('public/frontend/images/member-braum.jpg') }}" alt="LEONA"></figure>
									</a>
								</div>
								<div class="info">
									<b class="name">Nguyễn Mạnh Cường</b>
									<span class="title">Designer</span>
									<p class="desc">18600037</p>
								</div>
							</div>

							<div class="team-member equal-elem">
								<div class="media">
									<a href="#" title="LUCIA">
										<figure><img src="{{ asset('public/frontend/images/Xô.jpg') }}" alt="LUCIA"></figure>
									</a>
								</div>
								<div class="info">
									<b class="name">Cô Bốc Xô</b>
									<span class="title">Manager</span>
									<p class="desc">18600063</p>
								</div>
							</div>

							<div class="team-member equal-elem">
								<div class="media">
									<a href="#" title="NANA">
										<figure><img src="{{ asset('public/frontend/images/Hau.jpg') }}" alt="NANA"></figure>
									</a>
								</div>
								<div class="info">
									<b class="name">Lưu Phước Hậu</b>
									<span class="title">Marketer</span>
									<p class="desc">18600082</p>
								</div>
							</div>

							<div class="team-member equal-elem">
								<div class="media">
									<a href="#" title="BRAUM">
										<figure><img src="{{ asset('public/frontend/images/Hung.jpg') }}" alt="BRAUM"></figure>
									</a>
								</div>
								<div class="info">
									<b class="name">Phan Phi Hùng</b>
									<span class="title">Developer</span>
									<p class="desc">18600100</p>
								</div>
							</div>
						</div>

					</div>

				</div>
</div>
@endsection