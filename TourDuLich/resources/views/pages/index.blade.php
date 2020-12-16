@extends('layout.master')
@section('content')

<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
<h1 class="h3 mb-0 text-gray-800">Thống kê</h1>

</div>

<!-- Content Row -->
<div class="row">
{{--
    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Earnings (Monthly)</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">$40,000</div>
            </div>
            <div class="col-auto">
              <i class="fas fa-calendar fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div> --}}

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-4 col-md-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Lợi nhuận</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">{{number_format( $sumtotal, 0)}} VNĐ</div>
            </div>
            <div class="col-auto">
              <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-4 col-md-6 mb-4">
      <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Lượt đặt</div>
              <div class="row no-gutters align-items-center">
                <div class="col-auto">
                  <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{$counttotal}}</div>
                </div>

              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Pending Requests Card Example -->
    <div class="col-xl-4 col-md-6 mb-4">
      <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Khách hàng</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">{{$customer->number}}</div>
            </div>
            <div class="col-auto">
              <i class="fas fa-comments fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>



<div class="card shadow mb-4">
<div class="card-header py-3">
<div class="row justify-content-between">
<div class="col-auto">
<h5 class="font-weight-bold text-primary">Thống Kê Doanh Thu Tour</h5>
</div>
</div>
</div>
<div class="card-body">
<div class="table-responsive">
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
<thead>
<tr>
<th>Tour</th>
<th>Tổng số đoàn đi</th>
<th>Tổng doanh thu</th>
<th>Tổng chi phí</th>
<th>Lãi</th>
</tr>
</thead>
<tbody>
@foreach($statistical as $index)
<tr>
<td>{{$index->tour_name}}</td>
<td>{{$index->total_groups}}</td>
<td>{{number_format( $index->total, 0)}} vnđ</td>
<td>{{number_format( $index->total_cost, 0)}} vnđ</td>
<td>{{number_format( $index->total_cost2, 0)}} vnđ</td>
</tr>
@endforeach
</tbody>
</table>
<div>{{$statistical->links()}}</div>
</div>
</div>
</div>
</div>
@endsection
