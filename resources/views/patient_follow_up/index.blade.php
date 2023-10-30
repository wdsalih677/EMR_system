@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
قائمة المتابعه
@stop
@endsection
@section('page-header')
@section('content')
{{-- start content --}}
<div class="row">
    <div class="col-sm-6">
        <h4 class="mb-0">قائمة المتابعه</h4>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
            <li class="breadcrumb-item"><a href="#" class="default-color">المتابعه</a></li>
            <li class="breadcrumb-item active">قائمة المتابعه</li>
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
            <a class="button x-small" href="{{ route('patient_follow_up.create') }}">
                إضافة مريض
            </a>
            <br><br>
            <table id="datatable" class="table-bordered border table table-striped dataTable p-0 text-center">
              <thead>
                <tr>
                  <th>#</th>
                  <th>رقم التذكره</th>
                  <th>الإسم</th>
                  <th>العنبر</th>
                  <th>نوع الإقامه</th>
                  <th>التشخيص النهائي</th>
                  <th>المقاييس الحيويه</th>
                  <th>تعديل المقاييس الحيويه</th>
                  <th>زمن أول قياس</th>
                  <th>زمن آخر قياس</th>
                  <th>العمليات</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($followUp as $value)
                    <tr>
                    <td>{{ $value->id }}</td>
                    <td>{{ $value->teckit_num }}</td>
                    <td>{{ $value->tickets->name }}</td>
                    <td>{{ $value->wards->name }}</td>
                    <td>
                        @if ($value->residence_type == 1)
                            <span style="color:red;">لا توجد إقامه</span>
                        @elseif($value->residence_type == 2)
                            إقامه طويله
                        @else
                            إقامه قصيره
                        @endif

                    </td>
                    <td>{{ $value->final_diagnosis }}</td>
                    <td>
                        @if (empty($value->bio->id))
                            <button class="badge bg-danger" data-toggle="modal" data-target="#biometricsFollow{{ $value->id }}">
                                <label style="margin-top: 5px; font-size:15px; color:white;">
                                    اضافه
                                </label>
                            </button>
                        @else
                        <button class="badge bg-success" data-toggle="modal" title="تم إضافة المقاييس الحيويه مسبقا يمكنك فقط تحديثها حسب الرغبه">
                            <label style="margin-top: 5px; font-size:15px; color:white;">
                                اضافه
                            </label>
                        </button>
                        @endif
                    </td>
                    <td>
                        @if (empty($value->bio->id))
                        <button class="badge bg-info" data-toggle="modal" data-target="#edit_biometrics{{ $value->id }}" style="display: none;">
                            <label style="margin-top: 5px; font-size:15px; color:white;">
                                تحديث
                            </label>
                        </button>
                        @else
                            <button class="badge bg-info" data-toggle="modal" data-target="#edit_biometrics_Follow{{ $value->id }}">
                                <label style="margin-top: 5px; font-size:15px; color:white;">
                                    تحديث
                                </label>
                            </button>
                        @endif
                    </td>
                    <td>
                        @if (!empty($value->bio->created_at))
                        {{ $value->bio->created_at }}
                        @else
                        لم يتم أخذ المقاييس الحيويه
                        @endif
                    </td>
                    <td>
                        @if (empty($value->bio->updated_at))
                            لم يتم أخذ المقاييس الحيويه
                        @else
                            {{ $value->bio->updated_at }}
                        @endif
                    </td>
                    <td>
                        <div class="dropdown">
                            <button aria-expanded="false" aria-haspopup="true"
                                class="btn ripple btn-info btn-sm" data-toggle="dropdown"
                                type="button">العمليات<i class="fa fa-caret-down ml-1"></i></button>
                            <div class="dropdown-menu tx-13">

                                <button class="dropdown-item" data-reg_id="" data-toggle="modal" data-target="#edit{{$value->id}}" ><i
                                    class="text-info fa fa-edit"></i>
                                    تعديل
                                </button>
                                <button class="dropdown-item"  data-toggle="modal" data-target="#deleteFolow{{ $value->id }}" >
                                    <i class="text-danger fa fa-trash"></i>
                                    حذف
                                </button>
                            </div>
                        </div>
                    </td>

                    </tr>
                    @include('patient_follow_up.delete')
                    @include('patient_follow_up.AddBio')
                    @include('patient_follow_up.editBio')

                    <!-- start_edit_modal_intensive -->
                    <div class="modal fade bd-example-modal-lg" id="edit{{$value->id}}" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                    id="exampleModalLabel">
                                    تعديل المريض : {{  $value->tickets->name }}  || رقم التذكره : {{ $value->teckit_num }}
                                </h5>
                                <button type="button" class="close" data-dismiss="modal"
                                aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <!-- edit_form -->
                            <form action="{{ route('patient_follow_up.update',$value->id) }}" method="POST">
                                {{ method_field('patch') }}
                                @csrf
                                <div class="form-group">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col">
                                                <div class="mb-3">
                                                    <label class="form-label" for="exampleInputEmail1"> <span style="color:red;">*</span> العنبر :</label>
                                                    <select name="ward_id" wire:model="ward_id" class="form-control"  required style="height: 50px;">
                                                        <option selected disabled>--اختر العنبر--</option>
                                                        @foreach ($wards as $ward)
                                                            <option value="{{ $ward->id }}" {{ $value->wards->id == $ward->id ? 'selected' :'' }}>{{ $ward->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <label for="exampleFormControlTextarea1">الملاحظات</label>
                                        <textarea class="form-control" name="notes" id="exampleFormControlTextarea1" rows="4" style="height: 120px;">{{ $value->notes }}</textarea>
                                    </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary"
                                data-dismiss="modal">اغلاق</button>
                                <button type="submit" class="btn btn-success">تحديث</button>
                            </div>
                        </form>
                    </div>
                </div>
                </div>
                <!-- end_edit_modal_intensive -->
                <!-- delete_modal_doctor -->
               
                
                <!-- end_delete_modal_doctor -->
                @endforeach
              </tbody>
              <tfoot>
              <tr>
                <th>#</th>
                <th>رقم التذكره</th>
                <th>الإسم</th>
                <th>العنبر</th>
                <th>نوع الإقامه</th>
                <th>التشخيص النهائي</th>
                <th>المقاييس الحيويه</th>
                <th>تعديل المقاييس الحيويه</th>
                <th>زمن أول قياس</th>
                <th>زمن آخر قياس</th>
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
