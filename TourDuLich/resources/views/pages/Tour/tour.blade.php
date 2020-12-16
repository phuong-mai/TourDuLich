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
                <h5 class="font-weight-bold text-primary">Quản Lý Tour</h5>
            </div>
            <div class="col-auto">
            <a type="button" class="btn btn-primary btn-sm" href="{{ url('tour/create') }}">Thêm</a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
            <tr>
                <th>Tour</th>
                <th>Mô tả</th>
                <th>Loại tour</th>
               
                <th>Thao tác</th>
            </tr>
            </thead>
            <tbody>
                @foreach($tours as $tour)
                <tr>
                    <td>{{$tour->tour_name}}</td>
                    <td>{{$tour->tour_description}}</td>
                    <td>{{$tour->type_name}}</td>
                   
                    <td>
                        <a type="button" class="btn btn-success btn-sm" href="{{ route('edit', $tour->tour_id) }}">Sửa</a>
                        <a class="btn btn-danger btn-sm" href="{{ route('destroy', $tour->tour_id) }}" onclick="return confirm('Bạn chắc chắn muốn xóa?')" >Xóa</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div>{{$tours->links()}}</div>
        </div>
    </div>
    </div>

</div>
@endsection