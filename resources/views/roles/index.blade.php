@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
قائمة الصلاحيات
@stop
@endsection
@section('page-header')
@section('content')
{{-- start content --}}
<div class="row">
    <div class="col-sm-6">
        <h4 class="mb-0">قائمة الصلاحيات</h4>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
            <li class="breadcrumb-item"><a href="#" class="default-color">ادارة صلاحيات المستخدمين</a></li>
            <li class="breadcrumb-item active">قائمة صلاحيات المستخدمين</li>
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
            <a class="button x-small" href="{{ route('roles.create') }}" style="color: white">
                إضافة صلاحيه
            </a>
            <br><br>
            <table id="datatable" class="table-bordered border table table-striped dataTable p-0">
              <thead>
                <tr>
                  <th>#</th>
                  <th>الإسم</th>
                  <th>العمليات</th>
                </tr>
              </thead>
              <tbody>
                {{-- @foreach ($ as $) --}}
                    <tr>
                    <td></td>
                    <td></td>
                    <td>
                        <a href="{{ route('roles.edit','id') }}"
                            class="btn btn-info btn-sm"
                            title="تعديل"><i class="fa fa-edit"></i>
                        </a>
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
                <th>الإسم</th>
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
                    حذف الصلاحيه
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
