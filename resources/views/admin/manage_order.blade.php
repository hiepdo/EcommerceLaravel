@extends('admin_layout')
@section('admin_content')
    <div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Quản lý đơn hàng
    </div>
    <div class="table-responsive">
                      <?php
                            $message = Session::get('message');
                            if($message){
                                echo '<br><div style="text-align: center; font-size: 18px;" class="alert alert-success" role="alert">'.$message.'</div>';
                                Session::put('message',null);
                            }
                            ?>
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th>Mã ĐH</th>
            <th>Ngày đặt hàng</th>
            <th>Chờ xử lý</th>  
            <th>Đang xử lý</th>  
            <th>Đang giao hàng</th>
            <th>Hủy</th>
            <th>Hoàn thành</th>  
            <th>Hiển thị</th>  
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
          @foreach($order as $key => $ord)
          <form role="form" action="{{URL::to('/update-status-order/'.$ord->order_id)}}" method="post">
          {{ csrf_field() }}
          <tr>
            <td>{{ $ord->order_id }}</td>
            <td>{{ $ord->created_at }}</td>
            <td><input type="checkbox" name="wait_progress" {{$ord->order_status=="Chờ xử lý" ? 'checked' : ''}}></td>
            <td><input type="checkbox" name="waiting_progress" {{$ord->order_status=="Đang xử lý" ? 'checked' : ''}}></td>
            <td><input type="checkbox" name="shipping" {{$ord->order_status=="Đang giao hàng" ? 'checked' : ''}}></td>
            <td><input type="checkbox" name="Cancel" {{$ord->order_status=="Hủy" ? 'checked' : ''}}></td>
            <td><input type="checkbox" name="complete_progress" {{$ord->order_status=="Hoàn thành" ? 'checked' : ''}}></td>
            <td>
              <a href="{{URL::to('/view-order/'.$ord->order_id)}}" class="active styling-edit" ui-toggle-class="">
                <i class="fa fa-eye text-success text-active"></i></a>
              <a onclick="return confirm('Bạn có chắc là muốn xóa đơn hàng này ko?')" href="{{URL::to('/delete-order/'.$ord->order_id)}}" class="active styling-edit" ui-toggle-class="">
                <i class="fa fa-times text-danger text"></i>
              </a>
            </td>
            <td><input type="submit" value="cập nhật" class="btn btn-sm btn-default"></td>
          </tr>
          </form>
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