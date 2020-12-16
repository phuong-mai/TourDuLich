@extends('layout.master')
@section('content')

<script language=javascript>
    window.onload = function() {
    var fileInput = document.getElementById('customer_file');
    var fileDisplayArea = document.getElementById('group_name');
    var customerNumber = document.getElementById('input_file');


    fileInput.addEventListener('change', function(e) {
        var file = fileInput.files[0];
        var textType = /ms-excel.*||vnd.openxmlformats-officedocument.spreadsheetml.sheet.*/;
        alert(fileInput.value.replace('C:\\fakepath\\',''));

        if (file.type.match(textType)) {
            var reader = new FileReader();

            reader.onload = function(e) {
               //alert(reader.result.split(/\r\n|\r|\n/).length);
               fileDisplayArea.value =reader.result.split(/\r\n|\r|\n/).length - 3;
                customerNumber.value = fileInput.value.replace('C:\\fakepath\\','');

            }

            reader.readAsText(file);
        } else {
            alert("abc");
        }

    });
}


</script>
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
                    <form action="participant/group_{{ $participant->group_id }}" enctype="multipart/form-data" method="POST">

                        <div class="form-row">
                            <div class=" col-md-6 form-group">
                                {{-- <label for="customer_file">Danh sách khách</label> --}}
                                {{ csrf_field() }}
                                <input accept=".csv"   type="file" id="customer_file" >
                                <input id="input_file" name="customer_file"   class="form-control m-1" value="{{ $participant->customer_file }}" readonly >
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="group_name">Số lượng khách</label>
                                <input type="text" class="form-control" id="group_name" name="group_name"
                                    value="{{ $participant->customer_number }}" readonly>
                            </div>

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
                            <button type="submit" value="upload" class="btn btn-primary btn-sm">Xác nhận sửa</button>
                            <a type="button" class="btn btn-secondary btn-sm" href="{{ route('update_list', ['id' => $participant->group_id, 'staff' => $staff] )}}">Hủy</a>
                        </div>
                        {{-- {{ csrf_field() }}
                        <input type="file" name="filesTest" required="true">
                        <br/>
                        <input type="submit" value="upload"> --}}
                    </form>
                </div>
            </div>
        </div>
    @endforeach
@endsection
