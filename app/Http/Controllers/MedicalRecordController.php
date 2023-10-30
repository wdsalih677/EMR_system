<?php

namespace App\Http\Controllers;

use App\Models\MedicalRecord;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MedicalRecordController extends Controller
{
    function __construct(){

        $this->middleware('permission:السجلات الطبيه', ['only' => ['index']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $medicalRecords = MedicalRecord::get();
        return view('medical_record.index',compact('medicalRecords'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('medical_record.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $role = [
            'date_exit' => 'required',
            'status_exit' =>'required',
        ];
        $messages = [
            'date_exit.required'=>'يجب إدخال تاريخ الخروج',
            'status_exit.required'         =>'يجب تحديد حالة المريض عند الخروج',
        ];
        $validator = Validator::make($request->all(),$role,$messages);
        if($validator  -> fails()){
            return redirect()->back()->withErrors( $validator)->withInput($request->all());
        }
        MedicalRecord::create([
            'ticket_id'=>$request->teckit_id,
            'date_exit'=>$request->date_exit,
            'date_interview'=>$request->date_interview,
            'status_exit'=>$request->status_exit,
        ]);
        toastr()->success("تم إضافة المريض بنجاح"); 
        return view('medical_record.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('medical_record.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $medicalRecord = MedicalRecord::findOrFail($id);
        return view('medical_record.edit',compact('medicalRecord'));
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
        // return $request;
        $role = [
            'date_exit' => 'required',
            'status_exit' =>'required',
        ];
        $messages = [
            'date_exit.required'=>'يجب إدخال تاريخ الخروج',
            'status_exit.required'         =>'يجب تحديد حالة المريض عند الخروج',
        ];
        $validator = Validator::make($request->all(),$role,$messages);
        if($validator  -> fails()){
            return redirect()->back()->withErrors( $validator)->withInput($request->all());
        }
        $medicalRecords = MedicalRecord::findOrFail($request->id);
        $medicalRecords->update([
            'ticket_id' => $request->ticket_id,
            'date_exit' => $request->date_exit,
            'date_interview' => $request->date_interview,
            'status_exit' =>$request->status_exit

        ]);

        toastr()->success("تم تعديل المريض بنجاح");
        return redirect()->route('medical_record.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        MedicalRecord::destroy($id);
        toastr()->success("تم حذف المريض بنجاح");
        return redirect()->route('medical_record.index');
    }
}
