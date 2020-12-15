@extends('layout.master')
@section('content')
<div class="container-fluid">
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <div class="row justify-content-between">
        <div class="col-auto">
          <h5 class="font-weight-bold text-primary">Sửa thông tin khách hàng</h5>
        </div>
      </div>
    </div>
    <div class="card-body">
    <form action="customer/edit_customer/{$customer->customer_id}" onsubmit="return validation()" method="post">
        @csrf
        <div class="form-group">
       <input hidden id="customer_id" value="{{$customer->customer_id}}" name="customer_id" />
            <label for="inputGroup">Họ và tên</label>
            <input type="text" value="{{ $customer->customer_name }}" class="form-control" id="customer_name" name="customer_name">
            <span id="cusname" class="text-danger font-weight-italic"> </span>            
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
              <label for="inputHospitalFee">Email</label>
              <input type="text" value="{{ $customer->customer_email }}"  class="form-control" id="customer_email" name="customer_email" />
              <span id="cusemail" class="text-danger font-weight-italic"> </span>
            </div>
            <div class="form-group col-md-6">
              <label for="inputMealFee">Số điện thoại</label>
              <input type="text" value="{{ $customer->customer_phone_number }}"  class="form-control" id="customer_phone_number" name="customer_phone_number" >
              <span id="cusphone" class="text-danger font-weight-italic"> </span>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
            <label for="inputTransportFee">Số căn cước/CMND</label>
            <input type="text" value="{{ $customer->customer_id_card }}" class="form-control" id="customer_id_card" name="customer_id_card">
            <span id="cuscard" class="text-danger font-weight-italic"> </span>
            </div>
            <div class="form-group col-md-6">
            <label for="inputOtherFee">Ngày sinh</label>
            <input type="date" value="{{ date_format(new DateTime($customer->customer_birthday), 'Y-m-d')}}" class="form-control" id="customer_birthday" name="customer_birthday" >
            </div>
        </div>
        <a class="btn btn-secondary btn-sm" href="{{ route('customer') }}">Hủy</a>
        <button type="submit" class="btn btn-primary btn-sm">Xác nhận thêm</button>  
    </form>
    </div>
  </div>
</div>
<script>		
		function validation(){
			var customer_name = document.getElementById('customer_name').value;
			var customer_email = document.getElementById('customer_email').value;
			var customer_phone_number = document.getElementById('customer_phone_number').value;
			var customer_id_card = document.getElementById('customer_id_card').value;
      var email = new RegExp("^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$");
      var phone = new RegExp("([+84][3|5|7|8|9])+([0-9]{9})|(0[3|5|7|8|9])+([0-9]{8})");
      var cmnd = RegExp("[0-9]{9}");
      if(customer_name=="" && customer_email=="" && customer_phone_number =="" && customer_id_card=="") {
        document.getElementById('cusname').innerHTML =" ** Vui lòng nhập tên của bạn";
        document.getElementById('cusphone').innerHTML =" ** Vui lòng nhập số điện thoại";
        document.getElementById('cusemail').innerHTML =" ** Vui lòng nhập email";
        document.getElementById('cuscard').innerHTML =" ** Vui lòng nhập CMND";
        return false;
      } else {
        if(customer_name =="") {
          document.getElementById('cusname').innerHTML =" ** Vui lòng nhập tên của bạn";
        } else {
          document.getElementById('cusname').innerHTML =null;
        }
        if(customer_phone_number=="") {
          document.getElementById('cusphone').innerHTML =" ** Vui lòng nhập số điện thoại";
        } else {
          if(!phone.test(customer_phone_number)) {
            document.getElementById('cusphone').innerHTML =" ** Bạn nhập sai số điện thoại";
          } else {
              document.getElementById('cusphone').innerHTML =null;
            }
        }
        if(customer_email=="") {
          document.getElementById('cusemail').innerHTML =" ** Vui lòng nhập email";
        } else {
          if(!email.test(customer_email)) {
            document.getElementById('cusemail').innerHTML =" ** Bạn nhập sai email";
          } else {
              document.getElementById('cusemail').innerHTML =null;
            }
        }
        if(customer_id_card=="") {
          document.getElementById('cuscard').innerHTML =" ** Vui lòng nhập CMND";
        } else {
          if(!cmnd.test(customer_id_card)) {
            document.getElementById('cuscard').innerHTML =" ** Bạn nhập sai CMND";
          } else {
              document.getElementById('cuscard').innerHTML =null;
            }
        }
      }
      if(customer_name !="" && phone.test(customer_phone_number) && email.test(customer_email) && cmnd.test(customer_id_card)) {
          return true;
        } else return false;
    }
</script>
@endsection