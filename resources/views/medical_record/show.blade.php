@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
بيانات المريض
@stop
@endsection
@section('page-header')
@section('content')
{{-- start content --}}
<div class="row">
    <div class="col-sm-6">
        <h4 class="mb-0">أضافة بيانات المريض</h4>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
            <li class="breadcrumb-item"><a href="#" class="default-color">بيانات المريض</a></li>
            <li class="breadcrumb-item active">بيانات المريض</li>
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
                <h5 class="card-title">بيانات المريض</h5>
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
                            <label class="form-label" for="exampleFormControlTextarea1">الأعراض | Symptoms :</label>
                            <label class="form-control" style="height: 194px;"></label>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="exampleFormControlTextarea1">العلاج و التغذيه | Treatment & Diet</label>
                            <label class="form-control" style="height: 194px;"></label>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="exampleInputEmail1">التشخيص المبدئي | Provisional Diagnosis :</label>
                            <label class="form-control" value="" style="height: 49px;">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="exampleInputEmail1">تاريخ المقابله :</label>
                            <label class="form-control" value="" style="height: 49px;">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="exampleFormControlSelect1">* حالة المريض عند الخروج :</label>
                            <select class="form-control" id="exampleFormControlSelect1" style="height: 50px;">
                                <option>...</option>
                                <option>معاف</option>
                                <option>هروب</option>
                                <option>وفاة</option>
                                <option>تحويل</option>
                            </select>
                          </div>
                    </div>
                    <div class="col-md-6 mb-30">
                        <div class="mb-3">
                            <label class="form-label" for="exampleInputEmail1">العمر :</label>
                            <label class="form-control" value="" style="height: 49px;">
                          </div>
                        <div class="mb-3">
                            <label class="form-label" for="exampleFormControlTextarea1">الفحوصات | Examinations :</label>
                            <label class="form-control" style="height: 194px;"></label>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="exampleFormControlTextarea1">نتائج الفحوصات | Investigations Results</label>
                            <label class="form-control" id="exampleFormControlTextarea1" rows="3" style="height: 194px;"></label>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="exampleInputEmail1">التشخيص النهائي | Final Diagnosis :</label>
                            <label class="form-control" style="height: 49px;"></label>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="exampleInputEmail1">* تاريخ الخروج :</label>
                            <input id="name" type="date" name="Class_name" class="form-control">
                        </div>
                    </div>
                </div>
                <h4 class="card-title"></h4>
                <br><br><br>
                <center>
                    <h5 class="card-title">بيانات العمليه</h5>
                </center>
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
                <h4 class="card-title"></h4>
                <br><br>
                <center>
                    <h5 class="card-title">بيانات التنوبم</h5>
                </center>
                <div class="row">
                    <div class="col-md-6 mb-30">
                            <label for="Name" class="mr-sm-2"> التشخيص :
                            </label>
                            <label class="form-control" value="" style="height: 49px;">
                    </div>
                    <div class="col-md-6 mb-30">
                        <label for="Name_en"class="mr-sm-2">حالة المريض :</label>
                        <label class="form-control" value="" style="height: 49px;">
                    </div>
                </div>
                <h4 class="card-title"></h4>
                <br><br>
                <center>
                    <h5 class="card-title">بيانات المتابعه</h5>
                </center>
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
                <h4 class="card-title"></h4>
                <br><br>
                <center>
                    <a  class="btn btn-success" href="{{ route('medical_record.index') }}">رجوع</a>
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
