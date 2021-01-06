@extends('layout')
@section('content')
<main id="main" >

    <div class="container">
				<div class="wrap-shop-control">
					@foreach($category_name as $key => $name)
            		   <h1 class="shop-title">{{$name->category_name}}</h1>
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
                            </div>

                </div>
                    <!--end wrap shop control-->

                    <div class="row">

                        <ul class="product-list grid-products equal-container">
						@foreach($category_by_id as $key => $product)
                        <form>
                        @csrf
                            <li class="col-lg-4 col-md-6 col-sm-6 col-xs-6 ">
                                <div class="product product-style-3 equal-elem ">
                                    <div class="product-thumnail">
                                        <a href="{{ URL::to('/detail-product/'.$product->product_id)}}" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                            <figure><img src="{{ URL::to('public/uploads/product/'.$product->product_image)}}" alt=""></figure>
                                        </a>
                                    </div>
                                    <div class="product-info">
                                        <input type="hidden" name="" value="{{$product->product_id}}" class="cart_product_id_{{$product->product_id}}">
                                        <input type="hidden" name="" value="{{$product->product_name}}" class="cart_product_name_{{$product->product_id}}">
                                        <input type="hidden" name="" value="{{$product->product_image}}" class="cart_product_image_{{$product->product_id}}">
                                        <input type="hidden" name="" value="{{$product->product_price}}" class="cart_product_price_{{$product->product_id}}">
                                        <input type="hidden" name="" value="1" class="cart_product_qty_{{$product->product_id}}">
                                        <a href="#" class="product-name"><span>{{($product->product_name)}}</span></a>
                                        <div class="wrap-price"><span class="product-price">{{number_format($product->product_price)}} VNĐ</span></div>
                                        <button type="button" data-product_id_category="{{$product->product_id}}" class="btn add-to-cart add-to-cart-product-category">Thêm vào giỏ hàng</button>
                                    </div>
                                </div>
                            </li>
                        </form>
						@endforeach
                        </ul>

                    </div>
                    <ul class="pagination pagination-sm m-t-none m-b-none">
                       {!!$category_by_id->links()!!}
                    </ul>
                    
                </div>
                <!--end main products area-->
    </div>
    <!--end container-->

</main>
<!--main area-->
@endsection
                        