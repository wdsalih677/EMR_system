<div>
    <div class="mb-3">
        <label class="form-label" for="exampleInputEmail1">رقم الذكره :</label>
        <input id="search" type="text" wire:model="searchTicket" wire:keyup="getdata" name="Class_name" class="form-control" style="width: 49%;" placeholder="أدخل رقم التزكره">
    </div>
    <div class="row">
        <div class="col-md-6 mb-30">
            <div class="mb-3">
                <input type="hidden" name="id" value="">
                <label class="form-label" for="exampleInputEmail1">اسم :</label>
                <input type="text"class="form-control" wire-model="name" value="{{ $name }}" id="">
            </div>
        </div>
        <div class="col-md-6 mb-30">
            <div class="mb-3">
                <label class="form-label" for="exampleInputEmail1">العمر :</label>
                <input type="text"class="form-control" wire-model="name" value="{{ $age }}" id="">
            </div>
        </div>
    </div>
</div>
