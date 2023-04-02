<?php

namespace App\Http\Controllers;

use App\Models\Birth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BirthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $births = Birth::get();
        return view('births.index',compact('births'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('births.add');
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
            'newBornName' => 'required|min:2|max:100',
            'nameMother' => 'required|min:2|max:100',
            'namefather' => 'required|min:2|max:100',
            'informerNmae' => 'required|min:2|max:100',
            'documentEditorName' => 'required|min:2|max:100',
            'residencePlace' => 'required',
            'birthDataChar' => 'required',
            'gender' => 'required',
            'birthDataNum' => 'required',
            'birthPlace' => 'required',
            'motherIdentity' =>'required|numeric|digits_between:10,16',
            'fatherIdentity' =>'required|numeric|digits_between:10,16',
            'informerIdentity' =>'required|numeric|digits_between:10,16',
            'documentEditorIdentity' =>'required|numeric|digits_between:10,16',

        ];
        $messages = [
            'motherIdentity.digits_between'=>'يجب أن لا يتجاوز الرقم الوطني للام 16 رقم ولا يقل عن 10 أرقام',
            'motherIdentity.numeric'=>'يجب إدخال ارقام',

            'fatherIdentity.digits_between'=>'يجب أن لا يتجاوز الرقم الوطني للاب 16 رقم ولا يقل عن 10 أرقام',
            'fatherIdentity.numeric'=>'يجب إدخال ارقام',

            'informerIdentity.digits_between'=>'يجب أن لا يتجاوز الرقم الوطني للمبلغ 16 رقم ولا يقل عن 10 أرقام',
            'informerIdentity.numeric'=>'يجب إدخال ارقام',

            'documentEditorIdentity.digits_between'=>'يجب أن لا يتجاوز الرقم الوطني لمحرر الوثيقه 16 رقم ولا يقل عن 10 أرقام',
            'documentEditorIdentity.numeric'=>'يجب إدخال ارقام',

            'gender.required' => 'يجب تحديد نوع المولود',
            'newBornName.required' => 'يجب إدخال اسم المولود رباعي',
            'nameMother.required' => 'يجب إدخال اسم الأم رباعي',
            'namefather.required' => 'يجب إدخال اسم الأب رباعي',
            'informerNmae.required' => 'يجب إدخال اسم المبلغ',
            'documentEditorName.required' => 'يجب إدخال اسم محرر الوثيقه',
            'residencePlace.required' => 'يجب إدخال مكان الإقامه',
            'birthDataChar.required' => 'يجب إدخال تاريخ الميلاد بالأحرف',
            'birthDataNum.required' => 'يجب إدخال اسم الأب تاريخ الميلاد بالأرقام',
            'birthPlace.required' => 'يجب إدخال مكان الميلاد',
            'motherIdentity.required' => 'يجب إدخال الرقم الوطني للأم',
            'fatherIdentity.required' => 'يجب إدخال الرقم الوطني للأب',
            'informerIdentity.required' => 'يجب إدخال الرقم الوطني للمبلغ',
            'documentEditorIdentity.required' => 'يجب إدخال الرقم الوطني لمحرر الوثيقه',
            'residencePlace.required' => 'يجب إدخال مكان الإقامه',
            'birthDataChar.required' => 'يجب إدخال تاريخ الميلاد بالحروف',
            'birthDataNum.required' => 'يجب إدخال الميلاد بالأرقام',
            'birthPlace.required' => 'يجب إدخال مكان الميلاد',

            'newBornName.min' => 'يجب إدخال اسم المولود رباعي',
            'newBornName.max' => 'يجب ان لا يتجاوز اسم المولود 100 حرف',

            'nameMother.min' => 'يجب ادخال اسم الأم رباعي',
            'nameMother.max' => 'يجب ان لا يتجاوز اسم الأم ال 100 حرف',

            'namefather.min' => 'يجب ادخال اسم الأب رباعي',
            'namefather.max' => 'يجب ان لا يتجاوز اسم الأب ال 100 حرف',

            'informerNmae.min' => 'يجب ادخال اسم المبلغ رباعي',
            'informerNmae.max' => 'يجب ان لا يتجاوز اسم المبلغ ال 100 حرف',

            'documentEditorName.min' => 'يجب ادخال اسم محرر الوثيقه رباعي',
            'documentEditorName.max' => 'يجب ان لا يتجاوز اسم محرر الوثيقه ال 100 حرف',

        ];
        //validate
        $validator = Validator::make($request->all(),$role,$messages);
        if($validator  -> fails()){
            return redirect()->back()->withErrors( $validator)->withInput($request->all());
        }
        Birth::create([
            'newBornName' => $request->newBornName,
            'nameMother'  => $request->nameMother,
            'namefather'  => $request->namefather,
            'residencePlace' => $request->residencePlace,
            'motherIdentity' => $request->motherIdentity,
            'fatherIdentity' => $request->fatherIdentity,
            'birthDataChar' => $request->birthDataChar,
            'birthPlace' => $request->birthPlace,
            'birthDataNum' => $request->birthDataNum,
            'informerNmae' => $request->informerNmae,
            'informerIdentity' => $request->informerIdentity,
            'documentEditorName' => $request->documentEditorName,
            'documentEditorIdentity' => $request->documentEditorIdentity

        ]);
        toastr()->success("تمت إضافة المولود بنجاح");
        return redirect()->route('birth.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $birth = Birth::findOrFail($id);
        return view('births.show',compact('birth'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $birth = Birth::findOrFail($id);
        return view('births.edit',compact('birth'));
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
            'newBornName' => 'required|min:2|max:100',
            'nameMother' => 'required|min:2|max:100',
            'namefather' => 'required|min:2|max:100',
            'informerNmae' => 'required|min:2|max:100',
            'documentEditorName' => 'required|min:2|max:100',
            'residencePlace' => 'required',
            'birthDataChar' => 'required',
            'gender' => 'required',
            'birthDataNum' => 'required',
            'birthPlace' => 'required',
            'motherIdentity' =>'required|numeric|digits_between:10,16',
            'fatherIdentity' =>'required|numeric|digits_between:10,16',
            'informerIdentity' =>'required|numeric|digits_between:10,16',
            'documentEditorIdentity' =>'required|numeric|digits_between:10,16',

        ];
        $messages = [
            'motherIdentity.digits_between'=>'يجب أن لا يتجاوز الرقم الوطني للام 16 رقم ولا يقل عن 10 أرقام',
            'motherIdentity.numeric'=>'يجب إدخال ارقام',

            'fatherIdentity.digits_between'=>'يجب أن لا يتجاوز الرقم الوطني للاب 16 رقم ولا يقل عن 10 أرقام',
            'fatherIdentity.numeric'=>'يجب إدخال ارقام',

            'informerIdentity.digits_between'=>'يجب أن لا يتجاوز الرقم الوطني للمبلغ 16 رقم ولا يقل عن 10 أرقام',
            'informerIdentity.numeric'=>'يجب إدخال ارقام',

            'documentEditorIdentity.digits_between'=>'يجب أن لا يتجاوز الرقم الوطني لمحرر الوثيقه 16 رقم ولا يقل عن 10 أرقام',
            'documentEditorIdentity.numeric'=>'يجب إدخال ارقام',

            'gender.required' => 'يجب تحديد نوع المولود',
            'newBornName.required' => 'يجب إدخال اسم المولود رباعي',
            'nameMother.required' => 'يجب إدخال اسم الأم رباعي',
            'namefather.required' => 'يجب إدخال اسم الأب رباعي',
            'informerNmae.required' => 'يجب إدخال اسم المبلغ',
            'documentEditorName.required' => 'يجب إدخال اسم محرر الوثيقه',
            'residencePlace.required' => 'يجب إدخال مكان الإقامه',
            'birthDataChar.required' => 'يجب إدخال تاريخ الميلاد بالأحرف',
            'birthDataNum.required' => 'يجب إدخال اسم الأب تاريخ الميلاد بالأرقام',
            'birthPlace.required' => 'يجب إدخال مكان الميلاد',
            'motherIdentity.required' => 'يجب إدخال الرقم الوطني للأم',
            'fatherIdentity.required' => 'يجب إدخال الرقم الوطني للأب',
            'informerIdentity.required' => 'يجب إدخال الرقم الوطني للمبلغ',
            'documentEditorIdentity.required' => 'يجب إدخال الرقم الوطني لمحرر الوثيقه',
            'residencePlace.required' => 'يجب إدخال مكان الإقامه',
            'birthDataChar.required' => 'يجب إدخال تاريخ الميلاد بالحروف',
            'birthDataNum.required' => 'يجب إدخال الميلاد بالأرقام',
            'birthPlace.required' => 'يجب إدخال مكان الميلاد',

            'newBornName.min' => 'يجب إدخال اسم المولود رباعي',
            'newBornName.max' => 'يجب ان لا يتجاوز اسم المولود 100 حرف',

            'nameMother.min' => 'يجب ادخال اسم الأم رباعي',
            'nameMother.max' => 'يجب ان لا يتجاوز اسم الأم ال 100 حرف',

            'namefather.min' => 'يجب ادخال اسم الأب رباعي',
            'namefather.max' => 'يجب ان لا يتجاوز اسم الأب ال 100 حرف',

            'informerNmae.min' => 'يجب ادخال اسم المبلغ رباعي',
            'informerNmae.max' => 'يجب ان لا يتجاوز اسم المبلغ ال 100 حرف',

            'documentEditorName.min' => 'يجب ادخال اسم محرر الوثيقه رباعي',
            'documentEditorName.max' => 'يجب ان لا يتجاوز اسم محرر الوثيقه ال 100 حرف',

        ];
        //validate
        $validator = Validator::make($request->all(),$role,$messages);
        if($validator  -> fails()){
            return redirect()->back()->withErrors( $validator)->withInput($request->all());
        }
        $birth = Birth::findOrFail($id);
        $birth->update([
            'newBornName' => $request->newBornName,
            'nameMother'  => $request->nameMother,
            'namefather'  => $request->namefather,
            'residencePlace' => $request->residencePlace,
            'motherIdentity' => $request->motherIdentity,
            'fatherIdentity' => $request->fatherIdentity,
            'birthDataChar' => $request->birthDataChar,
            'birthPlace' => $request->birthPlace,
            'birthDataNum' => $request->birthDataNum,
            'informerNmae' => $request->informerNmae,
            'informerIdentity' => $request->informerIdentity,
            'documentEditorName' => $request->documentEditorName,
            'documentEditorIdentity' => $request->documentEditorIdentity
        ]);
        toastr()->success("تمت تعديل المولود بنجاح");
        return redirect()->route('birth.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request , $id)
    {
        $birth = Birth::where('id',$id)->first();
        $id_page = $request->id_page;

        if($id_page==2){

            $birth->delete();
            toastr()->success("تم أشرفة المولود بنجاح");
            return redirect()->route('birth.index');

        }else{

            $birth->forceDelete();
            toastr()->success("تمت حذف المولود بنجاح");
            return redirect()->route('birth.index');
        }
    }
    
}
