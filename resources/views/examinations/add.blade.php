@extends('layouts.master')
@section('css')
    @toastr_css
    @livewireStyles
@section('title')
بيانات الفحص
@stop
@endsection
@section('page-header')
@section('content')
{{-- start content --}}
<div class="row">
    <div class="col-sm-6">
        <h4 class="mb-0">أضافة بيانات الفحص</h4>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
            <li class="breadcrumb-item"><a href="#" class="default-color">الفحوصات</a></li>
            <li class="breadcrumb-item active"> إضافة بيانات الفحص</li>
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
                <h5 class="card-title">بيانات الفحص</h5>
            </center>
            <form action="{{ route('examination.store') }}" method="POST">
                @csrf
                @livewire('show-exam')
                <hr>
                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label class="form-label" for="exampleInputEmail1">حالة النتيجه :</label>
                            <select name="test_status" class="form-control"  required style="height: 50px;">
                                <option value="1">موجبه</option>
                                <option value="2">سالبه</option>
                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <label class="form-label" for="exampleFormControlTextarea1">تائج الفحوصات | Investigations Results :
                            </label>
                            <textarea class="form-control" name="test_results" required rows="3" style="height: 194px;"></textarea>
                        </div>
                    </div>
                </div>
                <center>
                    <button type="submit" class="btn btn-success">إرسال</button>
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
