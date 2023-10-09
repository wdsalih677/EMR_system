@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
بيانات المريض الأوليه
@stop
@endsection
@section('page-header')
@section('content')
{{-- start content --}}
<div class="row">
    <div class="col-sm-6">
        <h4 class="mb-0">قائمة التذاكر</h4>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
            <li class="breadcrumb-item"><a href="#" class="default-color">الإستقبال</a></li>
            <li class="breadcrumb-item active">بيانات المريض الأوليه</li>
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
            <a  class="button x-small" href="{{ route('reception.create') }}">
                إنشاء تذكره
            </a>
            <br><br>
            <table id="datatable" class="table-bordered border table table-striped dataTable p-0" style="text-align: center;">
              <thead>
                <tr>
                  <th>#</th>
                  <th>الإسم</th>
                  <th>رقم التذكره</th>
                  <th>العمليات</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($tickets as $ticket)
                    <tr>
                    <td>{{ $ticket->id }}</td>
                    <td>{{ $ticket->name }}</td>
                    <td>{{ $ticket->ticket_num }}</td>
                    <td>
                        <div class="dropdown">
                            <button aria-expanded="false" aria-haspopup="true"
                                class="btn ripple btn-info btn-sm" data-toggle="dropdown"
                                type="button">العمليات<i class="fa fa-caret-down ml-1"></i></button>
                            <div class="dropdown-menu tx-13">
                                    <a class="dropdown-item" href="{{ route('reception.edit',$ticket->id) }}">
                                        <i class="text-warning fa fa-edit"></i> تعديل
                                    </a>
                                    <button  class="dropdown-item" data-toggle="modal" data-target="#delete{{ $ticket->id }}" ><i
                                        class="text-danger fa fa-trash"></i>
                                        حذف
                                    </button>
                                    <button class="dropdown-item" data-reg_id="" data-toggle="modal" data-target="#print{{ $ticket->id }}" ><i
                                        class="text-info fa fa-print"></i>
                                        طباعه
                                    </button>
                            </div>
                        </div>
                    </td>

                    </tr>

    <!-- delete_modal_doctor -->
    <div class="modal fade" id="delete{{ $ticket->id }}" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                        id="exampleModalLabel">
                        حذف التذكرة
                    </h5>
                    <button type="button" class="close" data-dismiss="modal"
                        aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('reception.destroy',$ticket->id) }}" method="post">
                        {{ method_field('Delete') }}
                        @csrf
                        هل تريد الحذف؟
                        <label id="Name" type="text" name="Name" class="form-control">{{ $ticket->name }}</label>

                        <input id="id" type="hidden" name="id" value="{{ $ticket->id }}">
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary"
                                data-dismiss="modal">إغلاق</button>
                            <button type="submit"
                                class="btn btn-danger">حذف</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- end_delete_modal_doctor -->
        <!-- print_modal_doctor -->
        <div class="modal fade" id="print{{ $ticket->id }}" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                            id="exampleModalLabel">
                            طباعه التذكرة
                        </h5>
                        <button type="button" class="close" data-dismiss="modal"
                            aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id="GFG">
                        <center>
                            <h5 class="card-title">مستشفى عطبرة التعليمي</h5>
                        </center>
                            <br><br><br><br><br>
                            <div class="row" id="printableArea">
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
                                title="طباعه"><i
                                class="fa fa-print" value="click" onclick="printDiv('printableArea')"> طباعه</i>
                                </button>
                               </center>
                    </div>
                </div>
            </div>
        </div>
        <!-- end_print_modal_doctor -->
                @endforeach
              </tbody>
              <tfoot>
              <tr>
                <th>#</th>
                <th>الإسم</th>
                <th>رقم التذكره</th>
                <th>العمليات</th>
              </tr>
              </tfoot>
            </table>
          </div>
        </div>
      </div>
    </div>
{{--start model --}}

    </div>
{{-- end content --}}
@endsection
@section('js')
@toastr_js
@toastr_render
<script>
function printDiv(printableArea) {
        var printContents = document.getElementById(printableArea).innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;

        window.print();

        document.body.innerHTML = originalContents;
}
</script>

@endsection
