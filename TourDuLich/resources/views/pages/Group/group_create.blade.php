@extends('layout.master')
@section('content')

<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Thêm Đoàn Khách</h5>
        </div>
        <div class="modal-body">
            <form action="group/create" method="POST">
                @csrf
                <div class="form-group">
                    <label for="tour_id">Tour</label>
                    <select id="tour_id" name="tour_id" class="form-control">
                        @foreach($tours as $tour)
                            <option value="{{$tour->tour_id}}">{{$tour->tour_name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="group_name">Tên đoàn khách</label>
                    <input type="text" class="form-control" id="group_name" name="group_name">
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="group_start_date">Ngày đi</label>
                        <input type="date" class="form-control" id="group_start_date" name="group_start_date">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="group_end_date">Ngày đến</label>
                        <input type="date" class="form-control" id="group_end_date" name="group_end_date">
                    </div>
                </div>                          
                <div class="form-group">
                    <label for="inputListCustomer">Danh sách khách</label>
                    <input type="text" class="form-control" id="inputListCustomer" name="inputListCustomer">
                </div>
                <div class="form-group">
                    <label for="inputListEmployee">Danh sách nhân viên</label>
                    <input type="text" class="form-control" id="inputListEmployee" name="inputListEmployee">
                </div>
                <div class="form-group">
                    <label for="group_plan">Chi tiết chương trình</label>
                    <input type="text" class="form-control" id="group_plan" name="group_plan">
                </div>
                <div class="modal-footer">
                    <a type="button" class="btn btn-secondary btn-sm" href="{{ url('group') }}">Hủy</a>
                    <button type="submit" class="btn btn-primary btn-sm">Xác nhận thêm</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection