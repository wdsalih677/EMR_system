<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;
use App\Traits\generteID;
use Illuminate\Support\Facades\Validator;

class ReceptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tickets = Ticket::get();
        return view('reception.index',compact('tickets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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
            'name'   => 'required|unique:tickets|min:2|max:100',
            'identity_num' => 'required|unique:tickets|numeric|digits_between:14,16',
            'address'=>'required',
            'gender'=>'required',
            'age'=>'required|numeric|digits_between:0,150',
            'age_type'=>'required',
        ];
        $messages =[
            'name.required'=>'يجب إدخال اسم المريض',
            'name.unique'=>'إسم المريض مكرر',
            'name.min'=>'يجب أن لا يقل اسم المريض عن حرفين',

            'identity_num.required'=>'يجب إدخال الرقم الوطني',
            'identity_num.digits_between'=>'يجب أن لا يتجاوز الرقم الوطني 16 رقم ولا يقل عن 14 أرقام',
            'identity_num.unique'=>'الرقم الوطني مكرر',
            'identity_num.numeric'=>'يجب إدخال ارقام',

            'address.required'=>'يجب إدخال العنوان',

            'gender.required'=>'يجب إدخال الجنس',

            'age.required'=>'يجب إدخال العمر ',
            'age.digits_between'=>'يجب أن لا يكون العمر عدد سالب يكون رقم الهاتف 9 ارقام فقط',
            'age.numeric'=>'يجب إدخال ارقام',
            'age_type.required'=>'يجب تحديد نوع العمر',
        ];
        //validate
        $validator = Validator::make($request->all(),$role,$messages);
        if($validator  -> fails()){
            return redirect()->back()->withErrors( $validator)->withInput($request->all());
        }
        Ticket::create([
            'name'=>$request->name,
            'identity_num'=>$request->identity_num,
            'address'=>$request->address,
            'gender'=>$request->gender,
            'age'=>$request->age,
            'age_type'=>$request->age_type,
            'job'=>$request->job,
            'date_entry'=>$request->date_entry,
            'phone_num'=>$request->phone_num,
            'ticket_num'=>generteID::IDGenerator(Ticket::class, 'ticket_num', 5, 'ATH'),
        ]);
        toastr()->success("تم إنشاء التذكره بنجاح");
        return redirect()->route('reception.index');
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
            'name' => 'required|min:2|max:100',
            'identity_num' => 'required|numeric|digits_between:14,16',
            'address'=>'required',
            'gender'=>'required',
            'age'=>'required|numeric|digits_between:0,150',
            'age_type'=>'required',
        ];
        $messages =[
            'name.required'=>'يجب إدخال اسم المريض',
            'name.min'=>'يجب أن لا يقل اسم المريض عن حرفين',

            'identity_num.required'=>'يجب إدخال الرقم الوطني',
            'identity_num.digits_between'=>'يجب أن لا يتجاوز الرقم الوطني 16 رقم ولا يقل عن 14 أرقام',
            'identity_num.numeric'=>'يجب إدخال ارقام',

            'address.required'=>'يجب إدخال العنوان',

            'gender.required'=>'يجب إدخال الجنس',

            'age.required'=>'يجب إدخال العمر ',
            'age.digits_between'=>'يجب أن لا يكون العمر عدد سالب يكون رقم الهاتف 9 ارقام فقط',
            'age.numeric'=>'يجب إدخال ارقام',
            'age_type.required'=>'يجب تحديد نوع العمر',
        ];
        //validate
        $validator = Validator::make($request->all(),$role,$messages);
        if($validator  -> fails()){
            return redirect()->back()->withErrors( $validator)->withInput($request->all());
        }
        $tickets = Ticket::findOrFail($request->id);
        $tickets->update([
            'name'=>$request->name,
            'identity_num'=>$request->identity_num,
            'address'=>$request->address,
            'gender'=>$request->gender,
            'age'=>$request->age,
            'age_type'=>$request->age_type,
            'job'=>$request->job,
            'date_entry'=>$request->date_entry,
            'phone_num'=>$request->phone_num,
        ]);
        toastr()->success("تم تعديل التذكره بنجاح");
        return redirect()->route('reception.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Ticket::destroy($id);
        toastr()->success("تم حذف التذكره بنجاح");
        return redirect()->route('reception.index');
    }
}
