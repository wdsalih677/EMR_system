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
        <h4 class="mb-0">تعديل بيانات المريض</h4>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
            <li class="breadcrumb-item"><a href="#" class="default-color">إدارة المرضى</a></li>
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
            <form action="{{ route('patient.update',$pre_diagnosis->id) }}" method="POST">
                {{ method_field('patch') }}
                @csrf
                <hr>
                <div class="row">
                    <div class="col-md-6 mb-30">
                        <div class="mb-3">
                            <input type="hidden" name="id" value="{{ $pre_diagnosis->id }}">
                            <label class="form-label" for="exampleInputEmail1">التشخيص المبدئي | Provisional Diagnosis :</label>
                            <input id="name" type="text" name="provisional_diagnosis" class="form-control" required value="{{ $pre_diagnosis->provisional_diagnosis }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="exampleFormControlTextarea1">الأعراض | Symptoms :</label>
                            <textarea class="form-control" name="symptoms" id="exampleFormControlTextarea1" rows="3" required >{{ $pre_diagnosis->symptoms }}</textarea>
                        </div>
                    </div>
                    <div class="col-md-6 mb-30">
                        <div class="mb-3">
                            <label class="form-label" for="exampleFormControlTextarea1">الفحوصات | Examinations :</label>
                            <textarea class="form-control" name="examinations" id="exampleFormControlTextarea1" rows="3" style="height: 194px;">{{ $pre_diagnosis->examinations }}</textarea>
                        </div>
                    </div>
                </div>
                <center>
                    <button type="submit" class="btn btn-success">تحديث</button>
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
@endsection
