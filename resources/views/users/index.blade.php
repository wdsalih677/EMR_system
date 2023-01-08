@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
قائمة المستخدمين
@stop
@endsection
@section('page-header')
@section('content')
{{-- start content --}}
<div class="row">
    <div class="col-sm-6">
        <h4 class="mb-0">قائمة المستخدمين</h4>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
            <li class="breadcrumb-item"><a href="#" class="default-color">ادارة المستخدمين</a></li>
            <li class="breadcrumb-item active">قائمة المستخدمين</li>
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
                إضافة المستخدمين
            </button>
            <br><br>
            <table id="datatable" class="table-bordered border table table-striped dataTable p-0" style="text-align: center;">
                <thead style="color: rgb(130, 148, 123);">
                <tr>
                    <th>#</th>
                    <th>اسم المستخدم</th>
                    <th>البريد الإلكتروني</th>
                    <th>حالة الإستخدام</th>
                    <th>نوع المستخدم</th>
                    <th>العمليات</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($data as $datas)
                    <tr>
                    <td>{{ $datas->id }}</td>
                    <td>{{ $datas->name }}</td>
                    <td>{{ $datas->email }}</td>
                    <td>
                        @if ($datas->Status == 'Active')
                        <label class="badge bg-success" style="font-size: 12px; color:white;">{{ $datas->Status }}</label>
                        @else
                        <label class="badge bg-danger" style="font-size: 12px; color:white;">{{ $datas->Status }}</label>
                        @endif
                    </td>
                    <td>
                        @if (!empty($datas->getRoleNames()))
                        @foreach ($datas->getRoleNames() as $v)
                            <label >{{ $v }}</label>
                        @endforeach
                    @endif
                    </td>
                    <td>
                        <button type="button"
                        class="btn btn-info btn-sm"
                        data-toggle="modal"
                        data-target="#edit{{ $datas->id }}"
                        title="تعديل"><i class="fa fa-edit"></i>
                        </button>
                        @if ($datas->roles_name == 1)
                        <button style="display:none" type="button"
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
                        data-target="#delete{{ $datas->id }}"
                        title="حذف"><i
                        class="fa fa-trash"></i>
                        </button>
                        @endif
                    </td>
                    </tr>
    <!-- start_edit_modal_doctor -->
        <div class="modal fade" id="edit{{ $datas->id }}" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                        id="exampleModalLabel">
                        تعديل المستخدم
                    </h5>
                    <button type="button" class="close" data-dismiss="modal"
                        aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- edit_form -->
                    <form action="{{ route('users.update','id') }}" method="POST">
                        {{ method_field('patch') }}
                        @csrf
                        <input type="hidden" name="id" value="{{ $datas->id }}">
                        <div class="row">
                            <div class="col">
                                <label for="Name" class="mr-sm-2">اسم المستخدم
                                    :</label>
                                <input id="name" name="name" value="{{ $datas->name }}" type="text"  class="form-control" required>
                                <label for="Name" class="mr-sm-2">البريد الإلكتروني
                                    :</label>
                                <input id="name" name="email" value="{{ $datas->email }}" type="email"  class="form-control" required>
                                <label for="Name" class="mr-sm-2">كلمة السر
                                    :</label>
                                <input id="name" name="password" type="password"  class="form-control" required>
                            </div>
                            <div class="col">
                                <label for="Name"  class="mr-sm-2">حالة المستخدم
                                    :</label>
                                    <select name="Status" class="form-control" required>
                                        <option value="{{ $datas->Status }}">{{ $datas->Status }}</option>
                                        <option>Active</option>
                                        <option>N’t Active</option>
                                    </select>
                                <label for="Name" class="mr-sm-2">نوع المستخدم
                                    :</label>
                                    <select class="form-control" name="roles_name" required>
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                                        @endforeach
                                    </select>                                <label for="Name" class="mr-sm-2">تأكيد كلمة السر
                                    :</label>
                                <input id="name" type="password" name="confirm-password" class="form-control" required>
                            </div>
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
    <!-- end_edit_modal_doctor -->
    <!-- delete_modal_doctor -->
    <div class="modal fade" id="delete{{ $datas->id }}" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                        id="exampleModalLabel">
                        حذف المستخدم
                    </h5>
                    <button type="button" class="close" data-dismiss="modal"
                        aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('users.destroy','id') }}" method="POST">
                        {{ method_field('Delete') }}
                        @csrf
                        هل تريد الحذف؟
                        <label id="Name" type="text" name="Name" class="form-control">{{ $datas->name }}</label>

                        <input id="id" type="hidden" name="id" class="form-control"
                            value="{{ $datas->id }}">
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
                    <th>اسم المستخدم</th>
                    <th>البريد الإلكتروني</th>
                    <th>حالة الإستخدام</th>
                    <th>نوع المستخدم</th>
                    <th>العمليات</th>
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
                                إضافة مستخدم
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <!-- add_form -->
                                <form action="{{ route('users.store') }}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col">
                                            <label for="Name" class="mr-sm-2">اسم المستخدم
                                                :</label>
                                            <input id="name" name="name" type="text"  class="form-control" required>
                                            <label for="Name" class="mr-sm-2">البريد الإلكتروني
                                                :</label>
                                            <input id="name" name="email" type="email"  class="form-control" required>
                                            <label for="Name" class="mr-sm-2">كلمة السر
                                                :</label>
                                            <input id="name" name="password" type="password"  class="form-control" required>
                                        </div>
                                        <div class="col">
                                            <label for="Name"  class="mr-sm-2">حالة المستخدم
                                                :</label>
                                                <select name="Status" class="form-control" required>
                                                    <option selected disabled>--حدد--</option>
                                                    <option>Active</option>
                                                    <option>N’t Active</option>
                                                </select>
                                            <label for="Name" class="mr-sm-2">نوع المستخدم
                                                :</label>
                                                <select class="form-control" name="roles_name" required>
                                                    @foreach ($roles as $role)
                                                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                                                    @endforeach
                                                </select>
                                                <br>
                                            <label for="Name" class="mr-sm-2">تأكيد كلمة السر
                                                :</label>
                                            <input id="name" type="password" name="confirm-password" class="form-control" required>
                                        </div>
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
            <!-- end_add_modal_doctor -->
</div>
{{-- end content --}}
@endsection
@section('js')
@toastr_js
@toastr_render
@endsection
