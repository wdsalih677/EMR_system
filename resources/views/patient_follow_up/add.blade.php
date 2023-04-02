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
                <form action="">
                    @csrf
                    @livewire('patient-follow-up')
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
