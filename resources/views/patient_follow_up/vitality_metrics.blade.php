@if($currentStep != 2)
    <div style="display: none" class="row setup-content" id="step-2">
        @endif
                <br>

                <div class="form-row">
                    <div class="col">
                        <label class="form-label" for="exampleInputEmail1">النبض | Pulse :</label>
                        <input type="number" wire:loading wire-model="Pulse" name="Pulse" class="form-control">
                    </div>
                    <div class="col">
                        <label class="form-label" for="exampleInputEmail1">الزمن :</label>
                        <input  type="text" wire:loading wire-model="Pulse_time" name="Pulse_time" class="form-control">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col">
                        <label class="form-label" for="exampleInputEmail1">معدل التنفس | RR :</label>
                        <input  type="number" wire-model="RR" name="RR" class="form-control">
                    </div>
                    <div class="col">
                        <label class="form-label" for="exampleInputEmail1">الزمن :</label>
                            <input  type="text" wire-model="RR_time" name="RR_time" class="form-control">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col">
                        <label class="form-label">الضغط | BP :</label>
                        <input  type="number" wire-model="BP" name="BP" class="form-control">
                    </div>
                    <div class="col">
                        <label class="form-label" >الزمن :</label>
                            <input  type="text" wire-model="BP_time" name="BP_time" class="form-control">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col">
                        <label class="form-label" >درجة الحراره | Temp :</label>
                        <input  type="number" wire-model="Temp" name="Temp" class="form-control">
                    </div>
                    <div class="col">
                        <label class="form-label" >الزمن :</label>
                            <input  type="text" wire-model="Temp_time" name="Temp_time" class="form-control">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col">
                        <label class="form-label" >البطن | ABD :</label>
                            <input  type="number" wire-model="ABD" name="ABD" class="form-control">
                    </div>
                    <div class="col">
                        <label class="form-label" >الزمن :</label>
                            <input  type="text" wire-model="ABD_time" name="ABD_time" class="form-control">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col">
                        <label class="form-label" >النزيف المهبلي | V.Bleeding :</label>
                        <input  type="number"  wire-model="V_Bleeding" name="V_Bleeding" class="form-control">
                    </div>
                    <div class="col">
                        <label class="form-label" >الزمن :</label>
                            <input  type="text" wire-model="V_Bleeding_time" name="V_Bleeding_time" class="form-control">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col">
                        <label class="form-label" >كمية البول الخارجه | U.O.P :</label>
                            <input  type="number" wire-model="U_O_P" name="U_O_P" class="form-control">
                    </div>
                    <div class="col">
                        <label class="form-label" >الزمن :</label>
                            <input  type="text" wire-model="U_O_P_time" name="U_O_P_time" class="form-control">
                    </div>
                </div>
                <br>
                <button class="btn btn-danger btn-sm nextBtn btn-lg pull-right" type="button" wire:click="back(1)" style="margin-left: 10px;">
                    السابق
                </button>
                <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="button"
                    wire:click="secondStepSubmit">
                    التالي
                </button>
        @if($currentStep != 2)
    </div>
    @endif
