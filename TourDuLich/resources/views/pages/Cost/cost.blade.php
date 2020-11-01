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
                  <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal"
                    data-whatever="@getbootstrap">Thêm</button>
                  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Thêm Chi Phí</h5>
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
                              <label for="inputGroup">Đoàn khách</label>
                              <select id="inputGroup" class="form-control">
                                <option selected>Chọn đoàn khách</option>
                                <option>Đoàn quân Việt Nam đi</option>
                              </select>
                            </div>
                            <div class="form-row">
                              <div class="form-group col-md-6">
                                <label for="inputHospitalFee">Phí khách sạn</label>
                                <input type="text" class="form-control" id="inputHospitalFee">
                              </div>
                              <div class="form-group col-md-6">
                                <label for="inputMealFee">Phí ăn uống</label>
                                <input type="text" class="form-control" id="inputMealFee">
                              </div>
                            </div>
                            <div class="form-row">
                              <div class="form-group col-md-6">
                                <label for="inputTransportFee">Phí phương tiện</label>
                                <input type="text" class="form-control" id="inputTransportFee">
                              </div>
                              <div class="form-group col-md-6">
                                <label for="inputOtherFee">Phí khác</label>
                                <input type="text" class="form-control" id="inputOtherFee">
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="inputTotalFee">Tổng chi phí</label>
                              <input type="text" class="form-control" id="inputTotalFee">
                            </div>
                          </form>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Hủy</button>
                          <button type="button" class="btn btn-primary btn-sm">Xác nhận thêm</button>
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
                      <th>Đoàn khách</th>
                      <th>Tổng chi phí</th>
                      <th>Mô tả</th>
                      <th>Thao tác</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($costs as $cost)
                    <tr>
                      <td>{{ $cost->id }}</td>
                      <td>{{ $cost->group_id }}</td>
                      <td>{{ $cost->cost_total }}</td>
                      <td>{{ $cost->description }}</td>
                      <td>
                        <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#exampleModal1"
                          data-whatever="@getbootstrap">Sửa</button>
                        <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel1"
                          aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Sửa Chi Phí</h5>
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
                                    <label for="inputGroup">Đoàn khách</label>
                                    <select id="inputGroup" class="form-control">
                                      <option selected>Chọn đoàn khách</option>
                                      <option>Đoàn quân Việt Nam đi</option>
                                    </select>
                                  </div>
                                  <div class="form-row">
                                    <div class="form-group col-md-6">
                                      <label for="inputHospitalFee">Phí khách sạn</label>
                                      <input type="text" class="form-control" id="inputHospitalFee">
                                    </div>
                                    <div class="form-group col-md-6">
                                      <label for="inputMealFee">Phí ăn uống</label>
                                      <input type="text" class="form-control" id="inputMealFee">
                                    </div>
                                  </div>
                                  <div class="form-row">
                                    <div class="form-group col-md-6">
                                      <label for="inputTransportFee">Phí phương tiện</label>
                                      <input type="text" class="form-control" id="inputTransportFee">
                                    </div>
                                    <div class="form-group col-md-6">
                                      <label for="inputOtherFee">Phí khác</label>
                                      <input type="text" class="form-control" id="inputOtherFee">
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label for="inputTotalFee">Tổng chi phí</label>
                                    <input type="text" class="form-control" id="inputTotalFee">
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
                          <a class="btn btn-danger btn-sm" href="{{route('destroy_cost',$cost->id)}}" onclick="return confirm('Bạn có chắc sẽ xóa sản phẩm này')" >Xóa</a>
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