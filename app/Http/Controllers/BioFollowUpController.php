<?php

namespace App\Http\Controllers;

use App\Models\BioFollowUp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BioFollowUpController extends Controller
{
    public function store(Request $request){
        $role = [
            'patientFollowUp_id' => 'required',
            'Pulse' => 'required',
            'Pulse_time' => 'required',
            'RR' => 'required',
            'RR_time' => 'required',
            // 'BP' => 'required',
            // 'BP_time' => 'required',
            'Temp' => 'required',
            'Temp_time' => 'required',
            // 'ABD' => 'required',
            // 'ABD_time' => 'required',
            // 'V_Bleeding' => 'required',
            // 'V_Bleeding_time' => 'required',
            // 'U_O_P' => 'required',
            // 'U_O_P_time' => 'required',
            'suger' => 'required',
            'suger_time' => 'required',
            'So2' => 'required',
            'So2_time' => 'required',
            'Pain_score' => 'required',
            'Pain_score_time' => 'required',
        ];
        $messages = [
            'Pulse.required'=>'Pulse يجب إدخال ',
            'Pulse_time.required'=>'Pulse timeيجب إدخال ',
            'RR.required'=>'RR يجب إدخال ',
            'RR_time.required'=>' RR timeيجب إدخال ',
            // 'BP.required'=>'BPيجب إدخال ',
            // 'BP_time.required'=>'BP timeيجب إدخال ',
            'Temp.required'=>' Temp يجب إدخال ',
            'Temp_time.required'=>'Temp timeيجب إدخال ',
            // 'ABD.required'=>'ABDيجب إدخال ',
            // 'ABD_time.required'=>'ABD timeيجب إدخال ',
            // 'V_Bleeding.required'=>'V_Bleedingيجب إدخال ',
            // 'V_Bleeding_time.required'=>'V_Bleeding timeيجب إدخال ',
            // 'U_O_P.required'=>'U_O_Pيجب إدخال ',
            // 'U_O_P_time.required'=>'U_O_P timeيجب إدخال ',
            'suger.required'=>'sugerيجب إدخال ',
            'suger_time.required'=>'suger timeيجب إدخال ',
            'So2.required'=>'So2 يجب إدخال ',
            'So2_time.required'=>'So2 timeيجب إدخال ',
            'Pain_score.required'=>'Pain scoreيجب إدخال ',
            'Pain_score_time.required'=>'Pain score timeيجب إدخال ',
        ];
        $validator = Validator::make($request->all(),$role,$messages);
        if($validator  -> fails()){
            return redirect()->back()->withErrors( $validator)->withInput($request->all());
        }
        BioFollowUp::create([
            'patientFollowUp_id'=>$request->patientFollowUp_id,
            'Pulse'=>$request->Pulse,
            'Pulse_time'=>$request->Pulse_time,
            'RR'=>$request->RR,
            'RR_time'=>$request->RR_time,
            'BP'=>$request->BP,
            'BP_time'=>$request->BP_time,
            'Temp'=>$request->Temp,
            'Temp_time'=>$request->Temp_time,
            'ABD'=>$request->ABD,
            'ABD_time'=>$request->ABD_time,
            'V_Bleeding'=>$request->V_Bleeding,
            'V_Bleeding_time'=>$request->V_Bleeding_time,
            'U_O_P'=>$request->U_O_P,
            'U_O_P_time'=>$request->U_O_P_time,
            'suger'=>$request->suger,
            'suger_time'=>$request->suger_time,
            'So2'=>$request->So2,
            'So2_time'=>$request->So2_time,
            'Pain_score'=>$request->Pain_score,
            'Pain_score_time'=>$request->Pain_score_time
        ]);
        toastr()->success("تمت إضافة المقاييس الحيويه بنجاح");
        return redirect()->route('patient_follow_up.index');
    }
    public function update($id , Request $request){
        $role = [
            'patientFollowUp_id' => 'required',
            'Pulse' => 'required',
            'Pulse_time' => 'required',
            'RR' => 'required',
            'RR_time' => 'required',
            // 'BP' => 'required',
            // 'BP_time' => 'required',
            'Temp' => 'required',
            'Temp_time' => 'required',
            // 'ABD' => 'required',
            // 'ABD_time' => 'required',
            // 'V_Bleeding' => 'required',
            // 'V_Bleeding_time' => 'required',
            // 'U_O_P' => 'required',
            // 'U_O_P_time' => 'required',
            'suger' => 'required',
            'suger_time' => 'required',
            'So2' => 'required',
            'So2_time' => 'required',
            'Pain_score' => 'required',
            'Pain_score_time' => 'required',
        ];
        $messages = [
            'Pulse.required'=>'Pulse يجب إدخال ',
            'Pulse_time.required'=>'Pulse timeيجب إدخال ',
            'RR.required'=>'RR يجب إدخال ',
            'RR_time.required'=>' RR timeيجب إدخال ',
            // 'BP.required'=>'BPيجب إدخال ',
            // 'BP_time.required'=>'BP timeيجب إدخال ',
            'Temp.required'=>' Temp يجب إدخال ',
            'Temp_time.required'=>'Temp timeيجب إدخال ',
            // 'ABD.required'=>'ABDيجب إدخال ',
            // 'ABD_time.required'=>'ABD timeيجب إدخال ',
            // 'V_Bleeding.required'=>'V_Bleedingيجب إدخال ',
            // 'V_Bleeding_time.required'=>'V_Bleeding timeيجب إدخال ',
            // 'U_O_P.required'=>'U_O_Pيجب إدخال ',
            // 'U_O_P_time.required'=>'U_O_P timeيجب إدخال ',
            'suger.required'=>'sugerيجب إدخال ',
            'suger_time.required'=>'suger timeيجب إدخال ',
            'So2.required'=>'So2 يجب إدخال ',
            'So2_time.required'=>'So2 timeيجب إدخال ',
            'Pain_score.required'=>'Pain scoreيجب إدخال ',
            'Pain_score_time.required'=>'Pain score timeيجب إدخال ',
        ];
        $validator = Validator::make($request->all(),$role,$messages);
        if($validator  -> fails()){
            return redirect()->back()->withErrors( $validator)->withInput($request->all());
        }
        $bio = BioFollowUp::findOrFail($id);
        $bio->update([
            'patientFollowUp_id'=>$request->patientFollowUp_id,
            'Pulse'=>$request->Pulse,
            'Pulse_time'=>$request->Pulse_time,
            'RR'=>$request->RR,
            'RR_time'=>$request->RR_time,
            'BP'=>$request->BP,
            'BP_time'=>$request->BP_time,
            'Temp'=>$request->Temp,
            'Temp_time'=>$request->Temp_time,
            'ABD'=>$request->ABD,
            'ABD_time'=>$request->ABD_time,
            'V_Bleeding'=>$request->V_Bleeding,
            'V_Bleeding_time'=>$request->V_Bleeding_time,
            'U_O_P'=>$request->U_O_P,
            'U_O_P_time'=>$request->U_O_P_time,
            'suger'=>$request->suger,
            'suger_time'=>$request->suger_time,
            'So2'=>$request->So2,
            'So2_time'=>$request->So2_time,
            'Pain_score'=>$request->Pain_score,
            'Pain_score_time'=>$request->Pain_score_time
        ]);
        toastr()->success("تمت تحديث المقاييس الحيويه بنجاح");
        return redirect()->route('patient_follow_up.index');
    }
}
