@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
وثيقة إخبار وفاة
@stop
@endsection
@section('page-header')
@section('content')
{{-- start content --}}
<div class="row">
    <div class="col-sm-6">
        <h4 class="mb-0">وثيقة إخبار وفاة</h4>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
            <li class="breadcrumb-item"><a href="#" class="default-color">أدارة المواليد و الوفيات </a></li>
            <li class="breadcrumb-item active">وثيقة إخبار وفاة</li>
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
            <a class="button x-small" href="{{ route('death.create') }}">
                إضافة وثيقة
            </a>
            <br><br>
            <table id="datatable" class="table-bordered border table table-striped dataTable p-0 text-center">
              <thead>
                <tr>
                  <th>#</th>
                  <th>الإسم</th>
                  <th>النوع</th>
                  <th>الرقم الوطني</th>
                  <th>سبب الوفاة</th>
                  <th>العمليات</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($deaths as $death)
                    <tr>
                    <td>{{ $death->id }}</td>
                    <td>{{ $death->lateName }}</td>
                    <td>{{ $death->gender==1 ? 'ذكر' : 'أنثى' }}</td>
                    <td>{{ $death->lateIdentity }}</td>
                    <td>{{ $death->caseOfDeath }}</td>
                    <td>
                        <div class="dropdown">
                            <button aria-expanded="false" aria-haspopup="true"
                                class="btn ripple btn-info btn-sm" data-toggle="dropdown"
                                type="button">العمليات<i class="fa fa-caret-down ml-1"></i></button>
                            <div class="dropdown-menu tx-13">
                                    <a  class="dropdown-item"  href="{{ route('death.edit',$death->id) }}"><i
                                        class="text-warning fa fa-edit"></i>
                                        تعديل
                                    </a>
                                    <button type="button" class="dropdown-item" data-toggle="modal" data-target="#delete{{ $death->id }}"  title="حذف">
                                        <i class="text-danger fa fa-trash"></i>
                                        حذف
                                    </button>
                                    {{-- <button type="button" class="dropdown-item" data-toggle="modal" data-target="#archive{{ $death->id }}"  title="أرشفه">
                                        <i class="text-info fa fa-archive"></i>
                                        أرشفه
                                    </button> --}}
                                    <a class="dropdown-item" href="{{ route('death.show',$death->id) }}" >
                                        <i class="text-success fa fa-print"></i>
                                        طباعه
                                    </a>
                            </div>
                        </div>
                    </td>
                    </tr>
                    <!-- delete_modal_death -->
                    <div class="modal fade" id="delete{{ $death->id }}" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                        id="exampleModalLabel">
                                        حذف المتوفي
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal"
                                        aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('death.destroy',$death->id) }}" method="post">
                                        {{ method_field('Delete') }}
                                        @csrf
                                        هل تريد الحذف؟
                                        <label id="Name" type="text" name="Name" class="form-control">{{ $death->lateName }}</label>

                                        <input id="id" type="hidden" name="id" class="form-control" value="{{ $death->id }}">
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
                    <!-- end_delete_modal_death -->
                    <!-- archive_modal_death -->
                    <div class="modal fade" id="archive{{ $death->id }}" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                        id="exampleModalLabel">
                                        أرشفة المتوفي
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal"
                                        aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('death.destroy',$death->id) }}" method="post">
                                        {{ method_field('Delete') }}
                                        @csrf
                                        نقل إلى الإرشيف؟
                                        <label id="Name" type="text" name="Name" class="form-control">{{ $death->lateName }}</label>

                                        <input id="id" type="hidden" name="id" class="form-control" value="{{ $death->id }}">
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
                    <!-- end_archive_modal_death -->
                @endforeach
              </tbody>
              <tfoot>
              <tr>
                <th>#</th>
                <th>الإسم</th>
                <th>النوع</th>
                <th>الرقم الوطني</th>
                <th>سبب الوفاة</th>
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
                            حذف متوفي
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
{{-- end model --}}
{{-- end content --}}
@endsection
@section('js')
@toastr_js
@toastr_render
@endsection
