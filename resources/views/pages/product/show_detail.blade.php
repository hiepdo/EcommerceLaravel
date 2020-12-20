@extends('layout')
@section('content')
@foreach($product_details as $key => $value)
<div class="product-details"><!--product-details-->
						<div class="col-sm-5">
							<div class="view-product">
								<img src="{{URL::to('/public/uploads/product/'.$value->product_image)}}" alt="" />
								<h3>ZOOM</h3>
							</div>
							<div id="similar-product" class="carousel slide" data-ride="carousel">
								
								  <!-- Wrapper for slides -->
								    <div class="carousel-inner">
										<div class="item active">
										  <a href=""><img src="{{URL::to('public/frontend/images/product-details/similar1.jpg')}}" alt=""></a>
										  <a href=""><img src="{{URL::to('public/frontend/images/product-details/similar2.jpg')}}" alt=""></a>
										  <a href=""><img src="{{URL::to('public/frontend/images/product-details/similar3.jpg')}}" alt=""></a>
										</div>																				
									</div>

								  <!-- Controls -->
								  <a class="left item-control" href="#similar-product" data-slide="prev">
									<i class="fa fa-angle-left"></i>
								  </a>
								  <a class="right item-control" href="#similar-product" data-slide="next">
									<i class="fa fa-angle-right"></i>
								  </a>
							</div>

						</div>
						<div class="col-sm-7">
							<div class="product-information"><!--/product-information-->
								<img src="images/product-details/new.jpg" class="newarrival" alt="" />
								<h2>{{$value->product_name}}</h2>
								<p>Mã sản phẩm: {{$value->product_id}}</p>
								<img src="images/product-details/rating.png" alt="" />
								<span>
									<span>{{number_format($value->product_price).' VNĐ'}}</span>
									<label>Số lượng:</label>
									<input type="number" min="1" value="1" />
									<button type="button" class="btn btn-fefault cart">
										<i class="fa fa-shopping-cart"></i>
										Thêm vào giỏ hàng
									</button>
								</span>
								<p><b>Tình trạng:</b> Còn hàng</p>
								<p><b>Điều kiện:</b> Mới 100%</p>
								<p><b>Thương hiệu:</b> {{$value->brand_name}}</p>
								<p><b>Danh mục:</b> {{$value->category_name}}</p>
								<a href=""><img src="images/product-details/share.png" class="share img-responsive"  alt="" /></a>
							</div><!--/product-information-->
						</div>
</div><!--/product-details-->                 
					<div class="category-tab shop-details-tab"><!--category-tab-->
						<div class="col-sm-12">
							<ul class="nav nav-tabs">
								<li><a href="#details" data-toggle="tab">Chi tiết sản phẩm</a></li>
								<li><a href="#companyprofile" data-toggle="tab">Mô tả sản phẩm</a></li>
								<li class="active"><a href="#reviews" data-toggle="tab">Bình luận sản phẩm (5)</a></li>
							</ul>
						</div>
						<div class="tab-content">
							<div class="tab-pane fade" id="details" >
                                <p>{!!$value->product_content!!}</p>																							
							</div>
							
							<div class="tab-pane fade" id="companyprofile" >
                                <p>{!!$value->product_desc!!}</p>														
							</div>
																					
							<div class="tab-pane fade active in" id="reviews" >
								<div class="col-sm-12">
									<ul>
										<li><a href=""><i class="fa fa-user"></i>Admin</a></li>
										<li><a href=""><i class="fa fa-clock-o"></i>12:41 PM</a></li>
										<li><a href=""><i class="fa fa-calendar-o"></i>31 DEC 2014</a></li>
									</ul>
									<style type="text/css">
										.style_comment
										{
											border: 1px solid #ddd;
											border-radius: 10px;
											background: #f0f0e9;
										}
									</style>
									<form style="margin-left:10px;">
										@csrf
										<input type="hidden" name="comment_product_id" class="comment_product_id" value="{{$value->product_id}}">
										<div id="comment_show"></div>		
									</form>				

									<p><b>Đánh giá của bạn</b></p>
									
									<form action="#">
										<span>
											<input class="comment_name" style="width:100%; margin-left:0px;" type="text" placeholder="Tên bình luận"/>
											<!-- <input type="email" placeholder="Email Address"/> -->
										</span>
										<textarea name="comment" class="comment_content" placeholder="Nội dung bình luận"></textarea>
										<div id="notify_comment"></div>
										<b>Đánh giá: </b> <img src="images/product-details/rating.png" alt="" />
										<button type="button" class="btn btn-default pull-right sent-comment">
											Gửi bình luận
										</button>
									</form>
								</div>
							</div>
							
						</div>
                    </div><!--/category-tab-->
@endforeach  
<div class="recommended_items"><!--recommended_items-->
						<h2 class="title text-center">Sản phẩm tương tự</h2>
						
						<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner">
								<div class="item active">
							    @foreach($relate as $key => $brand_relate)
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											 <div class="single-products">
		                                        <div class="productinfo text-center">
		                                            <img src="{{URL::to('public/uploads/product/'.$brand_relate->product_image)}}" alt="" />
		                                            <h2>{{number_format($brand_relate->product_price).' '.' VNĐ'}}</h2>
		                                            <p>{{$brand_relate->product_name}}</p>
		                                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</a>
		                                        </div>	                                      
                                			</div>
										</div>
									</div>
							    @endforeach							
                                </div>		
                            </div>
                            <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                                <i class="fa fa-angle-left"></i>
                            </a>
                            <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                                <i class="fa fa-angle-right"></i>
                            </a>										
						</div>
</div><!--/recommended_items-->
@endsection