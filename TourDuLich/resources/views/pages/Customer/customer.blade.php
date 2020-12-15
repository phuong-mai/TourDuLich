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
          <h5 class="font-weight-bold text-primary">Khách hàng</h5>
        </div>
        <div class="col-auto">
          <a class="btn btn-primary btn-sm" href="{{route('create_customer')}}">Thêm</a>
        </div>
      </div>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Đoàn khách</th>
              <th>Tổng chi phí</th>
              <th>Mô tả</th>
              <th>Thao tác</th>
            </tr>
          </thead>
          <tbody>
          @foreach($customers as $i)
            <tr>
              <td>{{ $i->customer_name }}</td>
              <td>{{$i->customer_email}}</td>
              <td>{{ $i->customer_phone_number }}</td>
              <td>
                <a class="btn btn-dark btn-sm" href="{{route('show_customer',$i->customer_id)}}">Xem</a>
                <a class="btn btn-success btn-sm" href="{{route('edit_customer',$i->customer_id)}}">Sửa</a>
                <a class="btn btn-danger btn-sm" href="{{route('destroy_customer',$i->customer_id)}}" onclick="return confirm('Bạn có chắc muốn xóa?')" >Xóa</a>
              </td>
            </tr>
          @endforeach
          </tbody>
        </table>
        <div>{{ $customers->links() }}</div>
      </div>
    </div>
  </div>
</div>
@endsection