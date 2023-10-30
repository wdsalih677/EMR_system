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
        <h4 class="mb-0">تعديل بيانات المريض</h4>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
            <li class="breadcrumb-item"><a href="#" class="default-color">بيانات المريض</a></li>
            <li class="breadcrumb-item active">تعديل بيانات المريض</li>
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
            <form action="{{route('medical_record.update',$medicalRecord->id)}}" method="POST">
                {{ method_field('patch') }}
                    @csrf
                <div class="mb-3">
                    <input type="hidden" name="id" value="{{$medicalRecord->id}}">
                    <input type="hidden"  name="ticket_id" value="{{$medicalRecord->ticket_id}}">
                    <label class="form-label" for="exampleInputEmail1">رقم الذكره :</label>
                    <input id="search" type="text" value="{{$medicalRecord->tickets->ticket_num}}" class="form-control" style="width: 49%;"  autocomplete="off" disabled>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-30">
                        <div class="mb-3">
                            <label class="form-label" for="exampleInputEmail1">اسم :</label>
                            <input type="text"class="form-control" value="{{$medicalRecord->tickets->name}}"  disabled>
                        </div>
                    </div>
                    <div class="col-md-6 mb-30">
                        <div class="mb-3">
                            <label class="form-label" for="exampleInputEmail1">العمر :</label>
                            <input type="text" class="form-control" value="{{$medicalRecord->tickets->age}}"   disabled>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-30">
                        <div class="mb-3">
                            <label class="form-label" for="exampleInputEmail1">* تاريخ الخروج :</label>
                            <div class="input-group" data-date="23/11/2018" data-date-format="mm/dd/yyyy">
                                <input type="text" class="form-control range-to" value="{{$medicalRecord->date_exit}}" name="date_exit"  data-date-format="mm/dd/yyyy" required placeholder="يجب تحديد تاريخ الخروج">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="exampleInputEmail1">* تاريخ المقابله :</label>
                            <input type="date" class="form-control" value="{{$medicalRecord->date_interview}}" name="date_interview"  data-date-format="mm/dd/yyyy" >                      
                        </div>
                    </div>
                    <div class="col-md-6 mb-30">
                        <div class="mb-3">
                            <label class="form-label" for="exampleFormControlSelect1">* حالة المريض عند الخروج :</label>
                            <select class="form-control" id="exampleFormControlSelect1" name="status_exit" style="height: 50px;">
                                <option value="{{ $medicalRecord->status_exit == $medicalRecord->status_exit ? 'selected disable' : '' }}">{{ $medicalRecord->status_exit }}</option>
                                <option value="معاف">معاف</option>
                                <option value="هروب">هروب</option>
                                <option value="وفاة">وفاة</option>
                                <option value="تحويل">تحويل</option>
                            </select>
                        </div>
                    </div>
                </div>
                <br><br>
                <center>
                    <button type="submit" class="btn btn-success">تحديث</button>
                </center>
                <br><br><br>
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
