@extends('layouts.master')
@section('css')
    @toastr_css
    @livewireStyles
@section('title')
قائمة التنويم
@stop
@endsection
@section('page-header')
@section('content')
{{-- start content --}}
<div class="row">
    <div class="col-sm-6">
        <h4 class="mb-0">قائمة التنويم</h4>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
            <li class="breadcrumb-item"><a href="#" class="default-color">العمليات و التنويم</a></li>
            <li class="breadcrumb-item active">قائمة التنويم</li>
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
            <button type="button" class="button x-small" data-toggle="modal" data-target="#exampleModal">
                إضافة مريض
            </button>
            <br><br>
            <table id="datatable" class="table-bordered border table table-striped dataTable p-0 text-center">
              <thead>
                <tr>
                  <th>#</th>
                  <th>اسم المريض</th>
                  <th>العمر</th>
                  <th>رقم التذكره</th>
                  <th>حالة المريض</th>
                  <th>المقاييس الحيويه</th>
                  <th>تعديل المقاييس الحيويه</th>
                  <th>زمن أول قياس</th>
                  <th>زمن آخر قياس</th>
                  <th>العمليات</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($Intensives as $intensive)
                    <tr>
                    <td>{{ $intensive->id }}</td>
                    <td>{{ $intensive->tickets->name }}</td>
                    <td>{{ $intensive->tickets->age }}</td>
                    <td>{{ $intensive->teckit_num }}</td>
                    <td>
                        @if($intensive->patient_status == 1)
                            فشل حاد في الجهاز التنفسي
                        @elseif ($intensive->patient_status == 2)
                            قصور حاد في القلب
                        @elseif ($intensive->patient_status == 3)
                            قصور كلوي حاد
                        @elseif ($intensive->patient_status == 4)
                            الشلل المفاجئ
                        @elseif ($intensive->patient_status == 5)
                            إلتهاب حاد (تعفن الدم)
                        @elseif ($intensive->patient_status == 6)
                            التسمم
                        @elseif ($intensive->patient_status == 7)
                            صدمه شامله في الجسم
                        @elseif ($intensive->patient_status == 8)
                            قصور حاد في الجهاز العصبي
                        @elseif ($intensive->patient_status == 9)
                            متابعه بعد العمليه الجراحيه
                        @elseif ($intensive->patient_status == 10)
                            متابعه بعد زراعة أعضاء
                        @elseif ($intensive->patient_status == 11)
                            خلل الوضع المرتبط بالشيخوخه
                        @else
                            الفشل النتظم المرتبط نموه لاأمراض الخبيثه
                        @endif
                    </td>
                    <td>
                        @if (empty($intensive->bio->id))
                            <button class="badge bg-danger" data-toggle="modal" data-target="#biometrics{{ $intensive->id }}">
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
                        @if (empty($intensive->bio->id))
                        <button class="badge bg-info" data-toggle="modal" data-target="#edit_biometrics{{ $intensive->id }}" style="display: none;">
                            <label style="margin-top: 5px; font-size:15px; color:white;">
                                تحديث
                            </label>
                        </button>
                        @else
                            <button class="badge bg-info" data-toggle="modal" data-target="#edit_biometrics{{ $intensive->id }}">
                                <label style="margin-top: 5px; font-size:15px; color:white;">
                                    تحديث
                                </label>
                            </button>
                        @endif
                    </td>
                    <td>
                        @if (!empty($intensive->bio->created_at))
                        {{ $intensive->bio->created_at }}
                        @else
                        لم يتم أخذ المقاييس الحيويه
                        @endif
                    </td>
                    <td>
                        @if (empty($intensive->bio->updated_at))
                            لم يتم أخذ المقاييس الحيويه
                        @else
                            {{ $intensive->bio->updated_at }}
                        @endif
                    </td>
                    <td>
                        <div class="dropdown">
                            <button aria-expanded="false" aria-haspopup="true"
                                class="btn ripple btn-info btn-sm" data-toggle="dropdown"
                                type="button">العمليات<i class="fa fa-caret-down ml-1"></i></button>
                            <div class="dropdown-menu tx-13">

                                <button class="dropdown-item" data-reg_id="" data-toggle="modal" data-target="#edit{{$intensive->id}}" ><i
                                    class="text-info fa fa-edit"></i>
                                    تعديل
                                </button>
                                <button class="dropdown-item" data-reg_id="" data-toggle="modal" data-target="#delete{{ $intensive->id }}" >
                                    <i class="text-danger fa fa-trash"></i>
                                    حذف
                                </button>
                            </div>
                        </div>
                    </td>
                    </tr>
                                <!-- start_edit_modal_biometrics -->
                                <div class="modal fade bd-example-modal-lg" id="edit_biometrics{{ $intensive->id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                id="exampleModalLabel">
                                                تحديث المقاييس الحيويه للمريض : {{ $intensive->tickets->name }}  ||  رقم التذكره : {{ $intensive->teckit_num }}
                                                <br>
                                                زمن آخر قياس : {{ empty($intensive->bio->updated_at) ? '' : $intensive->bio->updated_at }}
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                            aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- edit_form -->
                                        <form action="{{ route('biometrics.update',$intensive->id) }}" method="POST">
                                            {{ method_field('patch') }}
                                            @csrf
                                    <div class="row setup-content" id="step-2">
                                        <br>
                                        <div class="container">
                                            <div class="container">
                                                <div class="form-row">
                                                    <div class="col">
                                                        <input type="hidden" name="intensive_id" value="{{ $intensive->id }}">
                                                        <label class="form-label" for="exampleInputEmail1">النبض | Pulse :</label>
                                                        <input type="number" name="Pulse" value="{{ empty($intensive->bio->Pulse) ? '' : $intensive->bio->Pulse }}" class="form-control">
                                                    </div>
                                                    <div class="col">
                                                        <label class="form-label" for="exampleInputEmail1">الزمن :</label>
                                                        <input  type="time" name="Pulse_time" value="{{ empty($intensive->bio->Pulse_time) ? '' : $intensive->bio->Pulse_time }}" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="col">
                                                        <label class="form-label" for="exampleInputEmail1">معدل التنفس | RR :</label>
                                                        <input  type="number" name="RR" value="{{ empty($intensive->bio->RR) ? '' : $intensive->bio->RR }}" class="form-control">
                                                    </div>
                                                    <div class="col">
                                                        <label class="form-label" for="exampleInputEmail1">الزمن :</label>
                                                        <input  type="time" name="RR_time" value="{{ empty($intensive->bio->RR_time) ? '' : $intensive->bio->RR_time }}" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="col">
                                                        <label class="form-label">الضغط | BP :</label>
                                                        <input  type="number" name="BP" value="{{ empty($intensive->bio->BP) ? '' : $intensive->bio->BP }}" class="form-control">
                                                    </div>
                                                    <div class="col">
                                                        <label class="form-label" >الزمن :</label>
                                                        <input  type="time" name="BP_time" value="{{ empty($intensive->bio->BP_time) ? '' : $intensive->bio->BP_time }}" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="col">
                                                        <label class="form-label" >درجة الحراره | Temp :</label>
                                                        <input  type="number"  name="Temp" value="{{ empty($intensive->bio->Temp) ? '' : $intensive->bio->Temp }}" class="form-control">
                                                    </div>
                                                    <div class="col">
                                                        <label class="form-label" >الزمن :</label>
                                                        <input  type="time"  name="Temp_time" value="{{ empty($intensive->bio->Temp_time) ? '' : $intensive->bio->Temp_time }}" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="col">
                                                        <label class="form-label" >البطن | ABD :</label>
                                                        <input  type="number"  name="ABD" value="{{ empty($intensive->bio->ABD) ? '' : $intensive->bio->ABD }}" class="form-control">
                                                    </div>
                                                    <div class="col">
                                                        <label class="form-label" >الزمن :</label>
                                                        <input  type="time"  name="ABD_time" value="{{ empty($intensive->bio->ABD_time) ? '' :$intensive->bio->ABD_time }}" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="col">
                                                        <label class="form-label" >النزيف المهبلي | V.Bleeding :</label>
                                                        <input  type="number" name="V_Bleeding" value="{{ empty($intensive->bio->V_Bleeding) ? '' :$intensive->bio->V_Bleeding }}" class="form-control">
                                                    </div>
                                                    <div class="col">
                                                        <label class="form-label" >الزمن :</label>
                                                        <input  type="time" name="V_Bleeding_time" value="{{ empty($intensive->bio->V_Bleeding_time) ? '' : $intensive->bio->V_Bleeding_time }}" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="col">
                                                        <label class="form-label" >كمية البول الخارجه | U.O.P :</label>
                                                        <input  type="number" name="U_O_P" value="{{ empty($intensive->bio->U_O_P) ? '' : $intensive->bio->U_O_P }}" class="form-control">
                                                    </div>
                                                    <div class="col">
                                                        <label class="form-label" >الزمن :</label>
                                                        <input  type="time" name="U_O_P_time" value="{{ empty($intensive->bio->U_O_P_time) ? '' : $intensive->bio->U_O_P_time }}" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="col">
                                                        <label class="form-label" >السكر | suger :</label>
                                                        <input  type="number"  name="suger" value="{{ empty($intensive->bio->suger) ? '' : $intensive->bio->suger }}" class="form-control">
                                                    </div>
                                                    <div class="col">
                                                        <label class="form-label" >الزمن :</label>
                                                        <input  type="time"  name="suger_time" value="{{ empty($intensive->bio->suger_time) ? '' : $intensive->bio->suger_time }}" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="col">
                                                        <label class="form-label" >الأوكسجين | So2</label>
                                                        <input  type="number"  name="So2" value="{{ empty($intensive->bio->So2) ? '' : $intensive->bio->So2 }}" class="form-control">
                                                    </div>
                                                    <div class="col">
                                                        <label class="form-label" >الزمن :</label>
                                                        <input  type="time"  name="So2_time" value="{{ empty($intensive->bio->So2_time) ? '' : $intensive->bio->So2_time }}" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="col">
                                                        <label class="form-label" >معدل الألم | Pain score :</label>
                                                        <select name="Pain_score" class="form-control"  required style="height: 50px;">
                                                            <option selected disabled>--اختر المعدل--</option>
                                                            <option value="1" {{ !empty($intensive->bio->Pain_score) == 1 ? 'selected' : '' }}>1</option>
                                                            <option value="2" {{ !empty($intensive->bio->Pain_score) == 2 ? 'selected' : '' }}>2</option>
                                                            <option value="3" {{ !empty($intensive->bio->Pain_score) == 3 ? 'selected' : '' }}>3</option>
                                                            <option value="4" {{ !empty($intensive->bio->Pain_score) == 4 ? 'selected' : '' }}>4</option>
                                                            <option value="5" {{ !empty($intensive->bio->Pain_score) == 5 ? 'selected' : '' }}>5</option>
                                                            <option value="6" {{ !empty($intensive->bio->Pain_score) == 6 ? 'selected' : '' }}>6</option>
                                                            <option value="7" {{ !empty($intensive->bio->Pain_score) == 7 ? 'selected' : '' }}>7</option>
                                                            <option value="8" {{ !empty($intensive->bio->Pain_score) == 8 ? 'selected' : '' }}>8</option>
                                                            <option value="9" {{ !empty($intensive->bio->Pain_score) == 9 ? 'selected' : '' }}>9</option>
                                                            <option value="10"{{ !empty($intensive->bio->Pain_score) == 10 ? 'selected' : '' }}>10</option>
                                                        </select>
                                                    </div>
                                                    <div class="col">
                                                        <label class="form-label" >الزمن :</label>
                                                        <input  type="time"  name="Pain_score_time" value="{{ empty($intensive->bio->Pain_score_time) ? '' : $intensive->bio->Pain_score_time}}" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"data-dismiss="modal">اغلاق</button>
                                            <button type="submit" class="btn btn-success">تحديث</button>
                                        </div>
                                    </form>
                                        </div>
                                    </div>
                                    </div>
                                    <!-- end_edit_modal_intensive -->
                        <!-- start_add_modal_biometrics -->
                        <div class="modal fade bd-example-modal-lg" id="biometrics{{ $intensive->id }}" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                    id="exampleModalLabel">
                                    إضافة المقاييس الحيويه للمريض : {{ $intensive->tickets->name }}  ||  رقم التذكره : {{ $intensive->teckit_num }}
                                </h5>
                                <button type="button" class="close" data-dismiss="modal"
                                aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <!-- edit_form -->
                            <form action="{{ route('biometrics.store') }}" method="POST">
                                @csrf
                        <div class="row setup-content" id="step-2">
                            <br>
                            <div class="container">
                                <div class="container">
                                    <div class="form-row">
                                        <div class="col">
                                            <input type="hidden" name="intensive_id" value="{{ $intensive->id }}">
                                            <label class="form-label" for="exampleInputEmail1">*النبض | Pulse :</label>
                                            <input type="number" name="Pulse" class="form-control">
                                        </div>
                                        <div class="col">
                                            <label class="form-label" for="exampleInputEmail1">الزمن :</label>
                                            <input  type="time" name="Pulse_time" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col">
                                            <label class="form-label" for="exampleInputEmail1">*معدل التنفس | RR :</label>
                                            <input  type="number" name="RR" class="form-control">
                                        </div>
                                        <div class="col">
                                            <label class="form-label" for="exampleInputEmail1">الزمن :</label>
                                            <input  type="time" name="RR_time" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col">
                                            <label class="form-label">الضغط | BP :</label>
                                            <input  type="number" name="BP" class="form-control">
                                        </div>
                                        <div class="col">
                                            <label class="form-label" >الزمن :</label>
                                            <input  type="time" name="BP_time" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col">
                                            <label class="form-label" >*درجة الحراره | Temp :</label>
                                            <input  type="number"  name="Temp" class="form-control">
                                        </div>
                                        <div class="col">
                                            <label class="form-label" >الزمن :</label>
                                            <input  type="time"  name="Temp_time" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col">
                                            <label class="form-label" >البطن | ABD :</label>
                                            <input  type="number"  name="ABD" class="form-control">
                                        </div>
                                        <div class="col">
                                            <label class="form-label" >الزمن :</label>
                                            <input  type="time"  name="ABD_time" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col">
                                            <label class="form-label" >النزيف المهبلي | V.Bleeding :</label>
                                            <input  type="number" name="V_Bleeding" class="form-control">
                                        </div>
                                        <div class="col">
                                            <label class="form-label" >الزمن :</label>
                                            <input  type="time" name="V_Bleeding_time" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col">
                                            <label class="form-label" >كمية البول الخارجه | U.O.P :</label>
                                            <input  type="number" name="U_O_P" class="form-control">
                                        </div>
                                        <div class="col">
                                            <label class="form-label" >الزمن :</label>
                                            <input  type="time" name="U_O_P_time" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col">
                                            <label class="form-label" >*السكر | suger :</label>
                                            <input  type="number"  name="suger" class="form-control">
                                        </div>
                                        <div class="col">
                                            <label class="form-label" >الزمن :</label>
                                            <input  type="time"  name="suger_time" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col">
                                            <label class="form-label" >*الأوكسجين | So2</label>
                                            <input  type="number"  name="So2" class="form-control">
                                        </div>
                                        <div class="col">
                                            <label class="form-label" >الزمن :</label>
                                            <input  type="time"  name="So2_time" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col">
                                            <label class="form-label" >*معدل الألم | Pain score :</label>
                                            <select name="Pain_score" class="form-control"  required style="height: 50px;">
                                                <option selected disabled>--اختر المعدل--</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                                <option value="10">10</option>
                                            </select>
                                        </div>
                                        <div class="col">
                                            <label class="form-label" >الزمن :</label>
                                            <input  type="time"  name="Pain_score_time" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary"data-dismiss="modal">اغلاق</button>
                                <button type="submit" class="btn btn-success">إضافه</button>
                            </div>
                        </form>
                            </div>
                        </div>
                        </div>
                        <!-- end_add_modal_intensive -->
                        <!-- start_edit_modal_intensive -->
                        <div class="modal fade bd-example-modal-lg" id="edit{{$intensive->id}}" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                    id="exampleModalLabel">
                                    تعديل المريض : {{  $intensive->tickets->name }}  || رقم التذكره : {{ $intensive->teckit_num }}
                                </h5>
                                <button type="button" class="close" data-dismiss="modal"
                                aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <!-- edit_form -->
                            <form action="{{ route('intensive_care.update',$intensive->id) }}" method="POST">
                                {{ method_field('patch') }}
                                @csrf
                                <label class="form-label" for="exampleInputEmail1"> تحديد حالة المريض:</label>
                                <select name="patient_status" class="form-control"  required style="height: 50px;">
                                    <option selected disabled>--اختر حالة المريض--</option>
                                    <option value="1" {{ $intensive->patient_status == 1 ? 'selected' : '' }}>فشل حاد في الجهاز التنفسي</option>
                                    <option value="2" {{ $intensive->patient_status == 2 ? 'selected' : '' }}>قصور حاد في القلب</option>
                                    <option value="3" {{ $intensive->patient_status == 3 ? 'selected' : '' }}>قصور كلوي حاد</option>
                                    <option value="4" {{ $intensive->patient_status == 4 ? 'selected' : '' }}>الشلل المفاجئ</option>
                                    <option value="5" {{ $intensive->patient_status == 5 ? 'selected' : '' }}>إلتهاب حاد (تعفن الدم)</option>
                                    <option value="6" {{ $intensive->patient_status == 6 ? 'selected' : '' }}>التسمم</option>
                                    <option value="7" {{ $intensive->patient_status == 7 ? 'selected' : '' }}>صدمه شامله في الجسم</option>
                                    <option value="8" {{ $intensive->patient_status == 8 ? 'selected' : '' }}>قصور حاد في الجهاز العصبي</option>
                                    <option value="9" {{ $intensive->patient_status == 9 ? 'selected' : '' }}>متابعه بعد العمليه الجراحيه</option>
                                    <option value="10" {{ $intensive->patient_status == 10 ? 'selected' : '' }}>متابعه بعد زراعة أعضاء</option>
                                    <option value="11" {{ $intensive->patient_status == 11 ? 'selected' : '' }}>خلل الوضع المرتبط بالشيخوخه</option>
                                    <option value="12" {{ $intensive->patient_status == 12 ? 'selected' : '' }}>الفشل المنتظم المرتبط نموه بالأمراض الخبيثه</option>
                                </select>
                                <br><br><br><br><br><br>
                                <br><br><br><br><br><br><br><br>
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
                <!-- delete_modal_intensive -->
                <div class="modal fade" id="delete{{ $intensive->id }}" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                    id="exampleModalLabel">
                                    حذف المريض من قائمة التنويم
                                </h5>
                                <button type="button" class="close" data-dismiss="modal"
                                    aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('intensive_care.destroy',$intensive->id) }}" method="post">
                                    {{ method_field('Delete') }}
                                    @csrf
                                    هل تريد الحذف؟
                                    <label id="Name" type="text" name="Name" class="form-control">{{  $intensive->tickets->name }}  || رقم التذكره : {{ $intensive->teckit_num }}</label>

                                    <input id="id" type="hidden" name="id" class="form-control" value="{{ $intensive->id }}">
                                    <input type="hidden" name="id_page" id="id_page" value="1">
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
                <!-- end_delete_modal_intensive -->
                @endforeach
              </tbody>
              <tfoot>
              <tr>
                <th>#</th>
                <th>اسم المريض</th>
                <th>العمر</th>
                <th>رقم التذكره</th>
                <th>حالة المريض</th>
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
                <!-- start_add_modal_intensive -->
                <div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                            id="exampleModalLabel">
                            إضافة مريض للتنويم
                        </h5>
                        <button type="button" class="close" data-dismiss="modal"
                        aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- edit_form -->
                    <form action="{{ route('intensive_care.store') }}" method="POST">
                        @csrf
                        @livewire('intensive')
                        <label class="form-label" for="exampleInputEmail1"> تحديد حالة المريض:</label>
                        <select name="patient_status" class="form-control"  required style="height: 50px;">
                            <option selected disabled>--اختر حالة المريض--</option>
                            <option value="1">فشل حاد في الجهاز التنفسي</option>
                            <option value="2">قصور حاد في القلب</option>
                            <option value="3">قصور كلوي حاد</option>
                            <option value="4">الشلل المفاجئ</option>
                            <option value="5">إلتهاب حاد (تعفن الدم)</option>
                            <option value="6">التسمم</option>
                            <option value="7">صدمه شامله في الجسم</option>
                            <option value="8">قصور حاد في الجهاز العصبي</option>
                            <option value="9">متابعه بعد العمليه الجراحيه</option>
                            <option value="10">متابعه بعد زراعة أعضاء</option>
                            <option value="11">خلل الوضع المرتبط بالشيخوخه</option>
                            <option value="12">الفشل المنتظم المرتبط نموه بالأمراض الخبيثه</option>
                        </select>
                        <br><br><br><br><br><br>
                        <br><br><br><br><br><br><br><br>
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
        <!-- end_add_modal_intensive -->
        <!-- delete_modal_doctor -->
        <div class="modal fade" id="delete" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                            id="exampleModalLabel">
                            حذف القسم
                        </h5>
                        <button type="button" class="close" data-dismiss="modal"
                            aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="" method="post">
                            {{ method_field('Delete') }}
                            @csrf
                            هل تريد الحذف؟
                            <label id="Name" type="text" name="Name" class="form-control"></label>

                            <input id="id" type="hidden" name="id" class="form-control"
                                value="">
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
  </div>
{{-- end content --}}
@endsection
@section('js')
@toastr_js
@toastr_render
@livewireScripts

@endsection
