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
    <form action="cost/create" onsubmit="return validation()" method="post">
      @csrf
      <div class="form-group">
        <div class="form-group">
          <label for="inputGroup">Đoàn khách</label>
          <select name="group_id" id="group_id" class="form-control">
          <option selected>Chọn đoàn khách</option>
          @foreach($group as $group_name)
              <option value="{{$group_name->group_id}}">{{ $group_name->group_name }}</option>
          @endforeach
          </select>
          <span id="group" class="text-danger font-weight-italic"> </span>
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="cost_hotel">Phí khách sạn</label>
            <input type="text" class="form-control" id="cost_hotel" name="cost_hotel" value =0>
            <span id="hotel" class="text-danger font-weight-italic"> </span>

          </div>
          <div class="form-group col-md-6">
            <label for="cost_food">Phí ăn uống</label>
            <input type="text" class="form-control" id="cost_food" name="cost_food" value =0 >
            <span id="food" class="text-danger font-weight-italic"> </span>

          </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
              <label for="cost_vehicle">Phí phương tiện</label>
              <input type="text" class="form-control" id="cost_vehicle" name="cost_vehicle" value =0 >
          <span id="vehicle" class="text-danger font-weight-italic"> </span>

            </div>
            <div class="form-group col-md-6">
              <label for="cost_another">Phí khác</label>
              <input type="text" class="form-control" id="cost_another" name="cost_another" value =0>
              <span id="another" class="text-danger font-weight-italic"> </span>
            </div>
        </div>
        <div class="form-row">
          <label for="cost_detail">Mô tả</label>
          <textarea class="form-control" id="cost_detail" name="cost_detail" rows="5"></textarea>
        </div>
      </div>
      <a class="btn btn-secondary btn-sm" href="{{ route('cost') }}">Hủy</a>
      <button type="submit" class="btn btn-primary btn-sm">Xác nhận thêm</button> 
    </form>
    </div>
  </div>
</div>
<script>		
		function validation(){
      var group_id = document.getElementById('group_id').value;
			var cost_hotel = document.getElementById('cost_hotel').value;
			var cost_food = document.getElementById('cost_food').value;
			var cost_vehicle = document.getElementById('cost_vehicle').value;
			var cost_another = document.getElementById('cost_another').value;
      var cost = RegExp("^\d+$");
      if(group_id =="Chọn đoàn khách") {
        document.getElementById('group').innerHTML =" ** Vui lòng chọn đoàn khách";
        return false;
      } else {
        if(group_id!="Chọn đoàn khách") {
          document.getElementById('group').innerHTML =null;
        }
        if(cost_hotel =="") {
          document.getElementById('hotel').innerHTML =null;
        } else {
          if(!cost.test(cost_hotel)) {
            document.getElementById('hotel').innerHTML =" ** Định dạnh không đúng vui lòng nhập lại!";
          } else {
              document.getElementById('hotel').innerHTML =null;
            }
          }
        if(cost_food =="") {
          document.getElementById('food').innerHTML =null;
        } else {
          if(!cost.test(cost_food)) {
            document.getElementById('food').innerHTML =" ** Định dạnh không đúng vui lòng nhập lại!";
          } else {
              document.getElementById('food').innerHTML =null;
            }
          }
        if(cost_vehicle =="") {
          document.getElementById('vehicle').innerHTML =null;
        } else {
          if(!cost.test(cost_vehicle)) {
            document.getElementById('vehicle').innerHTML =" ** Định dạnh không đúng vui lòng nhập lại!";
          } else {
              document.getElementById('vehicle').innerHTML =null;
            }
          }
        if(cost_another =="") {
          document.getElementById('another').innerHTML =null;
        } else {
          if(!cost.test(cost_another)) {
            document.getElementById('another').innerHTML =" ** Định dạnh không đúng vui lòng nhập lại!";
          } else {
              document.getElementById('another').innerHTML =null;
            }
          }
        if(group_id !="Chọn đoàn khách" && cost.test(cost_hotel) && cost.test(cost_food) && cost.test(cost_vehicle) && cost.test(cost_another)) {
          return true;
        } else return false;
      }
    }
</script>
@endsection