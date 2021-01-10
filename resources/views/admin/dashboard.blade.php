@extends('admin_layout')
@section('admin_content')
<div class="container-fluid">
    <style type="text/css">
        h3.title_thongke{
            text-align: center;
            font-weight: bold;
        }
    </style>
<div class="row">
        <h3 class="title_thongke">Thống kê đơn hàng doanh số</h3></br>
        <form autocomplete="off">
            @csrf
            <div class="col-md-2">
                <p>Từ ngày: <input type="text" id="datepicker" class="form-control"></p>
                <input style="margin-top: 10px;" type="button" id="btn-dashboard-filter" class="btn btn-primary btn-sm" value="Lọc kết quả"></p>
            </div>

            <div class="col-md-2">
                <p>Đến ngày: <input type="text" id="datepicker2" class="form-control"></p>
            </div>

            <div class="col-md-2">
            <p>
                Lọc theo:
                <select class="dashboard-filter form-control">
                    <option>--chọn--</option>
                    <option value="7ngay">7 ngày qua</option>
                    <option value="thangtruoc">Tháng trước</option>
                    <option value="thanghientai">tháng hiện tại</option>
                    <option value="365ngayqua">365 ngày qua</option>
                </select>
            </p>
            </div>
        </from>

        <div class="col-md-12">
            <div id="chart" style="height: 250px;"></div>
        </div>
</div>
</div>
@endsection