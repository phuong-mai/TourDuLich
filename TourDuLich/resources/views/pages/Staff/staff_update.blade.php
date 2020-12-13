@extends('layout.master')
@section('content')
<div class="container-fluid">
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <div class="row justify-content-between">
        <div class="col-auto">
          <h5 class="font-weight-bold text-primary">Sửa thông tin nhân viên</h5>
        </div>
      </div>
    </div>
    <div class="card-body">
    <form action="staff/edit_staff/{$staff->staff_id}" method="post">
        @csrf
        <div class="form-group">
       <input hidden id="staff_id" value="{{$staff->staff_id}}" name="staff_id" />
       @if ($errors->has('staff_name'))
                  <div class="text-danger" >
                              {{ $errors->first('staff_name')}}
                  </div>
              @endif
       <label for="inputGroup">Họ và tên</label>
            <input type="text" value="{{$staff->staff_name}}" class="form-control" id="staff_name" name="staff_name">
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
            @if ($errors->has('staff_email'))
                  <div class="text-danger" >
                              {{ $errors->first('staff_email')}}
                  </div>
              @endif
              <label for="inputHospitalFee">Email</label>
              <input type="text"  value="{{$staff->staff_email}}" class="form-control" id="staff_email" name="staff_email">
            </div>
            <div class="form-group col-md-6">
            @if ($errors->has('staff_phone_number'))
                  <div class="text-danger" >
                              {{ $errors->first('staff_phone_number')}}
                  </div>
              @endif
              <label for="inputMealFee">Số điện thoại</label>
              <input type="text" value="{{$staff->staff_phone_number}}"  class="form-control" id="staff_phone_number" name="staff_phone_number" pattern="[0-9]*" >
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
            @if ($errors->has('staff_id_card'))
                  <div class="text-danger" >
                              {{ $errors->first('staff_id_card')}}
                  </div>
              @endif
            <label for="inputTransportFee">Số căn cước/CMND</label>
            <input type="text" value="{{$staff->staff_id_card}}" class="form-control" id="staff_id_card" name="staff_id_card" pattern="[0-9]*">
            </div>
            <div class="form-group col-md-6">
            <label for="inputOtherFee">Ngày sinh</label>
            <input type="date" value="{{ date_format(new DateTime($staff->staff_birthday), 'Y-m-d')}}" class="form-control" id="staff_birthday" name="staff_birthday" >
            </div>
        </div>
        <div class="form-group">
            <label for="inputGroup">Nhiệm vụ</label>
            <input type="text" value="{{$staff->staff_responsibility}}"  class="form-control" id="staff_responsibility" name="staff_responsibility">
        </div>
        <a class="btn btn-secondary btn-sm" href="{{ route('staff') }}">Hủy</a>
        <button type="submit" class="btn btn-primary btn-sm">Xác nhận thêm</button> 
        
    </form>
    </div>
  </div>
</div>
@endsection