@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
تعديل بيانات مولود
@stop
@endsection
@section('page-header')
@section('content')
{{-- start content --}}
<div class="row">
    <div class="col-sm-6">
        <h4 class="mb-0">تعديل وثيقة إخبار ولادة</h4>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
            <li class="breadcrumb-item"><a href="#" class="default-color">إدارة المواليد و الوفيات</a></li>
            <li class="breadcrumb-item active">تعديل وثيقة إخبار ولاده</li>
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
                <h5 class="card-title">وثيقة إخبار ولادة</h5>
            </center>
            <form action="{{ route('birth.update',$birth->id) }}" method="POST">
                {{ method_field('patch') }}
                    @csrf
                <h5>- بيانات المولود :</h5>
                <br><br>
                <div class="mb-3">
                    <label class="form-label" for="exampleInputEmail1">إسم المولود :</label>
                    <input type="text" class="form-control" value="{{ $birth->newBornName }}" name="newBornName" autocomplete="off"  style="width: 49%;">
                  </div>
                <div class="row">
                    <div class="col-md-6 mb-30">
                          <div class="mb-3">
                              <label class="form-label" for="exampleInputEmail1">إسم الأم :</label>
                              <input type="text" class="form-control" value="{{ $birth->nameMother }}" name="nameMother" autocomplete="off" placeholder="أدخل اسم الأم رباعي">
                            </div>
                            <div class="mb-3">
                              <label class="form-label" for="exampleInputEmail1">إسم الأب :</label>
                              <input type="text" class="form-control" value="{{ $birth->namefather }}" name="namefather" autocomplete="off" placeholder="أدخل إسم الأب رباعي">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="exampleInputEmail1">مكان الإقامة :</label>
                                <input type="text" class="form-control" value="{{ $birth->residencePlace }}" name="residencePlace" autocomplete="off">
                            </div>
                    </div>
                    <div class="col-md-6 mb-30">
                          <div class="mb-3">
                            <label class="form-label" for="exampleInputEmail1"> الرقم الوطني للأم :</label>
                            <input type="number" class="form-control" value="{{ $birth->motherIdentity }}" name="motherIdentity" autocomplete="off">
                          </div>
                          <div class="mb-3">
                            <label class="form-label" for="exampleInputEmail1"> الرقم الوطني للأب :</label>
                            <input type="number" class="form-control" value="{{ $birth->fatherIdentity }}" name="fatherIdentity" autocomplete="off">
                          </div>
                          <div class="mb-3">
                            <label class="form-label" for="exampleInputEmail1">الجنس:</label>
                            <select name="gender" class="form-control"  required style="height: 50px;">
                                <option disabled>--اختر الجنس--</option>
                                <option value="1">ذكر</option>
                                <option value="0" {{ $birth->gender == 0 ? 'selected' : '' }}>أنثى</option>
                            </select>
                        </div>
                    </div>
                </div>
                <h5>- واقعة الميلاد :</h5>
                <br><br>
                <div class="row">
                    <div class="col-md-6 mb-30">
                          <div class="mb-3">
                              <label class="form-label" for="exampleInputEmail1">تاريخ الميلاد بالأحرف :</label>
                              <input type="text" class="form-control" value="{{ $birth->birthDataChar }}" name="birthDataChar" autocomplete="off">
                            </div>
                            <div class="mb-3">
                                <div class="control-group" id="toastTypeGroup">
                                  <div class="controls">
                                    <label class="d-block mb-2">مكان الولادة :</label>
                                    <label class="radio mb-2">
                                      <input type="radio" name="birthPlace" value="1" {{ $birth->birthPlace == 1 ? 'checked' : '' }}/>داخل المؤسسه الصحيه
                                    </label>
                                    <label class="radio mb-2">
                                      <input type="radio" name="birthPlace" value="2" {{ $birth->birthPlace == 2 ? 'checked' : '' }}/>خارج المؤسسه الصحيه
                                    </label>
                                  </div>
                                </div>
                              </div>
                    </div>
                    <div class="col-md-6 mb-30">
                        <div class="mb-3">
                            <label class="form-label" for="exampleInputEmail1">تاريخ الميلاد بالأرقام :</label>
                            <div class="input-group" data-date="23/11/2018" data-date-format="mm/dd/yyyy">
                                <input type="text" class="form-control range-to" value="{{ $birth->birthDataNum }}" name="birthDataNum"  data-date-format="mm/dd/yyyy">
                            </div>
                          </div>
                    </div>
                </div>
                <h5>- بيانات المبلغ :</h5>
                <br><br>
                <div class="row">
                    <div class="col-md-6 mb-30">
                        <div class="mb-3">
                            <label class="form-label" for="exampleInputEmail1">الإسم :</label>
                            <input type="text" class="form-control" value="{{ $birth->informerNmae }}" name="informerNmae" autocomplete="off">
                        </div>
                    </div>
                    <div class="col-md-6 mb-30">
                        <div class="mb-3">
                            <label class="form-label" for="exampleInputEmail1">الرقم الوطني :</label>
                            <input type="number" class="form-control" value="{{ $birth->informerIdentity }}" name="informerIdentity" autocomplete="off">
                          </div>
                    </div>
                </div>
                <h5>- محرر الوثيقة :</h5>
                <br><br>
                <div class="row">
                    <div class="col-md-6 mb-30">
                        <div class="mb-3">
                            <label class="form-label" for="exampleInputEmail1">الإسم :</label>
                            <input type="text" class="form-control" value="{{ $birth->documentEditorName }}" name="documentEditorName" autocomplete="off">
                        </div>
                    </div>
                    <div class="col-md-6 mb-30">
                        <div class="mb-3">
                            <label class="form-label" for="exampleInputEmail1">الرقم الوطني :</label>
                            <input type="number" class="form-control" value="{{ $birth->documentEditorIdentity }}" name="documentEditorIdentity" autocomplete="off">
                        </div>
                    </div>
                </div>
                <center>
                    <button type="submit" class="btn btn-success">تحديث</button>
                </center>
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
@endsection
