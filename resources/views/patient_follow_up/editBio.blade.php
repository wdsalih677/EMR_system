<!-- start_edit_modal_biometrics -->
<div class="modal fade bd-example-modal-lg" id="edit_biometrics_Follow{{ $value->id }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                id="exampleModalLabel">
                تحديث المقاييس الحيويه للمريض : {{ $value->tickets->name }}  ||  رقم التذكره : {{ $value->teckit_num }}
                <br>
                زمن آخر قياس : {{ empty($value->bio->updated_at) ? '' : $value->bio->updated_at }}
            </h5>
            <button type="button" class="close" data-dismiss="modal"
            aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <!-- edit_form -->
        <form action="{{ route('BioFollow.update',$value->id) }}" method="POST">
            {{ method_field('patch') }}
            @csrf
    <div class="row setup-content" id="step-2">
        <br>
        <div class="container">
            <div class="container">
                <div class="form-row">
                    <div class="col">
                        <input type="hidden" name="patientFollowUp_id" value="{{ $value->id }}">
                        <label class="form-label" for="exampleInputEmail1">النبض | Pulse :</label>
                        <input type="number" name="Pulse" value="{{ empty($value->bio->Pulse) ? '' : $value->bio->Pulse }}" class="form-control">
                    </div>
                    <div class="col">
                        <label class="form-label" for="exampleInputEmail1">الزمن :</label>
                        <input  type="time" name="Pulse_time" value="{{ empty($value->bio->Pulse_time) ? '' : $value->bio->Pulse_time }}" class="form-control">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col">
                        <label class="form-label" for="exampleInputEmail1">معدل التنفس | RR :</label>
                        <input  type="number" name="RR" value="{{ empty($value->bio->RR) ? '' : $value->bio->RR }}" class="form-control">
                    </div>
                    <div class="col">
                        <label class="form-label" for="exampleInputEmail1">الزمن :</label>
                        <input  type="time" name="RR_time" value="{{ empty($value->bio->RR_time) ? '' : $value->bio->RR_time }}" class="form-control">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col">
                        <label class="form-label">الضغط | BP :</label>
                        <input  type="number" name="BP" value="{{ empty($value->bio->BP) ? '' : $value->bio->BP }}" class="form-control">
                    </div>
                    <div class="col">
                        <label class="form-label" >الزمن :</label>
                        <input  type="time" name="BP_time" value="{{ empty($value->bio->BP_time) ? '' : $value->bio->BP_time }}" class="form-control">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col">
                        <label class="form-label" >درجة الحراره | Temp :</label>
                        <input  type="number"  name="Temp" value="{{ empty($value->bio->Temp) ? '' : $value->bio->Temp }}" class="form-control">
                    </div>
                    <div class="col">
                        <label class="form-label" >الزمن :</label>
                        <input  type="time"  name="Temp_time" value="{{ empty($value->bio->Temp_time) ? '' : $value->bio->Temp_time }}" class="form-control">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col">
                        <label class="form-label" >البطن | ABD :</label>
                        <input  type="number"  name="ABD" value="{{ empty($value->bio->ABD) ? '' : $value->bio->ABD }}" class="form-control">
                    </div>
                    <div class="col">
                        <label class="form-label" >الزمن :</label>
                        <input  type="time"  name="ABD_time" value="{{ empty($value->bio->ABD_time) ? '' :$value->bio->ABD_time }}" class="form-control">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col">
                        <label class="form-label" >النزيف المهبلي | V.Bleeding :</label>
                        <input  type="number" name="V_Bleeding" value="{{ empty($value->bio->V_Bleeding) ? '' :$value->bio->V_Bleeding }}" class="form-control">
                    </div>
                    <div class="col">
                        <label class="form-label" >الزمن :</label>
                        <input  type="time" name="V_Bleeding_time" value="{{ empty($value->bio->V_Bleeding_time) ? '' : $value->bio->V_Bleeding_time }}" class="form-control">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col">
                        <label class="form-label" >كمية البول الخارجه | U.O.P :</label>
                        <input  type="number" name="U_O_P" value="{{ empty($value->bio->U_O_P) ? '' : $value->bio->U_O_P }}" class="form-control">
                    </div>
                    <div class="col">
                        <label class="form-label" >الزمن :</label>
                        <input  type="time" name="U_O_P_time" value="{{ empty($value->bio->U_O_P_time) ? '' : $value->bio->U_O_P_time }}" class="form-control">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col">
                        <label class="form-label" >السكر | suger :</label>
                        <input  type="number"  name="suger" value="{{ empty($value->bio->suger) ? '' : $value->bio->suger }}" class="form-control">
                    </div>
                    <div class="col">
                        <label class="form-label" >الزمن :</label>
                        <input  type="time"  name="suger_time" value="{{ empty($value->bio->suger_time) ? '' : $value->bio->suger_time }}" class="form-control">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col">
                        <label class="form-label" >الأوكسجين | So2</label>
                        <input  type="number"  name="So2" value="{{ empty($value->bio->So2) ? '' : $value->bio->So2 }}" class="form-control">
                    </div>
                    <div class="col">
                        <label class="form-label" >الزمن :</label>
                        <input  type="time"  name="So2_time" value="{{ empty($value->bio->So2_time) ? '' : $value->bio->So2_time }}" class="form-control">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col">
                        <label class="form-label" >معدل الألم | Pain score :</label>
                        <select name="Pain_score" class="form-control"  required style="height: 50px;">
                            <option selected disabled>--اختر المعدل--</option>
                            <option value="2" {{ !empty($value->bio->Pain_score) == 2 ? 'selected' : '' }}>2</option>
                            <option value="1" {{ !empty($value->bio->Pain_score) == 1 ? 'selected' : '' }}>1</option>
                            <option value="3" {{ !empty($value->bio->Pain_score) == 3 ? 'selected' : '' }}>3</option>
                            <option value="4" {{ !empty($value->bio->Pain_score) == 4 ? 'selected' : '' }}>4</option>
                            <option value="5" {{ !empty($value->bio->Pain_score) == 5 ? 'selected' : '' }}>5</option>
                            <option value="6" {{ !empty($value->bio->Pain_score) == 6 ? 'selected' : '' }}>6</option>
                            <option value="7" {{ !empty($value->bio->Pain_score) == 7 ? 'selected' : '' }}>7</option>
                            <option value="8" {{ !empty($value->bio->Pain_score) == 8 ? 'selected' : '' }}>8</option>
                            <option value="9" {{ !empty($value->bio->Pain_score) == 9 ? 'selected' : '' }}>9</option>
                            <option value="10"{{ !empty($value->bio->Pain_score) == 10 ? 'selected' : '' }}>10</option>
                        </select>
                    </div>
                    <div class="col">
                        <label class="form-label" >الزمن :</label>
                        <input  type="time"  name="Pain_score_time" value="{{ empty($value->bio->Pain_score_time) ? '' : $value->bio->Pain_score_time}}" class="form-control">
                    </div>
                </div>
            </div>
        </div>
    </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary"data-dismiss="modal">اغلاق</button>
            <button type="submit" class="btn btn-success">تحديث</button>
        </div>
    </form>
        </div>
    </div>
    </div>
    <!-- end_edit_modal_intensive -->
