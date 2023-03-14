<?php

namespace App\Http\Controllers;

use App\Models\Examination;
use App\Models\Pre_diagnosis;
use App\Models\Ticket;
use Illuminate\Http\Request;

class ExaminationsController extends Controller
{
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
    public function destroy($id)
    {
        //
    }
}
