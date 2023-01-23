<?php

namespace App\Http\Controllers;

use App\Models\Pre_diagnosis;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $tickets =
        return view('patients.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('patients.add');
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
            'provisional_diagnosis' => 'required',
            'symptoms'              =>'required',
            'examinations'          =>'required',
        ];
        $messages = [
            'provisional_diagnosis.required'=>'يجب إدخال التشخيص المبدئي',
            'symptoms.required'             =>'يجب إدخال الأعراض',
            'examinations.required'         =>'يجب إدخال الفحوصات المطلوبه',
        ];
        $validator = Validator::make($request->all(),$role,$messages);
        if($validator  -> fails()){
            return redirect()->back()->withErrors( $validator)->withInput($request->all());
        }
        Pre_diagnosis::create([
            'ticket_id'=>$request->teckit_id,
            'provisional_diagnosis'=>$request->provisional_diagnosis,
            'symptoms'=>$request->symptoms,
            'examinations'=>$request->examinations,
        ]);
        toastr()->success("تم إضافة المريض بنجاح");
        toastr()->warning("المريض تحت الفحص");
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
        return view('patients.f_data');
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
        //
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
