@extends('layout.master')
@section('content')
<div class="container-fluid">
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <div class="row justify-content-between">
        <div class="col-auto">
            <h5 class="font-weight-bold text-primary">Thông tin khách hàng"</h5>
        </div>
      </div>
    </div>
    <div class="card-body">
    <form>
        <div class="form-group">
            <label for="inputGroup">Họ và tên</label>
            <label name="customer_name" class="form-control">
                {{ $customer->customer_name }}
            <label>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputHospitalFee">Email</label>
                <label type="text" class="form-control" id="customer_email" name="customer_email">
                    {{$customer->customer_email}}
                </label>
            </div>
            <div class="form-group col-md-6">
                <label for="inputMealFee">Số điện thoại</label>
                <label type="text" class="form-control" id="customer_phone_number" name="customer_phone_number">
                    {{$customer->customer_phone_number}}
                </label>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputTransportFee">Căn cước/CMND</label>
                <label type="text" class="form-control" id="customer_id_card" name="customer_id_card">
                {{$customer->customer_id_card}}
                </label>
            </div>
            <div class="form-group col-md-6">
                <label for="inputOtherFee">Ngày sinh</label>
                <label type="text" class="form-control" id="customer_birthday" name="customer_birthday">
                {{ date_format(new DateTime($customer->customer_birthday), 'Y-m-d')}}
                </label>
            </div>
        </div>
        
        <a class="btn btn-secondary btn-sm" href="{{ route('customer') }}">Đóng</a>
    </form>
    </div>
  </div>
</div>
@endsection