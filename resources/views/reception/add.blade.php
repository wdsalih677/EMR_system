@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
أضافة تذكره
@stop
@endsection
@section('page-header')
@section('content')
{{-- start content --}}
<div class="row">
    <div class="col-sm-6">
        <h4 class="mb-0">أضافة تذكره</h4>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
            <li class="breadcrumb-item"><a href="#" class="default-color">الإستقبال</a></li>
            <li class="breadcrumb-item active">أضافة بيانات المريض الأوليه</li>
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
                    <h5 class="card-title">إضافة تذكره</h5>
                </center>
                <form action="{{ route('reception.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 mb-30">
                            <div class="mb-3">
                                <label class="form-label" for="exampleInputEmail1">اسم:</label>
                                <input type="text" class="form-control" name="name" aria-describedby="emailHelp" autocomplete="off" required placeholder="يجب إدخال اسم المريض رباعي">
                            </div>
                            <div class="mb-3">
                                  <label class="form-label" for="exampleInputEmail1">الرقم الوطني :</label>
                                  <input type="number" class="form-control" name="identity_num" aria-describedby="emailHelp" autocomplete="off" required placeholder="أدخل الرقم الوطني">
                            </div>
                            <div class="mb-3">
                                  <label class="form-label" for="exampleInputEmail1">العنوان:</label>
                                  <input type="text" class="form-control" name="address" aria-describedby="emailHelp" autocomplete="off" required placeholder="أدخل عنوان المريض">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="exampleInputEmail1">الجنس:</label>
                                <select name="gender" class="form-control"  required style="height: 50px;">
                                    <option selected disabled>--اختر الجنس--</option>
                                    <option value="1">ذكر</option>
                                    <option value="0">أنثى</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 mb-30">
                            <div class="mb-3">
                                <label class="form-label" for="exampleInputEmail1">العمر :</label>
                                <input type="number" class="form-control" name="age" aria-describedby="emailHelp" autocomplete="off" required placeholder="أدخل عمر المريض">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="exampleInputEmail1">نوع العمر :</label>
                                <select name="age_type" class="form-control" required style="height: 50px;">
                                    <option selected disabled>--سنه - شهر  يوم--</option>
                                    <option value="1">سنه</option>
                                    <option value="2">شهر</option>
                                    <option value="3">يوم</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="exampleInputEmail1">المهنه :</label>
                                <input type="text" class="form-control" name="job" aria-describedby="emailHelp" autocomplete="off" required placeholder="أدخل مهنة المريض">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="exampleInputEmail1">تاريخ الدخول  :</label>
                                <div class="input-group" data-date="23/11/2018" data-date-format="mm/dd/yyyy">
                                    <input type="text" class="form-control range-to" name="date_entry"  data-date-format="mm/dd/yyyy" required placeholder="يجب تحديد تاريخ الدخول">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="exampleInputEmail1"> رقم الهاتف  :</label>
                                <input type="number" class="form-control" name="phone_num" aria-describedby="emailHelp" autocomplete="off" required placeholder="أدخل رقم هاتف المريض بدون صفر البدابه">
                            </div>
                        </div>
                    </div>
                </div>
                <center>
                    <button type="submit" class="btn btn-success">إنشاء</button>
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

<script>
 $(document).ready(function ()
        {
            $('input[name="date_entry"]').on('change', function ()
                {
                    var today = new Date();
                    var dd = String(today.getDate()).padStart(2, '0');
                    var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
                    var yyyy = today.getFullYear();
                    today = mm + '/' + dd + '/' + yyyy;
                    var from = $('input[name="date_entry"]').val();
                    if(Date.parse(from) < Date.parse(today) || Date.parse(from) > Date.parse(today))
                    {
                        alert("لا يمكن لتاريخ البداية ان يكون اقل او اكبر من تاريخ اليوم");
                        $('input[name="date_entry"]').css({"color":"#555","border":"1px solid red","box-shadow": "red 2px 2px 16px"});
                        $('button[type="submit"]').attr("disabled", true);
                        $('button[type="submit"]').css({"cursor": "no-drop"});
                        $('input[name="end_at"]').val('');
                    }
                    else
                    {
                        $('input[name="date_entry"]').css({"color":"#555","border":"1px solid green","box-shadow": "green 2px 2px 16px"});
                        $('button[type="submit"]').attr("disabled", false);
                        $('button[type="submit"]').css({"cursor": "pointer"});
                        $('button[type="submit"]').css({"display": "inline"});
                    }
                }
            );
        }
    );
</script>
@endsection
