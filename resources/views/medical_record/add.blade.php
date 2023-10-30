@extends('layouts.master')
@section('css')
    @toastr_css
    @livewireStyles
@section('title')
بيانات المريض
@stop
@endsection
@section('page-header')
@section('content')
{{-- start content --}}
<div class="row">
    <div class="col-sm-6">
        <h4 class="mb-0">أضافة بيانات المريض النهائية</h4>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
            <li class="breadcrumb-item"><a href="#" class="default-color">إدارة السجل الطبي و التقارير</a></li>
            <li class="breadcrumb-item active">السجلات الطبية</li>
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
            <form action="{{route('medical_record.store')}}" method="POST">
                @csrf
                @livewire('medical-record')
                <div class="row">
                    <div class="col-md-6 mb-30">
                        <div class="mb-3">
                            <label class="form-label" for="exampleInputEmail1">* تاريخ الخروج :</label>
                            <div class="input-group" data-date="23/11/2018" data-date-format="mm/dd/yyyy">
                                <input type="text" class="form-control range-to" name="date_exit"  data-date-format="mm/dd/yyyy" required placeholder="يجب تحديد تاريخ الخروج">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="exampleInputEmail1">تاريخ المقابله :</label>
                            <input type="date" class="form-control" name="date_interview"  data-date-format="mm/dd/yyyy" required >                      
                        </div>
                    </div>
                    <div class="col-md-6 mb-30">
                        <div class="mb-3">
                            <label class="form-label" for="exampleFormControlSelect1">* حالة المريض عند الخروج :</label>
                            <select class="form-control" id="exampleFormControlSelect1" name="status_exit">
                                <option>...</option>
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
                    <button type="submit" class="btn btn-success">إضافة</button>
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
@livewireScripts
<script>
    $(document).ready(function ()
           {
               $('input[name="date_exit"]').on('change', function ()
                   {
                       var today = new Date();
                       var dd = String(today.getDate()).padStart(2, '0');
                       var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
                       var yyyy = today.getFullYear();
                       today = mm + '/' + dd + '/' + yyyy;
                       var from = $('input[name="date_exit"]').val();
                       if(Date.parse(from) < Date.parse(today) || Date.parse(from) > Date.parse(today))
                       {
                           alert("لا يمكن لتاريخ البداية ان يكون اقل او اكبر من تاريخ اليوم");
                           $('input[name="date_exit"]').css({"color":"#555","border":"1px solid red","box-shadow": "red 2px 2px 16px"});
                           $('button[type="submit"]').attr("disabled", true);
                           $('button[type="submit"]').css({"cursor": "no-drop"});
                           $('input[name="end_at"]').val('');
                       }
                       else
                       {
                           $('input[name="date_exit"]').css({"color":"#555","border":"1px solid green","box-shadow": "green 2px 2px 16px"});
                           $('button[type="submit"]').attr("disabled", false);
                           $('button[type="submit"]').css({"cursor": "pointer"});
                           $('button[type="submit"]').css({"display": "inline"});
                       }
                   }
               );
           }
       );
   </script>
@endsection
