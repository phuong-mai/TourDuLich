@extends('layout.master')
@section('content')
    @foreach ($participants as $participant)
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
                    <form action="participant/group_{{ $participant->group_id }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="group_name">Tên đoàn khách</label>
                            <input type="text" class="form-control" id="group_name" name="group_name" disabled
                                value="{{ $participant->group_name }}">
                        </div>
                        <div class="form-group">
                            <label for="customer_number">Số lượng khách</label>
                            <input type="text" class="form-control" id="customer_number" name="customer_number"
                            value="{{ $participant->customer_number }}">
                        </div>
                        <div class="form-group">
                            <label for="participant_staff">Danh sách nhân viên</label>
                            <a type="button" class="btn btn-primary btn-sm" href="{{ route('choose_staff', $participant->group_id) }}">Chọn nhân viên</a>
                            <select id="inputListEmployee" class="form-control" size="3">
                                @foreach ($staffs as $list)
                                    <option>{{ $list->staff_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary btn-sm">Xác nhận sửa</button>
                            <a type="button" class="btn btn-secondary btn-sm" href="{{ route('update_list', ['id' => $participant->group_id, 'staff' => $staff] )}}">Hủy</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
@endsection
