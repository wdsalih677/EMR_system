@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
بيانات العمليه
@stop
@endsection
@section('page-header')
@section('content')
{{-- start content --}}
<div class="row">
    <div class="col-sm-6">
        <h4 class="mb-0"> مرفقات العمليه</h4>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
            <li class="breadcrumb-item"><a href="#" class="default-color">العمليات و التنويم</a></li>
            <li class="breadcrumb-item active">إضافة مرفقات العمليه</li>
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
                <h5 class="card-title">الإقرار الطبي و مرفقات المريض : {{ $operation->tickets->name }}</h5>
            </center>
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
                    <button class="button x-small" data-reg_id="" data-toggle="modal" data-target="#AddAttachmenet" >
                        <i class="text-with fa fa-plus"></i>
                        إضافة مرفق
                    </button>
                    <br><br>
                    <table id="datatable" class="table-bordered border table table-striped dataTable p-0 text-center">
                      <thead>
                        <tr>
                            <th>#</th>
                            <th>اسم المرفق</th>
                            <th>تاريخ الإضافه</th>
                            <th>العمليات</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($attachments as $attachment)
                            <tr>
                            <td>{{ $attachment->id }}</td>
                            <td>{{ $attachment->medicalDeclaration }}</td>
                            <td>{{ $attachment->created_at }}</td>
                            <td>
                                <div class="dropdown">
                                    <button aria-expanded="false" aria-haspopup="true"
                                        class="btn ripple btn-info btn-sm" data-toggle="dropdown"
                                        type="button">العمليات<i class="fa fa-caret-down ml-1"></i></button>
                                    <div class="dropdown-menu tx-13">
                                            <a  class="dropdown-item" href="{{ url('openFile') }}/{{ $attachment->ticket_num }}/{{ $attachment->medicalDeclaration }}" ><i
                                                class="text-warning fa fa-eye"></i>
                                                عرض
                                            </a>
                                            <a class="dropdown-item" href="{{ url('downloadFile') }}/{{ $attachment->ticket_num }}/{{ $attachment->medicalDeclaration }}" ><i
                                                class="text-info fa fa-download"></i>
                                                تحميل
                                            </a>
                                    </div>
                                </div>
                            </td>

                            </tr>
                        @endforeach
                        <div class="modal fade bd-example-modal-lg" id="AddAttachmenet" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                            id="exampleModalLabel">
                                            تعديل التشخيص المبدئي
                                        </h5>
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- edit_form -->
                                        <form action="" method="POST">
                                            @csrf
                                            <div class="mt-15">
                                                <label class="form-label" for="exampleInputEmail1">الإقرار الطبي :</label>
                                                <input type="file" class="form-control" name="medicalDeclaration" lang="ar">
                                            </div>
                                    </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">اغلاق</button>
                                                <button type="submit" class="btn btn-success">إضافه</button>
                                            </div>
                                        </form>
                                </div>
                            </div>
                        </div>
                      </tbody>
                      <tfoot>
                      <tr>
                        <th>#</th>
                        <th>اسم المرفق</th>
                        <th>تاريخ الإضافه</th>
                        <th>العمليات</th>
                      </tr>
                      </tfoot>
                    </table>
                  </div>
                </div>
              </div>
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
