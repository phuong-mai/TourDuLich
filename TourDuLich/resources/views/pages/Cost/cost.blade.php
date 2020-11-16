@extends('layout.master')
@section('content')

    <div class="container-fluid">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="row justify-content-between">
                    <div class="col-auto">
                        <h5 class="font-weight-bold text-primary">Chi Phí Tour</h5>
                    </div>
                    <div class="col-auto">
                        <a class="btn btn-primary btn-sm" href="{{ route('create_cost') }}">Thêm</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Đoàn khách</th>
                                <th>Tổng chi phí</th>
                                <th>Mô tả</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($costs as $cost)
                                <tr>
                                    <td>{{ $cost->cost_id }}</td>
                                    <td>{{ $cost->group_name }}</td>
                                    <td>{{ number_format($cost->cost_total, 0) }}</td>
                                    <td>{{ $cost->cost_detail }}</td>
                                    <td>
                                        <a class="btn btn-dark btn-sm"
                                            href="{{ route('show_cost', $cost->cost_id) }}">Xem</a>
                                        <a class="btn btn-success btn-sm"
                                            href="{{ route('edit_cost', $cost->cost_id) }}">Sửa</a>
                                        <a class="btn btn-danger btn-sm" href="{{ route('destroy_cost', $cost->cost_id) }}"
                                            onclick="return confirm('Bạn có chắc sẽ xóa sản phẩm này')">Xóa</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div>{{ $costs->links() }}</div>
                </div>
            </div>
        </div>
    </div>
@endsection
