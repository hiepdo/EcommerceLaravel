@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                           Thêm thương hiệu sản phẩm
                        </header>
                         <?php
                            $message = Session::get('message');
                            if($message){                        
                                echo '<br><div style="text-align: center; font-size: 18px;" class="alert alert-success" role="alert">'.$message.'</div>';
                                Session::put('message',null);
                            }
                            ?>
                        <div class="panel-body">

                            <div class="position-center">
                                <form role="form" action="{{URL::to('/save-brand-product')}}" method="post">
                                    {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên thương hiệu</label>
                                    <input type="text" data-validation="length" data-validation-length="min1" data-validation-error-msg="Hãy nhập vào tên cho thương hiệu"
                                    name="brand_product_name" class="form-control" id="exampleInputEmail1" placeholder="Tên danh mục">
                                </div>                               
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả thương hiệu</label>
                                    <textarea data-validation="length" data-validation-length="min1" data-validation-error-msg="Hãy nhập vào mô tả cho thương hiệu"
                                    style="resize: none" rows="8" class="form-control" name="brand_product_desc" id="exampleInputPassword1" placeholder="Mô tả danh mục"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Hiển thị</label>
                                      <select name="brand_product_status" class="form-control input-sm m-bot15">
                                            <option value="0">Hiển thị</option>
                                            <option value="1">Ẩn</option>
                                            
                                    </select>
                                </div>
                               
                                <button type="submit" name="add_category_product" class="btn btn-info">Thêm thương hiệu</button>
                                </form>
                            </div>

                        </div>
                    </section>

            </div>
@endsection