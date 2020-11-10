@extends('layout.master')
@section('content')

<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Thêm Giá Tour</h5>
        </div>
        <div class="modal-body">
            <form action="price/create" method="post">
                @csrf
                <div class="form-group">
                    <label for="tour_id">Tour</label>
                    <select id="tour_id" name="tour_id" class="form-control" aria-placeholder="Select">
                        <option value="" disabled selected hidden>Chọn tour du lịch muốn thêm giá</option>
                        @foreach($tours as $tour)
                        <option value="{{$tour->tour_id}}"  >{{$tour->tour_name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="price" >Giá tour</label>
                    <input type="text" placeholder="Nhập giá tour" class="form-control" name="price" id="price">
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="start_day">Từ ngày</label>
                        <input type="date" class="form-control" name="start_day" id="start_day">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="end_day">Đến ngày</label>
                        <input type="date" class="form-control" name="end_day" id="end_day">
                    </div>
                </div>
                <div class="modal-footer">
                    <a type="button" class="btn btn-secondary btn-sm" href="{{ url('price') }}">Hủy</a>
                    <button type="submit" class="btn btn-primary btn-sm">Xác nhận thêm</button>
                </div>
            </form>
        </div>

    </div>
</div>
@endsection
