@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
 عرض متابعة المريض
@stop
@endsection
@section('page-header')
@section('content')
{{-- start content --}}
<div class="row">
    <div class="col-sm-6">
        <h4 class="mb-0">  عرض متابعة المريض</h4>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
            <li class="breadcrumb-item"><a href="#" class="default-color">المتابعه</a></li>
            <li class="breadcrumb-item active">عرض متابعة المريض</li>
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
                <h5 class="card-title">متابعة المريض</h5>
            </center>
            <form>
                <div class="mb-3">
                    <label class="form-label" for="exampleInputEmail1">رقم الذكره :</label>
                    <label class="form-control" value="" style="height: 49px;width: 49%;">
                </div>
                <div class="row">
                    <div class="col-md-6 mb-30">
                        <div class="mb-3">
                            <label class="form-label" for="exampleInputEmail1">اسم :</label>
                            <label class="form-control" value="" style="height: 49px;">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="exampleInputEmail1">نوع الإقامه :</label>
                            <label class="form-control" value="" style="height: 49px;">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="exampleInputEmail1">العنبر</label>
                            <label class="form-control" value="" style="height: 49px;">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="exampleInputEmail1">التاريخ و الزمن</label>
                            <label class="form-control" value="" style="height: 49px;">
                        </div>
                        <br>
                        <div class="mb-3">
                            <h5 class="card-title">المقاييس الحيويه</h5>
                            <div class="row">
                                <div class="col-md-6 mb-30">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleInputEmail1">النبض | Pulse :</label>
                                        <input id="number" type="number" name="Class_name" class="form-control">
                                        <br>
                                        <label class="form-label" for="exampleInputEmail1">الزمن :</label>
                                        <input id="number" type="time" name="Class_name" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6 mb-30">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleInputEmail1">معدل التنفس | RR :</label>
                                        <input id="name" type="number" name="Class_name" class="form-control">
                                        <br>
                                        <label class="form-label" for="exampleInputEmail1">الزمن :</label>
                                        <input id="number" type="time" name="Class_name" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6 mb-30">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleInputEmail1">الضغط | BP :</label>
                                        <input id="name" type="number" name="Class_name" class="form-control">
                                        <br>
                                        <label class="form-label" for="exampleInputEmail1">الزمن :</label>
                                        <input id="number" type="time" name="Class_name" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6 mb-30">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleInputEmail1">درجة الحراره | Temp :</label>
                                        <input id="name" type="number" name="Class_name" class="form-control">
                                        <br>
                                        <label class="form-label" for="exampleInputEmail1">الزمن :</label>
                                        <input id="number" type="time" name="Class_name" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6 mb-30">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleInputEmail1">البطن | ABD :</label>
                                        <input id="name" type="number" name="Class_name" class="form-control">
                                        <br>
                                        <label class="form-label" for="exampleInputEmail1">الزمن :</label>
                                        <input id="number" type="time" name="Class_name" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6 mb-30">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleInputEmail1">النزيف المهبلي | V.Bleeding :</label>
                                        <input id="name" type="number" name="Class_name" class="form-control">
                                        <br>
                                        <label class="form-label" for="exampleInputEmail1">الزمن :</label>
                                        <input id="number" type="time" name="Class_name" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="exampleInputEmail1">كمية البول الخارجه | U.O.P :</label>
                                <input id="name" type="number" name="Class_name" class="form-control">
                                <br>
                                <label class="form-label" for="exampleInputEmail1">الزمن :</label>
                                <input id="number" type="time" name="Class_name" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-30">
                        <div class="mb-3">
                            <label class="form-label" for="exampleInputEmail1">العمر :</label>
                            <label class="form-control" value="" style="height: 49px;">
                          </div>
                          <div class="mb-3">
                            <label class="form-label" for="exampleInputEmail1">القسم :</label>
                            <label class="form-control" value="" style="height: 49px;">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="exampleFormControlTextarea1">العلاج و التغذيه | Treatment & Diet :</label>
                            <label class="form-control" value="" style="height: 240px;">
                        </div>
                        <h5 class="card-title">تفاصيل العلاج</h5>
                        <div class="mb-3">
                            <label class="form-label" for="exampleFormControlTextarea1">نوع و كمية العلاج :</label>
                            <label class="form-control" value="" style="height: 240px;">
                        </div>
                    </div>
                </div>
                <center>
                    <a  class="btn btn-success" href="{{ route('patient_follow_up.index') }}">رجوع</a>
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
