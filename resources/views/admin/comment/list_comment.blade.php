@extends('admin_layout')
@section('admin_content')
    <div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Liệt kê bình luận
    </div>
    </br>
    <div id="notify_comment"></div>

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
            <th style="width:25px;">Sản phẩm</th>
            <th>Quản lý</th>  
          </tr>
        </thead>
        <tbody>
          @foreach($comment as $key => $cmt)
          <tr>
            <td>
                @if($cmt->comment_status==1)
                    <input type="button" data-comment_status="0" data-comment_id="{{$cmt->comment_id}}" id="{{$cmt->comment_product_id}}" class="btn btn-primary btn-xs comment-check-btn" value="Duyệt">
                @else
                    <input type="button" data-comment_status="1" data-comment_id="{{$cmt->comment_id}}" id="{{$cmt->comment_product_id}}" class="btn btn-danger btn-xs comment-check-btn" value="Bỏ duyệt">
                @endif
            </td>
            <td>{{ $cmt->comment_name }}</td>
            <td>{{ $cmt->comment}}
              <style type="text/css">
                ul.list-reply-comment li {
                  list-style-type: decimal;
                  color: red;
                  margin: 5px 30px;
              }
              </style>
              <ul class="list-reply-comment">
                <p style="color: blue; font-weight: bolder; margin-top:5px;">Trả lời: </p>
                @foreach($comment_reply as $key => $cmt_reply)
                  @if($cmt_reply->comment_parent_comment == $cmt->comment_id)
                    <li>{{$cmt_reply->comment}}</li>
                  @endif
                @endforeach
                
              </ul>
              @if($cmt->comment_status==0)
                
                </br><a href="#">Trả lời bình luận</a>
                </br><textarea class="form-control reply_comment_{{$cmt->comment_id}}" cols="30" rows="5"></textarea>
                </br><button type="button" data-comment_id="{{$cmt->comment_id}}" data-product_id="{{$cmt->comment_product_id}}" class="btn btn-success btn-reply-comment" >Trả lời bình luận</button>
 
              @endif
            
            </td>
            
            <td>{{ $cmt->comment_date }}</td>
            <td><a href="{{'detail-product/'}}" target="_blank">{{ $cmt->product->product_name }}</a></td>         
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