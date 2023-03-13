<div>
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}
    <div class="mb-3">
        <input type="hidden" wire-model="id" name="teckit_id" value="{{ $teckit_id }}">
        <label class="form-label" for="exampleInputEmail1">رقم الذكره :</label>
        <input id="search" type="text" wire:model="searchTicket" wire:keyup="getdata" class="form-control" style="width: 49%;" required autocomplete="off" placeholder="أدخل رقم التزكره">
    </div>
    <div class="row">
        <div class="col-md-6 mb-30">
            <div class="mb-3">
                <label class="form-label" for="exampleInputEmail1">اسم :</label>
                <input type="text"class="form-control" wire-model="name" value="{{ $name }}" required placeholder="يجب إدخال رقم التذكره لعرض الإسم">
            </div>
            <div class="mb-3">
                <label class="form-label" for="exampleInputEmail1">التشخيص المبدئي | Provisional Diagnosis :</label>
                <input type="text" class="form-control" value="{{ $provisional_diagnosis }}" wire-model="provisional_diagnosis" placeholder="يجب إدخال رقم التذكره لعرض التشخيص المبدئي">
            </div>
            <div class="mb-3">
                <label class="form-label" for="exampleInputEmail1">العمر :</label>
                <input type="text" class="form-control" wire-model="age" value="{{ $age }}" required placeholder="يجب إدخال رقم التذكره لعرض العمر">
            </div>
        </div>
        <div class="col-md-6 mb-30">
            <div class="mb-3">
                <label class="form-label" for="exampleFormControlTextarea1" style="margin-top: 13px;">الفحوصات | Examinations :</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" style="height: 222px;" wire-model="examinations" placeholder="يجب إدخال رقم التذكره لعرض الفحوصات المطلوبه">{{ $examinations }}</textarea>
            </div>
        </div>
    </div>
</div>

