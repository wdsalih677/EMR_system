<?php

namespace App\Http\Controllers;

use App\Models\Examination;
use App\Models\Pre_diagnosis;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ExaminationsController extends Controller
{
    function __construct(){

        $this->middleware('permission:قائمة الفحوصات', ['only' => ['index']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $examinations = Examination::get();
        $pre_diagnoses = Pre_diagnosis::get();
        $tiks = Ticket::get();
        return view('examinations.index',compact('tiks','pre_diagnoses','examinations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('examinations.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $role=[
            'teckit_id'   => 'unique:examinations,ticket_id,'.$request->id,
            'teckit_num'=>'required',
            'test_status'=>'required',
            'test_results'=>'required',
        ];

        $messages=[
            'teckit_id.unique'=>'المريض أجري فحص من قبل',
            'teckit_num.required'=>'يجب إدخال رقم التذكره',
            'test_status.required'=>'يجب إختيار حالة الفحص',
            'test_results.required'=>'يجب إدخال نتائج الفحص',
        ];

        $validator = Validator::make($request->all(),$role,$messages);
        if($validator  -> fails()){
            return redirect()->back()->withErrors( $validator)->withInput($request->all());
        }
        // return $request;
        Examination::create([
            'ticket_id'=>$request->teckit_id,
            'test_status'=>$request->test_status,
            'test_results'=>$request->test_results,
        ]);
        toastr()->success("تم إضافة الفحص بنجاح");
        return redirect()->route('examination.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $examination = Examination::findOrFail($id);
        // return view('examinations.edit',compact('examination'));
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
        $role=[
            'teckit_id'   => 'unique:examinations,ticket_id,'.$id,
            'test_status'=>'required',
            'test_results'=>'required',
        ];

        $messages=[
            'teckit_id.unique'=>'المريض أجري فحص من قبل',
            'test_status.required'=>'يجب إختيار حالة الفحص',
            'test_results.required'=>'يجب إدخال نتائج الفحص',
        ];

        $validator = Validator::make($request->all(),$role,$messages);
        if($validator  -> fails()){
            return redirect()->back()->withErrors( $validator)->withInput($request->all());
        }
        // return $request;
        $examination = Examination::findOrFail($request->id);
        $examination->update([
            'test_status'  => $request->test_status,
            'test_results' => $request->test_results,
        ]);
        toastr()->success("تم تعديل الفحص بنجاح");
        return redirect()->route('examination.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        Examination::destroy($id);
        toastr()->success("تم حذف الفحص بنجاح");
        return redirect()->route('examination.index');
    }
}
