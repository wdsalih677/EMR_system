@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
عرض بيانات العمليه
@stop
@endsection
@section('page-header')
@section('content')
{{-- start content --}}
<div class="row">
    <div class="col-sm-6">
        <h4 class="mb-0">عرض بيانات العمليه</h4>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
            <li class="breadcrumb-item"><a href="#" class="default-color">العمليات و التنويم</a></li>
            <li class="breadcrumb-item active">عرض بيانات العمليه</li>
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
                <h5 class="card-title">بيانات العمليه</h5>
            </center>
                <div class="mb-3">
                    <label class="form-label" for="exampleInputEmail1">رقم الذكره :</label>
                    <label id="name" type="number" name="Class_name" class="form-control" style="width: 49%;">
                </div>
                <div class="row">
                    <div class="col-md-6 mb-30">
                        <div class="mb-3">
                            <label class="form-label" for="exampleInputEmail1">اسم :</label>
                            <label class="form-control" value="" style="height: 49px;">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="exampleInputEmail1">إسم العمليه | Operation name :</label>
                            <label class="form-control" value="" style="height: 49px;">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="exampleInputEmail1">المساعد | Assistant :</label>
                            <label class="form-control" value="" style="height: 49px;">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="exampleInputEmail1">نوع التخدير | Ansesthesia :</label>
                            <label class="form-control" value="" style="height: 49px;">
                        </div>
                    </div>
                    <div class="col-md-6 mb-30">
                        <div class="mb-3">
                            <label class="form-label" for="exampleInputEmail1">العمر :</label>
                            <label class="form-control" value="" style="height: 49px;">
                          </div>
                          <div class="mb-3">
                            <label class="form-label" for="exampleInputEmail1">الجراح | Surgion :</label>
                            <label class="form-control" value="" style="height: 49px;">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="exampleInputEmail1">المخدر | Anaesthetest :</label>
                            <label class="form-control" value="" style="height: 49px;">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="exampleInputEmail1">التاريخ و الزمن</label>
                            <label class="form-control" value="" style="height: 49px;">
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="exampleFormControlTextarea1">إجراءات العمليه | Operation Procedures :</label>
                    <label class="form-control" id="exampleFormControlTextarea1" rows="3" style="height: 200px;"></label>
                </div>
                <br>
                <center>
                    <a  class="btn btn-success" href="{{ route('operation.index') }}">رجوع</a>
                </center>

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
