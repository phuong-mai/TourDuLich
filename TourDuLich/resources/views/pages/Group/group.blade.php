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
                <div class="col-auto">
                <a type="button" class="btn btn-primary btn-sm" href="{{ url('group/create') }}">Thêm</a>
                </div>
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
                    @foreach($groups as $group)
                    <tr>
                      <td>{{$group->tour_id}}</td>
                      <td>{{$group->group_name}}</td>
                      <td>{{ date_format(new DateTime($group->group_start_date), 'd-m-Y')}}</td>
                      <td>{{ date_format(new DateTime($group->group_end_date), 'd-m-Y')}}</td>
                      <td>
                        <a type="button" class="btn btn-success btn-sm" href="group/edit/{{$group->group_id}}">Sửa</a>
                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModal2"
                          data-whatever="@getbootstrap">Xóa</button>
                        <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel2"
                          aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Xóa Đoàn Khách</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <p>
                                  Bạn chắc chắn muốn xóa?
                                </p>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Hủy</button>
                                <button type="submit" class="btn btn-danger btn-sm">Xác nhận xóa</button>
                              </div>
                            </div>
                          </div>
                        
                        
                        
                        </div>
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