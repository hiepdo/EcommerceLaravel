@extends('layout')
@section('content')
<main id="main" class="main-site">
	<div class="container">
			<div class="wrap-breadcrumb">
				<ul>
					<li class="item-link"><a href="{{ URL::to('/Home') }}" class="link">Trang chủ</a></li>
					<li class="item-link"><span>Chi tiết sản phẩm</span></li>
				</ul>
			</div>
		
		<div class="row">
			@foreach($product_details as $key => $value)
				<div class="col-lg-9 col-md-8 col-sm-8 col-xs-12 main-content-area">
					<div class="wrap-product-detail">
						<div class="detail-media">
							<div class="product-gallery">
							  <ul class="slides">
							  <a id="wishlist_deleteurl{{$value->product_id}}" href="{{ URL::full()}}" class="product-name"><span></span></a>
							  <a id="wishlist_producturl{{$value->product_id}}" href="{{ URL::to('/detail-product/'.$value->product_id)}}" class="product-name"><span></span></a>
							    <li data-thumb="{{URL::to('/public/uploads/product/'.$value->product_image)}}">
							    	<img  src="{{URL::to('/public/uploads/product/'.$value->product_image)}}" alt="product thumbnail" />
							    </li>
								@foreach($gallery as $key =>$gal)
								<li  data-thumb="{{URL::to('/public/uploads/gallery/'.$gal->gallery_image)}}">
							    	<img id="wishlist_productimage{{$value->product_id}}" src="{{URL::to('/public/uploads/gallery/'.$gal->gallery_image)}}" width="720" heigh="720" alt="product thumbnail" />
							    </li>
								@endforeach
							  </ul>
							</div>
						</div>
						<div class="detail-info">
							<div class="product-rating">

								<?php $numberlike = 0 ;?>
								<b>Lượt Yêu Thích:
								@foreach($all_product_toplike as $key => $pro_toplike)
								<?php if($value->product_id == $pro_toplike->product_id) 
								{ $numberlike = $pro_toplike->numberlike; }?>
								@endforeach
								<?php echo $numberlike; ?>
								<i class="fa fa-heart" aria-hidden="true"></i></b>
                            </div>
                            <h2 class="product-name">{{$value->product_name}}</h2>
                            <div class="short-desc">
                                <ul>
									<li><p><b>Mã sản phẩm: </b> {{$value->product_id}}</p></li>
                                    <li><p><b>Thương hiệu:</b> {{$value->brand_name}}</p></li>
                                    <li><p><b>Danh mục:</b> {{$value->category_name}}</p></li>
                                </ul>
                            </div>
                            <div class="wrap-social">
                            	<a class="link-socail" href="#"><img src="{{ asset('public/frontend/images/social-list.png') }}" alt=""></a>
                            </div>
                            <div class="wrap-price"><span class="product-price">{{number_format($value->product_price).' VNĐ'}}</span></div>
                            <div class="stock-info in-stock">
                                <p class="availability">Tình trạng: <b>Còn hàng</b></p>
                            </div>
                            <form>
							@csrf
								<div class="quantity">
									<span>Số lượng:</span>
									<input type="hidden" name="" value="{{$value->product_id}}" class="cart_product_id">
                                    <input type="hidden" name="" id="wishlist_productname{{$value->product_id}}" value="{{$value->product_name}}" class="cart_product_name">
                                    <input type="hidden" name="" value="{{$value->product_image}}" class="cart_product_image">
                                    <input type="hidden" name="" id="wishlist_productprice{{$value->product_id}}" value="{{$value->product_price}}" class="cart_product_price">
									<input type="hidden" value="{{$value->product_id}}" class="wishlist_product_id_{{$value->product_id}}">
									<div class="quantity-input">
                                        <!-- <input type="hidden" name="" value="1" class="cart_product_qty"> -->
										<input type="text" name="product_quatity" class="cart_product_qty" value="1" data-max="120" pattern="[0-9]*" >
										<a class="btn btn-reduce" href="#"></a>
										<a class="btn btn-increase" href="#"></a>
									</div>
								</div>
								<div class="wrap-butons">
									<button type="button" class="btn add-to-cart add-to-cart-product-detail">Thêm vào giỏ hàng</button>
									<p> </p>
											<?php  $like = 0; ?>
											@foreach($Like_Not_Like as $key => $pro_toplike)
											<?php
											if($value->product_id == $pro_toplike->product_id) 
											{ $like = $pro_toplike->product_id; }?>
											@endforeach
											<?php 
                                                $customer_id = Session::get('customer_id');
                                                if($customer_id!=NULL && $like!=$value->product_id )
                                                {
                                            ?>
											<b>
                                            <button type="button" data-id_product="{{$value->product_id}}" class="btn btn-danger add-to-wishlist-product-detail" name="add_to_wishlist" ><i class="fa fa-heart" aria-hidden="true"></i></button>
                                            Chưa yêu thích
											<?php }else if ($customer_id!=NULL && $like ==$value->product_id ) { ?>
											<button type="button" data-id_product="{{$value->product_id}}" class="btn btn-primary delete-to-wishlist-ajax" name="add_to_wishlist" ><i class="fa fa-heart" aria-hidden="true"></i></button>
                                            Đã yêu thích
											<?php }else{?>
												<button type="button"  class="btn btn-danger" id="{{$value->product_id}}" onclick="add_wishlist(this.id);" ><i class="fa fa-heart" aria-hidden="true"></i></button>
											<?php } ?>
										</b>
								</div>
							</form>
						</div>
						<div class="advance-info">
							<div class="tab-control normal">
								<a href="#description" class="tab-control-item ">Mô tả</a>
								<a href="#add_infomation" class="tab-control-item">Thông tin chi tiết</a>
								<a href="#review" class="tab-control-item active">Bình luận</a>
							</div>
							<div class="tab-contents">
								<div class="tab-content-item " id="description">
									<p>{!!$value->product_desc!!}</p>
								</div>
								<div class="tab-content-item " id="add_infomation">
									<p>{!!$value->product_content!!}</p>	 
								</div>
								<div class="tab-content-item active" id="review">
									
									<div class="wrap-review-form">
										
										<div id="comments">
											<h2 class="woocommerce-Reviews-title">Tất cả bình luận của sản phẩm  <span>{{$value->product_name}}</span></h2>
											<form action="#">
												@csrf
												<input type="hidden" name="comment_product_id" class="comment_product_id" value="{{$value->product_id}}">
												<div id="comment_show"></div>
											</form>
										</div><!-- #comments -->

										<div id="review_form_wrapper">
											<div id="review_form">
												<div id="respond" class="comment-respond"> 
													<form action="#" id="commentform" class="comment-form" >
														
														<div class="comment-form-rating">
															<span>Điểm đánh giá</span>
															<p class="stars">
																<label for="rated-1"></label>
																<input type="radio" id="rated-1" name="rating" value="1">
																<label for="rated-2"></label>
																<input type="radio" id="rated-2" name="rating" value="2">
																<label for="rated-3"></label>
																<input type="radio" id="rated-3" name="rating" value="3">
																<label for="rated-4"></label>
																<input type="radio" id="rated-4" name="rating" value="4">
																<label for="rated-5"></label>
																<input type="radio" id="rated-5" name="rating" value="5" checked="checked">
															</p>
														</div>
														<div id="notify_comment"></div>
														<p class="comment-form-author">					
															<label for="author"><b>Tên của bạn</b><span class="required"></span></label> 
															<input class="comment_name" id="author" name="author" type="text" value="">
														</p>
														
														<p class="comment-form-comment">
															<label for="comment"><b>Đánh giá của bạn</b> <span class="required"></span>
															</label>
															<textarea name="comment" class="comment_content" id="comment"  cols="45" rows="8"></textarea>
														</p>
														<?php $customer_id = Session::get('customer_id'); 
														if($customer_id != NULL)
														{ ?>
														<button type="button" class="btn btn-primary btn-comment pull-left sent-comment">
															Gửi bình luận
														</button>
														<?php } 
														else { ?>
														<a href="{{URL::to('/login')}}">
														<button type="button" class="btn btn-primary btn-comment pull-left">
															Gửi bình luận
														</button>
														</a>
														<?php }?>
													</form>
												</div><!-- .comment-respond-->
											</div><!-- #review_form -->
										</div><!-- #review_form_wrapper -->

									</div>
								</div>
							</div>
						</div>
					</div>
				</div><!--end main products area-->
			@endforeach
				<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 sitebar">
					<div class="widget mercado-widget widget-product">
						<h2 class="widget-title">Sản phẩm phổ biến</h2>
						<div class="widget-content">
							<ul class="products">
							@foreach($all_product_topsale as $key => $pro_topsale)
							@foreach($all_product as $key => $product)
							<?php if($product->product_id == $pro_topsale->product_id) { ?>
								<li class="product-item">
									<div class="product product-widget-style">
										<div class="thumbnnail">
											<a href="{{ URL::to('/detail-product/'.$pro_topsale->product_id)}}" title="Radiant-360 R6 Wireless Omnidirectional Speaker [White]">
												<figure><img src="{{ URL::to('public/uploads/product/'.$product->product_image)}}" alt=""></figure>
											</a>
										</div>
										<div class="product-info">
										<a href="#" class="product-name"><span>{{$product->product_name}}</span></a>
										<div class="wrap-price"><span class="product-price">{{number_format($product->product_price)}} VNĐ</span></div>
									</div>
									</div>
								</li>
								<?php } ?>
								@endforeach 
								@endforeach 
							</ul>
						</div>
					</div>

				</div><!--end sitebar-->

				<div class="single-advance-box col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="wrap-show-advance-info-box style-1 box-in-site">
						<h3 class="title-box">Sản phẩm liên quan</h3>
						<div class="wrap-products">
							<div class="products slide-carousel owl-carousel style-nav-1 equal-container" data-items="5" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"3"},"1200":{"items":"5"}}' >
							@foreach($relate as $key => $related)
								<div class="product product-style-2 equal-elem ">
									<div class="product-thumnail">
										<a href="{{$related->product_id}}" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
											<img src="{{URL::to('public/uploads/product/'.$related->product_image)}}" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim">
										</a>
										<div class="group-flash">
											<span class="flash-item new-label">new</span>
										</div>
										<div class="wrap-btn">
											<a href="#" class="function-link">quick view</a>
										</div>
									</div>
									<div class="product-info">
										<a href="#" class="product-name"><span>{{$related->product_name}}</span></a>
										<div class="wrap-price"><span class="product-price">{{number_format($related->product_price).' '.'VNĐ'}}</span></div>
									</div>
								</div>
							@endforeach
							</div>
						</div><!--End wrap-products-->
					</div>
				</div>

			</div><!--end row-->
	</div><!--end container-->

</main>
@endsection