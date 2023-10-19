@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
تعديل بيانات العمليه
@stop
@endsection
@section('page-header')
@section('content')
{{-- start content --}}
<div class="row">
    <div class="col-sm-6">
        <h4 class="mb-0">تعديل بيانات العمليه</h4>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
            <li class="breadcrumb-item"><a href="#" class="default-color">العمليات و التنويم</a></li>
            <li class="breadcrumb-item active">تعديل بيانات العمليه</li>
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
                <h5 class="card-title">تعديل بيانات العمليه</h5>
            </center>
            <form action="{{ route('operation.update',$operation->id) }}" method="POST">
                {{ method_field('patch') }}
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-30">
                        <div class="mb-3">
                            <label class="form-label" for="exampleInputEmail1">الإسم :</label>
                            <input type="text" class="form-control" name="name"  value="{{ $operation->tickets->name }}"  disabled>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="exampleInputEmail1">إسم العمليه | Operation name :</label>
                            <input  type="text" name="operationName" value="{{ $operation->operationName }}" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="exampleInputEmail1">المساعد | Assistant :</label>
                            <input  type="text" name="Assistant" value="{{ $operation->Assistant }}" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="exampleInputEmail1">نوع التخدير | Ansesthesia :</label>
                            <input  type="text" name="Ansesthesia" value="{{ $operation->Ansesthesia }}" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6 mb-30">
                        <div class="mb-3">
                            <label class="form-label" for="exampleInputEmail1">العمر :</label>
                            <input type="text" class="form-control" name="age"  value="{{ $operation->tickets->age }}"  disabled>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="exampleInputEmail1">الجراح | Surgion :</label>
                            <input  type="text" name="Surgion" value="{{ $operation->Surgion }}" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="exampleInputEmail1">المخدر | Anaesthetest :</label>
                            <input  type="text" name="Anaesthetest" value="{{ $operation->Anaesthetest }}" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="exampleInputEmail1">التاريخ و الزمن</label>
                            <input  type="datetime-local" name="dateTime" value="{{ $operation->dateTime }}" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="exampleFormControlTextarea1">إجراءات العمليه | Operation Procedures :</label>
                    <textarea class="form-control" name="OperationProcedures" rows="3" >{{ $operation->OperationProcedures}}</textarea>
                </div>
                <br>
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
@endsection
