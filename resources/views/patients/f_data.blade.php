@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
بيانات المريض النهائيه
@stop
@endsection
@section('page-header')
@section('content')
{{-- start content --}}
<div class="row">
    <div class="col-sm-6">
        <h4 class="mb-0"> بيانات المريض النهائيه</h4>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
            <li class="breadcrumb-item"><a href="#" class="default-color">إدارة المرضى</a></li>
            <li class="breadcrumb-item active">بيانات المريض النهائيه</li>
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
                <h5 class="card-title">بيانات المريض النهائيه</h5>
            </center>
            <form>
                <div class="row">
                    <div class="col-md-6 mb-30">
                        <div class="mb-3">
                            <label class="form-label" for="exampleInputEmail1">رقم الذكره :</label>
                            <input id="name" type="number" name="Class_name" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="exampleInputEmail1">اسم :</label>
                            <label class="form-control" value="">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="exampleInputEmail1">التشخيص النهائي | Final Diagnosis :</label>
                            <input id="name" type="فثءف" name="Class_name" class="form-control" autocomplete="off">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="exampleFormControlTextarea1">العلاج و التغذيه | Treatment & Diet</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="exampleFormControlSelect1">العنبر :</label>
                            <select class="form-control" id="exampleFormControlSelect1" style="height: 50px;">
                                <option>لا يوجد</option>
                                <option>رجال</option>
                                <option>نساء</option>
                                <option>أطفال</option>
                            </select>
                          </div>
                          <div class="mb-3">
                            <label class="form-label" for="exampleFormControlSelect1">القسم :</label>
                            <select class="form-control" id="exampleFormControlSelect1" style="height: 50px;">
                                <option>لا يوجد</option>
                                <option>باطنيه</option>
                                <option>جلديه</option>
                                <option>أطفال</option>
                            </select>
                          </div>
                    </div>
                    <div class="col-md-6 mb-30">
                        <div class="mb-3">
                            <label class="form-label" for="exampleFormControlSelect1">نوع الإقامه :</label>
                            <select class="form-control" id="exampleFormControlSelect1" style="height: 50px;">
                                <option>لا يوجد</option>
                                <option>إقامه طويله</option>
                                <option>إقامه قصيره</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="exampleInputEmail1">العمر :</label>
                            <label class="form-control" value="">
                          </div>
                        <div class="mb-3">
                            <label class="form-label" for="exampleFormControlTextarea1">نتائج الفحوصات | Investigations Results</label>
                            <label class="form-control" id="exampleFormControlTextarea1" rows="3" style="height: 194px;"></label>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="exampleInputEmail1">تاريخ المقابله :</label>
                            <input id="name" type="date" name="Class_name" class="form-control">
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
