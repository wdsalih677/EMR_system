@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
أضافة صلاحيه
@stop
@endsection
@section('page-header')
@section('content')
{{-- start content --}}
<div class="row">
    <div class="col-sm-6">
        <h4 class="mb-0">تعديل صلاحيه</h4>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
            <li class="breadcrumb-item"><a href="#" class="default-color">ادارة المستخدمين</a></li>
            <li class="breadcrumb-item active">تعديل صلاحيه جديده</li>
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
                <h5 class="card-title">تعديل صلاحيه</h5>
            </center>
            <form action="{{ route('roles.update',$role->id) }}" method="POST">
                {{ method_field('PUT') }}
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-30">
                        <div class="mb-3">
                            <label class="form-label" for="exampleInputEmail1">إسم الصلاحيه :</label>
                            <input type="hidden" name="id" value="{{ $role->id }}">
                            <input type="text" class="form-control" name="role_name" value="{{ $role->name }}">

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-30">
                        <div class="controls mb-2">
                            <label class="checkbox" for="closeButton">
                            @foreach ($premissions as $premission)
                            <input id="closeButton" type="checkbox" name="permission[]"  value="{{ $premission->id }}" {{ in_array($premission->id, $rolePermissions) ? 'checked' : '' }}>{{ $premission->name }}
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
  </div>
{{-- end content --}}
@endsection
@section('js')
@toastr_js
@toastr_render
@endsection
