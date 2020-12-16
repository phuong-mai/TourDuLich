@extends('layout.master')
@section('content')
<div class="container-fluid">
  <!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <div class="row justify-content-between">
            <div class="col-auto">
                <h5 class="font-weight-bold text-primary">Sửa giá Tour</h5>
                <span id="error" class="text-danger font-weight-italic"> </span>
            </div>
        </div>
    </div>
    <div class="card-body">
        <form action="price/edit_price/{{$price->price_id}}" onsubmit=" return validation()" method="post">
            @csrf
            <div class="form-group">
                <input hidden id="price_id" value="{{$price->price_id}}" name="price_id" />
                <label for="inputGroup">Đoàn khách</label>
                <select name="tour_id" id="tour_id" class="form-control">
                    @foreach($tours as $tour)
                        <option value="{{$tour->tour_id}}" {{($price->price_name === $price->tour_name) ? 'Selected' : ''}}>{{$tour->tour_name}}</option>
                    @endforeach
                </select>
                <span id="tour" class="text-danger font-weight-italic"> </span>
            </div>
            <div class="form-group">
                <label for="price_value">Giá tour</label>
                <input type="text" class="form-control" name="price_value" id="price_value" value="{{ $price-> price_value }}">
                <span id="price" class="text-danger font-weight-italic"> </span>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="price_start_date">Từ ngày</label>
                    <input type="date" class="form-control" name="price_start_date" id="price_start_date" value="{{ date_format(new DateTime($price->price_start_date), 'Y-m-d')}}">
                    <span id="start" class="text-danger font-weight-italic"> </span>
                </div>
                <div class="form-group col-md-6">
                    <label for="price_end_date">Đến ngày</label>
                    <input type="date" class="form-control" name="price_end_date" id="price_end_date" value="{{ date_format(new DateTime($price->price_end_date), 'Y-m-d')}}">
                    <span id="end" class="text-danger font-weight-italic"> </span>
                </div>
            </div>
            <div class="modal-footer">
                <a type="button" class="btn btn-secondary btn-sm" href="{{ url('price') }}">Hủy</a>
                <button type="submit" class="btn btn-primary btn-sm">Xác nhận Sửa</button>
            </div>
        </form>
    </div>
</div>
<script>
    function validation() {
        var tour_id = document.getElementById('tour_id').value;
        var price_value = document.getElementById('price_value').value;
        var price_start_date = document.getElementById('price_start_date').value;
        var price_end_date = document.getElementById('price_end_date').value;
        var price = RegExp("[0-9]");
        if(tour_id=="Chọn tour" && price_value=="" && price_start_date=="" && price_end_date=="") {
            document.getElementById('tour').innerHTML =" ** Vui lòng chọn Tour";
            document.getElementById('price').innerHTML =" ** Vui lòng nhập giá Tour";
            document.getElementById('start').innerHTML =" ** Vui lòng chọn ngày bắt đầu";
            document.getElementById('end').innerHTML =" ** Vui lòng chọn ngày kết thúc";
            return false;
        } else {
            if(tour_id !="Chọn tour") {
                document.getElementById('tour').innerHTML =null;
            }
            if(price_value =="") {
                document.getElementById('price').innerHTML =" ** Vui lòng nhập giá Tour";
            } else {
                if(!price.test(price_value)) {
                    document.getElementById('price').innerHTML =" ** Định dạng không đúng, vui lòng nhập lại";
                }
            }
            if(price_start_date =="") {
                document.getElementById('start').innerHTML =" ** Vui lòng chọn ngày bắt đầu";
            } else {
                document.getElementById('start').innerHTML =null;
            }
            if(price_end_date =="") {
                document.getElementById('end').innerHTML =" ** Vui lòng chọn ngày kết thúc";
            } else {
                document.getElementById('end').innerHTML =null;
            }
            if(!price_start_date =="" && !price_end_date =="") {
                if(price_start_date>=price_end_date) {
                    document.getElementById('error').innerHTML =" ** Ngày bắt đầu phải trước ngày kết thúc";
                }
                else {
                    document.getElementById('error').innerHTML =null;
                }
            }
            if(tour_id !="Chọn tour" && price.test(price_value) && price_start_date<price_end_date) {
                return true;
            }   else return false;
        }
    }
</script>
@endsection