<?php

namespace App\Http\Controllers;

use App\Models\PatientFollowUp;
use App\Models\Ward;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PatientFollowUpController extends Controller
{
    function __construct(){
        $this->middleware('permission:قائمة المتابعه', ['only' => ['index']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $followUp = PatientFollowUp::get();
        $wards = Ward::get();
        return view('patient_follow_up.index',compact('followUp','wards'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $wards = Ward::get();
        return view('patient_follow_up.add',compact('wards'));
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
        PatientFollowUp::create([
            'teckit_num'=>$request->teckit_num,
            'ticket_id'=>$request->teckit_id,
            'ward_id'=>$request->ward_id,
            'final_diagnosis'=>$request->final_diagnosis,
            'notes'=>$request->notes
        ]);
        toastr()->success("تم إضافة المريض بنجاح");
        return redirect()->route('patient_follow_up.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('patient_follow_up.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('patient_follow_up.edit');
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
        $role = [
            'ward_id'=>'required',
            'notes'=>'required',
        ];
        $messages = [
            'ward_id.required' => 'يجب إختيار العنبر',
            'notes.required' => 'يجب إدخال الملاحظات',

        ];
        $validator = Validator::make($request->all(),$role,$messages);
        if($validator  -> fails()){
            return redirect()->back()->withErrors( $validator)->withInput($request->all());
        }
        $patientsFollow = PatientFollowUp::findOrFail($id);
        $patientsFollow->update([
            'ward_id'=>$request->ward_id,
            'notes'=>$request->notes
        ]);
        toastr()->success("تم تعديل المريض بنجاح");
        return redirect()->route('patient_follow_up.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        PatientFollowUp::destroy($id);
        toastr()->success("تم حذف المريض بنجاح");
        return redirect()->route('patient_follow_up.index');
    }
}
