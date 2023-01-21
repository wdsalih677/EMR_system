@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
بيانات المريض الأوليه
@stop
@endsection
@section('page-header')
@section('content')
{{-- start content --}}
<div class="row">
    <div class="col-sm-6">
        <h4 class="mb-0">قائمة التذاكر</h4>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
            <li class="breadcrumb-item"><a href="#" class="default-color">الإستقبال</a></li>
            <li class="breadcrumb-item active">بيانات المريض الأوليه</li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-xl-12 mb-30">
      <div class="card card-statistics h-100">
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
          <div class="table-responsive">
            <button type="button" class="button x-small" data-toggle="modal" data-target="#exampleModal">
                إنشاء تذكره
            </button>
            <br><br>
            <table id="datatable" class="table-bordered border table table-striped dataTable p-0" style="text-align: center;">
              <thead>
                <tr>
                  <th>#</th>
                  <th>الإسم</th>
                  <th>رقم التذكره</th>
                  <th>العمليات</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($tickets as $ticket)
                    <tr>
                    <td>{{ $ticket->id }}</td>
                    <td>{{ $ticket->name }}</td>
                    <td>{{ $ticket->ticket_num }}</td>
                    <td>
                        <button type="button"
                            class="btn btn-info btn-sm"
                            data-toggle="modal"
                            data-target="#edit{{ $ticket->id }}"
                            title="تعديل"><i class="fa fa-edit"></i>
                        </button>
                        <button type="button"
                            class="btn btn-danger btn-sm"
                            data-toggle="modal"
                            data-target="#delete{{ $ticket->id }}"
                            title="حذف"><i
                            class="fa fa-trash"></i>
                        </button>
                        <button type="button"
                            class="btn btn-success btn-sm"
                            data-toggle="modal"
                            data-target="#print{{ $ticket->id }}"
                            title="طباعه"><i
                            class="fa fa-print"></i>
                        </button>
                        {{-- <a href="{{ route('reception.show',$ticket->id) }}"
                            class="btn btn-success btn-sm"
                            title="طباعه"><i
                            class="fa fa-print"></i>
                        </a> --}}
                    </td>

                    </tr>
                            <!-- start_edit_modal_doctor -->
        <div class="modal fade" id="edit{{ $ticket->id }}" tabindex="-1" role="dialog"aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document" >
            <div class="modal-content">
                <div class="modal-header">
                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                        id="exampleModalLabel">
                        تعديل بيانات التزكره
                    </h5>
                    <button type="button" class="close" data-dismiss="modal"
                        aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- add_form -->
                    <form action="{{ route('reception.update','id') }}" method="POST">
                        @csrf
                        {{ method_field('patch') }}
                        <div class="row">
                            <div class="col-md-6 mb-30">
                                <div class="mb-3">
                                    <input type="hidden" name="id" value="{{ $ticket->id }}">
                                    <label class="form-label" for="exampleInputEmail1">اسم:</label>
                                    <input type="text" class="form-control" name="name" value="{{ $ticket->name }}" aria-describedby="emailHelp" autocomplete="off">
                                </div>
                                <div class="mb-3">
                                      <label class="form-label" for="exampleInputEmail1">الرقم الوطني :</label>
                                      <input type="number" class="form-control" name="identity_num" value="{{ $ticket->identity_num }}" aria-describedby="emailHelp" autocomplete="off">
                                </div>
                                <div class="mb-3">
                                      <label class="form-label" for="exampleInputEmail1">العنوان:</label>
                                      <input type="text" class="form-control" name="address" value="{{ $ticket->address }}" aria-describedby="emailHelp" autocomplete="off">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="exampleInputEmail1">الجنس:</label>
                                    <select name="gender" class="form-control">
                                        <option value="1">ذكر</option>
                                        <option value="0" {{ $ticket->gender == 0 ? 'selected' : '' }}>أنثى</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 mb-30">
                                <div class="mb-3">
                                    <label class="form-label" for="exampleInputEmail1">العمر :</label>
                                    <input type="number" class="form-control" name="age" value="{{ $ticket->age }}" aria-describedby="emailHelp" autocomplete="off">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="exampleInputEmail1">نوع العمر :</label>
                                    <select name="age_type" class="form-control">
                                        <option value="1">سنه</option>
                                        <option value="2" {{ $ticket->age_type == 2 ? 'selected' : '' }}>شهر</option>
                                        <option value="3" {{ $ticket->age_type == 3 ? 'selected' : '' }}>يوم</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="exampleInputEmail1">المهنه :</label>
                                    <input type="text" class="form-control" name="job" value="{{ $ticket->job }}" aria-describedby="emailHelp" autocomplete="off">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="exampleInputEmail1">تاريخ الدخول  :</label>
                                    <div class="input-group" data-date="23/11/2018" data-date-format="mm/dd/yyyy">
                                        <input type="text" class="form-control range-to" name="date_entry"  data-date-format="mm/dd/yyyy" value="{{ $ticket->date_entry }}" required placeholder="تحديد تاريخ دخول المريض">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="exampleInputEmail1"> رقم الهاتف  :</label>
                                    <input type="number" class="form-control" name="phone_num" value="{{ $ticket->phone_num }}" aria-describedby="emailHelp" autocomplete="off">
                                </div>
                            </div>
                        </div>
                </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary"
                                data-dismiss="modal">اغلاق</button>
                            <button type="submit" class="btn btn-success">تحديث</button>
                        </div>
                </form>

            </div>
        </div>
    </div>
    <!-- end_edit_modal_doctor -->
    <!-- delete_modal_doctor -->
    <div class="modal fade" id="delete{{ $ticket->id }}" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                        id="exampleModalLabel">
                        حذف التذكرة
                    </h5>
                    <button type="button" class="close" data-dismiss="modal"
                        aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('reception.destroy',$ticket->id) }}" method="post">
                        {{ method_field('Delete') }}
                        @csrf
                        هل تريد الحذف؟
                        <label id="Name" type="text" name="Name" class="form-control">{{ $ticket->name }}</label>

                        <input id="id" type="hidden" name="id" value="{{ $ticket->id }}">
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary"
                                data-dismiss="modal">إغلاق</button>
                            <button type="submit"
                                class="btn btn-danger">حذف</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- end_delete_modal_doctor -->
        <!-- print_modal_doctor -->
        <div class="modal fade" id="print{{ $ticket->id }}" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                            id="exampleModalLabel">
                            طباعه التذكرة
                        </h5>
                        <button type="button" class="close" data-dismiss="modal"
                            aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id="GFG">
                        <center>
                            <h5 class="card-title">مستشفى عطبرة التعليمي</h5>
                        </center>
                            <br><br><br><br><br>
                            <div class="row" id="printableArea">
                                <div class="col-12 text-center">
                                    <h4 class="form-label ">الإسم :  {{ $ticket->name }}</h4>
                                    <br>
                                </div>
                                <div class="col-12 text-center">
                                    <h4 class="form-label">التذكره :  {{ $ticket->ticket_num }}</h4>
                                </div>
                            </div>
                            <br><br><br>
                            <center>
                                <button type="button"
                                class="btn btn-success btn-lg"
                                title="طباعه"><i
                                class="fa fa-print" value="click" onclick="printDiv('printableArea')"> طباعه</i>
                                </button>
                               </center>
                    </div>
                </div>
            </div>
        </div>
        <!-- end_print_modal_doctor -->
                @endforeach
              </tbody>
              <tfoot>
              <tr>
                <th>#</th>
                <th>الإسم</th>
                <th>رقم التذكره</th>
                <th>العمليات</th>
              </tr>
              </tfoot>
            </table>
          </div>
        </div>
      </div>
    </div>
{{--start model --}}
        <!-- start_add_modal_doctor -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                            إضافة التذكرة
                            </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <!-- add_form -->
                            <form action="{{ route('reception.store') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 mb-30">
                                        <div class="mb-3">
                                            <label class="form-label" for="exampleInputEmail1">اسم:</label>
                                            <input type="text" class="form-control" name="name" aria-describedby="emailHelp" autocomplete="off" required placeholder="يجب إدخال اسم المريض رباعي">
                                        </div>
                                        <div class="mb-3">
                                              <label class="form-label" for="exampleInputEmail1">الرقم الوطني :</label>
                                              <input type="number" class="form-control" name="identity_num" aria-describedby="emailHelp" autocomplete="off" required placeholder="أدخل الرقم الوطني">
                                        </div>
                                        <div class="mb-3">
                                              <label class="form-label" for="exampleInputEmail1">العنوان:</label>
                                              <input type="text" class="form-control" name="address" aria-describedby="emailHelp" autocomplete="off" required placeholder="أدخل عنوان المريض">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="exampleInputEmail1">الجنس:</label>
                                            <select name="gender" class="form-control"  required>
                                                <option selected disabled>--اختر الجنس--</option>
                                                <option value="1">ذكر</option>
                                                <option value="0">أنثى</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-30">
                                        <div class="mb-3">
                                            <label class="form-label" for="exampleInputEmail1">العمر :</label>
                                            <input type="number" class="form-control" name="age" aria-describedby="emailHelp" autocomplete="off" required placeholder="أدخل عمر المريض">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="exampleInputEmail1">نوع العمر :</label>
                                            <select name="age_type" class="form-control" required>
                                                <option selected disabled>--سنه - شهر  يوم--</option>
                                                <option value="1">سنه</option>
                                                <option value="2">شهر</option>
                                                <option value="3">يوم</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="exampleInputEmail1">المهنه :</label>
                                            <input type="text" class="form-control" name="job" aria-describedby="emailHelp" autocomplete="off" required placeholder="أدخل مهنة المريض">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="exampleInputEmail1">تاريخ الدخول  :</label>
                                            <div class="input-group" data-date="23/11/2018" data-date-format="mm/dd/yyyy">
                                                <input type="text" class="form-control range-to" name="date_entry"  data-date-format="mm/dd/yyyy" required placeholder="تحديد تاريخ دخول المريض">
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="exampleInputEmail1"> رقم الهاتف  :</label>
                                            <input type="number" class="form-control" name="phone_num" aria-describedby="emailHelp" autocomplete="off" required placeholder="أدخل رقم هاتف المريض بدون صفر البدابه">
                                        </div>
                                    </div>
                                </div>
                        </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-dismiss="modal">اغلاق</button>
                                    <button type="submit" class="btn btn-success">إنشاء</button>
                                </div>
                        </form>

                    </div>
                </div>
            </div>
        <!-- end_add_modal_doctor -->
  </div>
{{-- end model --}}
{{-- end content --}}
@endsection
@section('js')
@toastr_js
@toastr_render
<script>
function printDiv(printableArea) {
     var printContents = document.getElementById(printableArea).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
</script>
<script>
$(document).ready(function ()
{
    $('input[name="date_entry"]').on('change', function ()
        {
            var today = new Date();
            var dd = String(today.getDate()).padStart(2, '0');
            var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
            var yyyy = today.getFullYear();
            today = mm + '/' + dd + '/' + yyyy;
            var from = $('input[name="date_entry"]').val();
            if(Date.parse(from) < Date.parse(today))
            {
                alert("لا يمكن لتاريخ الدخول ان يكون اقل او اكبر من تاريخ اليوم");
                $('input[name="date_entry"]').css({"color":"#555","border":"1px solid red","box-shadow": "red 2px 2px 16px"});
                $('button[type="submit"]').attr("disabled", true);
                $('button[type="submit"]').css({"cursor": "no-drop"});
                $('input[name="end_at"]').val('');
            }
            else
            {
                $('input[name="date_entry"]').css({"color":"#555","border":"1px solid green","box-shadow": "green 2px 2px 16px"});
                $('button[type="submit"]').attr("disabled", false);
                $('button[type="submit"]').css({"cursor": "pointer"});
                $('button[type="submit"]').css({"display": "inline"});
            }
        }
    );
}
);
</script>
@endsection
