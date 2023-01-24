@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
قائمة المرضى
@stop
@endsection
@section('page-header')
@section('content')
{{-- start content --}}
<div class="row">
    <div class="col-sm-6">
        <h4 class="mb-0">قائمة المرضى</h4>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
            <li class="breadcrumb-item"><a href="#" class="default-color">ادارة المرضى</a></li>
            <li class="breadcrumb-item active">قائمة المرضى</li>
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
            <a class="button x-small" href="{{ route('patient.create') }}">
                إضافة مريض
            </a>
            <br><br>
            <table id="datatable" class="table-bordered border table table-striped dataTable p-0" style="text-align: center;">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>الإسم</th>
                        <th>الرقم الوطني</th>
                        <th>رقم التذكره</th>
                        <th>رقم الهاتف</th>
                        <th>التشخيص النهائي</th>
                        <th>وضع المريض</th>
                        <th>العمليات</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($tiks as $tik)
                    <tr>
                    <td>{{ $tik->id }}</td>
                    <td>{{ $tik->name }}</td>
                    <td>{{ $tik->identity_num }}</td>
                    <td>{{ $tik->ticket_num }}</td>
                    <td>{{ $tik->phone_num }}</td>
                    <td></td>
                    <td></td>
                    <td>
                        {{-- @foreach ($patients as $patient)
                        <a class="btn btn-info btn-sm" href="{{ route('patient.edit',$patient->id) }}" style="color: white">
                            <i class="fa fa-edit"></i> تعديل
                        </a>
                        @endforeach --}}
                    </td>

                    </tr>
                @endforeach
              </tbody>
              <tfoot>
              <tr>
                    <th>#</th>
                    <th>الإسم</th>
                    <th>الرقم الوطني</th>
                    <th>رقم التذكره</th>
                    <th>رقم الهاتف</th>
                    <th>التشخيص النهائي</th>
                    <th>وضع المريض</th>
                    <th>العمليات</th>
              </tr>
              </tfoot>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
{{-- end model --}}
{{-- end content --}}
@endsection
@section('js')
@toastr_js
@toastr_render
@endsection
