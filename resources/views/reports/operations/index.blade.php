@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
الجراحه و التدخلات الطبيه
@stop
@endsection
@section('page-header')
@section('content')
{{-- start content --}}
<div class="row">
    <div class="col-sm-6">
        <h4 class="mb-0">الجراحه و التدخلات الطبيه</h4>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
            <li class="breadcrumb-item"><a href="#" class="default-color">التقارير</a></li>
            <li class="breadcrumb-item active">الجراحه و التدخلات الطبيه</li>
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
          <div class="table-responsive">
            <form action="">
                <div class="card-body datepicker-form">
                    <center><h4 class="card-title">الجراحه و التدخلات الطبيه</h4></center>
                    <h5> - المجموع الكلي لعدد العمليات = 7558</h5>
                    <br>
                <form action="">
                    <h5 class="card-title">حدد التاريخ :</h5>
                    <div class="input-group" data-date="23/11/2018" data-date-format="mm/dd/yyyy">
                        <span class="input-group-addon">من</span>
                        <input type="text" class="form-control range-from" name="from">
                        <span class="input-group-addon">إلى</span>
                        <input class="form-control range-to" type="text" name="to">
                    </div>
                    <br><br>
                    <button type="button" class="button medium">
                        بحث <i class="fa fa-search"></i>
                    </button>
                </form>
                </div>
            </form>
            <br>
            <div class="row">
                @foreach ($operationName as $op)

                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <h5>{{ $op }}</h5>
                            </div>
                            <div class="card-body">
                                @foreach ($operations as $index)
                                        عدد العمليات : {{$index->id->count()}}
                                        <br>
                                @endforeach
                            </div>
                        </div>
                    </div>

                @endforeach
            </div>
            <br><br><br>
            <br><br>
            <center>
                <button type="button" class="button medium">
                    طباعه <i class="fa fa-print"></i>
                </button>
            </center>
          </div>
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
