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
            <table id="datatable" class="table-bordered border table table-striped dataTable p-0">
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
                            <label class='badge badge-pill badge-success'>موجبه</label>
                        @else
                            <label class='btn btn-danger'>سالبه</label>
                        @endif
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
{{--start model --}}
        <!-- start_add_modal_doctor -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                            إضافة طبيب
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
                                        <label for="Name" class="mr-sm-2">الإسم
                                            :</label>
                                        <input id="name" type="text" name="Class_name" class="form-control">
                                        <label for="Name" class="mr-sm-2">الرقم الوطني
                                            :</label>
                                        <input id="name" type="number" name="Class_name" class="form-control">
                                        <label for="Name" class="mr-sm-2">رقم الهاتف
                                            :</label>
                                        <input id="name" type="number" name="Class_name" class="form-control">
                                        <label for="Name" class="mr-sm-2">البريد الإلكتروني
                                            :</label>
                                        <input id="name" type="email" name="Class_name" class="form-control">
                                    </div>
                                    <div class="col">
                                        <label for="Name_en"class="mr-sm-2">الدرجه العلميه</label>
                                        <div class="box">
                                            <select class="fancyselect" name="Grade_id">
                                                {{-- @foreach ($ as $) --}}
                                                    <option value=""></option>
                                                {{-- @endforeach --}}
                                            </select>
                                        </div>
                                        <br>
                                        <br><br>
                                        <br>
                                        <br><br>
                                        <label for="Name_en"class="mr-sm-2">المسمى الوظيفي</label>
                                        <div class="box">
                                            <select class="fancyselect" name="Grade_id">
                                                {{-- @foreach ($ as $) --}}
                                                    <option value=""></option>
                                                {{-- @endforeach --}}
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <br><br>
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
                            تعديل الطبيب
                        </h5>
                        <button type="button" class="close" data-dismiss="modal"
                            aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- add_form -->
                        <form action="" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col">
                                    <label for="Name" class="mr-sm-2">الإسم
                                        :</label>
                                    <input id="name" type="text" name="Class_name" class="form-control">
                                    <label for="Name" class="mr-sm-2">الرقم الوطني
                                        :</label>
                                    <input id="name" type="number" name="Class_name" class="form-control">
                                    <label for="Name" class="mr-sm-2">رقم الهاتف
                                        :</label>
                                    <input id="name" type="number" name="Class_name" class="form-control">
                                    <label for="Name" class="mr-sm-2">البريد الإلكتروني
                                        :</label>
                                    <input id="name" type="email" name="Class_name" class="form-control">
                                </div>
                                <div class="col">
                                    <label for="Name_en"class="mr-sm-2">الدرجه العلميه</label>
                                    <div class="box">
                                        <select class="fancyselect" name="Grade_id">
                                            {{-- @foreach ($ as $) --}}
                                                <option value=""></option>
                                            {{-- @endforeach --}}
                                        </select>
                                    </div>
                                    <br>
                                    <br><br>
                                    <br>
                                    <br><br>
                                    <label for="Name_en"class="mr-sm-2">المسمى الوظيفي</label>
                                    <div class="box">
                                        <select class="fancyselect" name="Grade_id">
                                            {{-- @foreach ($ as $) --}}
                                                <option value=""></option>
                                            {{-- @endforeach --}}
                                        </select>
                                    </div>
                                </div>
                                {{-- <div class="col">

                                </div> --}}
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
        <!-- end_edit_modal_doctor -->
        <!-- delete_modal_doctor -->
        <div class="modal fade" id="delete" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                            id="exampleModalLabel">
                            حذف الطبيب
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
