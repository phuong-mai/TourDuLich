@extends('layout.master')
@section('content')
<div class="container-fluid col-md-12">
    <div class="card shadow mb-4">
        <div class="card-header">
            <h5 class="card-title" id="exampleModalLabel">Sửa Tour</h5>
        </div>
        <div class="card-body">
        <form action="tour/edit" method="post">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                @csrf
                <div class="form-group">
                    <label for="inputTour">Tour</label>
                    <input type="text" class="form-control" id="tour" name="tour" value="{{ $tour -> tour_name }}>
                </div>
                <div class="form-group">
                    <label for="inputDescription">Mô tả</label>
                    <input type="text" class="form-control" id="description" name="description" value="{{ $tour -> tour_description }}>
                </div>
                <div class="form-group">
                    <label for="inputTour">Loại tour</label>
                    <select id="type" name="type" class="form-control">
                        <option selected>Chọn loại tour</option>
                        @foreach($types as $type)
                            <option value="{{$type->type_id}}">{{$type->type_name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="modal-footer">
                    <a type="button" class="btn btn-secondary btn-sm" href="{{ url('tour') }}">Hủy</a>
                    <button type="submit" class="btn btn-primary btn-sm">Xác nhận thêm</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection