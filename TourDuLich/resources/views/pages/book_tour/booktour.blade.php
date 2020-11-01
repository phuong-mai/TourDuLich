@extends('layout.master')
@section('content')

<div class="container-fluid">
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <div class="row justify-content-between">
                <div class="col-auto">
                  <h5 class="font-weight-bold text-primary">Tour Đã Đặt</h5>
                </div>
                <div class="col-auto">
                  <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal"
                    data-whatever="@getbootstrap">Đặt Tour</button>
                  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Đặt Tour</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form>
                            <div class="form-group">
                              <label for="inputTour">Tour</label>
                              <select id="inputTour" class="form-control">
                                <option selected>Chọn tour</option>
                                <option>Sài Gòn - Hà Nội</option>
                              </select>
                            </div>
                            <div class="form-group">
                              <label for="inputTour">Chọn loại tour</label>
                              <select id="inputTour" class="form-control">
                                <option selected>Chọn loại</option>
                                <option>Du lịch di động</option>
                                <option>Du lịch kết hợp nghề nghiệp</option>
                                <option>Du lịch xã hội và gia đình</option>
                              </select>
                            </div>
                            <div class="form-row">
                              <div class="form-group col-md-6">
                                <label for="inputStart">Ngày đi</label>
                                <input type="date" class="form-control" id="inputStart">
                              </div>
                              <div class="form-group col-md-6">
                                <label for="inputEnd">Ngày đến</label>
                                <input type="date" class="form-control" id="inputEnd">
                              </div>
                            </div> 
                            <div class="form-row">
                              <div class="form-group col-md-10">
                                <label for="inputGroup">Đoàn khách</label>
                                <select id="inputGroup" class="form-control">
                                  <option selected>Chọn đoàn khách</option>
                                  <option>Đoàn quân Việt Nam đi</option>
                                </select>
                              </div>
                              <div class=" form-group col-auto align-self-end">
                                <button class="btn btn-primary">Thêm</button>
                              </div>
                            </div>
                          </form>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Hủy</button>
                          <button type="button" class="btn btn-primary btn-sm">Xác nhận đặt</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Tour</th>
                      <th>Loại tour</th>
                      <th>Tên đoàn khách</th>
                      <th>Ngày đi</th>
                      <th>Ngày đến</th>
                      <th>Thao tác</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($tour_group as $i)
                    <tr>
                      <td>{{$i->id}}</td>
                      <td>Du lịch di động</td>
                      <td>Đoàn quân Việt Nam đi</td>
                      <td>25/10/2020</td>
                      <td>30/10/2020</td>
                      <td>
                        <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#exampleModal1"
                          data-whatever="@getbootstrap">Sửa</button>
                        <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel1"
                          aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Sửa Đặt Tour</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <form>
                                  <div class="form-group">
                                    <label for="inputTour">Tour</label>
                                    <select id="inputTour" class="form-control">
                                      <option selected>Chọn tour</option>
                                      <option>Sài Gòn - Hà Nội</option>
                                    </select>
                                  </div>
                                  <div class="form-group">
                                    <label for="inputTour">Chọn loại tour</label>
                                    <select id="inputTour" class="form-control">
                                      <option selected>Chọn loại</option>
                                      <option>Du lịch di động</option>
                                      <option>Du lịch kết hợp nghề nghiệp</option>
                                      <option>Du lịch xã hội và gia đình</option>
                                    </select>
                                  </div>
                                  <div class="form-row">
                                    <div class="form-group col-md-6">
                                      <label for="inputStart">Ngày đi</label>
                                      <input type="date" class="form-control" id="inputStart">
                                    </div>
                                    <div class="form-group col-md-6">
                                      <label for="inputEnd">Ngày đến</label>
                                      <input type="date" class="form-control" id="inputEnd">
                                    </div>
                                  </div> 
                                  <div class="form-row">
                                    <div class="form-group col-md-10">
                                      <label for="inputGroup">Đoàn khách</label>
                                      <select id="inputGroup" class="form-control">
                                        <option selected>Chọn đoàn khách</option>
                                        <option>Đoàn quân Việt Nam đi</option>
                                      </select>
                                    </div>
                                    <div class=" form-group col-auto align-self-end">
                                      <button class="btn btn-primary">Thêm</button>
                                    </div>
                                  </div>
                                </form>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Hủy</button>
                                <button type="button" class="btn btn-success btn-sm">Xác nhận sửa</button>
                              </div>
                            </div>
                          </div>
                        </div>
                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModal2"
                          data-whatever="@getbootstrap">Xóa</button>
                        <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel2"
                          aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Xóa Đặt Tour</h5>
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
                                <button type="button" class="btn btn-danger btn-sm">Xác nhận xóa</button>
                              </div>
                            </div>
                          </div>
                        </div>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
        @endsection