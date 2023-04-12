<div>
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}
    <div class="mb-3">
        <input type="hidden" wire-model="id" name="teckit_id" value="{{ $teckit_id }}">
        <label class="form-label" for="exampleInputEmail1">رقم الذكره :</label>
        <input id="search" type="text" name="teckit_num" wire:model="searchTicket" wire:keyup="getdata" class="form-control"" required autocomplete="off" placeholder="أدخل رقم التزكره">
    </div>
    <div class="row">
        <div class="col-md-6 mb-30">
            <div class="mb-3">
                <label class="form-label" for="exampleInputEmail1">اسم :</label>
                <input type="text"class="form-control" wire-model="name" value="{{ $name }}" required placeholder="يجب إدخال رقم التذكره لعرض الإسم" disabled required>
            </div>
        </div>
        <div class="col-md-6 mb-30">
            <div class="mb-3">
                <label class="form-label" for="exampleInputEmail1">العمر :</label>
                <input type="text" class="form-control" wire-model="age" value="{{ $age }}" required placeholder="يجب إدخال رقم التذكره لعرض العمر" disabled required>
            </div>
        </div>
    </div>
    <div class="mb-3">
        <label class="form-label" for="exampleInputEmail1">التشخيص النهائي | Final Diagnosis :</label>
        <input type="text" class="form-control" value="{{ $final_diagnosis }}" wire-model="final_diagnosis" placeholder="يجب إدخال رقم التذكره لعرض التشخيص النهائي" disabled required>
    </div>
</div>
