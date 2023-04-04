<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SectionController extends Controller
{
    function __construct(){
        $this->middleware('permission:قائمة الأقسام', ['only' => ['index']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $doctors = Doctor::get();
        $sections =Section::get();
        return view('sections.index',compact('doctors','sections'));
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
            'name'   => 'required|unique:sections|min:5|max:100',
            'ward_num' => 'required|numeric|min:1',
            'doctor_id'=>'required',
        ];
        $messages =[
            'name.required'=>'يجب إدخال اسم القسم',
            'name.unique'=>'إسم القسم مكرر',
            'name.min'=>'يجب أن لا يقل اسم القسم عن 5 احرف',

            'ward_num.required'=>'يجب إدخال عدد العنابر',
            'ward_num.digits_between'=>'يجب أن لا يقل عدد العنابر عن 1',
            'ward_num.numeric'=>'يجب إدخال ارقام',

            'doctor_id.required'=>'يجب إختيار إسم الطبيب',
        ];
        //validate
        $validator = Validator::make($request->all(),$role,$messages);
        if($validator  -> fails()){
            return redirect()->back()->withErrors( $validator)->withInput($request->all());
        }
        //insert
        Section::create([
            'name'=>$request->name,
            'ward_num'=>$request->ward_num,
            'doctor_id'=>$request->doctor_id
        ]);
        toastr()->success("تم إضافة القسم بنجاح");
        return redirect()->route('section.index');
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
            'ward_num' => 'required|numeric|min:1',
            'doctor_id'=>'required',
        ];
        $messages =[
            'name.required'=>'يجب إدخال اسم القسم',
            'name.min'=>'يجب أن لا يقل اسم القسم عن 5 احرف',

            'ward_num.required'=>'يجب إدخال عدد العنابر',
            'ward_num.digits_between'=>'يجب أن لا يقل عدد العنابر عن 1',
            'ward_num.numeric'=>'يجب إدخال ارقام',

            'doctor_id.required'=>'يجب إختيار إسم الطبيب',
        ];
        //validate
        $validator = Validator::make($request->all(),$role,$messages);
        if($validator  -> fails()){
            return redirect()->back()->withErrors( $validator)->withInput($request->all());
        }
        //update
        $sections = Section::findOrFail($request->id);
        $sections->update([

            'name'=>$request->name,
            'ward_num'=>$request->ward_num,
            'doctor_id'=>$request->doctor_id
        ]);
        toastr()->success("تم تعديل القسم بنجاح");
        return redirect()->route('section.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request ,$id)
    {
        Section::destroy($id);
        toastr()->success("تم حذف القسم بنجاح");
        return redirect()->route('section.index');
    }
}
