@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
بيانات الفحص
@stop
@endsection
@section('page-header')
@section('content')
{{-- start content --}}
<div class="row">
    <div class="col-sm-6">
        <h4 class="mb-0">أضافة بيانات الفحص</h4>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
            <li class="breadcrumb-item"><a href="#" class="default-color">الفحوصات</a></li>
            <li class="breadcrumb-item active"> إضافة بيانات الفحص</li>
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
                <h5 class="card-title">بيانات الفحص</h5>
            </center>
            <form>
                <div class="mb-3">
                    <label class="form-label" for="exampleInputEmail1">رقم الذكره :</label>
                    <input id="name" type="number" name="Class_name" class="form-control" style="width: 49%;">
                </div>
                <div class="row">
                    <div class="col-md-6 mb-30">
                        <div class="mb-3">
                            <label class="form-label" for="exampleInputEmail1">اسم :</label>
                            <label class="form-control" value="" style="height: 49px;">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="exampleInputEmail1">التشخيص المبدئي | Provisional Diagnosis :</label>
                            <label class="form-control" value="" style="height: 49px;">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="exampleFormControlTextarea1">تائج الفحوصات | Investigations Results :
                            </label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" style="height: 194px;"></textarea>
                        </div>
                    </div>
                    <div class="col-md-6 mb-30">
                        <div class="mb-3">
                            <label class="form-label" for="exampleInputEmail1">العمر :</label>
                            <label class="form-control" value="" style="height: 49px;">
                          </div>
                          <br><br><br>
                        <div class="mb-3">
                            <label class="form-label" for="exampleFormControlTextarea1" style="margin-top: 13px;">الفحوصات | Examinations :</label>
                            <label class="form-control" id="exampleFormControlTextarea1" rows="3" style="height: 194px;">
                        </div>
                    </div>
                </div>
                <center>
                    <button type="submit" class="btn btn-success">إرسال</button>
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
