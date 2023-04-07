@extends('layouts.master')
@section('css')
    @toastr_css
    @livewireStyles
@section('title')
بيانات العمليه
@stop
@endsection
@section('page-header')
@section('content')
{{-- start content --}}
<div class="row">
    <div class="col-sm-6">
        <h4 class="mb-0">أضافة بيانات العمليه</h4>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
            <li class="breadcrumb-item"><a href="#" class="default-color">العمليات و التنويم</a></li>
            <li class="breadcrumb-item active">إضافة بيانات العمليه</li>
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
                <h5 class="card-title">بيانات العمليه</h5>
            </center>
            <form action="{{ route('operation.store') }}" method="POST" enctype="multipart/form-data" autocomplete="off">
                @csrf
                @livewire('opration')
                <div class="row">
                    <div class="col-md-6 mb-30">
                        <div class="mb-3">
                            <label class="form-label" for="exampleInputEmail1">إسم العمليه | Operation name :</label>
                            <input type="text" name="operationName" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="exampleInputEmail1">المساعد | Assistant :</label>
                            <input type="text" name="Assistant" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="exampleInputEmail1">نوع التخدير | Ansesthesia :</label>
                            <input type="فثءف" name="Ansesthesia" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-6 mb-30">
                        <div class="mb-3">
                            <label class="form-label" for="exampleInputEmail1">الجراح | Surgion :</label>
                            <input type="text" name="Surgion" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="exampleInputEmail1">المخدر | Anaesthetest :</label>
                            <input type="text" name="Anaesthetest" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="exampleInputEmail1">التاريخ و الزمن</label>
                            <input type="datetime-local" name="dateTime" class="form-control" required>
                        </div>
                    </div>
                </div>
                <div class="mt-15">
                    <label class="form-label" for="exampleInputEmail1">الإقرار الطبي :</label>
                    <input type="file" class="form-control" name="medicalDeclaration" lang="ar" required>
                </div>
                  <br>
                <div class="mb-3">
                    <label class="form-label" for="exampleFormControlTextarea1">إجراءات العمليه | Operation Procedures :</label>
                    <textarea class="form-control" name="OperationProcedures" rows="3" required></textarea>
                </div>
                <br>
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
