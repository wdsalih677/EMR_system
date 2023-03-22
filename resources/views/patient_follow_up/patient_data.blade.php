@if($currentStep != 1)
    <div style="display: none" class="row setup-content" id="step-1">
        @endif
        <div class="col-xs-12">
            <div class="col-md-12">
                <br>
                <div class="form-row">
                    <div class="col">
                        <label for="title">رقم التذكرة</label>
                        <input type="text" name="teckit_num" wire:model="searchTicket" wire:keyup="getdata" class="form-control" >
                        <input type="hidden" wire-model="id" name="teckit_id" value="{{ $teckit_id }}">
                        @error('Email')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col">
                        <label for="title">الإسم</label>
                        <input type="text" wire-model="name" value="{{ $name }}" class="form-control" disabled>
                        @error('Password')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col">
                        <label for="title">العمر</label>
                        <input type="number" wire-model="age" value="{{ $age }}" class="form-control" disabled>
                        @error('Password')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-row">
                    <div class="col">
                        <label for="title">نوع الإقامه</label>
                        <input type="text" wire:model="residence_type" value="{{ $residence_type }}" class="form-control" disabled>
                        @error('Name_Father')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col">
                        <label for="title">تاريخ الدخول</label>
                        <input type="text" wire:model="date_entry" value="{{ $date_entry }}" class="form-control" disabled>
                        @error('Name_Father_en')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-row">
                    <div class="col">
                        <label for="title">التشخيص النهائي</label>
                        <input type="text" wire:model="final_diagnosis" value="{{ $final_diagnosis }}"  class="form-control" disabled>
                        @error('Name_Father')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col">
                        <label for="title">القسم</label>
                        <input type="text" wire:model="section_id" value="{{ $section_id }}" class="form-control" disabled>
                        @error('Name_Father')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">العلاج و التغذيه | Treatment & Diet :</label>
                    <textarea class="form-control" wire:model="treatment_diet" value="{{ $treatment_diet }}" disabled id="exampleFormControlTextarea1" rows="4" style="height: 290px;"></textarea>
                    @error('Address_Father')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                    <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" wire:click="firstStepSubmit"
                            type="button">التالي
                    </button>
            </div>
        </div>
    @if($currentStep != 1)
    </div>
    @endif
