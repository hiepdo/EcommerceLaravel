@extends('admin_layout')
@section('admin_content')
    <div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Liệt kê đơn hàng
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
            <th>Thứ tự</th>
            <th>Mã đơn hàng</th>
            <th>Ngày đặt hàng</th>
            <th>Tổng tiền</th>   
            <th>Tình trạng</th>  
            <th>Hiển thị</th>  
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
          <?php $i = 0; ?>
          @foreach($order as $key => $ord)
          <?php $i++; ?>
          <tr>
            <td><i>{{$i}}</i></td>
            <td>{{ $ord->order_id }}</td>
            <td>{{ $ord->created_at }}</td>
            <td>{{ $ord->order_total }}</td>
            <td>
                @if($ord->order_status==1)
                    Chờ xử lý
                @else 
                    Đã xử lý
                @endif
            </td>
            <td>
              <a href="{{URL::to('/view-order/'.$ord->order_id)}}" class="active styling-edit" ui-toggle-class="">
                <i class="fa fa-eye text-success text-active"></i></a>
              <a onclick="return confirm('Bạn có chắc là muốn xóa đơn hàng này ko?')" href="{{URL::to('/delete-order/'.$ord->order_id)}}" class="active styling-edit" ui-toggle-class="">
                <i class="fa fa-times text-danger text"></i>
              </a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <footer class="panel-footer">
      <div class="row">
        
        <div class="col-sm-5 text-center">
        </div>
        <div class="col-sm-7 text-right text-center-xs">                
          <ul class="pagination pagination-sm m-t-none m-b-none">
            <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
            <li><a href="">1</a></li>
            <li><a href="">2</a></li>
            <li><a href="">3</a></li>
            <li><a href="">4</a></li>
            <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
          </ul>
        </div>
      </div>
    </footer>
  </div>
</div>
@endsection