<?php

namespace App\Http\Controllers;

use App\Models\Section;
use App\Models\Ward;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class WardController extends Controller
{
    function __construct(){
        $this->middleware('permission:قائمة العنابر', ['only' => ['index']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sections = Section::get();
        $wards    = Ward::get();
        return view('wards.index',compact('sections','wards'));
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
        $role =  [
            'name'   => 'required|unique:wards|min:5|max:100',
            'ward_type' => 'required',
            'section_id'=>'required',
        ];
        $messages =[
            'name.required'=>'يجب إدخال اسم العنبر',
            'name.unique'=>'إسم العنبر مكرر',
            'name.min'=>'يجب أن لا يقل اسم العنبر عن 5 احرف',

            'ward_type.required'=>'يجب إدخال نوع العنابر',

            'section_id.required'=>'يجب إختيار القسم ',
        ];
        //validate
        $validator = Validator::make($request->all(),$role,$messages);
        if($validator  -> fails()){
            return redirect()->back()->withErrors( $validator)->withInput($request->all());
        }
        //insert
        Ward::create([
            'name'      =>$request->name,
            'ward_type'    =>$request->ward_type,
            'section_id' =>$request->section_id,
        ]);
        toastr()->success("تمت إضافة العنبر بنجاح");
        return redirect()->route('ward.index');
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
        $role =  [
            'name'   => 'required|min:5|max:100',
            'ward_type' => 'required|min:5|max:100',
            'section_id'=>'required',
        ];
        $messages =[
            'name.required'=>'يجب إدخال اسم العنبر',
            'name.min'=>'يجب أن لا يقل اسم العنبر عن 5 احرف',

            'ward_type.required'=>'يجب إدخال نوع العنابر',
            'ward_type.min'=>'يجب أن لا يقل نوع العنبر عن خمس أحرف',
            'ward_type.min'=>'يجب أن لا يزيد نوع العنبر عن 100 أحرف',

            'section_id.required'=>'يجب إختيار القسم ',
        ];
        //validate
        $validator = Validator::make($request->all(),$role,$messages);
        if($validator  -> fails()){
            return redirect()->back()->withErrors( $validator)->withInput($request->all());
        }
        //update
        $wards = Ward::findOrFail($request->id);
        $wards->update([
            'name'      =>$request->name,
            'ward_type'    =>$request->ward_type,
            'section_id' =>$request->section_id,
        ]);
        toastr()->success("تمت تعديل العنبر بنجاح");
        return redirect()->route('ward.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request ,$id)
    {
        // return $request;
        Ward::destroy($id);
        toastr()->success("تم حذف العنبر بنجاح");
        return redirect()->route('ward.index');
    }
}
