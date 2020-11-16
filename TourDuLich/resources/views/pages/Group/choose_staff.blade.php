@extends('layout.master')
@section('content')
    <form action="participant/update/{{$id_group}}" method="POST">
        @csrf
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="row justify-content-between">
                    <div class="col-auto">
                        <h5 class="font-weight-bold text-primary">Chọn nhân viên</h5>
                    </div>
                    <div class="col-auto">
                        <a type="button" class="btn btn-primary btn-sm" href="{{ route('create_cost') }}">Thêm</a>
                        <button type="submit" class="btn btn-primary btn-sm">Lưu</button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Họ tên</th>
                                <th>Nhiệm vụ</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($staffs as $staff)
                                <tr>
                                    <td>{{ $staff->staff_name }}</td>
                                    <td>{{ $staff->staff_responsibility }}</td>
                                    <td>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input class="form-check-input" value="{{ $staff->staff_id }}"
                                                    type="checkbox" name="participant_staff[]">
                                            </label>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </form>
@endsection
