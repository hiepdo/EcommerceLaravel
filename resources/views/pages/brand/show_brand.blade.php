@extends('layout')
@section('content')
<main id="main" >

    <div class="container">
				<div class="wrap-shop-control">
					@foreach($brand_name as $key => $name)
            		   <h1 class="shop-title">{{$name->brand_name}}</h1>
					@endforeach
                        <div class="wrap-right">
                            <div class="sort-item orderby ">
                                <select name="orderby" class="use-chosen">
									<option value="menu_order" selected="selected">Mặc định</option>
									<option value="popularity">Phổ biến</option>
									<option value="rating">Lượt yêu thích</option>
									<option value="date">Mới ra mắt</option>
									<option value="price">Giá: Từ thấp đến cao</option>
									<option value="price-desc">Giá: Từ cao đến thấp</option>
								</select>
                            </div>
                            <div class="sort-item product-per-page">
                                <select name="post-per-page" class="use-chosen">
									<option value="12" selected="selected">12 per page</option>
									<option value="16">16 per page</option>
									<option value="18">18 per page</option>
									<option value="21">21 per page</option>
									<option value="24">24 per page</option>
									<option value="30">30 per page</option>
									<option value="32">32 per page</option>
								</select>
                            </div>
                            <div class="change-display-mode">
                                <a href="#" class="grid-mode display-mode active"><i class="fa fa-th"></i>Grid</a>
                                <a href="list.html" class="list-mode display-mode"><i class="fa fa-th-list"></i>List</a>
                            </div>
                        </div>
                </div>
                    <!--end wrap shop control-->

                    <div class="row">

                        <ul class="product-list grid-products equal-container">
						@foreach($brand_by_id as $key => $product)
                            <li class="col-lg-4 col-md-6 col-sm-6 col-xs-6 ">
                                <div class="product product-style-3 equal-elem ">
                                    <div class="product-thumnail">
                                        <a href="{{ URL::to('/chi-tiet-san-pham/'.$product->product_id)}}" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                            <figure><img src="{{ URL::to('public/uploads/product/'.$product->product_image)}}" alt=""></figure>
                                        </a>
                                    </div>
                                    <div class="product-info">
                                        <a href="#" class="product-name"><span>{{($product->product_name)}}</span></a>
                                        <div class="wrap-price"><span class="product-price">{{number_format($product->product_price)}} VNĐ</span></div>
                                        <a href="#" class="btn add-to-cart">Thêm vào giỏ hàng</a>
                                    </div>
                                </div>
                            </li>
						@endforeach
                        </ul>

                    </div>

                    <div class="wrap-pagination-info">
                        <ul class="page-numbers">
                            <li><span class="page-number-item current">1</span></li>
                            <li><a class="page-number-item" href="#">2</a></li>
                            <li><a class="page-number-item" href="#">3</a></li>
                            <li><a class="page-number-item next-link" href="#">Next</a></li>
                        </ul>
                        <p class="result-count">Showing 1-8 of 12 result</p>
                    </div>
                </div>
                <!--end main products area-->
    </div>
    <!--end container-->

</main>
<!--main area-->
@endsection
                        