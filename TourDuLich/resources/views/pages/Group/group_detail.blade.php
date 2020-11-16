@extends('layout.master')
@section('content')
        <div class="container-fluid">
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div class="row justify-content-between">
                        <div class="col-auto">
                        <h5 class="font-weight-bold text-primary">{{ $group->group_name}}</h5>
                        </div>
                    </div>
                </div>
                <div class="card-body">                   
                        @csrf
                        <div class="form-group">
                            <label for="tour_name">Tour</label>
                            <label name="tour_name" class="form-control">
                                {{ $group->tour_name }}
                            <label>
                        </div>
                        <div class="form-group">
                            <label for="group_name">Tên đoàn khách</label>
                            <label name="group_name" class="form-control">
                                {{ $group->group_name }}
                            <label>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="group_start_date">Ngày đi</label>
                                <label name="group_start_date" class="form-control">
                                    {{date_format(new DateTime($group->group_start_date), 'Y-m-d')}}
                                </label>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="group_end_date">Ngày đến</label>
                                <label name="group_end_date" class="form-control">
                                    {{ date_format(new DateTime($group->group_end_date), 'Y-m-d') }}
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="participant_customer">Danh sách khách</label>
                            <label name="participant_customer" class="form-control">
                                {{ $group->participant_customer }}
                            </label>
                        </div>
                        <div class="form-group">
                            <label for="participant_staff">Danh sách nhân viên</label>
                            <select id="participant_staff" class="form-control" size="3">
                                @foreach ($staffs as $staff)
                                    <option value="audi">{{$staff->staff_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="group_plan">Chi tiết chương trình</label>
                            <label name="group_plan" class="form-control">
                                {{ $group->group_plan }}
                            </label>
                        </div>
                        <div class="modal-footer">
                            <a type="button" class="btn btn-secondary btn-sm" href="{{ route('group') }}">Hủy</a>
                        </div>
                </div>
            </div>
        </div>
@endsection
