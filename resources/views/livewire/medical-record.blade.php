<div>
    {{-- In work, do what you enjoy. --}}
    <div class="mb-3">
        <input type="hidden" wire-model="id" name="teckit_id" value="{{$teckit_id}}">
        <label class="form-label" for="exampleInputEmail1">رقم الذكره :</label>
        <input id="search" type="text" wire:model="searchTicket" wire:keyup="getdata" class="form-control" style="width: 49%;" required autocomplete="off" placeholder="أدخل رقم التزكره">
    </div>
    <div class="row">
        <div class="col-md-6 mb-30">
            <div class="mb-3">
                <label class="form-label" for="exampleInputEmail1">اسم :</label>
                <input type="text"class="form-control" wire-model="name" value="{{$name}}" required disabled>
            </div>
            <div class="mb-3">
                <label class="form-label" for="exampleInputEmail1">التشخيص النهائي | Final Diagnosis :</label>
                <input type="text" wire:model="final_diagnosis" value="{{$final_diagnosis}}"  class="form-control" disabled>
            </div>
            <div class="mb-3">
                <label class="form-label" for="exampleFormControlTextarea1">نتائج الفحوصات | Investigations Results</label>
                <textarea class="form-control"  rows="3" style="height: 222px;"   wire-model="test_results" placeholder="يجب إدخال رقم التذكره لعرض نتائج الفحوصات" disabled required>{{$test_results}}</textarea>
            </div>
        </div>
        <div class="col-md-6 mb-30">
            <div class="mb-3">
                <label class="form-label" for="exampleInputEmail1">العمر :</label>
                <input type="text" class="form-control" wire-model="age" value="{{$age}}" required  disabled>
            </div>
            <div class="mb-3">
                <label class="form-label" for="exampleInputEmail1">التاريخ الدخول</label>
                <input class="form-control" wire-model="date_entry" value="{{$date_entry}}" disabled>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1">العلاج و التغذيه | Treatment & Diet :</label>
                <textarea class="form-control" wire:model="treatment_diet" value="{{$treatment_diet}}" disabled id="exampleFormControlTextarea1" rows="4" style="height: 220px;"></textarea>
            </div>
        </div>
    </div>
    <br><br><br>
    <center>
        <h5 class="card-title">بيانات العمليه</h5>
    </center>
    <div class="row">
        <div class="col-md-6 mb-30">
            <div class="mb-3">
                <label class="form-label" for="exampleInputEmail1">اسم :</label>
                <input type="text"class="form-control" wire-model="name" value="{{$name}}" required disabled>
            </div>
            <div class="mb-3">
                <label class="form-label" for="exampleInputEmail1">إسم العمليه | Operation name :</label>
                <input type="text" class="form-control" wire-model="operationName" value="{{$operationName}}" disabled>
            </div>
            <div class="mb-3">
                <label class="form-label" for="exampleInputEmail1">نوع التخدير | Ansesthesia :</label>
                <input type="text" class="form-control" wire-model="Ansesthesia" value="{{$Ansesthesia}}" disabled>
            </div>
        </div>
        <div class="col-md-6 mb-30">
            <div class="mb-3">
                <label class="form-label" for="exampleInputEmail1">العمر :</label>
                <input type="text" class="form-control" wire-model="age" value="{{$age}}" required  disabled>
            </div>
            <div class="mb-3">
                <label class="form-label" for="exampleInputEmail1">التاريخ الدخول</label>
                <input class="form-control" wire-model="date_entry" value="{{$date_entry}}" disabled>
            </div>
        </div>
    </div>
    <div class="mb-3">
        <label class="form-label" for="exampleFormControlTextarea1">إجراءات العمليه | Operation Procedures :</label>
        <textarea class="form-control" wire-model="OperationProcedures" rows="3" style="height: 200px;" disabled>{{$OperationProcedures}}</textarea>
    </div>
    <h4 class="card-title"></h4>
</div>
