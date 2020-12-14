@extends('layout.master')
@section('content')

<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
<h1 class="h3 mb-0 text-gray-800">Thống kê</h1>

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
<td>{{$index->total}}</td>
<td>{{$index->total_cost}}</td>
<td>{{$index->total_cost2}}</td>
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