<div>
    {{-- Nothing in the world is as soft and yielding as water. --}}
    @if (!empty($successMessage))
    <div class="alert alert-success" id="success-alert">
        <button type="button" class="close" data-dismiss="alert">x</button>
        {{ $successMessage }}
    </div>
@endif

        <div class="stepwizard">
            <div class="stepwizard-row setup-panel">
                <div class="stepwizard-step">
                    <a href="#step-1" type="button"
                       class="btn btn-circle {{ $currentStep != 1 ? 'btn-default' : 'btn-success' }}">1</a>
                    <h5>بيانات المريض</h5>
                </div>
                <div class="stepwizard-step">
                    <a href="#step-2" type="button"
                       class="btn btn-circle {{ $currentStep != 2 ? 'btn-default' : 'btn-success' }}">2</a>
                    <h5>المقاييس الحيويه</h5>
                </div>
                <div class="stepwizard-step">
                    <a href="#step-3" type="button"
                       class="btn btn-circle {{ $currentStep != 3 ? 'btn-default' : 'btn-success' }}"disabled="disabled">3</a>
                    <h5>الملاحظات و العنبر</h5>
                </div>
            </div>
        </div>

@include('patient_follow_up.patient_data')
@include('patient_follow_up.vitality_metrics')

    @if ($currentStep != 3)
    <div style="display: none" class="row setup-content" id="step-3">
        @endif
                <div class="form-group">
                    <div class="form-group">
                        <div class="mb-3">
                            <label class="form-label" for="exampleInputEmail1">العنبر:</label>
                            <select name="gender" class="form-control"  required style="height: 50px;">
                                <option selected disabled>--اختر العنبر--</option>
                                <option value="1">صضصضص</option>
                                <option value="0">صضصضصض</option>
                            </select>
                        </div>
                        <label for="exampleFormControlTextarea1">الملاحظات</label>
                        <textarea class="form-control" wire:model="Address_Father" id="exampleFormControlTextarea1" rows="4" style="height: 290px;"></textarea>
                        @error('Address_Father')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <br>
                <button class="btn btn-danger btn-sm nextBtn btn-lg pull-right" type="button"
                        wire:click="back(2)" style="margin-left: 10px;">السابق</button>
                <button class="btn btn-success btn-sm btn-lg pull-right" wire:click="submitForm"
                        type="button">إضافه</button>
    </div>
</div>
