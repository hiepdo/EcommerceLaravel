@extends('admin_layout')
@section('admin_content')
    <div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Thông tin khách hàng
    </div>
    <div class="table-responsive">
                      <?php
                            $message = Session::get('message');
                            if($message){
                                echo '<span class="text-alert">'.$message.'</span>';
                                Session::put('message',null);
                            }
                            ?>
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th>Tên khách hàng</th>
            <th>Số điện thoại</th>  
            <th>Địa chỉ email</th> 
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>{{$customer->customer_name}}</td>
            <td>{{$customer->customer_phone}}</td>
            <td>{{$customer->customer_email}}</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>
<br></br>
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Thông tin vận chuyển
    </div>
    <div class="table-responsive">
                      <?php
                            $message = Session::get('message');
                            if($message){
                                echo '<div style="text-align: center; font-size: 18px;" class="alert alert-danger" role="alert">'.$message.'</div>';
                                Session::put('message',null);
                            }
                            ?>
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th>Tên người vận chuyển</th>
            <th>Địa chỉ</th>   
            <th>Số điện thoại</th>  
            <th>Email</th>  
            <th>Ghi chú</th> 
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>{{$shipping->shipping_name}}</td>
            <td>{{$shipping->shipping_address}}</td>
            <td>{{$shipping->shipping_phone}}</td> 
            <td>{{$shipping->shipping_email}}</td>
            <td>{{$shipping->shipping_notes}}</td> 
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>
<br></br>
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Thông tin chi tiết đơn hàng
    </div>
    <div class="table-responsive">
                      <?php
                            $message = Session::get('message');
                            if($message){
                                echo '<span class="text-alert">'.$message.'</span>';
                                Session::put('message',null);
                            }
                            ?>
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th>Tên sản phẩm</th>
            <th>Số lượng</th>   
            <th>Giá sản phẩm</th>  
            <th>Tổng tiền</th> 
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>  
        <?php $total = 0; ?>
          @foreach($order_details as $key => $details)
          <?php 
            $subtotal = $details->product_price*$details->product_sales_quantity;
            $total+=$subtotal;
          ?>
          <tr>
            <td>{{$details->product_name}}</td>
            <td>{{$details->product_sales_quantity}}</td>
            <td>{{number_format($details->product_price).' '.'VNĐ'}}</td> 
            <td>{{number_format($subtotal).' '.'VNĐ'}}</td> 
          </tr>
          @endforeach   
          <tr><td><b>Tổng thanh toán: {{number_format($total).' '.'VNĐ'}}</b></td></tr>
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection