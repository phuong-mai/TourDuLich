@extends('layout.master')
@section('content')
    <div class="container-fluid">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="row justify-content-between">
                    <div class="col-auto">
                        <h5 class="font-weight-bold text-primary">Participant</h5>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form action="participant/group_{{ $participants->group_id }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="group_name">Tên đoàn khách</label>
                        <input type="text" class="form-control" id="group_name" name="group_name"
                            value="{{ $participants->group_name }}">
                    </div>
                    <div class="form-group">
                        <label for="participant_customer">Danh sách khách</label>
                        <a type="button" class="btn btn-primary btn-sm" href="#">Chọn khách</a>
                        <input type="text" class="form-control" id="participant_customer">
                    </div>
                    <div class="form-group">
                        <label for="participant_staff">Danh sách nhân viên</label>
                        <a type="button" class="btn btn-primary btn-sm"
                            href="{{ route('choose_staff', $participants->group_id) }}">Chọn nhân viên</a>
                        <select id="inputListEmployee" class="form-control" size="3">
                            @foreach ($staffs as $list)
                                @if ($list == null)
                                    <option> Chưa có nhân viên</option>
                                @else
                                    <option>{{ $list->staff_name }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="modal-footer">
                        <a type="button" class="btn btn-secondary btn-sm"
                            href="{{ route('participant_delete', $participants->group_id) }}">Hủy</a>
                        <button type="submit" class="btn btn-primary btn-sm">Xác nhận thêm</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
