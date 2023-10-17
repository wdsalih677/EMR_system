<?php

namespace App\Http\Controllers;

use App\Models\PatientFinalData;
use App\Models\Section;
use App\Models\Ward;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class PatientFinalDataController extends Controller
{
    function __construct(){
        $this->middleware('permission:بيانات المريض النهائيه', ['only' => ['index']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            // $input = $request->all();

            // if (!empty($input['final_diagnosis'])) {

            //     $data = DB::table('diagnoses')->select(["id", "diagnoses"])
            //         ->where("diagnoses", "LIKE", "%{$input['final_diagnosis']}%")
            //         ->get();
            // } else {

            //     $data = DB::table('diagnoses')->select(["id", "diagnoses"])
            //         ->get();
            // }

            // $diagnoses = [];

            // if (count($data) > 0) {
            
            //     foreach ($data as $i) {
            //         $diagnoses[] = array(
            //             "id" => $i->id,
            //             "text" => $i->diagnoses,
            //         );
            //     }
            // }
            // return response()->json($diagnoses);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $sections = Section::get();
        $wards    = Ward::get();


        return view('patients.f_data',compact('sections','wards'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request;
        $role = [
            'final_diagnosis' => 'required',
            'residence_type' => 'required',
            'treatment_diet'          =>'required',
        ];
        $messages = [
            'final_diagnosis.required'=>'يجب إدخال التشخيص النهائي',
            'residence_type.required'=> 'يجب تحديد نوع الإقامه',
            'treatment_diet.required'=>'يجب تحديد العلاج و نوع الغذاء',
        ];
        $validator = Validator::make($request->all(),$role,$messages);
        if($validator  -> fails()){
            return redirect()->back()->withErrors( $validator)->withInput($request->all());
        }

        PatientFinalData::create([
            'ticket_id'         => $request->ticket_id,
            'final_diagnosis'   => $request->final_diagnosis,
            // 'ward_id'           => $request->ward_id,
            'section_id'        => $request->section_id,
            'residence_type'    => $request->residence_type,
            'follow_up_date'    => $request->follow_up_date,
            'treatment_diet'    => $request->treatment_diet
        ]);
        toastr()->success("تم إضافة التشخيص النهائي بنجاح");
        return redirect()->route('patient.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $patientsFinalData = PatientFinalData::findOrFail($request->id);
        $patientsFinalData->update([
            'final_diagnosis'   => $request->final_diagnosis,
            // 'ward_id'           => $request->ward_id,
            'section_id'        => $request->section_id,
            'residence_type'    => $request->residence_type,
            'follow_up_date'    => $request->follow_up_date,
            'treatment_diet'    => $request->treatment_diet
        ]);
        toastr()->success("تم إضافة التشخيص النهائي بنجاح");
        return redirect()->route('patient.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
