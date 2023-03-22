@extends('layouts.master')
@section('css')
    @toastr_css
    @livewireStyles
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
            <form action="{{ route('final_data.store') }}" method="POST">
                @csrf
                @livewire('final-diagnosis')
                <hr>
                <div class="row">
                    <div class="col-md-6 mb-30">
                        <div class="mb-3">
                            <label class="form-label" for="exampleInputEmail1">التشخيص النهائي | Final Diagnosis :</label>
                            <input id="name" type="فثءف" name="final_diagnosis" class="form-control" autocomplete="off">
                        </div>
                        {{-- <div class="mb-3">
                            <label class="form-label" for="exampleFormControlSelect1">العنبر :</label>
                            <select class="form-control" name="ward_id" id="exampleFormControlSelect1" style="height: 50px;">
                                <option value="">لا يوجد</option>
                                @foreach ($wards as $ward)
                                    <option value="{{ $ward->id }}">{{ $ward->name }}</option>
                                @endforeach
                            </select>
                        </div> --}}
                        <div class="mb-3">
                            <label class="form-label" for="exampleFormControlSelect1">القسم :</label>
                            <select class="form-control" name="section_id" id="exampleFormControlSelect1" style="height: 50px;">
                                <option value="">لا يوجد</option>
                                @foreach ($sections as $section)
                                    <option value="{{ $section->id }}">{{ $section->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 mb-30">
                        <div class="mb-3">
                            <label class="form-label" for="exampleFormControlSelect1">نوع الإقامه :</label>
                            <select class="form-control" name="residence_type" id="exampleFormControlSelect1" style="height: 50px;">
                                <option value="1">لا يوجد</option>
                                <option value="2">إقامه طويله</option>
                                <option value="3">إقامه قصيره</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="exampleInputEmail1">تاريخ المقابله :</label>
                            <div class="input-group" data-date="23/11/2018" data-date-format="mm/dd/yyyy">
                                <input type="text" name="follow_up_date" class="form-control range-to"   data-date-format="mm/dd/yyyy" >
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 mb-30">
                        <div class="mb-3">
                            <label class="form-label" for="exampleFormControlTextarea1">العلاج و التغذيه | Treatment & Diet</label>
                            <textarea class="form-control" name="treatment_diet" id="exampleFormControlTextarea1" style="height: 200px;"></textarea>
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
    @livewireScripts
@endsection
