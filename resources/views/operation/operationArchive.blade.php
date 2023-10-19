@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
إرشيف العمليات
@stop
@endsection
@section('page-header')
@section('content')
{{-- start content --}}
<div class="row">
    <div class="col-sm-6">
        <h4 class="mb-0">إرشيف العمليات</h4>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
            <li class="breadcrumb-item"><a href="#" class="default-color">العمليات و التنويم</a></li>
            <li class="breadcrumb-item active">إرشيف العمليات</li>
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
            <br><br>
            <table id="datatable" class="table-bordered border table table-striped dataTable p-0 text-center">
              <thead>
                <tr>
                    <th>#</th>
                    <th>رقم التذكره</th>
                    <th>اسم المريض</th>
                    <th>إسم العمليه | Operation name</th>
                    <th>الجراح | Surgion</th>
                    <th>الإقرار الطبي و المرفقات</th>
                    <th>العمليات</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($operations as $operation)
                    <tr>
                    <td>{{ $operation->id }}</td>
                    <td>{{ $operation->ticket_num }}</td>
                    <td>{{ $operation->tickets->name }}</td>
                    <td>{{ $operation->operationName }}</td>
                    <td>{{ $operation->Surgion }}</td>
                    <td>
                        <a class="badge bg-success" href="{{ route('OperationAttachment.edit',$operation->id) }}" style="color:white; width: 130px; height: 28px;">
                            <label style="margin-top: 5px; font-size:15px;">
                                الإقرار الطبي و المرفقات
                            </label>
                        </a>
                    </td>
                    <td>
                        <div class="dropdown">
                            <button aria-expanded="false" aria-haspopup="true"
                                class="btn ripple btn-info btn-sm" data-toggle="dropdown"
                                type="button">العمليات<i class="fa fa-caret-down ml-1"></i></button>
                            <div class="dropdown-menu tx-13">
                                    <a  class="dropdown-item" href="{{ route('operation.edit',$operation->id) }}" ><i
                                        class="text-success fa fa-edit"></i>
                                        تعديل بيانات العمليه
                                    </a>
                                    <button class="dropdown-item" data-reg_id="" data-toggle="modal" data-target="#delete{{$operation->id}}" ><i
                                        class="text-danger fa fa-trash"></i>
                                        حذف
                                    </button>
                                    <a class="dropdown-item" href="{{ route('operation.show',$operation->id) }}" >
                                        <i class="text-info fa fa-print"></i>
                                        طباعه
                                    </a>
                            </div>
                        </div>
                    </td>
                    </tr>
                    <!-- delete_modal_birth -->
                    <div class="modal fade" id="delete{{ $operation->id }}" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                        id="exampleModalLabel">
                                        حذف المولود
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal"
                                        aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('operation.destroy',$operation->id) }}" method="post">
                                        {{ method_field('Delete') }}
                                        @csrf
                                        هل تريد الحذف؟
                                        <label id="Name" type="text" name="Name" class="form-control">{{ $operation->operationName }}</label>

                                        <input id="id" type="hidden" name="id" class="form-control" value="{{ $operation->id }}">
                                        <input type="hidden" name="id_page" id="id_page" value="1">
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
                    <!-- end_delete_modal_birth -->
                    <!-- archive_modal_birth -->
                    <div class="modal fade" id="archive{{ $operation->id }}" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                        id="exampleModalLabel">
                                        أرشفة المولود
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal"
                                        aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('operation.destroy',$operation->id) }}" method="post">
                                        {{ method_field('Delete') }}
                                        @csrf
                                        نقل إلى الإرشيف؟
                                        <label id="Name" type="text" name="Name" class="form-control">{{ $operation->operationName }}</label>

                                        <input id="id" type="hidden" name="id" class="form-control" value="{{ $operation->id }}">
                                        <input type="hidden" name="id_page" id="id_page" value="2">
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">إغلاق</button>
                                            <button type="submit"
                                                class="btn btn-danger">نقل</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end_archive_modal_birth -->
                @endforeach
              </tbody>
              <tfoot>
              <tr>
                <th>#</th>
                <th>رقم التذكره</th>
                <th>اسم المريض</th>
                <th>إسم العمليه | Operation name</th>
                <th>الجراح | Surgion</th>
                <th>الإقرار الطبي و المرفقات</th>
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
