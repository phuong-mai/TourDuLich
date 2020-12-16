@extends('layout.master')
@section('content')

<div class="container-fluid">
@if (session('success'))
<div class="alert alert-success" role="alert">
<button type="button" class="close" data-dismiss="alert">×</button>
{{ session('success') }}
</div>
@elseif(session('fail'))
<div class="alert alert-danger" role="alert">
<button type="button" class="close" data-dismiss="alert">×</button>
{{ session('fail') }}
</div>
@endif
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <div class="row justify-content-between">
        <div class="col-auto">
          <h5 class="font-weight-bold text-primary">Nhân viên</h5>
        </div>
        <div class="col-auto">
          <a class="btn btn-primary btn-sm" href="{{route('create_staff')}}">Thêm</a>
        </div>
      </div>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Họ và tên</th>
              <th>Email</th>
              <th>Số điện thoại</th>
              <th>Thao tác</th>
            </tr>
          </thead>
          <tbody>
          @foreach($staffs as $i)
            <tr>
              <td>{{ $i->staff_name }}</td>
              <td>{{$i->staff_email}}</td>
              <td>{{ $i->staff_phone_number }}</td>
              <td>
                <a class="btn btn-dark btn-sm" href="{{route('show_staff',$i->staff_id)}}">Xem</a>
                <a class="btn btn-success btn-sm" href="{{route('edit_staff',$i->staff_id)}}">Sửa</a>
                <a class="btn btn-danger btn-sm" href="{{route('destroy_staff',$i->staff_id)}}" onclick="return confirm('Bạn có chắc muốn xóa')" >Xóa</a>
              </td>
            </tr>
          @endforeach
          </tbody>
        </table>
        <div>{{ $staffs->links() }}</div>
      </div>
    </div>
  </div>
</div>
@endsection