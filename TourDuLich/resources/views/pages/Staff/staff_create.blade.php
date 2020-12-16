@extends('layout.master')
@section('content')
<div class="container-fluid">
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <div class="row justify-content-between">
        <div class="col-auto">
          <h5 class="font-weight-bold text-primary">Thêm nhân viên</h5>
        </div>
      </div>
    </div>
    <div class="card-body">
    <form action="staff/create" onsubmit="return validation()" method="post">
      @csrf
        <div class="form-group">
       <label for="inputGroup">Họ và tên <span class="text-danger">*</span> </label>
            <input type="text" class="form-control" id="staff_name" name="staff_name">
            <span id="staffname" class="text-danger font-weight-italic"> </span>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
              <label for="inputHospitalFee">Email <span class="text-danger">*</span></label>
              <input type="text"   class="form-control" id="staff_email" name="staff_email">
              <span id="staffemail" class="text-danger font-weight-italic"> </span>
            </div>
            <div class="form-group col-md-6">
              <label for="inputMealFee">Số điện thoại<span class="text-danger">*</span></label>
              <input type="text"  class="form-control" id="staff_phone_number" name="staff_phone_number" >
              <span id="staffphone" class="text-danger font-weight-italic"> </span>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
            <label for="inputTransportFee">Số căn cước/CMND<span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="staff_id_card" name="staff_id_card">
            <span id="staffcard" class="text-danger font-weight-italic"> </span>
            </div>
            <div class="form-group col-md-6">
            <label for="inputOtherFee">Ngày sinh</label>
            <input type="date" class="form-control" id="staff_birthday" name="staff_birthday" >
            </div>
        </div>
        <div class="form-group">
            <label for="inputGroup">Nhiệm vụ</label>
            <input type="text"  class="form-control" id="staff_responsibility" name="staff_responsibility">
        </div>
        <a class="btn btn-secondary btn-sm" href="{{ route('staff') }}">Hủy</a>
        <button type="submit" class="btn btn-primary btn-sm" >Xác nhận thêm</button> 
    </form>
    </div>
  </div>
</div>
<script>		
		function validation(){
			var staff_name = document.getElementById('staff_name').value;
			var staff_email = document.getElementById('staff_email').value;
			var staff_phone_number = document.getElementById('staff_phone_number').value;
			var staff_id_card = document.getElementById('staff_id_card').value;
      var email = new RegExp("^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$");
      var phone = new RegExp("([+84][3|5|7|8|9])+([0-9]{9})|(0[3|5|7|8|9])+([0-9]{8})");
      var cmnd = RegExp("[0-9]{9}");
      if(staff_name=="" && staff_email=="" && staff_phone_number =="" && staff_id_card=="") {
        document.getElementById('staffname').innerHTML =" ** Vui lòng nhập tên của bạn";
        document.getElementById('staffphone').innerHTML =" ** Vui lòng nhập số điện thoại";
        document.getElementById('staffemail').innerHTML =" ** Vui lòng nhập email";
        document.getElementById('staffcard').innerHTML =" ** Vui lòng nhập CMND";
        return false;
      } else {
        if(staff_name =="") {
          document.getElementById('staffname').innerHTML =" ** Vui lòng nhập tên của bạn";
        } else {
          document.getElementById('staffname').innerHTML =null;
        }
        if(staff_phone_number=="") {
          document.getElementById('staffphone').innerHTML =" ** Vui lòng nhập số điện thoại";
        } else {
          if(!phone.test(staff_phone_number)) {
            document.getElementById('staffphone').innerHTML =" ** Bạn nhập sai số điện thoại";
          } else {
              document.getElementById('staffphone').innerHTML =null;
            }
        }
        if(staff_email=="") {
          document.getElementById('staffemail').innerHTML =" ** Vui lòng nhập email";
        } else {
          if(!email.test(staff_email)) {
            document.getElementById('staffemail').innerHTML =" ** Bạn nhập sai email";
          } else {
              document.getElementById('staffemail').innerHTML =null;
            }
        }
        if(staff_id_card=="") {
          document.getElementById('staffcard').innerHTML =" ** Vui lòng nhập CMND";
        } else {
          if(!cmnd.test(staff_id_card)) {
            document.getElementById('staffcard').innerHTML =" ** Bạn nhập sai CMND";
          } else {
              document.getElementById('staffcard').innerHTML =null;
            }
        }
      }
      if(staff_name !="" && phone.test(staff_phone_number) && email.test(staff_email) && cmnd.test(staff_id_card)) {
          return true;
        } else return false;
    }
</script>
@endsection