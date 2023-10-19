<?php

namespace App\Http\Controllers;

use App\Models\Operation;
use App\Models\OperationAttachment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class OperationController extends Controller
{
    function __construct(){
        $this->middleware('permission:قائمة العمليات', ['only' => ['index']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $operations = Operation::get();
        return view('operation.index',compact('operations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('operation.add');
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
            'ticket_num'=> 'required',
            'operationName'=> 'required',
            'Assistant'=> 'required',
            'Ansesthesia'=> 'required',
            'Surgion'=> 'required',
            'Anaesthetest'=> 'required',
            'dateTime'=> 'required',
            'OperationProcedures'=> 'required',
        ];
        $messages = [
            'ticket_num.required' => ' يجب إدخال رقم التذكره',
            'operationName.required' => ' يجب إدخال إسم العمليه',
            'Assistant.required' => ' يجب إدخال اسم المساعد',
            'Ansesthesia.required' => ' يجب تحديد نوع التخدير',
            'Surgion.required' => ' يجب إدخال اسم الطبيب الجراح',
            'Anaesthetest.required' => ' يجب إدخال اسم طبيب التخدير',
            'dateTime.required' => ' يجب تحديد تاريخ و زمن العمليه',
            'OperationProcedures.required' => ' يجب إدخال إجراءات العمليه',
        ];
        $validator = Validator::make($request->all(),$role,$messages);
        if($validator  -> fails()){
            return redirect()->back()->withErrors( $validator)->withInput($request->all());
        }
        Operation::create([
            'ticket_id'=>$request->teckit_id,
            'ticket_num'=>$request->ticket_num,
            'operationName'=>$request->operationName,
            'Assistant'=>$request->Assistant,
            'Ansesthesia'=>$request->Ansesthesia,
            'Surgion'=>$request->Surgion,
            'Anaesthetest'=>$request->Anaesthetest,
            'dateTime'=>$request->dateTime,
            'OperationProcedures'=>$request->OperationProcedures
        ]);
        if($request->hasFile('medicalDeclaration')){
            $operation_id = Operation::latest()->first()->id;
            $file_name = $request->file('medicalDeclaration');
            $ticket_num = $request->ticket_num;
            $file_name = $file_name->getClientOriginalName();

            $attachments = new OperationAttachment();
            $attachments->medicalDeclaration = $file_name;
            $attachments->ticket_num = $ticket_num;
            $attachments->operation_id = $operation_id;
            $attachments->save();

            $image_name = $request->medicalDeclaration->getClientOriginalName();
            $request->medicalDeclaration->move(public_path('Tickets/'.$ticket_num),$image_name);
        }
        toastr()->success("تمت إضافة بيانات العمليه بنجاح");
        return redirect()->route('operation.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $operation = Operation::findOrFail($id);
        return view('operation.show',compact('operation'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $operation = Operation::findOrFail($id);
        return view('operation.edit',compact('operation'));
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
           
            'operationName'=> 'required',
            'Assistant'=> 'required',
            'Ansesthesia'=> 'required',
            'Surgion'=> 'required',
            'Anaesthetest'=> 'required',
            'dateTime'=> 'required',
            'OperationProcedures'=> 'required',
        ];
        $messages = [
            
            'operationName.required' => ' يجب إدخال إسم العمليه',
            'Assistant.required' => ' يجب إدخال اسم المساعد',
            'Ansesthesia.required' => ' يجب تحديد نوع التخدير',
            'Surgion.required' => ' يجب إدخال اسم الطبيب الجراح',
            'Anaesthetest.required' => ' يجب إدخال اسم طبيب التخدير',
            'dateTime.required' => ' يجب تحديد تاريخ و زمن العمليه',
            'OperationProcedures.required' => ' يجب إدخال إجراءات العمليه',
        ];
        $validator = Validator::make($request->all(),$role,$messages);
        if($validator  -> fails()){
            return redirect()->back()->withErrors( $validator)->withInput($request->all());
        }
        $operation = Operation::findOrFail($id);
        $operation->update([
            'operationName'=>$request->operationName,
            'Assistant'=>$request->Assistant,
            'Ansesthesia'=>$request->Ansesthesia,
            'Surgion'=>$request->Surgion,
            'Anaesthetest'=>$request->Anaesthetest,
            'dateTime'=>$request->dateTime,
            'OperationProcedures'=>$request->OperationProcedures
        ]);
        toastr()->success("تمت تعديل بيانات العمليه بنجاح");
        return redirect()->route('operation.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id , Request $request)
    {
        $birth = Operation::where('id',$id)->first();
        $details = OperationAttachment::where('id',$id)->first();
        $id_page = $request->id_page;

        if($id_page==2){

            $birth->delete();
            toastr()->success("تم أرشفة العمليه بنجاح");
            return redirect()->route('operation.index');

        }else{
            if(!empty($details->ticket_num)){
                Storage::disk('public_uploads')->deleteDirectory($details->invoice_num);
            }
            $birth->forceDelete();
            toastr()->success("تمت حذف العمليه بنجاح");
            return redirect()->route('operation.index');
        }
    }
}
