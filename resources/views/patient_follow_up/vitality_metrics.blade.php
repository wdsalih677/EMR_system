@if($currentStep != 2)
    <div style="display: none" class="row setup-content" id="step-2">
        @endif
                <br>

                <div class="form-row">
                    <div class="col">
                        <label class="form-label" for="exampleInputEmail1">النبض | Pulse :</label>
                        <input type="number" name="Class_name" class="form-control">
                    </div>
                    <div class="col">
                        <label class="form-label" for="exampleInputEmail1">الزمن :</label>
                        <input id="number" type="time" name="Class_name1" class="form-control">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col">
                        <label class="form-label" for="exampleInputEmail1">معدل التنفس | RR :</label>
                        <input id="number" type="number" name="Class_name2" class="form-control">
                    </div>
                    <div class="col">
                        <label class="form-label" for="exampleInputEmail1">الزمن :</label>
                            <input id="number" type="time" name="Class_name3" class="form-control">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col">
                        <label class="form-label" for="exampleInputEmail1">الضغط | BP :</label>
                        <input id="number" type="number" name="Class_name4" class="form-control">
                    </div>
                    <div class="col">
                        <label class="form-label" for="exampleInputEmail1">الزمن :</label>
                            <input id="number" type="time" name="Class_name5" class="form-control">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col">
                        <label class="form-label" for="exampleInputEmail1">درجة الحراره | Temp :</label>
                        <input id="number" type="number" name="Class_name6" class="form-control">
                    </div>
                    <div class="col">
                        <label class="form-label" for="exampleInputEmail1">الزمن :</label>
                            <input id="number" type="time" name="Class_name7" class="form-control">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col">
                        <label class="form-label" for="exampleInputEmail1">البطن | ABD :</label>
                            <input id="name" type="number" name="Class_name8" class="form-control">
                    </div>
                    <div class="col">
                        <label class="form-label" for="exampleInputEmail1">الزمن :</label>
                            <input id="number" type="time" name="Class_name9" class="form-control">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col">
                        <label class="form-label" for="exampleInputEmail1">النزيف المهبلي | V.Bleeding :</label>
                        <input id="name" type="number" name="Class_name10" class="form-control">
                    </div>
                    <div class="col">
                        <label class="form-label" for="exampleInputEmail1">الزمن :</label>
                            <input id="number" type="time" name="Class_name11" class="form-control">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col">
                        <label class="form-label" for="exampleInputEmail1">كمية البول الخارجه | U.O.P :</label>
                            <input id="name" type="number" name="Class_name12" class="form-control">
                    </div>
                    <div class="col">
                        <label class="form-label" for="exampleInputEmail1">الزمن :</label>
                            <input id="number" type="time" name="Class_name13" class="form-control">
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
            {{-- </div>
        </div> --}}
        @if($currentStep != 2)
    </div>
    @endif
