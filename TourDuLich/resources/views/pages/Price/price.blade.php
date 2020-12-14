@extends('layout.master')
@section('content')
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script>
    $(document).ready(function () {
        $('#tour_id').change(function () {
        $.ajax({
            type: 'GET',
            dataType: "html",
            url : '/price',
            data : {
                tour_id : document.getElementById('tour_id').value
            },
            success:function(data){
                $('body').html(data);
            }
        });
    });
});

</script>

<div class="container-fluid">
    @if (session('status'))
    <div class="alert alert-success" role="alert">
        <button type="button" class="close" data-dismiss="alert">×</button>
        {{ session('status') }}
    </div>
    @elseif(session('failed'))
    <div class="alert alert-danger" role="alert">
        <button type="button" class="close" data-dismiss="alert">×</button>
        {{ session('failed') }}
    </div>
    @endif
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row justify-content-between">
                <div class="col-auto">
                    <h5 class="font-weight-bold text-primary">Giá Tour</h5>
                    <select id="tour_id" name="tour_id" class="form-control" aria-placeholder="Select">
                        <option value="" disabled selected hidden>{{$prices[0]->tour_name}}</option>
                        @foreach($tours as $tour)
                        <option value="{{$tour->tour_id}}"  >{{$tour->tour_name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-auto">
                  <a type="button" class="btn btn-primary btn-sm" href="{{ url('price/create') }}">Thêm</a>

                    {{-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Thêm Giá Tour</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="/create" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <label for="id_tour">Tour</label>
                                            <select id="id_tour" name="id_tour" class="form-control">
                                                <option selected>Chọn tour</option>
                                                <option>Sài Gòn - Hà Nội</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="price">Giá tour</label>
                                            <input type="text" class="form-control" name="price" id="price">
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="start_day">Từ ngày</label>
                                                <input type="date" class="form-control" name="start_day" id="start_day">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="end_day">Đến ngày</label>
                                                <input type="date" class="form-control" name="end_day" id="end_day">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="" class="btn btn-secondary btn-sm"
                                                data-dismiss="modal">Hủy</button>
                                            <button type="submit" class="btn btn-primary btn-sm">Xác nhận thêm</button>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div> --}}


                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">

                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Loại tour</th>
                            <th>Giá tour</th>
                            <th>Từ ngày</th>
                            <th>Đến ngày</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($prices as $price)
                        <tr>
                            <td>{{ $price-> price_id }}</td>
                            <td>{{ $price-> tour_name }}</td>
                            <td>{{ number_format( $price-> price_value , 0) }}</td>
                            <td>{{ $price->price_start_date}}</td>
                            <td>{{ $price->price_end_date}}</td>
                            <td>
                                <a class="btn btn-success btn-sm" href = 'price/edit/{{ $price->price_id }}'>Sửa</a>
                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                    data-target="#exampleModal2" data-whatever="@getbootstrap">Xóa</button>

                                <div class="modal fade" id="exampleModal2" tabindex="-1"
                                    aria-labelledby="exampleModalLabel2" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Xóa Giá Tour</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p>
                                                    Bạn chắc chắn muốn xóa?
                                                </p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary btn-sm"
                                                    data-dismiss="modal">Hủy</button>
                                                <button type="button" class="btn btn-danger btn-sm">Xác nhận
                                                    xóa</button>
                                                    <a class="btn btn-danger btn-sm" href=""></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            <div>{{$prices->links()}}</div>
            </div>
        </div>
    </div>

</div>
@endsection
