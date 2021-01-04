@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                           Thêm sản phẩm
                        </header>
                         <?php
                            $message = Session::get('message');
                            if($message){
                                echo '<span class="text-alert">'.$message.'</span>';
                                Session::put('message',null);
                            }
                            ?>
                        <div class="panel-body">

                            <div class="position-center">
                                <form role="form" action="{{URL::to('/save-product')}}" method="post" enctype="multipart/form-data"> 
                                    {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên Sản Phẩm</label>
                                    <input data-validation="length" data-validation-length="min1" data-validation-error-msg="Hãy nhập vào tên cho sản phẩm"
                                    type="text" name="product_name" class="form-control" id="exampleInputEmail1" 
                                    placeholder="Tên sản phẩm">
                                </div>      
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Giá Sản Phẩm</label>
                                    <input data-validation="number" data-validation-error-msg="Chỉ được nhập vào chữ số"
                                    type="text" name="product_price" class="form-control" id="exampleInputEmail1" 
                                    placeholder="Tên sản phẩm">
                                </div>                        
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Hình Ảnh Sản Phẩm</label>
                                    <input type="file" name="product_image" class="form-control" id="exampleInputEmail1" >
                                </div>            
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả Sản phẩm</label>
                                    <textarea data-validation="length" data-validation-length="min1" data-validation-error-msg="Hãy nhập vào mô tả cho sản phẩm"
                                    style="resize: none" rows="8" class="form-control" name="product_desc" id="exampleInputPassword1" 
                                    placeholder="Mô tả sản phẩm"></textarea>
                                </div>       
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Nội Dung Sản phẩm</label> 
                                    <textarea data-validation="length" data-validation-length="min1" data-validation-error-msg="Hãy nhập vào nội dung cho sản phẩm"
                                    style="resize: none" rows="8" class="form-control" name="product_content" id="exampleInputPassword1" 
                                    placeholder="Nội Dung sản phẩm"></textarea>
                                </div> 
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Danh Mục Sản Phẩm</label>
                                      <select name="product_cate" class="form-control input-sm m-bot15">
                                        @foreach($cate_product as $key => $cate)
                                            <option value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Thương Hiệu</label>
                                      <select name="product_brand" class="form-control input-sm m-bot15">
                                        @foreach($brand_product as $key => $brand)
                                                <option value="{{$brand->brand_id}}">{{$brand->brand_name}}</option>
                                        @endforeach
                                    </select>
                                </div>             
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Hiển thị</label>
                                      <select name="product_status" class="form-control input-sm m-bot15">
                                            <option value="0">Hiển thị</option>
                                            <option value="1">Ẩn</option>
                                            
                                    </select>
                                </div>
                               
                                <button type="submit" name="add_product" class="btn btn-info">Thêm sản phẩm</button>
                                </form>
                            </div>

                        </div>
                    </section>

            </div>
@endsection