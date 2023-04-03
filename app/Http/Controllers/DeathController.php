<?php

namespace App\Http\Controllers;

use App\Models\Death;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DeathController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $deaths = Death::get();
        return view('deaths.index',compact('deaths'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('deaths.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * informerIdentity
     * documentEditorName
     * documentEditorIdentity
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $role = [
            'lateName'=> 'required|min:2|max:100',
            'lateIdentity'=> 'required|unique:deaths|numeric|digits_between:10,16',
            'fatherName'=> 'required|min:2|max:100',
            'gender'=>'required',
            'job'=>'required',
            'age'=>'required|numeric|digits_between:0,150',
            'age_type'=>'required',
            'dateDeathChar'=> 'required|min:2|max:100',
            'placeDeath'=> 'required|min:2|max:100',
            'dateDeathNum'=>'required',
            'caseOfDeath'=> 'required|min:2|max:100',
            'otherCaseOfDeath'=> 'required|min:2|max:100',
            'pathologicalCase'=> 'required|min:2|max:100',
            'otherComplications'=> 'required|min:2|max:100',
            'informerNmae'=> 'required|min:2|max:100',
            'informerIdentity'=> 'required|numeric|digits_between:10,16',
            'documentEditorName'=> 'required|min:2|max:100',
            'documentEditorIdentity'=> 'required|numeric|digits_between:10,16',
        ];
        $messages = [
            'lateName.required'=>'يجب إدخال اسم التوفي',
            'lateName.min'=>'يجب أن لا يقل اسم التوفي عن حرفين',

            'fatherName.required'=>'يجب إدخال اسم الأب',
            'fatherName.min'=>'يجب أن لا يقل اسم الأب عن حرفين',

            'dateDeathChar.required'=>'يجب إدخال تاريخ الوفاة بالأحرف',
            'dateDeathChar.min'=>'يجب أن لا يقل تاريخ الوفاة عن حرفين',

            'placeDeath.required'=>'يجب إدخال مكان الوفاة',
            'placeDeath.min'=>'يجب أن لا يقل كان الوفاة عن حرفين',

            'caseOfDeath.required'=>'يجب إدخال المرض أو الحالة المؤدية مبارشرة لأسباب الوفاة',
            'caseOfDeath.min'=>'يجب أن لا يقل المرض أو الحالة المؤدية مبارشرة لأسباب الوفاة عن حرفين',

            'otherCaseOfDeath.required'=>'يجب إدخال الأسباب الأخرى السابقه على الوفاة ',
            'otherCaseOfDeath.min'=>'يجب أن لا يقل الأسباب الأخرى السابقه على الوفاة  عن حرفين',

            'pathologicalCase.required'=>'يجب إدخال الحالات المرضية إذا وجدة و التي أدت للسبب المذكور ',
            'pathologicalCase.min'=>'يجب أن لا يقل الحالات المرضية إذا وجدة و التي أدت للسبب المذكور  عن حرفين',

            'otherComplications.required'=>'يجب إدخال مضاعفات أخرى ساعدت على الوفاة و لكن لا علاقة لها بالمرض او الحالة المسببة ',
            'otherComplications.min'=>'يجب أن لا يقل مضاعفات أخرى ساعدت على الوفاة و لكن لا علاقة لها بالمرض او الحالة المسببة  عن حرفين',

            'informerNmae.required' => 'يجب ادخال اسم المبلغ رباعي',
            'informerNmae.min' => 'يجب ان لا يقل اسم المبلغ ال 1 حرف',

            'documentEditorName.required' => 'يجب ادخال اسم محرر الوثيقه رباعي',
            'documentEditorName.min' => 'يجب ان لا يقل اسم محرر الوثيقه ال 1 حرف',

            'lateIdentity.required'=>'يجب إدخال الرقم الوطني للمتوفي',
            'lateIdentity.digits_between'=>'يجب أن لا يتجاوز الرقم الوطني للمتوفي 16 رقم ولا يقل عن 10 أرقام',
            'lateIdentity.unique'=>'الرقم الوطني للمتوفي مكرر',
            'lateIdentity.numeric'=>'يجب إدخال ارقام',

            'informerIdentity.required'=>' يجب إدخال الرقم الوطني',
            'informerIdentity.digits_between'=>'يجب أن لا يتجاوز الرقم الوطني للمبلغ 16 رقم ولا يقل عن 10 أرقام',
            'informerIdentity.numeric'=>'يجب إدخال ارقام',

            'documentEditorIdentity.required'=>'يجب إدخال الرقم الوطني  لمحرر الوثيقه',
            'documentEditorIdentity.digits_between'=>'يجب أن لا يتجاوز الرقم الوطني  لمحرر الوثيقه 16 رقم ولا يقل عن 10 أرقام',
            'documentEditorIdentity.numeric'=>'يجب إدخال ارقام',

            'gender.required'=>'يجب إدخال الجنس',
            'job.required'=>'يجب إدخال الهنه',
            'age_type.required'=>'يجب تحديد العمر',
            'dateDeathNum.required'=>'يجب إدخال تاريخ الوفة بالأرقا',

            'age.required'=>'يجب إدخال العمر ',
            'age.digits_between'=>'يجب أن لا يكون العمر عدد سالب و ان لا يقل عن 1',
            'age.numeric'=>'يجب إدخال ارقام',
            'age_type.required'=>'يجب تحديد نوع العمر',

        ];
        //validate
        $validator = Validator::make($request->all(),$role,$messages);
        if($validator  -> fails()){
            return redirect()->back()->withErrors( $validator)->withInput($request->all());
        }
        Death::create([
            'lateName'              =>$request->lateName,
            'lateIdentity'          =>$request->lateIdentity,
            'fatherName'            =>$request->fatherName,
            'gender'                =>$request->gender,
            'job'                   =>$request->job,
            'age'                   =>$request->age,
            'age_type'              =>$request->age_type,
            'dateDeathChar'         =>$request->dateDeathChar,
            'placeDeath'            =>$request->placeDeath,
            'dateDeathNum'          =>$request->dateDeathNum,
            'caseOfDeath'           =>$request->caseOfDeath,
            'otherCaseOfDeath'      =>$request->otherCaseOfDeath,
            'pathologicalCase'      =>$request->pathologicalCase,
            'otherComplications'    =>$request->otherComplications,
            'informerNmae'          =>$request->informerNmae,
            'informerIdentity'      =>$request->informerIdentity,
            'documentEditorName'    =>$request->documentEditorName,
            'documentEditorIdentity'=>$request->documentEditorIdentity,
        ]);
        toastr()->success("تمت إضافة وثيقة الوفاة بنجاح");
        return redirect()->route('death.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $death = Death::findOrFail($id);
        return view('deaths.show',compact('death'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $death = Death::findOrFail($id);
        return view('deaths.edit',compact('death'));
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
            'lateName'=> 'required|min:2|max:100',
            'lateIdentity'=> 'required|numeric|digits_between:10,16|unique:deaths,lateIdentity,'.$id,
            'fatherName'=> 'required|min:2|max:100',
            'gender'=>'required',
            'job'=>'required',
            'age'=>'required|numeric|digits_between:0,150',
            'age_type'=>'required',
            'dateDeathChar'=> 'required|min:2|max:100',
            'placeDeath'=> 'required|min:2|max:100',
            'dateDeathNum'=>'required',
            'caseOfDeath'=> 'required|min:2|max:100',
            'otherCaseOfDeath'=> 'required|min:2|max:100',
            'pathologicalCase'=> 'required|min:2|max:100',
            'otherComplications'=> 'required|min:2|max:100',
            'informerNmae'=> 'required|min:2|max:100',
            'informerIdentity'=> 'required|numeric|digits_between:10,16',
            'documentEditorName'=> 'required|min:2|max:100',
            'documentEditorIdentity'=> 'required|numeric|digits_between:10,16',
        ];
        $messages = [
            'lateName.required'=>'يجب إدخال اسم التوفي',
            'lateName.min'=>'يجب أن لا يقل اسم التوفي عن حرفين',

            'fatherName.required'=>'يجب إدخال اسم الأب',
            'fatherName.min'=>'يجب أن لا يقل اسم الأب عن حرفين',

            'dateDeathChar.required'=>'يجب إدخال تاريخ الوفاة بالأحرف',
            'dateDeathChar.min'=>'يجب أن لا يقل تاريخ الوفاة عن حرفين',

            'placeDeath.required'=>'يجب إدخال مكان الوفاة',
            'placeDeath.min'=>'يجب أن لا يقل كان الوفاة عن حرفين',

            'caseOfDeath.required'=>'يجب إدخال المرض أو الحالة المؤدية مبارشرة لأسباب الوفاة',
            'caseOfDeath.min'=>'يجب أن لا يقل المرض أو الحالة المؤدية مبارشرة لأسباب الوفاة عن حرفين',

            'otherCaseOfDeath.required'=>'يجب إدخال الأسباب الأخرى السابقه على الوفاة ',
            'otherCaseOfDeath.min'=>'يجب أن لا يقل الأسباب الأخرى السابقه على الوفاة  عن حرفين',

            'pathologicalCase.required'=>'يجب إدخال الحالات المرضية إذا وجدة و التي أدت للسبب المذكور ',
            'pathologicalCase.min'=>'يجب أن لا يقل الحالات المرضية إذا وجدة و التي أدت للسبب المذكور  عن حرفين',

            'otherComplications.required'=>'يجب إدخال مضاعفات أخرى ساعدت على الوفاة و لكن لا علاقة لها بالمرض او الحالة المسببة ',
            'otherComplications.min'=>'يجب أن لا يقل مضاعفات أخرى ساعدت على الوفاة و لكن لا علاقة لها بالمرض او الحالة المسببة  عن حرفين',

            'informerNmae.required' => 'يجب ادخال اسم المبلغ رباعي',
            'informerNmae.min' => 'يجب ان لا يقل اسم المبلغ ال 1 حرف',

            'documentEditorName.required' => 'يجب ادخال اسم محرر الوثيقه رباعي',
            'documentEditorName.min' => 'يجب ان لا يقل اسم محرر الوثيقه ال 1 حرف',

            'lateIdentity.required'=>'يجب إدخال الرقم الوطني للمتوفي',
            'lateIdentity.digits_between'=>'يجب أن لا يتجاوز الرقم الوطني للمتوفي 16 رقم ولا يقل عن 10 أرقام',
            'lateIdentity.unique'=>'الرقم الوطني للمتوفي مكرر',
            'lateIdentity.numeric'=>'يجب إدخال ارقام',

            'informerIdentity.required'=>' يجب إدخال الرقم الوطني',
            'informerIdentity.digits_between'=>'يجب أن لا يتجاوز الرقم الوطني للمبلغ 16 رقم ولا يقل عن 10 أرقام',
            'informerIdentity.numeric'=>'يجب إدخال ارقام',

            'documentEditorIdentity.required'=>'يجب إدخال الرقم الوطني  لمحرر الوثيقه',
            'documentEditorIdentity.digits_between'=>'يجب أن لا يتجاوز الرقم الوطني  لمحرر الوثيقه 16 رقم ولا يقل عن 10 أرقام',
            'documentEditorIdentity.numeric'=>'يجب إدخال ارقام',

            'gender.required'=>'يجب إدخال الجنس',
            'job.required'=>'يجب إدخال الهنه',
            'age_type.required'=>'يجب تحديد العمر',
            'dateDeathNum.required'=>'يجب إدخال تاريخ الوفة بالأرقا',

            'age.required'=>'يجب إدخال العمر ',
            'age.digits_between'=>'يجب أن لا يكون العمر عدد سالب و ان لا يقل عن 1',
            'age.numeric'=>'يجب إدخال ارقام',
            'age_type.required'=>'يجب تحديد نوع العمر',

        ];
        //validate
        $validator = Validator::make($request->all(),$role,$messages);
        if($validator  -> fails()){
            return redirect()->back()->withErrors( $validator)->withInput($request->all());
        }
        $death = Death::findOrFail($id);
        $death->update([
            'lateName'              =>$request->lateName,
            'lateIdentity'          =>$request->lateIdentity,
            'fatherName'            =>$request->fatherName,
            'gender'                =>$request->gender,
            'job'                   =>$request->job,
            'age'                   =>$request->age,
            'age_type'              =>$request->age_type,
            'dateDeathChar'         =>$request->dateDeathChar,
            'placeDeath'            =>$request->placeDeath,
            'dateDeathNum'          =>$request->dateDeathNum,
            'caseOfDeath'           =>$request->caseOfDeath,
            'otherCaseOfDeath'      =>$request->otherCaseOfDeath,
            'pathologicalCase'      =>$request->pathologicalCase,
            'otherComplications'    =>$request->otherComplications,
            'informerNmae'          =>$request->informerNmae,
            'informerIdentity'      =>$request->informerIdentity,
            'documentEditorName'    =>$request->documentEditorName,
            'documentEditorIdentity'=>$request->documentEditorIdentity,
        ]);
        toastr()->success("تمت تعديل وثيقة الوفاة بنجاح");
        return redirect()->route('death.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( Request $request,$id)
    {
        $birth = Death::where('id',$id)->first();
        $id_page = $request->id_page;

        if($id_page==2){

            $birth->delete();
            toastr()->success("تمت أرشفة وثيقة الوفاة بنجاح");
            return redirect()->route('death.index');

        }else{

            $birth->forceDelete();
            toastr()->success("تمت حذف وثيقة الوفاة بنجاح");
            return redirect()->route('death.index');
        }
    }
}
