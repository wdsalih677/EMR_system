<div>
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
        </div>
        <div class="col-md-6 mb-30">
            <div class="mb-3">
                <label class="form-label" for="exampleInputEmail1">العمر :</label>
                <input type="text" class="form-control" wire-model="age" value="{{ $age }}" required placeholder="يجب إدخال رقم التذكره لعرض العمر">
            </div>
        </div>
    </div>
</div>
