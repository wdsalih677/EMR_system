@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
المواليد و الوفيات
@stop
@endsection
@section('page-header')
@section('content')
{{-- start content --}}
<div class="row">
    <div class="col-sm-6">
        <h4 class="mb-0">المواليد و الوفيات</h4>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
            <li class="breadcrumb-item"><a href="#" class="default-color">التقارير</a></li>
            <li class="breadcrumb-item active">المواليد و الوفيات</li>
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
                    <center><h4 class="card-title">تقرير المواليد و الوفيات</h4></center>
                    <h5> - المجموع الكلي لعدد  المتوفين من الذكور = 7558</h5>
                    <h5> - المجموع الكلي لعدد المتوفين من الإناث = 7558</h5>
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
            <table id="datatable" class="table-bordered border table table-striped dataTable p-0">
              <thead>
                <tr>
                  <th>#</th>
                  <th>سبب الوفاة</th>
                  <th colspan="2"><center>أقل من سنه</center></th>
                  <th colspan="2"><center>04-01</center></th>
                  <th colspan="2"><center>14-05</center></th>
                  <th colspan="2"><center>44-15</center></th>
                  <th colspan="2"><center>64-45</center></th>
                  <th colspan="2"><center>65+</center></th>
                  <th colspan="2"><center>الجمله</center></th>
                  <th><center>الإصابات</center></th>
                </tr>
              </thead>
              <tbody>

                    <tr>
                        <th></th>
                        <th></th>
                        <th>ذكر</th>
                        <th>أنثى</th>
                        <th>ذكر</th>
                        <th>أنثى</th>
                        <th>ذكر</th>
                        <th>أنثى</th>
                        <th>ذكر</th>
                        <th>أنثى</th>
                        <th>ذكر</th>
                        <th>أنثى</th>
                        <th>ذكر</th>
                        <th>أنثى</th>
                        <th>ذكر</th>
                        <th>أنثى</th>
                        <th></th>
                    </tr>
                    {{-- @foreach ($ as $) --}}
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                {{-- @endforeach --}}
              </tbody>
              <tfoot>
              <tr>
                <th>#</th>
                  <th>سبب الوفاة</th>
                  <th colspan="2"><center>أقل من سنه</center></th>
                  <th colspan="2"><center>04-01</center></th>
                  <th colspan="2"><center>14-05</center></th>
                  <th colspan="2"><center>44-15</center></th>
                  <th colspan="2"><center>64-45</center></th>
                  <th colspan="2"><center>65+</center></th>
                  <th colspan="2"><center>الجمله</center></th>
                  <th><center>الإصابات</center></th>
              </tr>
              </tfoot>
            </table>
            <br><br><br>
            <center><h4 class="card-title">ملخص العيادة الولادة</h4></center>
            <center><h5>1:- العدد الكلي للمواليد داخل المؤسسة = 8912</h5></center>
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
