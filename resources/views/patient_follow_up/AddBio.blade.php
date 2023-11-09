<!-- start_add_modal_biometrics -->
<div class="modal fade bd-example-modal-lg" id="biometricsFollow{{ $value->id }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                id="exampleModalLabel">
                إضافة المقاييس الحيويه للمريض : {{ $value->tickets->name }}  ||  رقم التذكره : {{ $value->teckit_num }}
            </h5>
            <button type="button" class="close" data-dismiss="modal"
            aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <!-- edit_form -->
        <form action="{{ route('BioFollow.store') }}" method="POST">
            @csrf
    <div class="row setup-content" id="step-2">
        <br>
        <div class="container">
            <div class="container">
                <div class="form-row">
                    <div class="col">
                        <input type="hidden" name="patientFollowUp_id" value="{{ $value->id }}">
                        <label class="form-label" for="exampleInputEmail1">*النبض | Pulse :</label>
                        <input type="number" name="Pulse" class="form-control">
                    </div>
                    <div class="col">
                        <label class="form-label" for="exampleInputEmail1">الزمن :</label>
                        <input  type="time" name="Pulse_time" class="form-control">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col">
                        <label class="form-label" for="exampleInputEmail1">*معدل التنفس | RR :</label>
                        <input  type="number" name="RR" class="form-control">
                    </div>
                    <div class="col">
                        <label class="form-label" for="exampleInputEmail1">الزمن :</label>
                        <input  type="time" name="RR_time" class="form-control">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col">
                        <label class="form-label">الضغط | BP :</label>
                        <input  type="number" name="BP" class="form-control">
                    </div>
                    <div class="col">
                        <label class="form-label" >الزمن :</label>
                        <input  type="time" name="BP_time" class="form-control">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col">
                        <label class="form-label" >*درجة الحراره | Temp :</label>
                        <input  type="number"  name="Temp" class="form-control">
                    </div>
                    <div class="col">
                        <label class="form-label" >الزمن :</label>
                        <input  type="time"  name="Temp_time" class="form-control">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col">
                        <label class="form-label" >البطن | ABD :</label>
                        <input  type="number"  name="ABD" class="form-control">
                    </div>
                    <div class="col">
                        <label class="form-label" >الزمن :</label>
                        <input  type="time"  name="ABD_time" class="form-control">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col">
                        <label class="form-label" >النزيف المهبلي | V.Bleeding :</label>
                        <input  type="number" name="V_Bleeding" class="form-control">
                    </div>
                    <div class="col">
                        <label class="form-label" >الزمن :</label>
                        <input  type="time" name="V_Bleeding_time" class="form-control">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col">
                        <label class="form-label" >كمية البول الخارجه | U.O.P :</label>
                        <input  type="number" name="U_O_P" class="form-control">
                    </div>
                    <div class="col">
                        <label class="form-label" >الزمن :</label>
                        <input  type="time" name="U_O_P_time" class="form-control">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col">
                        <label class="form-label" >*السكر | suger :</label>
                        <input  type="number"  name="suger" class="form-control">
                    </div>
                    <div class="col">
                        <label class="form-label" >الزمن :</label>
                        <input  type="time"  name="suger_time" class="form-control">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col">
                        <label class="form-label" >*الأوكسجين | So2</label>
                        <input  type="number"  name="So2" class="form-control">
                    </div>
                    <div class="col">
                        <label class="form-label" >الزمن :</label>
                        <input  type="time"  name="So2_time" class="form-control">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col">
                        <label class="form-label" >*معدل الألم | Pain score :</label>
                        <select name="Pain_score" class="form-control"  required style="height: 50px;">
                            <option selected disabled>--اختر المعدل--</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                        </select>
                    </div>
                    <div class="col">
                        <label class="form-label" >الزمن :</label>
                        <input  type="time"  name="Pain_score_time" class="form-control">
                    </div>
                </div>
            </div>
        </div>
    </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary"data-dismiss="modal">اغلاق</button>
            <button type="submit" class="btn btn-success">إضافه</button>
        </div>
    </form>
        </div>
    </div>
    </div>
    <!-- end_add_modal_intensive -->
