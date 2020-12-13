@extends('layout.master')
@section('content')
<div class="container-fluid">
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <div class="row justify-content-between">
        <div class="col-auto">
          <h5 class="font-weight-bold text-primary">Thêm khách hàng</h5>
        </div>
      </div>
    </div>
    <div class="card-body">
    <form action="customer/create" method="post">
      @csrf
        <div class="form-group">
        @if ($errors->has('customer_name'))
                  <div class="text-danger" >
                              {{ $errors->first('customer_name')}}
                  </div>
            @endif
            <label for="inputGroup">Họ và tên</label>
            <input type="text" class="form-control" id="inputHospitalFee" name="customer_name">
            
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
            @if ($errors->has('customer_email'))
                  <div class="text-danger" >
                              {{ $errors->first('customer_email')}}
                  </div>
            @endif
              <label for="inputHospitalFee">Email</label>
              <input type="text" class="form-control" id="inputHospitalFee" name="customer_email">
            </div>
            <div class="form-group col-md-6">
            @if ($errors->has('customer_phone_number'))
                  <div class="text-danger" >
                              {{ $errors->first('customer_phone_number')}}
                  </div>
            @endif
              <label for="inputMealFee">Số điện thoại</label>
              <input type="text" class="form-control" id="inputMealFee" name="customer_phone_number" pattern="[0-9]*" >
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
            @if ($errors->has('customer_id_card'))
                  <div class="text-danger" >
                              {{ $errors->first('customer_id_card')}}
                  </div>
            @endif
            <label for="inputTransportFee">Số căn cước/CMND</label>
            <input type="text" class="form-control" id="inputTransportFee" name="customer_id_card" pattern="[0-9]*">
            </div>
            <div class="form-group col-md-6">
            <label for="inputOtherFee">Ngày sinh</label>
            <input type="date" class="form-control" id="inputOtherFee" name="customer_birthday" >
            </div>
        </div>
        
        <a class="btn btn-secondary btn-sm" href="{{ route('customer') }}">Hủy</a>
        <button type="submit" class="btn btn-primary btn-sm">Xác nhận thêm</button> 
    </form>
    </div>
  </div>
</div>
@endsection