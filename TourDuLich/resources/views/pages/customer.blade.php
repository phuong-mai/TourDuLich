@extends('layout.master')
@section('content')

<div class="container-fluid">
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <div class="row justify-content-between">
        <div class="col-auto">
          <h5 class="font-weight-bold text-primary">Quản Lý Tour</h5>
        </div>
        <div class="col-auto">
          <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal"
            data-whatever="@getbootstrap">Thêm Tour</button>
          <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Thêm Tour</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form>
                    <div class="form-group">
                      <label for="inputTour">Tour</label>
                      <input type="text" class="form-control" id="inputTour">
                    </div>
                    <div class="form-group">
                      <label for="inputDescription">Mô tả</label>
                      <input type="text" class="form-control" id="inputDescription">
                    </div>
                    <div class="form-group">
                      <label for="inputTour">Loại tour</label>
                      <select id="inputTour" class="form-control">
                        <option selected>Chọn loại</option>
                        <option>Du lịch di động</option>
                        <option>Du lịch kết hợp nghề nghiệp</option>
                        <option>Du lịch xã hội và gia đình</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="inputPrice">Giá tour</label>
                      <input type="text" class="form-control" id="inputPrice">
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
              <th>Mô tả</th>
              <th>Loại tour</th>
              <th>Giá tour</th>
              <th>Thao tác</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Sài Gòn - Hà Nội</td>
              <td>Lorem Ipsum is simply dummy text</td>
              <td>Du lịch gia đình</td>
              <td>2.500.000</td>
              <td>
                <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#exampleModal1"
                  data-whatever="@getbootstrap">Sửa</button>
                <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel1"
                  aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Sửa Tour</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form>
                          <div class="form-group">
                            <label for="inputTour">Tour</label>
                            <input type="text" class="form-control" id="inputTour">
                          </div>
                          <div class="form-group">
                            <label for="inputDescription">Mô tả</label>
                            <input type="text" class="form-control" id="inputDescription">
                          </div>
                          <div class="form-group">
                            <label for="inputTour">Loại tour</label>
                            <select id="inputTour" class="form-control">
                              <option selected>Chọn loại</option>
                              <option>Du lịch di động</option>
                              <option>Du lịch kết hợp nghề nghiệp</option>
                              <option>Du lịch xã hội và gia đình</option>
                            </select>
                          </div>
                          <div class="form-group">
                            <label for="inputPrice">Giá tour</label>
                            <input type="text" class="form-control" id="inputPrice">
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
                        <h5 class="modal-title" id="exampleModalLabel">Xóa Tour</h5>
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