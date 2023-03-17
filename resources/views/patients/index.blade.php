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
                        <th>رقم التذكره</th>
                        <th>التشخيص الإبتدائي</th>
                        <th>التشخيص النهائي</th>
                        <th>الإقامه</th>
                        <th>العمليات</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($tiks as $tik)
                    <tr>
                    <td>{{ $tik->id }}</td>
                    <td>{{ $tik->name }}</td>
                    <td>{{ $tik->ticket_num }}</td>
                    <td>
                        @if (!empty($tik->pre_diagnoses->provisional_diagnosis))
                            <h4><span class="badge badge-success">{{ $tik->pre_diagnoses->provisional_diagnosis }}</span></h4>
                        @else
                            <h4><span class="badge badge-danger">المريض تحت التشخيص</span></h4>
                        @endif
                    </td>
                    <td>
                        @if (!empty($tik->patientsfinaldata->final_diagnosis))
                            <h4><span class="badge badge-success">{{$tik->patientsfinaldata->final_diagnosis}}</span></h4>
                        @else
                            <h4><span class="badge badge-danger">المريض تحت الفحص</span></h4>
                        @endif
                    </td>
                    <td>
                        @if (!empty($tik->patientsfinaldata->residence_type) && $tik->patientsfinaldata->residence_type == 1)
                            لا توجد إقامه
                        @elseif (!empty($tik->patientsfinaldata->residence_type) && $tik->patientsfinaldata->residence_type == 2)
                            إقامه طويله
                        @elseif (!empty($tik->patientsfinaldata->residence_type) && $tik->patientsfinaldata->residence_type == 3)
                            إقامه قصيره
                        @else
                            <h4><span class="badge badge-danger">المريض تحت الفحص</span></h4>
                        @endif
                    </td>
                    <td>
                        <div class="dropdown">
                            <button aria-expanded="false" aria-haspopup="true"
                                class="btn ripple btn-info btn-sm" data-toggle="dropdown"
                                type="button">العمليات<i class="fa fa-caret-down ml-1"></i></button>
                            <div class="dropdown-menu tx-13">
                                @if (!empty($tik->pre_diagnoses->id))
                                    <button  class="dropdown-item" data-toggle="modal" data-target="#editone{{ $tik->pre_diagnoses->id }}" ><i
                                        class="text-success fa fa-edit"></i>
                                        تعديل التشخيص المبدئي
                                    </button>
                                @else
                                    <h4><span class="badge badge-danger">المريض تحت التشخيص</span></h4>
                                @endif
                                @if (!empty($tik->patientsfinaldata->id))
                                    <button  class="dropdown-item" data-toggle="modal" data-target="#edit_two{{ $tik->patientsfinaldata->id }}" ><i
                                        class="text-warning fa fa-edit"></i>
                                        تعديل التشخيص النهائي
                                    </button>
                                @else
                                    <h4><span class="badge badge-danger">المريض تحت الفحص</span></h4>
                                @endif
                                <button class="dropdown-item" data-reg_id="" data-toggle="modal" data-target="#dS" ><i
                                    class="text-danger fa fa-trash"></i>
                                    حذف
                                </button>
                                <button class="dropdown-item" data-reg_id="" data-toggle="modal" data-target="#addStudent" >
                                    <i class="text-info fa fa-print"></i>
                                    طباعه
                                </button>
                            </div>
                        </div>
                    </td>
                    </tr>
                    @if (!empty($tik->pre_diagnoses->id))
                        <!-- بداية تعديل التشخيص الإبتدائي -->
                        <div class="modal fade bd-example-modal-lg" id="editone{{ $tik->pre_diagnoses->id }}" tabindex="-1" role="dialog"
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
                                        <form action="{{ route('patient.update',$tik->pre_diagnoses->id) }}" method="POST">
                                            {{ method_field('patch') }}
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $tik->pre_diagnoses->id }}">
                                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title">إسم الريض : {{ $tik->name }}</h5>
                                            <br>
                                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title">رقم التذكره : {{ $tik->ticket_num }}</h5>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-6 mb-30">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="exampleInputEmail1">التشخيص المبدئي | Provisional Diagnosis :</label>
                                                        <input id="name" type="text" name="provisional_diagnosis" class="form-control" required value="{{ $tik->pre_diagnoses->provisional_diagnosis }}">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label" for="exampleFormControlTextarea1">الأعراض | Symptoms :</label>
                                                        <textarea class="form-control" name="symptoms" id="exampleFormControlTextarea1" rows="3" required >{{ $tik->pre_diagnoses->symptoms }}</textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mb-30">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="exampleFormControlTextarea1">الفحوصات | Examinations :</label>
                                                        <textarea class="form-control" name="examinations" id="exampleFormControlTextarea1" rows="3" style="height: 194px;" required>{{ $tik->pre_diagnoses->examinations }}</textarea>
                                                    </div>
                                                </div>
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
                        <!-- نهاية تعديل التشخيص الإبتدائي -->
                    @else
                        <h4><span class="badge badge-danger">المريض تحت التشخيص</span></h4>
                    @endif
                    {{-- ==================================================================================================================================================================================================== --}}
                    @if (!empty($tik->patientsfinaldata->id))
                        <!-- بداية تعديل التشخيص النهائي -->
                            <div class="modal fade bd-example-modal-lg" id="edit_two{{ $tik->patientsfinaldata->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                id="exampleModalLabel">
                                                تعديل التشخيص النهائي
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- edit_form -->
                                            <form action="{{ route('final_data.update',$tik->patientsfinaldata->id) }}" method="POST">
                                                {{ method_field('patch') }}
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $tik->patientsfinaldata->id }}">
                                                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title">إسم الريض : {{ $tik->name }}</h5>
                                                <br>
                                                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title">رقم التذكره : {{ $tik->ticket_num }}</h5>
                                                <br>
                                                <div class="row">
                                                    <div class="col-md-6 mb-30">
                                                        <div class="mb-3">
                                                            <label class="form-label" for="exampleInputEmail1">التشخيص النهائي | Final Diagnosis :</label>
                                                            <input id="name" type="فثءف" name="final_diagnosis" class="form-control" autocomplete="off" value="{{ $tik->patientsfinaldata->final_diagnosis }}">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label" for="exampleFormControlSelect1">العنبر :</label>
                                                            <select class="form-control" name="ward_id" id="exampleFormControlSelect1" style="height: 50px;">
                                                                @foreach ($wards as $ward)
                                                                    <option value="{{ $ward->id }}" {{ $tik->patientsfinaldata->ward_id == $ward->id ? 'selected' :'' }}>{{ $ward->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label" for="exampleFormControlSelect1">القسم :</label>
                                                            <select class="form-control" name="section_id" id="exampleFormControlSelect1" style="height: 50px;">
                                                                @foreach ($sections as $section)
                                                                    <option value="{{ $section->id }}" {{ $tik->patientsfinaldata->section_id == $section->id ? 'selected' :'' }}>{{ $section->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 mb-30">
                                                        <div class="mb-3">
                                                            <label class="form-label" for="exampleFormControlSelect1">نوع الإقامه :</label>
                                                            <select class="form-control" name="residence_type" id="exampleFormControlSelect1" style="height: 50px;">
                                                                <option value="1" {{ $tik->patientsfinaldata->residence_type == 1 ? 'selected' : '' }}>لا يوجد</option>
                                                                <option value="2" {{ $tik->patientsfinaldata->residence_type == 2 ? 'selected' : '' }}>إقامه طويله</option>
                                                                <option value="3" {{ $tik->patientsfinaldata->residence_type == 3 ? 'selected' : '' }}>إقامه قصيره</option>
                                                            </select>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label" for="exampleInputEmail1">تاريخ المقابله :</label>
                                                            <div class="input-group" data-date="23/11/2018" data-date-format="mm/dd/yyyy">
                                                                <input type="text" name="follow_up_date" class="form-control range-to"   data-date-format="mm/dd/yyyy" value="{{ $tik->patientsfinaldata->follow_up_date == NULL ? 'لا يوجد تاريخ مقابله' : $tik->patientsfinaldata->follow_up_date }}">
                                                            </div>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label" for="exampleFormControlTextarea1">العلاج و التغذيه | Treatment & Diet</label>
                                                            <textarea class="form-control" name="treatment_diet" id="exampleFormControlTextarea1" style="height: 50px;">{{ $tik->patientsfinaldata->treatment_diet }}</textarea>
                                                        </div>
                                                    </div>
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
                            <!-- نهاية تعديل التشخيص النهائي -->
                    @else
                        <h4><span class="badge badge-danger">المريض تحت الفحص</span></h4>
                    @endif
                @endforeach
              </tbody>
              <tfoot>
              <tr>
                    <th>#</th>
                    <th>الإسم</th>
                    <th>رقم التذكره</th>
                    <th>التشخيص الإبتدائي</th>
                    <th>التشخيص النهائي</th>
                    <th>الإقامه</th>
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
