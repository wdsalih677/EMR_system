@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
تعديل المستخدمين
@stop
@endsection
@section('page-header')
@section('content')
{{-- start content --}}
<div class="row">
    <div class="col-sm-6">
        <h4 class="mb-0">تعديل مستخدم</h4>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
            <li class="breadcrumb-item"><a href="#" class="default-color">ادارة المستخدمين</a></li>
            <li class="breadcrumb-item active">تعديل مستخدم </li>
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
            <center>
                <h5 class="card-title">تعديل مستخدم</h5>
            </center>

            <!-- row -->
                <div class="modal-body">
                    <!-- edit_form -->
                    <form action="{{ route('users.update',$user->id) }}" method="POST">
                        {{ method_field('patch') }}
                        @csrf
                        <input type="hidden" name="id" value="{{ $user->id }}">
                        <div class="row">
                            <div class="col">
                                <label for="Name" class="mr-sm-2">اسم المستخدم
                                    :</label>
                                <input id="name" name="name" value="{{ $user->name }}" type="text"  class="form-control" required>
                                <label for="Name" class="mr-sm-2">البريد الإلكتروني
                                    :</label>
                                <input id="name" name="email" value="{{ $user->email }}" type="email"  class="form-control" required>
                                <label for="Name" class="mr-sm-2">كلمة السر
                                    :</label>
                                <input id="name" name="password" type="password"  class="form-control" required>
                            </div>
                            <div class="col">
                                <label for="Name"  class="mr-sm-2">حالة المستخدم
                                    :</label>
                                    <select name="Status" class="form-control" required>
                                        <option value="{{ $user->Status }}">{{ $user->Status }}</option>
                                        <option>Active</option>
                                        <option>N’t Active</option>
                                    </select>
                                <label for="Name" class="mr-sm-2">نوع المستخدم
                                    :</label>
                                    <select class="form-control" multiple name="roles_name[]" required style="height: 200px;">
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->id }}" {{ in_array($role->name, $userRole) ? 'selected' : '' }} >{{ $role->name }}</option>
                                        @endforeach
                                    </select>
                                    <label for="Name" class="mr-sm-2">تأكيد كلمة السر
                                    :</label>
                                <input id="name" type="password" name="confirm-password" class="form-control" required>
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
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
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
