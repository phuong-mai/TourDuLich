@extends('layout.master')
@section('content')

<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Thêm Giá Tour</h5>
            <span id="error" class="text-danger font-weight-italic"> </span>
        </div>
        <div class="modal-body">
            <form action="price/create" onsubmit=" return validation()" method="post">
                @csrf
                <div class="form-group">
                    <label for="tour_id">Tour</label>
                    <select name="tour_id" id="tour_id" class="form-control" >
                        <option selected>Chọn tour</option>
                        @foreach($tour as $tour_name)
                            <option value="{{$tour_name->tour_id}}">{{ $tour_name->tour_name }}</option>
                        @endforeach
                    </select>
                    <span id="tour" class="text-danger font-weight-italic"> </span>
                </div>
                <div class="form-group">
                    <label for="price" >Giá tour</label>
                    <input type="text" placeholder="Nhập giá tour" class="form-control" name="price_value" id="price_value">
                    <span id="price" class="text-danger font-weight-italic"> </span>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="price_start_date">Từ ngày</label>
                        <input type="date" class="form-control" name="price_start_date" id="price_start_date">
                        <span id="start" class="text-danger font-weight-italic"> </span>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="price_end_date">Đến ngày</label>
                        <input type="date" class="form-control" name="price_end_date" id="price_end_date">
                        <span id="end" class="text-danger font-weight-italic"> </span>

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
