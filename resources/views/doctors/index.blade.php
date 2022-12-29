@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
قائمة الأطباء
@stop
@endsection
@section('page-header')
@section('content')
{{-- start content --}}
<div class="row">
    <div class="col-sm-6">
        <h4 class="mb-0">قائمة الأطباء</h4>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
            <li class="breadcrumb-item"><a href="#" class="default-color">ادارة الأطباء</a></li>
            <li class="breadcrumb-item active">قائمة الأطباء</li>
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
                إضافة طبيب
            </button>
            <br><br>
            <table id="datatable" class="table-bordered border table table-striped dataTable p-0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>الإسم</th>
                        <th>الرقم الوطني</th>
                        <th>رقم الهاتف</th>
                        <th>الدرجه العلميه</th>
                        <th>المسمى الوظيفي</th>
                        <th>البريد الإلكتروني</th>
                        <th><center>العمليات</center></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($doctors as $doctor)
                    <tr>
                    <td>{{ $doctor->id }}</td>
                    <td>{{ $doctor->name }}</td>
                    <td>{{ $doctor->id_num }}</td>
                    <td>{{$doctor->phone_num }}</td>
                    <td>{{ $doctor->degree }}</td>
                    <td>{{ $doctor->title_job }}</td>
                    <td>{{ $doctor->email }}</td>
                    <td>
                        <center><button type="button"
                            class="btn btn-info btn-sm"
                            data-toggle="modal"
                            data-target="#edit{{ $doctor->id }}"
                            title="تعديل"><i class="fa fa-edit"></i>
                        </button>
                        <button type="button"
                            class="btn btn-danger btn-sm"
                            data-toggle="modal"
                            data-target="#delete{{ $doctor->id }}"
                            title="حذف"><i
                            class="fa fa-trash"></i>
                        </button></center>
                    </td>

                    </tr>
                    <!-- start_edit_modal_doctor -->
                        <div class="modal fade" id="edit{{ $doctor->id }}" tabindex="-1" role="dialog"
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
                                        <form method="POST" action="{{ route('doctor.update','id') }}">
                                            {{ method_field('patch') }}
                                            @csrf
                                                    <div class="row">
                                                        <div class="col">
                                                            <input type="hidden" name="id" value="{{ $doctor->id }}">
                                                            <label for="Name" class="mr-sm-2">الإسم
                                                                :</label>
                                                            <input id="name" type="text" name="name" value="{{ $doctor->name }}" class="form-control" required>
                                                            <label for="Name" class="mr-sm-2">الرقم الوطني
                                                                :</label>
                                                            <input id="name" type="number" name="id_num" value="{{ $doctor->id_num }}" class="form-control" required>
                                                            <label for="Name" class="mr-sm-2">رقم الهاتف
                                                                :</label>
                                                            <input id="name" type="number" name="phone_num" value="{{$doctor->phone_num }}" class="form-control" required>
                                                        </div>
                                                        <div class="col">
                                                            <label for="Name" class="mr-sm-2">البريد الإلكتروني
                                                                :</label>
                                                            <input id="name" type="email" name="email" value="{{ $doctor->email }}" class="form-control" required>
                                                            <label for="Name_en"class="mr-sm-2">الدرجه العلميه :</label>
                                                            <input id="name" type="text" name="degree" value="{{ $doctor->degree }}" class="form-control" required>
                                                            <label for="Name_en"class="mr-sm-2">المسمى الوظيفي :</label>
                                                            <input id="name" type="text" name="title_job" value="{{ $doctor->title_job }}" class="form-control" required>
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
                    <!-- end_edit_modal_doctor -->
                    <!-- delete_modal_doctor -->
                        <div class="modal fade" id="delete{{ $doctor->id }}" tabindex="-1" role="dialog"
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
                                        <form action="{{ route('doctor.destroy','id') }}" method="POST">
                                            {{ method_field('Delete') }}
                                            @csrf
                                            هل تريد الحذف؟
                                            <label id="Name" type="text" name="Name" class="form-control">{{ $doctor->name }}</label>
                                            <input id="id" type="hidden" name="id"  value="{{ $doctor->id }}" class="form-control">
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
                        <th>الرقم الوطني</th>
                        <th>رقم الهاتف</th>
                        <th>الدرجه العلميه</th>
                        <th>المسمى الوظيفي</th>
                        <th>البريد الإلكتروني</th>
                        <th><center>العمليات</center></th>
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
                            إضافة طبيب
                            </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <!-- add_form -->
                            <form action="{{ route('doctor.store') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col">
                                        <label for="Name" class="mr-sm-2">الإسم
                                            :</label>
                                        <input id="name" type="text" name="name" class="form-control" autocomplete="off" placeholder="أدخل إسم الطبيب" required>
                                        <label for="Name" class="mr-sm-2" >الرقم الوطني
                                            :</label>
                                        <input id="name" type="number" name="id_num" class="form-control" autocomplete="off" placeholder="أدخل الرقم الوطني" required>
                                        <label for="Name" class="mr-sm-2">رقم الهاتف
                                            :</label>
                                        <input id="name" type="number" name="phone_num" class="form-control" autocomplete="off" placeholder="أدخل رقم الهاتف بدون صفر البداية" required>
                                    </div>
                                    <div class="col">
                                        <label for="Name" class="mr-sm-2">البريد الإلكتروني
                                            :</label>
                                        <input id="name" type="email" name="email" class="form-control" autocomplete="off" placeholder="أدخل البريد الإلكتروني" required>
                                        <label for="Name_en"class="mr-sm-2">الدرجه العلميه :</label>
                                        <input id="name" type="text" name="degree" class="form-control" autocomplete="off" placeholder="أدخل الدرجة العلمية" required>
                                        <label for="Name_en"class="mr-sm-2">المسمى الوظيفي :</label>
                                        <input id="name" type="text" name="title_job" class="form-control" autocomplete="off" placeholder="أدخل المسمى الوظيفي" required>
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
  </div>
{{-- end content --}}
@endsection
@section('js')
@toastr_js
@toastr_render
@endsection
