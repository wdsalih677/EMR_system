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
        <h4 class="mb-0">أضافة صلاحيه</h4>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
            <li class="breadcrumb-item"><a href="#" class="default-color">ادارة المستخدمين</a></li>
            <li class="breadcrumb-item active">أضافة صلاحيه جديده</li>
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
                    <h5 class="card-title">إضافة صلاحيه</h5>
                </center>
                <form>
                <div class="row">
                    <div class="col-md-6 mb-30">
                        <div class="mb-3">
                            <label class="form-label" for="exampleInputEmail1">إسم الصلاحيه :</label>
                            <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="ادخل اسم الصلاحيه">
                          </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-30">
                        <div class="controls mb-2">
                            <label class="checkbox" for="closeButton">
                              <input id="closeButton" type="checkbox" value="checked">إدارة الأطباء
                              <br>
                              <input id="closeButton" type="checkbox" value="checked">قائمة الأطباء
                            </label>
                          </div>
                          <div class="controls mb-2">
                            <label class="checkbox" for="closeButton">
                              <input id="closeButton" type="checkbox" value="checked">إدارة الأقسام
                              <br>
                              <input id="closeButton" type="checkbox" value="checked">قائمة الأقسام
                            </label>
                          </div>
                          <div class="controls mb-2">
                            <label class="checkbox" for="closeButton">
                              <input id="closeButton" type="checkbox" value="checked">إدارة العنابر
                              <br>
                              <input id="closeButton" type="checkbox" value="checked">قائمة العنابر
                            </label>
                          </div>
                          <div class="controls mb-2">
                            <label class="checkbox" for="closeButton">
                              <input id="closeButton" type="checkbox" value="checked">إدارة المستخدمين
                              <br>
                              <input id="closeButton" type="checkbox" value="checked">قائمة المستخدمين
                              <br>
                              <input id="closeButton" type="checkbox" value="checked">صلاحيات المستخدمين
                            </label>
                          </div>
                          <div class="controls mb-2">
                            <label class="checkbox" for="closeButton">
                              <input id="closeButton" type="checkbox" value="checked">الإستقبال
                              <br>
                              <input id="closeButton" type="checkbox" value="checked">بيانات المريض الأوليه
                            </label>
                          </div>
                    </div>
                    <div class="col-md-6 mb-30">
                        <div class="controls mb-2">
                            <label class="checkbox" for="closeButton">
                              <input id="closeButton" type="checkbox" value="checked">إدارة المرضى
                              <br>
                              <input id="closeButton" type="checkbox" value="checked">قائمة المرضى
                              <br>
                              <input id="closeButton" type="checkbox" value="checked">بيانات المريض النهائيه
                            </label>
                          </div>
                          <div class="controls mb-2">
                            <label class="checkbox" for="closeButton">
                              <input id="closeButton" type="checkbox" value="checked">العمليات
                              <br>
                              <input id="closeButton" type="checkbox" value="checked">قائمة العمليات
                            </label>
                          </div>
                          <div class="controls mb-2">
                            <label class="checkbox" for="closeButton">
                              <input id="closeButton" type="checkbox" value="checked">الفحوصات
                              <br>
                              <input id="closeButton" type="checkbox" value="checked">قائمة الفحوصات
                            </label>
                          </div>
                          <div class="controls mb-2">
                            <label class="checkbox" for="closeButton">
                              <input id="closeButton" type="checkbox" value="checked">إدارة السجل الطبي و التقارير
                              <br>
                              <input id="closeButton" type="checkbox" value="checked">السجل الطبي
                              <br>
                              <input id="closeButton" type="checkbox" value="checked">التقارير
                              <br>
                              <input id="closeButton" type="checkbox" value="checked">تقارير المرضى
                              <br>
                              <input id="closeButton" type="checkbox" value="checked">تقارير ماليه
                            </label>
                          </div>
                    </div>
                </div>
                  <br>
                  <center>
                    <button type="submit" class="btn btn-success">اضافة</button>
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
