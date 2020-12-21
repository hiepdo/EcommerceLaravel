@extends('admin_layout')
@section('admin_content')
    <div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Liệt kê bình luận
    </div>
    <div class="table-responsive">
                      <?php
                            $message = Session::get('message');
                            if($message){
                                echo '<span class="text-alert">'.$message.'</span>';
                                Session::put('message',null);
                            }
                            ?>
      <table class="table table-striped b-t b-light" id="myTable">
        <thead>
          <tr>           
            <th>Duyệt</th>
            <th>Tên người gửi</th>
            <th>Bình luận</th>
            <th>Ngày gửi</th>
            <th>Sản phẩm</th>
            <th>Quản lý</th>        
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
          @foreach($comment as $key => $cmt)
          <tr>
            <td>
                @if($cmt->comment_status)
                    <input type="button" data-comment-id="{{$cmt->comment_id}}" id="{{$cmt->comment_product_id}}" class="btn btn-primary btn-xs comment_check_btn" value="Duyệt">
                @else
                    <input type="button" data-comment-id="{{$cmt->comment_id}}" id="{{$cmt->comment_product_id}}" class="btn btn-danger btn-xs comment_uncheck_btn" value="Bỏ duyệt">
                @endif
            </td>
            <td>{{ $cmt->comment_name }}</td>
            <td>{{ $cmt->comment}}
            </br><a href="#">Trả lời bình luận</a>
            </br><textarea name="" id="" cols="30" rows="5"></textarea>
            </br><button type="button" class="btn btn-success">Trả lời</button>
            </td>
            
            <td>{{ $cmt->comment_date}}</td>
            <td><a href="{{'chi-tiet-san-pham/'}}" target="_blank">{{ $cmt->product->product_name }}</a></td>         
            <td>
              <a href="" class="active styling-edit" ui-toggle-class="">
                <i class="fa fa-pencil-square-o text-success text-active"></i></a>
              <a onclick="return confirm('Bạn có chắc là muốn xóa bình luận này ko?')" href="" class="active styling-edit" ui-toggle-class="">
                <i class="fa fa-times text-danger text"></i>
              </a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>   
  </div>
</div>
@endsection