@extends('layout.master')
@section('content')
<div class="container-fluid">
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <div class="row justify-content-between">
        <div class="col-auto">
          <h5 class="font-weight-bold text-primary">Thêm chi phí</h5>
        </div>
      </div>
    </div>
    <div class="card-body">
    <form action="cost/create" method="post">
      @csrf
        <div class="form-group">
            <label for="inputGroup">Đoàn khách</label>
            <select name="group_id" class="form-control">
            <option selected>Chọn đoàn khách</option>
            @foreach($group as $group_name)
                <option value="{{$group_name->group_id}}">{{ $group_name->group_name }}</option>
            @endforeach
            </select>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
              <label for="inputHospitalFee">Phí khách sạn</label>
              <input type="text" class="form-control" id="inputHospitalFee" name="cost_hotel" pattern="[0-9]*">
            </div>
            <div class="form-group col-md-6">
              <label for="inputMealFee">Phí ăn uống</label>
              <input type="text" class="form-control" id="inputMealFee" name="cost_food" pattern="[0-9]*" >
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
            <label for="inputTransportFee">Phí phương tiện</label>
            <input type="text" class="form-control" id="inputTransportFee" name="cost_vehicle" pattern="[0-9]*">
            </div>
            <div class="form-group col-md-6">
            <label for="inputOtherFee">Phí khác</label>
            <input type="text" class="form-control" id="inputOtherFee" name="another" pattern="[0-9]*">
            </div>
        </div>
        <div class="form-group">
            <label for="inputTotalFee">Tổng chi phí</label>
            <input type="text" class="form-control" id="inputTotalFee" name="total" >
        </div>
        <a class="btn btn-secondary btn-sm" href="{{ route('cost') }}">Hủy</a>
        <button type="submit" class="btn btn-primary btn-sm">Xác nhận thêm</button> 
    </form>
    </div>
  </div>
</div>
@endsection