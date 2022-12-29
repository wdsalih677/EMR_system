@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
عرض وثيقة إخبار وفاة
@stop
@endsection
@section('page-header')
@section('content')
{{-- start content --}}
<div class="row">
    <div class="col-sm-6">
        <h4 class="mb-0">عرض وثيقة إخبار وفاة</h4>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
            <li class="breadcrumb-item"><a href="#" class="default-color">إدارة المواليد و الوفيات</a></li>
            <li class="breadcrumb-item active">عرض وثيقة إخبار وفاة</li>
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
                <h5 class="card-title">وثيقة إخبار وفاة</h5>
            </center>
            <form>
                <h5>- بيانات المتوفي :</h5>
                <br><br>
                <div class="mb-3">
                    <label class="form-label" for="exampleInputEmail1">إسم المتوفي :</label>
                    <label class="form-control" value="" style="height: 49px;width: 49%;">
                  </div>
                <div class="row">
                    <div class="col-md-6 mb-30">
                          <div class="mb-3">
                              <label class="form-label" for="exampleInputEmail1">الرقم الوطني :</label>
                              <label class="form-control" value="" style="height: 49px;">
                            </div>
                            <div class="mb-3">
                              <label class="form-label" for="exampleInputEmail1">إسم الأب :</label>
                              <label class="form-control" value="" style="height: 49px;">
                            </div>
                            <div class="mb-3">
                                  <label class="d-block mb-2">الجنس :</label>
                                  <label class="form-control" value="" style="height: 49px;">
                            </div>
                    </div>
                    <div class="col-md-6 mb-30">
                        <div class="mb-3">
                          <label class="form-label" for="exampleInputEmail1">العمر :</label>
                          <label class="form-control" value="" style="height: 49px;">
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="exampleInputEmail1">المهنة :</label>
                          <label class="form-control" value="" style="height: 49px;">
                        </div>
                    </div>
                </div>
                <h5>- واقعة الوفاة :</h5>
                <br><br>
                <div class="row">
                    <div class="col-md-6 mb-30">
                          <div class="mb-3">
                              <label class="form-label" for="exampleInputEmail1">تاريخ الوفاة بالأحرف :</label>
                              <label class="form-control" value="" style="height: 49px;">
                            </div>
                            <div class="mb-3">
                              <label class="form-label" for="exampleInputEmail1">مكان الوفاة :</label>
                              <label class="form-control" value="" style="height: 49px;">
                            </div>
                    </div>
                    <div class="col-md-6 mb-30">
                        <div class="mb-3">
                            <label class="form-label" for="exampleInputEmail1">تاريخ الوفاة بالأرقام و الزمن :</label>
                            <label class="form-control" value="" style="height: 49px;">
                          </div>
                    </div>
                </div>
                <h5>- سبب الوفاة :</h5>
                <br><br>
                <div class="row">
                    <div class="col-md-6 mb-30">
                        <div class="mb-3">
                            <label class="form-label" for="exampleInputEmail1">المرض أو الحالة المؤدية مبارشرة لأسباب الوفاة :</label>
                            <label class="form-control" value="" style="height: 49px;">
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="exampleInputEmail1">الأسباب الأخرى السابقه على الوفاة :</label>
                          <label class="form-control" value="" style="height: 49px;">
                      </div>
                    </div>
                    <div class="col-md-6 mb-30">
                      <div class="mb-3">
                        <label class="form-label" for="exampleInputEmail1">الحالات المرضية إذا وجدة و التي أدت للسبب المذكور :</label>
                        <label class="form-control" value="" style="height: 49px;">
                      </div>
                      <div class="mb-3">
                        <label class="form-label" for="exampleInputEmail1">مضاعفات أخرى ساعدت على الوفاة و لكن لا علاقة لها بالمرض او الحالة المسببة :</label>
                        <label class="form-control" value="" style="height: 49px;">
                      </div>
                    </div>
                </div>
                <h5>- المبلغ :</h5>
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
