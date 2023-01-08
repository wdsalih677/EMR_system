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
                @foreach ($roles as $role)
                    <tr>
                    <td>{{ $role->id }}</td>
                    <td>{{ $role->name }}</td>
                    <td>
                        <button type="button"
                            class="btn btn-info btn-sm"
                            data-toggle="modal"
                            data-target="#edit{{ $role->id }}"
                            title="تعديل"><i class="fa fa-edit"></i>
                        </button>
                        @if ($role->name == 'Admin')
                        <button style="display: none;" type="button"
                            class="btn btn-danger btn-sm"
                            data-toggle="modal"
                            data-target="#delete"
                            title="حذف"><i
                            class="fa fa-trash"></i>
                        </button>
                        @else
                        <button type="button"
                            class="btn btn-danger btn-sm"
                            data-toggle="modal"
                            data-target="#delete{{ $role->id }}"
                            title="حذف"><i
                            class="fa fa-trash"></i>
                        </button>
                        @endif
                    </td>

                    </tr>
                    <!-- start_edit_modal_doctor -->
                        <div class="modal fade" id="edit{{ $role->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                            id="exampleModalLabel">
                                            تعديل الصلاحيه
                                        </h5>
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- edit_form -->
                                        <form action="{{ route('roles.update','id') }}" method="POST">
                                            {{ method_field('patch') }}
                                            <div class="row">
                                                <div class="col-md-6 mb-30">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="exampleInputEmail1">إسم الصلاحيه :</label>
                                                        <input type="hidden" name="id" value="{{ $role->id }}">
                                                        <input type="text" class="form-control" aria-describedby="emailHelp" value="{{ $role->name }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6 mb-30">
                                                    <div class="controls mb-2">
                                                        <label class="checkbox" for="closeButton">
                                                        @foreach ($premissions as $premission)
                                                        <input id="closeButton" type="checkbox" name="name"  value="{{ $premission }}">{{ $premission->name }}
                                                        <br>
                                                        @endforeach
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <center>
                                                <button type="submit" class="btn btn-success">تحديث</button>
                                            </center>
                                        </form>

                                </div>
                            </div>
                        </div>
                    <!-- end_edit_modal_doctor -->
                    <!-- delete_modal_doctor -->
                        <div class="modal fade" id="delete{{ $role->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                            <label id="Name" type="text" name="Name" class="form-control">{{ $role->name }}</label>

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
                @endforeach
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
  </div>
{{-- end content --}}
@endsection
@section('js')
@toastr_js
@toastr_render
@endsection
