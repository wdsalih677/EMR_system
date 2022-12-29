@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
قائمة التنويم
@stop
@endsection
@section('page-header')
@section('content')
{{-- start content --}}
<div class="row">
    <div class="col-sm-6">
        <h4 class="mb-0">قائمة التنويم</h4>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
            <li class="breadcrumb-item"><a href="#" class="default-color">العمليات و التنويم</a></li>
            <li class="breadcrumb-item active">قائمة التنويم</li>
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
                إضافة مريض
            </button>
            <br><br>
            <table id="datatable" class="table-bordered border table table-striped dataTable p-0">
              <thead>
                <tr>
                  <th>#</th>
                  <th>اسم المريض</th>
                  <th>العمر</th>
                  <th>رقم التذكره</th>
                  <th>التشخيص</th>
                  <th>حالة المريض</th>
                  <th>العمليات</th>
                </tr>
              </thead>
              <tbody>
                {{-- @foreach ($ as $) --}}
                    <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                        <button type="button"
                            class="btn btn-info btn-sm"
                            data-toggle="modal"
                            data-target="#edit"
                            title="تعديل"><i class="fa fa-edit"></i>
                        </button>
                        <button type="button"
                            class="btn btn-danger btn-sm"
                            data-toggle="modal"
                            data-target="#delete"
                            title="حذف"><i
                            class="fa fa-trash"></i>
                        </button>
                    </td>

                    </tr>
                {{-- @endforeach --}}
              </tbody>
              <tfoot>
              <tr>
                    <th>#</th>
                    <th>اسم المريض</th>
                    <th>العمر</th>
                    <th>رقم التذكره</th>
                    <th>التشخيص</th>
                    <th>حالة المريض</th>
                    <th>العمليات</th>
              </tr>
              </tfoot>
            </table>
          </div>
        </div>
      </div>
    </div>
        <!-- start_add_modal_doctor -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                            إضافة مريض
                            </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <!-- add_form -->
                            <form action="" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col">
                                        <label for="Name" class="mr-sm-2">رقم التذكره :</label>
                                        <input id="name" type="number" name="Class_name" class="form-control">
                                        <label for="Name" class="mr-sm-2">اسم المريض :</label>
                                        <label id="name" type="text" name="Class_name" class="form-control" style="height: 38px;">
                                    </div>
                                    <div class="col">
                                        <label for="Name" class="mr-sm-2"> التشخيص :
                                        </label>
                                    <input id="name" type="text" name="Class_name" class="form-control">
                                        <label for="Name_en"class="mr-sm-2">حالة المريض :</label>
                                        <div class="box">
                                            <select class="fancyselect" name="Grade_id">
                                                {{-- @foreach ($ as $) --}}
                                                    <option value=""></option>
                                                {{-- @endforeach --}}
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <label for="Name" class="mr-sm-2">العمر :</label>
                                <label id="name" type="text" name="Class_name" class="form-control" style="height: 38px;">
                        </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-dismiss="modal">اغلاق</button>
                                    <button type="submit" class="btn btn-success">اضافة</button>
                                </div>
                        </form>

                    </div>
                </div>
            </div>
        <!-- end_add_modal_doctor -->
        <!-- start_edit_modal_doctor -->
        <div class="modal fade" id="edit" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                            id="exampleModalLabel">
                            تعديل المريض
                        </h5>
                        <button type="button" class="close" data-dismiss="modal"
                            aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- edit_form -->
                        <form action="" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col">
                                    <label for="Name" class="mr-sm-2">رقم التذكره :</label>
                                    <input id="name" type="number" name="Class_name" class="form-control">
                                    <label for="Name" class="mr-sm-2">اسم المريض :
                                    </label>
                                    <label id="name" type="text" name="Class_name" class="form-control" style="height: 38px;">

                                </div>
                                <div class="col">
                                    <label for="Name" class="mr-sm-2"> التشخيص :
                                    </label>
                                <input id="name" type="text" name="Class_name" class="form-control">
                                    <label for="Name_en"class="mr-sm-2">حالة المريض :</label>
                                    <div class="box">
                                        <select class="fancyselect" name="Grade_id">
                                            {{-- @foreach ($ as $) --}}
                                                <option value=""></option>
                                            {{-- @endforeach --}}
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <label for="Name" class="mr-sm-2">العمر:
                            </label>
                            <label id="name" type="text" name="Class_name" class="form-control" style="height: 38px;">
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
        <div class="modal fade" id="delete" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                            id="exampleModalLabel">
                            حذف القسم
                        </h5>
                        <button type="button" class="close" data-dismiss="modal"
                            aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="" method="post">
                            {{ method_field('Delete') }}
                            @csrf
                            هل تريد الحذف؟
                            <label id="Name" type="text" name="Name" class="form-control"></label>

                            <input id="id" type="hidden" name="id" class="form-control"
                                value="">
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
  </div>
{{-- end content --}}
@endsection
@section('js')
@toastr_js
@toastr_render
@endsection
