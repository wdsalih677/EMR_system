@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
قائمة الأقسام
@stop
@endsection
@section('page-header')
@section('content')
{{-- start content --}}
<div class="row">
    <div class="col-sm-6">
        <h4 class="mb-0">قائمة الأقسام</h4>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
            <li class="breadcrumb-item"><a href="#" class="default-color">ادارة الأقسام</a></li>
            <li class="breadcrumb-item active">قائمة الأقسام</li>
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
                إضافة قسم
            </button>
            <br><br>
            <table id="datatable" class="table-bordered border table table-striped dataTable p-0">
              <thead>
                <tr>
                  <th>#</th>
                  <th>اسم القسم</th>
                  <th>رئيس القسم</th>
                  <th>عدد العنابر</th>
                  <th>العمليات</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($sections as $section)
                    <tr>
                    <td>{{ $section->id }}</td>
                    <td>{{ $section->name }}</td>
                    <td>{{ $section->doctors->name }}</td>
                    <td>{{ $section->ward_num }}</td>
                    <td>
                        <center>
                            <button type="button"
                            class="btn btn-info btn-sm"
                            data-toggle="modal"
                            data-target="#edit{{ $section->id }}"
                            title="تعديل"><i class="fa fa-edit"></i>
                        </button>
                        <button type="button"
                            class="btn btn-danger btn-sm"
                            data-toggle="modal"
                            data-target="#delete{{ $section->id }}"
                            title="حذف"><i
                            class="fa fa-trash"></i>
                        </button>
                        </center>
                    </td>

                    </tr>
                            <!-- start_edit_modal_doctor -->
        <div class="modal fade" id="edit{{ $section->id }}" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                        id="exampleModalLabel">
                        تعديل القسم
                    </h5>
                    <button type="button" class="close" data-dismiss="modal"
                        aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- edit_form -->
                    <form action="{{ route('section.update','id') }}" method="POST">
                        {{ method_field('patch') }}
                        @csrf
                        <input type="hidden" name="id" value="{{ $section->id }}">
                        <div class="row">
                            <div class="col">
                                <label for="Name" class="mr-sm-2">اسم القسم
                                    :</label>
                                <input id="name" type="text" name="name" value="{{ $section->name }}" class="form-control" required>
                                <label for="Name" class="mr-sm-2">عدد العنابر
                                    :</label>
                                <input id="name" type="number" name="ward_num" value="{{ $section->ward_num }}" class="form-control" required>
                            </div>
                            <div class="col">
                                <label for="Name_en"class="mr-sm-2">رئيس القسم</label>
                                <div class="box">
                                    <select class="fancyselect" name="doctor_id" required>
                                        @foreach ($sections as $section)
                                            <option value="{{ $section->doctors->id }}" {{ $section->doctor_id == $section->doctors->id ? 'selected' : '' }}>{{ $section->doctors->name }}</option>
                                        @endforeach
                                    </select>
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
    <div class="modal fade" id="delete{{ $section->id }}" tabindex="-1" role="dialog"
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
                    <form action="{{ route('section.destroy','id') }}" method="Delete">
                        {{ method_field('Delete') }}
                        @csrf
                        هل تريد الحذف؟
                        <label id="Name" type="text" name="name" class="form-control">{{ $section->name }}</label>
                        <input id="id" type="hidden" name="id" value="{{ $section->id }}" class="form-control">
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
                @endforeach
              </tbody>
              <tfoot>
              <tr>
                    <th>#</th>
                    <th>اسم القسم</th>
                    <th>رئيس القسم</th>
                    <th>عدد العنابر</th>
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
                            إضافة قسم
                            </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <!-- add_form -->
                            <form action="{{ route('section.store') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col">
                                        <label for="Name" class="mr-sm-2">اسم القسم
                                            :</label>
                                        <input id="name" type="text" name="name" class="form-control" required>
                                        <label for="Name" class="mr-sm-2">عدد العنابر
                                            :</label>
                                        <input id="name" type="number" name="ward_num" class="form-control" required>
                                    </div>
                                    <div class="col">
                                        <label for="Name_en"class="mr-sm-2">رئيس القسم</label>
                                        <div class="box">
                                            <select class="fancyselect" name="doctor_id" required>
                                                <option></option>
                                                @foreach ($doctors as $doctor)
                                                    <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
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
  </div>
{{-- end content --}}
@endsection
@section('js')
@toastr_js
@toastr_render
@endsection
