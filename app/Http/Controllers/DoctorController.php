<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DoctorController extends Controller
{
    public function index()
    {
        $doctors =Doctor::get();
        return view('doctors.index',compact('doctors'));
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
            'name'   => 'required|unique:doctors|min:5|max:100',
            'id_num' => 'required|unique:doctors|numeric|digits_between:14,16',
            'phone_num'   => 'required|unique:doctors|numeric|digits_between:9,9',
            'email' => 'required|unique:doctors|max:255',
            'degree' => 'required|min:5',
            'title_job' => 'required|min:4',
        ];
        $messages =[
            'name.required'=>'يجب إدخال اسم الطبيب',
            'name.unique'=>'إسم الطبيب مكرر',
            'name.min'=>'يجب أن لا يقل اسم الطبيب عن 5 احرف',

            'id_num.required'=>'يجب إدخال الرقم الوطني',
            'id_num.digits_between'=>'يجب أن لا يتجاوز الرقم الوطني 16 رقم ولا يقل عن 14 أرقام',
            'id_num.unique'=>'الرقم الوطني مكرر',
            'id_num.numeric'=>'يجب إدخال ارقام',

            'phone_num.required'=>'يجب إدخال رقم الهاتف',
            'phone_num.unique'=>'رقم الهاتف مكرر',
            'phone_num.digits_between'=>'يجب أن يكون رقم الهاتف 9 ارقام فقط',
            'phone_num.numeric'=>'يجب إدخال ارقام',

            'email.required'=>'يجب إدخال البريد الإلكتروني',
            'email.unique'=>'البريد الإلكتروني مكرر',

            'degree.required'=>'يجب إدخال الدرجة العلمية',
            'degree.min'=>'يجب أن لا يقل الدرجة العلمية عن 4 احرف',

            'title_job.required'=>'يجب إدخال المسمى الوظيفي',
            'title_job.min'=>'يجب أن لا يقل المسمى الوظيفي عن 5 احرف',
        ];
        //validate
        $validator = Validator::make($request->all(),$role,$messages);
        if($validator  -> fails()){
            return redirect()->back()->withErrors( $validator)->withInput($request->all());
        }
        //insert
        Doctor::create([
            'name'      =>$request->name,
            'id_num'    =>$request->id_num,
            'phone_num' =>$request->phone_num,
            'email'     =>$request->email,
            'degree'    =>$request->degree,
            'title_job' =>$request->title_job,
        ]);
        toastr()->success("تمت إضافة الطبيب بنجاح");
        return redirect()->route('doctor.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Class  $class
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Class  $class
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Class  $class
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $role =  [
            'name'   => 'required|min:5|max:100',
            'id_num' => 'required|numeric|digits_between:14,16',
            'phone_num'   => 'required|numeric|digits_between:9,9',
            'email' => 'required|max:255',
            'degree' => 'required|min:5',
            'title_job' => 'required|min:5',
        ];
        $messages =[
            'name.required'=>'يجب إدخال اسم الطبيب',
            // 'name.unique'=>'إسم الطبيب مكرر',
            'name.min'=>'يجب أن لا يقل اسم الطبيب عن 5 احرف',

            'id_num.required'=>'يجب إدخال الرقم الوطني',
            'id_num.digits_between'=>'يجب أن لا يتجاوز الرقم الوطني 16 رقم ولا يقل عن 14 أرقام',
            // 'id_num.unique'=>'الرقم الوطني مكرر',
            'id_num.numeric'=>'يجب إدخال ارقام',

            'phone_num.required'=>'يجب إدخال رقم الهاتف',
            // 'phone_num.unique'=>'رقم الهاتف مكرر',
            'phone_num.digits_between'=>'يجب أن لا يتجاوز رقم الهاتف 14 رقم ولا يقل عن 10 أرقام',
            'phone_num.numeric'=>'يجب إدخال ارقام',

            'email.required'=>'يجب إدخال البريد الإلكتروني',
            // 'email.unique'=>'البريد الإلكتروني مكرر',

            'degree.required'=>'يجب إدخال الدرجة العلمية',
            'degree.min'=>'يجب أن لا يقل الدرجة العلمية عن 5 احرف',

            'title_job.required'=>'يجب إدخال المسمى الوظيفي',
            'title_job.min'=>'يجب أن لا يقل المسمى الوظيفي عن 5 احرف',
        ];
        //validate
        $validator = Validator::make($request->all(),$role,$messages);
        if($validator  -> fails()){
            return redirect()->back()->withErrors( $validator)->withInput($request->all());
        }
        // return $request;
        $doctors = Doctor::findOrFail($request->id);
        $doctors->update([
            'name'      =>$request->name,
            'id_num'    =>$request->id_num,
            'phone_num' =>$request->phone_num,
            'email'     =>$request->email,
            'degree'    =>$request->degree,
            'title_job' =>$request->title_job,
        ]);

        toastr()->success("تم تعديل الطبيب بنجاح");
        return redirect()->route('doctor.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Class  $class
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $doctors = Doctor::findOrFail($request->id);
        $doctors->delete();
        toastr()->success("تم حذف الطبيب بنجاح");
        return redirect()->route('doctor.index');
    }
}
