@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
الأمراض الساريه و الغير ساريه
@stop
@endsection
@section('page-header')
@section('content')
{{-- start content --}}
<div class="row">
    <div class="col-sm-6">
        <h4 class="mb-0">الأمراض الساريه و الغير ساريه</h4>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
            <li class="breadcrumb-item"><a href="#" class="default-color">التقارير</a></li>
            <li class="breadcrumb-item active">الأمراض الساريه و الغير ساريه</li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-xl-12 mb-30">
      <div class="card card-statistics h-100">
        <div class="card-body">
            <center><h4 class="card-title">الأمراض الساريه و الغير ساريه</h4></center>
            <br><br><br><br>
            <div class="row">
                <div class="col-md mb-30">
                    <div class="card card-statistics mb-30">
                        <div class="card-body">
                            <center><h4 class="card-title">الأمراض الساريه</h4></center>
                            <br>
                            <h5 class="card-title">العدد الكلي للمرضى = 3434</h5>
                            <h5 class="card-title">العدد الكلي للمرضى المتوفين = 3434</h5>
                            <center><a class="btn btn-primary" href="{{ route('Communicable.index') }}">عرض</a></center>
                        </div>
                    </div>
                </div>
                <div class="col-md mb-30">
                    <div class="card card-statistics mb-30">
                        <div class="card-body">
                          <center><h4 class="card-title">الأمراض الغير ساريه</h4></center>
                          <br>
                          <h5 class="card-title">العدد الكلي للمرضى = 3434</h5>
                          <h5 class="card-title">العدد الكلي للمرضى المتوفين = 3434</h5>
                          <center><a class="btn btn-primary" href="{{ route('nonCommunicable.index') }}">عرض</a></center>
                        </div>
                    </div>
                </div>
            </div><br><br><br><br><br><br>
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
