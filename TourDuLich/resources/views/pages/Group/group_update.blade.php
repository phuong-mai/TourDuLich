@extends('layout.master')
@section('content')
    @foreach ($groups as $group)
        <div class="container-fluid">
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div class="row justify-content-between">
                        <div class="col-auto">
                            <h5 class="font-weight-bold text-primary">Sửa đoàn khách</h5>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="group/edit/{{ $group->group_id }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="tour_id">Tour</label>
                            <select id="tour_id" class="form-control" name="tour_id">
                                @foreach ($tours as $tour)
                                    <option value="{{ $tour->tour_id }}"
                                        {{($group->tour_name === $tour->tour_name) ? 'Selected' : ''}}>{{ $tour->tour_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="group_name">Tên đoàn khách</label>
                            <input type="text" class="form-control" id="group_name" name="group_name"
                                value="{{ $group->group_name }}">
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="group_start_date">Ngày đi</label>
                                <input type="date" class="form-control" id="group_start_date" name="group_start_date"
                                    value="{{ date_format(new DateTime($group->group_start_date), 'Y-m-d') }}">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="group_end_date">Ngày đến</label>
                                <input type="date" class="form-control" id="group_end_date" name="group_end_date"
                                    value="{{ date_format(new DateTime($group->group_end_date), 'Y-m-d') }}">
                            </div>
                        </div>
                        {{-- <div class="form-group">
                            <label for="inputListCustomer">Danh sách khách</label>
                            <input type="text" class="form-control" id="inputListCustomer">
                        </div>
                        <div class="form-group">
                            <label for="inputListEmployee">Danh sách nhân viên</label>
                            <a type="button" class="btn btn-primary btn-sm" href="{{ route('choose_staff',$group->group_id)}}">Chọn nhân viên</a>
                            <select id="inputListEmployee" class="form-control" size="3">
                                @foreach ($staffs as $staff)
                                    <option>{{$staff->staff_name}}</option>
                                @endforeach
                            </select>
                        </div> --}}
                        <div class="form-group">
                            <label for="group_plan">Chi tiết chương trình</label>
                            <input type="text" class="form-control" id="group_plan" name="group_plan"
                                value="{{ $group->group_plan }}">
                        </div>
                        <div class="modal-footer">
                            <a type="button" class="btn btn-secondary btn-sm" href="{{ route('group') }}">Hủy</a>
                            <button type="submit" class="btn btn-primary btn-sm">Xác nhận sửa</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
@endsection
