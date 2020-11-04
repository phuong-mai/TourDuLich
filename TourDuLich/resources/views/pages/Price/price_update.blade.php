@extends('layout.master')
@section('content')

@foreach($prices as $price)
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Sửa Giá Tour</h5>
        </div>
        <div class="modal-body">
            <form action="TourPrice/edit/{{ $price->id }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="id_tour">Tour</label>
                    <select id="id_tour" name="id_tour" class="form-control">
                        @foreach($tours as $tour)
                        <option value="{{$tour->id}}" {{($price->tour_name === $tour->tour_name) ? 'Selected' : ''}} >{{$tour->tour_name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="price">Giá tour</label>
                    <input type="text" class="form-control" name="price" id="price" value="{{ $price-> price }}">
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="start_day">Từ ngày</label>
                        <input type="date" class="form-control" name="start_day" id="start_day" value="{{ date_format(new DateTime($price->start_day), 'Y-m-d') }}">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="end_day">Đến ngày</label>
                        <input type="date" class="form-control" name="end_day" id="end_day" value="{{ date_format(new DateTime($price->end_day), 'Y-m-d') }}">
                    </div>
                </div>
                <div class="modal-footer">
                    <a type="button" class="btn btn-secondary btn-sm" href="{{ url('TourPrice') }}">Hủy</a>
                    <button type="submit" class="btn btn-primary btn-sm">Xác nhận Sửa</button>
                </div>
            </form>
        </div>

    </div>
</div>
@endforeach
@endsection
