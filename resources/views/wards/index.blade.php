@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
قائمة العنابر
@stop
@endsection
@section('page-header')
@section('content')
{{-- start content --}}
<div class="row">
    <div class="col-sm-6">
        <h4 class="mb-0">قائمة العنابر</h4>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
            <li class="breadcrumb-item"><a href="#" class="default-color">ادارة العنابر</a></li>
            <li class="breadcrumb-item active">قائمة العنابر</li>
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
                إضافة عنبر
            </button>
            <br><br>
            <table id="datatable" class="table-bordered border table table-striped dataTable p-0">
              <thead>
                <tr>
                  <th>#</th>
                  <th>الإسم</th>
                  <th>القسم</th>
                  <th>النوع</th>
                  <th>العمليات</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($wards as $ward)
                    <tr>
                    <td>{{ $ward->id }}</td>
                    <td>{{ $ward->name }}</td>
                    <td>{{ $ward->sections->name }}</td>
                    <td>{{ $ward->ward_type }}</td>
                    <td>
                        <center>
                            <button type="button"
                            class="btn btn-info btn-sm"
                            data-toggle="modal"
                            data-target="#edit{{ $ward->id }}"
                            title="تعديل"><i class="fa fa-edit"></i>
                        </button>
                        <button type="button"
                            class="btn btn-danger btn-sm"
                            data-toggle="modal"
                            data-target="#delete{{ $ward->id }}"
                            title="حذف"><i
                            class="fa fa-trash"></i>
                        </button>
                        </center>
                    </td>

                    </tr>
                    <!-- start_edit_modal_ward -->
        <div class="modal fade" id="edit{{ $ward->id }}" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                        id="exampleModalLabel">
                        تعديل العنبر
                    </h5>
                    <button type="button" class="close" data-dismiss="modal"
                        aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- add_form -->
                    <form action="{{ route('ward.update','id') }}" method="POST">
                        {{ method_field('patch') }}
                        @csrf
                        <div class="row">
                            <div class="col">
                                <label for="Name" class="mr-sm-2">الإسم
                                    :</label>
                                <input id="name" type="text" name="name" value="{{ $ward->name }}" class="form-control">
                                <label for="Name" class="mr-sm-2">نوع العنبر
                                    :</label>
                                <input id="name" type="text" name="ward_type" value="{{ $ward->ward_type }}" class="form-control">
                            </div>
                            <div class="col">
                                <label for="Name_en"class="mr-sm-2">القسم :</label>
                                <div class="box">
                                    <select class="fancyselect" name="section_id">
                                        @foreach ($wards as $ward)
                                            <option value="{{ $ward->sections->id }}" {{ $ward->section_id == $ward->sections->id ? 'selected' : '' }}>{{ $ward->sections->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <br><br>
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
    <!-- end_edit_modal_ward -->
    <!-- delete_modal_ward -->
    <div class="modal fade" id="delete{{ $ward->id }}" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                        id="exampleModalLabel">
                        حذف العنبر
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
    <!-- end_delete_modal_ward -->
                @endforeach
              </tbody>
              <tfoot>
              <tr>
                    <th>#</th>
                    <th>الإسم</th>
                    <th>القسم</th>
                    <th>النوع</th>
                    <th>العمليات</th>
              </tr>
              </tfoot>
            </table>
          </div>
        </div>
      </div>
    </div>
        <!-- start_add_modal_ward -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                            إضافة عنبر
                            </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <!-- add_form -->
                            <form action="{{ route('ward.store') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col">
                                        <label for="Name" class="mr-sm-2">الإسم
                                            :</label>
                                        <input id="name" type="text" name="name" class="form-control">
                                        <label for="Name" class="mr-sm-2">نوع العنبر
                                            :</label>
                                        <input id="name" type="text" name="ward_type" class="form-control">
                                    </div>
                                    <div class="col">
                                        <label for="Name_en"class="mr-sm-2">القسم</label>
                                        <div class="box">
                                            <select class="fancyselect" name="section_id">
                                                @foreach ($sections as $section)
                                                    <option value="{{ $section->id }}">{{ $section->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    {{-- <div class="col">

                                    </div> --}}
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
        <!-- end_add_modal_ward -->

  </div>
{{-- end content --}}
@endsection
@section('js')
@toastr_js
@toastr_render
@endsection
