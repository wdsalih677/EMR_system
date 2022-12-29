@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
أضافة بيانات المريض الأوليه
@stop
@endsection
@section('page-header')
@section('content')
{{-- start content --}}
<div class="row">
    <div class="col-sm-6">
        <h4 class="mb-0">أضافة بيانات المريض الأوليه</h4>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
            <li class="breadcrumb-item"><a href="#" class="default-color">بيانات المريض</a></li>
            <li class="breadcrumb-item active">بيانات المريض الأوليه</li>
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
                <h5 class="card-title">بيانات المريض الأوليه</h5>
            </center>
            <form>
                <div class="row">
                    <div class="col-md-6 mb-30">
                        <div class="mb-3">
                            <label class="form-label" for="exampleInputEmail1">اسم:</label>
                            <input type="text" class="form-control" aria-describedby="emailHelp" autocomplete="off">
                          </div>
                          <div class="mb-3">
                              <label class="form-label" for="exampleInputEmail1">الرقم الوطني :</label>
                              <input type="number" class="form-control" aria-describedby="emailHelp" autocomplete="off">
                            </div>
                            <div class="mb-3">
                              <label class="form-label" for="exampleInputEmail1">العنوان:</label>
                              <input type="text" class="form-control" aria-describedby="emailHelp" autocomplete="off">
                            </div>
                            <div class="mb-3">
                              <div class="control-group" id="toastTypeGroup">
                                <div class="controls">
                                  <label class="d-block mb-2">الجنس :</label>
                                  <label class="radio mb-2">
                                    <input type="radio" name="toasts" value="success" checked />زكر
                                  </label>
                                  <label class="radio mb-2">
                                    <input type="radio" name="toasts" value="info" />أنثى
                                  </label>
                                </div>
                              </div>
                            </div>
                    </div>
                    <div class="col-md-6 mb-30">
                        <div class="mb-3">
                            <label class="form-label" for="exampleInputEmail1">العمر :</label>
                            <input type="number" class="form-control" aria-describedby="emailHelp" autocomplete="off">
                          </div>
                          <div class="mb-3">
                              <label class="form-label" for="exampleInputEmail1">المهنه :</label>
                              <input type="text" class="form-control" aria-describedby="emailHelp" autocomplete="off">
                            </div>
                            <div class="mb-3">
                              <label class="form-label" for="exampleInputEmail1">تاريخ الدخول  :</label>
                              <input type="date" class="form-control" aria-describedby="emailHelp" autocomplete="off">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="exampleInputEmail1"> رقم الهاتف  :</label>
                                <input type="number" class="form-control" aria-describedby="emailHelp" autocomplete="off">
                              </div>
                    </div>
                </div>
                <center>
                    <button type="submit" class="btn btn-success">إضافه</button>
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
