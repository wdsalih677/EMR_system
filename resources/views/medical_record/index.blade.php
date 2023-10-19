@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
السجلات الطبية
@stop
@endsection
@section('page-header')
@section('content')
{{-- start content --}}
<div class="row">
    <div class="col-sm-6">
        <h4 class="mb-0">السجلات الطبية</h4>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
            <li class="breadcrumb-item"><a href="#" class="default-color">إدارة السجل الطبي و التقارير</a></li>
            <li class="breadcrumb-item active">السجلات الطبية</li>
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
            <a href="{{ route('medical_record.create') }}" class="button x-small" >
                إضافة سجل
            </a>
            <br><br>
            <table id="datatable" class="table-bordered border table table-striped dataTable p-0">
              <thead>
                <tr>
                  <th>#</th>
                  <th>رقم التزكره</th>
                  <th>الرقم الوطني</th>
                  <th>اسم المريض</th>
                  <th>العنوان</th>
                  <th>الهاتف</th>
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
                        <div class="dropdown">
                            <button aria-expanded="false" aria-haspopup="true"
                                class="btn ripple btn-info btn-sm" data-toggle="dropdown"
                                type="button">العمليات<i class="fa fa-caret-down ml-1"></i></button>
                            <div class="dropdown-menu tx-13">
                                <a  class="dropdown-item" href="{{ route('medical_record.edit','id') }}" ><i
                                    class="text-success fa fa-edit"></i>
                                    تعديل بيانات العمليه
                                </a>
                                <a class="dropdown-item" href="{{ route('medical_record.show','id') }}" >
                                    <i class="text-info fa fa-print"></i>
                                    طباعه
                                </a>
                                <button class="dropdown-item" data-reg_id="" data-toggle="modal" data-target="#delete}" ><i
                                    class="text-danger fa fa-trash"></i>
                                    حذف
                                </button>
                            </div>
                        </div>
                    </td>

                    </tr>
                {{-- @endforeach --}}
              </tbody>
              <tfoot>
              <tr>
                    <th>#</th>
                    <th>رقم التزكره</th>
                    <th>الرقم الوطني</th>
                    <th>اسم المريض</th>
                    <th>العنوان</th>
                    <th>الهاتف</th>
                    <th>العمليات</th>
              </tr>
              </tfoot>
            </table>
          </div>
        </div>
      </div>
    </div>
        <!-- delete_modal_doctor -->
        <div class="modal fade" id="delete" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                            id="exampleModalLabel">
                            حذف العمليه
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
