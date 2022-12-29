@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
عرض بيانات مولود
@stop
@endsection
@section('page-header')
@section('content')
{{-- start content --}}
<div class="row">
    <div class="col-sm-6">
        <h4 class="mb-0">عرض وثيقة إخبار ولادة</h4>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
            <li class="breadcrumb-item"><a href="#" class="default-color">إدارة المواليد و الوفيات</a></li>
            <li class="breadcrumb-item active">أضافة وثيقة إخبار ولاده</li>
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
                <h5 class="card-title">وثيقة إخبار ولادة</h5>
            </center>
            <form>
                <h5>- بيانات المولود :</h5>
                <br><br>
                <div class="mb-3">
                    <label class="form-label" for="exampleInputEmail1">إسم المولود :</label>
                    <label class="form-control" value="" style="height: 49px;width: 49%;">
                </div>
                <div class="row">
                    <div class="col-md-6 mb-30">
                        <div class="mb-3">
                              <label class="form-label" for="exampleInputEmail1">إسم الأم :</label>
                              <label class="form-control" value="" style="height: 49px;">
                        </div>
                        <div class="mb-3">
                              <label class="form-label" for="exampleInputEmail1">إسم الأب :</label>
                              <label class="form-control" value="" style="height: 49px;">
                        </div>
                        <div class="mb-3">
                                <label class="form-label" for="exampleInputEmail1">مكان الإقامة :</label>
                                <label class="form-control" value="" style="height: 49px;">
                        </div>
                    </div>
                    <div class="col-md-6 mb-30">
                          <div class="mb-3">
                            <label class="form-label" for="exampleInputEmail1"> الرقم الوطني للأم :</label>
                            <label class="form-control" value="" style="height: 49px;">
                          </div>
                          <div class="mb-3">
                            <label class="form-label" for="exampleInputEmail1"> الرقم الوطني للأب :</label>
                            <label class="form-control" value="" style="height: 49px;">
                          </div>
                          <div class="mb-3">
                            <div class="control-group" id="toastTypeGroup">
                              <div class="controls">
                                <label class="d-block mb-2">الجنس :</label>
                                <label class="form-control" value="" style="height: 49px;">
                              </div>
                            </div>
                          </div>
                    </div>
                </div>
                <h5>- واقعة الميلاد :</h5>
                <br><br>
                <div class="row">
                    <div class="col-md-6 mb-30">
                          <div class="mb-3">
                              <label class="form-label" for="exampleInputEmail1">تاريخ الميلاد بالأحرف :</label>
                              <label class="form-control" value="" style="height: 49px;">
                            </div>
                            <div class="mb-3">
                                <div class="control-group" id="toastTypeGroup">
                                  <div class="controls">
                                    <label class="d-block mb-2">مكان الولادة :</label>
                                    <label class="form-control" value="" style="height: 49px;">
                                  </div>
                                </div>
                              </div>
                    </div>
                    <div class="col-md-6 mb-30">
                        <div class="mb-3">
                            <label class="form-label" for="exampleInputEmail1">تاريخ الميلاد بالأرقام :</label>
                            <label class="form-control" value="" style="height: 49px;">
                          </div>
                    </div>
                </div>
                <h5>- بيانات المبلغ :</h5>
                <br><br>
                <div class="row">
                    <div class="col-md-6 mb-30">
                        <div class="mb-3">
                            <label class="form-label" for="exampleInputEmail1">الإسم :</label>
                            <label class="form-control" value="" style="height: 49px;">
                        </div>
                    </div>
                    <div class="col-md-6 mb-30">
                        <div class="mb-3">
                            <label class="form-label" for="exampleInputEmail1">الرقم الوطني :</label>
                            <label class="form-control" value="" style="height: 49px;">
                          </div>
                    </div>
                </div>
                <h5>- محرر الوثيقة :</h5>
                <br><br>
                <div class="row">
                    <div class="col-md-6 mb-30">
                        <div class="mb-3">
                            <label class="form-label" for="exampleInputEmail1">الإسم :</label>
                            <label class="form-control" value="" style="height: 49px;">
                        </div>
                    </div>
                    <div class="col-md-6 mb-30">
                        <div class="mb-3">
                            <label class="form-label" for="exampleInputEmail1">الرقم الوطني :</label>
                            <label class="form-control" value="" style="height: 49px;">
                          </div>
                    </div>
                </div>
                <center>
                    <button type="submit" class="btn btn-success">
                    طباعه  <i class="fa fa-print"></i>
                    </button>
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
