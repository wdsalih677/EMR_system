@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
قائمة الفحوصات
@stop
@endsection
@section('page-header')
@section('content')
{{-- start content --}}
<div class="row">
    <div class="col-sm-6">
        <h4 class="mb-0">قائمة الفحوصات</h4>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
            <li class="breadcrumb-item"><a href="#" class="default-color">الفحوصات</a></li>
            <li class="breadcrumb-item active">قائمة الفحوصات</li>
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
            <a class="button x-small" href="{{ route('examination.create') }}">
                إضافة فحص
            </a>
            <br><br>
            <table id="datatable" class="table-bordered border table table-striped dataTable p-0 text-center">
              <thead>
                <tr>
                  <th>#</th>
                  <th>رقم التذكره</th>
                  <th>الإسم</th>
                  <th>نتيجة الفحص</th>
                  <th>حالة الفحص</th>
                  <th>العمليات</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($examinations as $examination)
                    <tr>
                    <td>{{ $examination->id }}</td>
                    <td>{{ $examination->tickets->ticket_num }}</td>
                    <td>{{ $examination->tickets->name }}</td>
                    <td>{{ $examination->test_results }}</td>
                    <td>
                        @if ($examination->test_status == 1)
                            <h4><span class="badge badge-success">موجبه</span></h4>
                        @else
                            <h4><span class="badge badge-danger">سالبه</span></h4>
                        @endif
                    <td>
                        <button type="button"
                            class="btn btn-info btn-sm"
                            data-toggle="modal"
                            data-target="#edit{{ $examination->id }}"
                            title="تعديل"><i class="fa fa-edit"></i>
                        </button>
                        <button type="button"
                            class="btn btn-danger btn-sm"
                            data-toggle="modal"
                            data-target="#delete{{ $examination->id }}"
                            title="حذف"><i
                            class="fa fa-trash"></i>
                        </button>
                    </td>

                    </tr>
                    <!-- start_edit_modal_examination-->
                    <div class="modal fade bd-example-modal-lg" id="edit{{ $examination->id }}" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                        id="exampleModalLabel">
                                        تعديل الفحص
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal"
                                        aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <!-- edit_form -->
                                    <form action="{{ route('examination.update',$examination->id) }}" method="POST">
                                        {{ method_field('patch') }}
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $examination->id }}">
                                        <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title">إسم الريض : {{ $examination->tickets->name }}</h5>
                                        <br>
                                        <div class="mb-3">
                                            <label class="form-label" for="exampleInputEmail1">حالة النتيجه :</label>
                                            <select name="test_status" class="form-control"  required style="height: 50px;">
                                                <option value="1" {{ $examination->test_status == 1 ? 'selected' : '' }}>موجبه</option>
                                                <option value="2" {{ $examination->test_status == 2 ? 'selected' : '' }}>سالبه</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="exampleFormControlTextarea1">تائج الفحوصات | Investigations Results :
                                            </label>
                                            <textarea class="form-control" name="test_results"  rows="3" style="height: 194px;">{{ $examination->test_results }}</textarea>
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
                    <!-- end_edit_modal_examination -->

                    <!-- start_delete_modal_examination-->
                    <div class="modal fade bd-example-modal-lg" id="delete{{ $examination->id }}" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                        id="exampleModalLabel">
                                        حذف الفحص
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal"
                                        aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <!-- edit_form -->
                                    <form action="{{ route('examination.destroy',$examination->id) }}" method="POST">
                                        {{ method_field('Delete') }}
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $examination->id }}">
                                        <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title">إسم الريض : {{ $examination->tickets->name }}</h5>
                                        <br>
                                        <div class="mb-3">
                                            <label class="form-label" for="exampleInputEmail1">حالة النتيجه :</label>
                                            <input type="text" class="form-control" name="test_status" value="{{ $examination->test_status == 1 ? 'موجبه' : 'سالبه' }}" disabled required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="exampleFormControlTextarea1">تائج الفحوصات | Investigations Results :
                                            </label>
                                            <textarea class="form-control" name="test_results" required rows="3" style="height: 194px;" disabled>{{ $examination->test_results }}</textarea>
                                        </div>

                                </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">اغلاق</button>
                                            <button type="submit" class="btn btn-danger">حذف</button>
                                        </div>
                                </form>

                            </div>
                        </div>
                    </div>
                    <!-- end_delete_modal_examination -->
                @endforeach
              </tbody>
              <tfoot>
              <tr>
                <th>#</th>
                <th>رقم التذكره</th>
                <th>الإسم</th>
                <th>التشخيص المبدئي</th>
                <th>نتيجة الفحص</th>
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
