@extends('layout.master')
@section('content')
<div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Thêm Đoàn Khách</h5>
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
            <label for="inputGroup">Tên đoàn khách</label>
            <input type="text" class="form-control" id="inputGroup">
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
          <div class="form-group">
            <label for="inputListCustomer">Danh sách khách</label>
            <input type="text" class="form-control" id="inputListCustomer">
          </div>
          <div class="form-group">
            <label for="inputListEmployee">Danh sách nhân viên</label>
            <input type="text" class="form-control" id="inputListEmployee">
          </div>
          <div class="form-group">
            <label for="inputDetail">Chi tiết chương trình</label>
            <input type="text" class="form-control" id="inputDetail">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Hủy</button>
        <button type="button" class="btn btn-primary btn-sm">Xác nhận thêm</button>
      </div>
    </div>
  </div>
@endsection