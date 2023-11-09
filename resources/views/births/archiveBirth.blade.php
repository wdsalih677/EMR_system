@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
إرشيف المواليد
@stop
@endsection
@section('page-header')
@section('content')
{{-- start content --}}
<div class="row">
    <div class="col-sm-6">
        <h4 class="mb-0">إرشيف المواليد</h4>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
            <li class="breadcrumb-item"><a href="#" class="default-color">إرشيف المواليد و الوفيات </a></li>
            <li class="breadcrumb-item active">إرشيف المواليد</li>
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
                  <th>الإسم</th>
                  <th>النوع</th>
                  <th>اسم الأم</th>
                  <th>العمليات</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($births as $birth)
                    <tr>
                    <td>{{ $birth->id }}</td>
                    <td>{{ $birth->newBornName }}</td>
                    <td>{{ $birth->gender == 1 ? 'ذكر' : 'أنثى' }}</td>
                    <td>{{ $birth->nameMother }}</td>
                    <td>
                        <div class="dropdown">
                            <button aria-expanded="false" aria-haspopup="true"
                                class="btn ripple btn-info btn-sm" data-toggle="dropdown"
                                type="button">العمليات<i class="fa fa-caret-down ml-1"></i></button>
                            <div class="dropdown-menu tx-13">
                                    {{-- <a  class="dropdown-item"  href="{{ route('birth.edit',$birth->id) }}"><i
                                        class="text-warning fa fa-edit"></i>
                                        تعديل
                                    </a> --}}
                                    <button type="button" class="dropdown-item" data-toggle="modal" data-target="#delete{{ $birth->id }}"  title="حذف">
                                        <i class="text-danger fa fa-trash"></i>
                                        حذف
                                    </button>
                                    <a class="dropdown-item" href="{{ route('birth.show',$birth->id) }}" >
                                        <i class="text-success fa fa-print"></i>
                                        طباعه
                                    </a>
                            </div>
                        </div>
                    </td>

                    </tr>
                    <!-- delete_modal_birth -->
                    <div class="modal fade" id="delete{{ $birth->id }}" tabindex="-1" role="dialog"
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
                                    <form action="{{ route('birth.destroy',$birth->id) }}" method="post">
                                        {{ method_field('Delete') }}
                                        @csrf
                                        هل تريد الحذف؟
                                        <label id="Name" type="text" name="Name" class="form-control">{{ $birth->newBornName }}</label>

                                        <input id="id" type="hidden" name="id" class="form-control" value="{{ $birth->id }}">
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
                @endforeach
              </tbody>
              <tfoot>
              <tr>
                <th>#</th>
                <th>الإسم</th>
                <th>النوع</th>
                <th>اسم الأم</th>
                <th>العمليات</th>
              </tr>
              </tfoot>
            </table>
          </div>
        </div>
      </div>
    </div>

  </div>
{{-- end model --}}
{{-- end content --}}
@endsection
@section('js')
@toastr_js
@toastr_render
@endsection
