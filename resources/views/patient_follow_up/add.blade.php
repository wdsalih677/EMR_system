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
        <h4 class="mb-0">أضافة بيانات المريض</h4>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
            <li class="breadcrumb-item"><a href="#" class="default-color">المتابعه</a></li>
            <li class="breadcrumb-item active">إضافة بيانات المريض</li>
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
                <form action="{{ route('patient_follow_up.store') }}" method="POST">
                    @csrf

                    @livewire('patient-follow-up')
                    <div class="form-group">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleInputEmail1"> <span style="color:red;">*</span> العنبر :</label>
                                        <select name="ward_id" wire:model="ward_id" class="form-control"  required style="height: 50px;">
                                            <option selected disabled>--اختر العنبر--</option>
                                            @foreach ($wards as $ward)
                                                <option value="{{ $ward->id }}">{{ $ward->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <label for="exampleFormControlTextarea1">الملاحظات</label>
                            <textarea class="form-control" wire:model="notes" name="notes" id="exampleFormControlTextarea1" rows="4" style="height: 120px;"></textarea>
                        </div>
                        <center>
                            <button type="submit" class="btn btn-success">إضافه</button>
                        </center>
                    </div>
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
