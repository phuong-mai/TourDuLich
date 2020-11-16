@extends('layout.master')
@section('content')
<div class="container-fluid">
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <div class="row justify-content-between">
        <div class="col-auto">
          <h5 class="font-weight-bold text-primary">Sửa chi phí</h5>
        </div>
      </div>
    </div>
    <div class="card-body">
    <form action="cost/edit_cost/{$cost->cost_id}" method="post">
      @csrf
      <div class="form-group">
        <div class="form-group">
          <input hidden id="cost_id" value="{{$cost->cost_id}}" name="cost_id" />
          <label for="inputGroup">Đoàn khách</label>
          <select name="group_id" class="form-control">
          @foreach($groups as $group)
          <option value="{{$group->group_id}}" {{($cost->group_name === $group->group_name) ? 'Selected' : ''}}>{{$group->group_name}}</option>
          @endforeach
          </select>
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputHospitalFee">Phí khách sạn</label>
            <input type="text" class="form-control" id="cost_hotel" name="cost_hotel" value="{{$cost-> cost_hotel}}" pattern="[0-9]*" >
          </div>
          <div class="form-group col-md-6">
            <label for="inputMealFee">Phí ăn uống</label>
            <input type="text" class="form-control" id="cost_food" name="cost_food" value="{{$cost-> cost_food}}" pattern="[0-9]*" >
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputTransportFee">Phí phương tiện</label>
            <input type="text" class="form-control" id="inputTransportFee" name="cost_vehicle" value="{{$cost-> cost_vehicle}}" pattern="[0-9]*">
          </div>
          <div class="form-group col-md-6">
            <label for="inputOtherFee">Phí khác</label>
            <input type="text" class="form-control" id="inputOtherFee" name="cost_another" value="{{$cost-> cost_another}}" pattern="[0-9]*">
          </div>
        </div>
        <div class="form-row">
          <label for="inputGroup">Mô tả</label>
          <textarea class="form-control" id="exampleFormControlTextarea3" name="cost_detail" rows="5">{{ $cost->cost_detail }}</textarea>
        </div>
      </div>
      <a class="btn btn-secondary btn-sm" href="{{ route('cost') }}">Hủy</a>  
      <button type="submit" class="btn btn-primary btn-sm">Xác nhận sửa</button>       
    </form>
    </div>
  </div>
</div>
@endsection