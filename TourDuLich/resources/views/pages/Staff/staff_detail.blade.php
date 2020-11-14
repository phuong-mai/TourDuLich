@extends('layout.master')
@section('content')
<div class="container-fluid">
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <div class="row justify-content-between">
        <div class="col-auto">
            <h5 class="font-weight-bold text-primary">Thông tin nhân viên"</h5>
        </div>
      </div>
    </div>
    <div class="card-body">
    <form>
        <div class="form-group">
            <label for="inputGroup">Họ và tên</label>
            <label name="staff_name" class="form-control">
                {{ $staff->staff_name }}
            <label>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputHospitalFee">Email</label>
                <label type="text" class="form-control" id="staff_email" name="staff_email">
                    {{$staff->staff_email}}
                </label>
            </div>
            <div class="form-group col-md-6">
                <label for="inputMealFee">Số điện thoại</label>
                <label type="text" class="form-control" id="staff_phone_number" name="staff_phone_number">
                    {{$staff->staff_phone_number}}
                </label>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputTransportFee">Căn cước/CMND</label>
                <label type="text" class="form-control" id="staff_id_card" name="staff_id_card">
                {{$staff->staff_id_card}}
                </label>
            </div>
            <div class="form-group col-md-6">
                <label for="inputOtherFee">Ngày sinh</label>
                <label type="text" class="form-control" id="staff_birthday" name="staff_birthday">
                {{ date_format(new DateTime($staff->staff_birthday), 'Y-m-d')}}
                </label>
            </div>
        </div>
        <div class="form-group">
            <label for="inputTotalFee">Nhiệm vụ</label>
            <label type="text" class="form-control" name="staff_responsibility" >
            {{$staff->staff_responsibility}}
            </label>
        </div>
        <a class="btn btn-secondary btn-sm" href="{{ route('staff') }}">Đóng</a>
    </form>
    </div>
  </div>
</div>
@endsection