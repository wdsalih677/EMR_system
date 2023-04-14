<?php

namespace App\Http\Controllers;

use App\Models\Intensive;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class IntensiveCareController extends Controller
{
    function __construct(){

        $this->middleware('permission:قائمة التنويم', ['only' => ['index']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Intensives = Intensive::get();
        // return $Intensives;
        return view('intensive_care.index',compact('Intensives'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'teckit_num'=>'required|unique:intensives',
            'patient_status'=>'required',
        ];
        $messages = [
            'teckit_num.required'=>'يجب إدخال رقم التذكره',
            'teckit_num.unique'=>'رقم التذكره مكرر',
            'patient_status.required'=>'يجب إدخال حالة المريض',
        ];
        $validator = Validator::make($request->all(),$role,$messages);
        if($validator  -> fails()){
            return redirect()->back()->withErrors( $validator)->withInput($request->all());
        }
        Intensive::create([
            'ticket_id'=>$request->teckit_id,
            'teckit_num'=>$request->teckit_num,
            'patient_status'=>$request->patient_status
        ]);
        toastr()->success("تمت إضافة المريض بنجاح");
        return redirect()->route('intensive_care.index');
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
        $role = [
            'patient_status'=>'required',
        ];
        $messages = [
            'patient_status.required'=>'يجب إدخال حالة المريض',
        ];
        $validator = Validator::make($request->all(),$role,$messages);
        if($validator  -> fails()){
            return redirect()->back()->withErrors( $validator)->withInput($request->all());
        }
        $intensive = Intensive::findOrFail($id);
        $intensive->update([
            'patient_status'=>$request->patient_status
        ]);
        toastr()->success("تمت تعديل المريض بنجاح");
        return redirect()->route('intensive_care.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Intensive::destroy($id);
        toastr()->success("تمت حذف المريض بنجاح");
        return redirect()->route('intensive_care.index');
    }
}
