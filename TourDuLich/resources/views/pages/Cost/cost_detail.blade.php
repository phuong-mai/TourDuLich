@extends('layout.master')
@section('content')
<div class="container-fluid">
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <div class="row justify-content-between">
        <div class="col-auto">
            <h5 class="font-weight-bold text-primary">Chi phí của "{{ $show->group_name }}"</h5>
        </div>
      </div>
    </div>
    <div class="card-body">
    <form>
        <div class="form-group">
            <label for="inputGroup">Đoàn khách</label>
            <label name="group_name" class="form-control">
                {{ $show->group_name }}
            <label>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputHospitalFee">Phí khách sạn</label>
                <label type="text" class="form-control" id="cost_hotel" name="cost_hotel">
                    {{number_format( $show->cost_hotel, 0) }}
                </label>
            </div>
            <div class="form-group col-md-6">
                <label for="inputMealFee">Phí ăn uống</label>
                <label type="text" class="form-control" id="cost_food" name="cost_food">
                    {{number_format( $show->cost_food, 0) }}
                </label>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputTransportFee">Phí phương tiện</label>
                <label type="text" class="form-control" id="cost_vehicle" name="cost_vehicle">
                    {{number_format( $show->cost_vehicle, 0) }}
                </label>
            </div>
            <div class="form-group col-md-6">
                <label for="inputOtherFee">Phí khác</label>
                <label type="text" class="form-control" id="cost_another" name="cost_another">
                    {{number_format( $show->cost_another, 0) }}
                </label>
            </div>
        </div>
        <div class="form-group">
            <label for="inputTotalFee">Tổng chi phí</label>
            <label type="text" class="form-control" >
                {{number_format( $show->cost_total, 0)}}
            </label>
        </div>
        <a class="btn btn-secondary btn-sm" href="{{ route('cost') }}">Đóng</a>
    </form>
    </div>
  </div>
</div>
@endsection