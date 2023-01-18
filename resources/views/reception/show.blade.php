@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
طباعة التذكره
@stop
@endsection
@section('page-header')
@section('content')
{{-- start content --}}
<div class="row">
    <div class="col-xl-12 mb-30">
      <div class="card card-statistics h-100">
        <div class="card-body">
            @foreach ($tickets as $ticket)
            <center>
                <h5 class="card-title">مستشفى عطبرة التعليمي</h5>
            </center>
                <br><br><br><br><br>
                <div class="row" id="div">
                    <div class="col-12 text-center">
                        <h4 class="form-label ">الإسم :  {{ $ticket->name }}</h4>
                        <br>
                    </div>
                    <div class="col-12 text-center">
                        <h4 class="form-label">التذكره :  {{ $ticket->ticket_num }}</h4>
                    </div>
                </div>
                <br><br><br>
                <center>
                    <button type="button"
                    class="btn btn-success btn-lg"
                    title="طباعه" onclick="printpage()"><i
                    class="fa fa-print"> طباعه</i>
                    </button>
                   </center>
            @endforeach
        </div>
      </div>
    </div>
  </div>
{{-- end content --}}
@endsection
@section('js')
@toastr_js
@toastr_render
<script>
    function printpage() {
            window.print();
        }
</script>
@endsection
