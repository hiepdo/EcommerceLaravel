@extends('layout')
@section('content')
<main id="main" class="main-site left-sidebar">

    <div class="container">

            <div class="wrap-breadcrumb">
                <ul>
                    <li class="item-link"><a href="{{ URL::to('/Home') }}" class="link">Trang chủ</a></li>
                    <li class="item-link"><span>Tìm Kiếm</span></li>
                </ul>
            </div>
            <div class="row">

                <div class="col-lg-9 col-md-8 col-sm-8 col-xs-12 main-content-area">

                    <div class="banner-shop">
                        <a href="#" class="banner-link">
                            <figure><img src="{{ asset('public/frontend/images/shop-banner.jpg') }}" alt=""></figure>
                        </a>
                    </div>

                    <div class="wrap-shop-control">

                        <h1 class="shop-title">Tìm Kiếm Sản phẩm</h1>

                    </div>
                    <!--end wrap shop control-->
                    
                    <div class="row">
                        <ul class="product-list grid-products equal-container">
                        @foreach($search_product as $key => $product)
                            <li class="col-lg-4 col-md-6 col-sm-6 col-xs-6 ">
                                <div class="product product-style-3 equal-elem ">
                                    <form>
                                    @csrf
                                        <input type="hidden" name="" value="{{$product->product_id}}" class="cart_product_id_{{$product->product_id}}">
                                        <input type="hidden" name="" value="{{$product->product_name}}" class="cart_product_name_{{$product->product_id}}">
                                        <input type="hidden" name="" value="{{$product->product_image}}" class="cart_product_image_{{$product->product_id}}">
                                        <input type="hidden" name="" value="{{$product->product_price}}" class="cart_product_price_{{$product->product_id}}">
                                        <input type="hidden" name="" value="1" class="cart_product_qty_{{$product->product_id}}">
                                        <div class="product-thumnail">
                                            <a href="{{ URL::to('/detail-product/'.$product->product_id)}}" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                                <figure><img src="{{ URL::to('public/uploads/product/'.$product->product_image)}}" alt=""></figure>
                                            </a>
                                        </div>
                                        <div class="product-info">
                                            <a href="#" class="product-name"><span>{{($product->product_name)}}</span></a>
                                            <div class="wrap-price"><span class="product-price">{{number_format($product->product_price)}} VNĐ</span></div>
                                            <button type="button" data-id_product="{{$product->product_id}}" class="btn btn-danger add-to-cart" name="add_to_cart">Thêm vào giỏ hàng</button>
                                        </div>
                                    </form>
                                </div>
                            </li>
                        @endforeach
                        </ul>                  
                    </div>
                  
                    <div class="wrap-pagination-info">
                    {!!$search_product->appends(Request::all())->links()!!}
                    <small class="text-muted inline m-t-sm m-b-sm">showing {!!$search_product->count() !!} of {!!$all_product_full->count()!!} items in page {!!$search_product->currentPage() !!}</small>
                    </div>
                </div>
                <!--end main products area-->

                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 sitebar">
                    <div class="widget mercado-widget categories-widget">
                        <h2 class="widget-title"> Danh mục sản phẩm</h2>
                        <div class="widget-content category-products">
						@foreach($category as $key => $cate)
                            <ul class="list-category">
							
                                <li class="category-item has-child-cate">
                                    <a href="{{URL::to('/category-product/'.$cate->category_id) }}" class="cate-link">{{$cate->category_name}}</a>
                                </li>
																	
							</ul>
                        @endforeach	
                        </div>
                    </div>
                    <!-- Categories widget-->

                    <div class="widget mercado-widget filter-widget brand-widget">
                        <h2 class="widget-title">Thương hiệu sản phẩm</h2>
                        <div class="widget-content">
                       
                            <ul class="list-style vertical-list list-limited" data-show="6">
                            @foreach($brand as $key => $brand)
                                <li class="list-item"><a class="filter-link" href="{{URL::to('/brand-product/'.$brand->brand_id) }}">{{$brand->brand_name}}</a></li>
                            @endforeach    
                            </ul>					
                        </div>
                    </div>

                </div>
                <!--end sitebar-->

            </div>
            <!--end row-->
    </div>
    <!--end container-->

</main>
<!--main area-->
@endsection