@extends('layout.master')
@section('content')

    <div class="container-fluid">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button>
                {{ session('status') }}
            </div>
        @elseif(session('failed'))
            <div class="alert alert-danger" role="alert">
                <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button>
                {{ session('failed') }}
            </div>
        @endif
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="row justify-content-between">
                    <div class="col-auto">
                        <h5 class="font-weight-bold text-primary">Đoàn Khách</h5>
                    </div>
                    <form action="group/create" method="POST">
                        @csrf
                        <div class="col-auto">
                            <button type="submit" class="btn btn-primary btn-sm"  >Thêm</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Tour</th>
                                <th>Tên đoàn khách</th>
                                <th>Ngày đi</th>
                                <th>Ngày đến</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($groups as $group)
                                <tr>
                                    <td>{{ $group->tour_id }}</td>
                                    <td>{{ $group->group_name }}</td>
                                    <td>{{ date_format(new DateTime($group->group_start_date), 'd-m-Y') }}</td>
                                    <td>{{ date_format(new DateTime($group->group_end_date), 'd-m-Y') }}</td>
                                    <td>
                                        <a type="button" class="btn btn-dark btn-sm"
                                            href="{{ route('group_detail', $group->group_id) }}">Xem</a>
                                        <a type="button" class="btn btn-success btn-sm"
                                            href="{{ route('group_update', $group->group_id) }}">Sửa</a>
                                        <a type="button" class="btn btn-danger btn-sm"
                                            href="{{ route('group_delete',$group->group_id) }}">Xóa</a>
                                            
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
