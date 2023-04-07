<?php

namespace App\Http\Controllers;

use App\Models\Operation;
use App\Models\OperationAttachment;
use Illuminate\Http\Request;

class OperationAttachmentController extends Controller
{
    function __construct(){

        $this->middleware('permission:إرشيف العمليات', ['only' => ['index']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $operations = Operation::onlyTrashed()->get();
        return view('operation.operationArchive',compact('operations'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OperationAttachment  $operationAttachment
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $operation = Operation::findOrFail($id);
        $attachments = OperationAttachment::where('operation_id',$id)->get();
        return view('operation.operationAttachment' ,compact('operation','attachments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OperationAttachment  $operationAttachment
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $operation = Operation::onlyTrashed()->findOrFail($id);
        $attachments = OperationAttachment::where('operation_id',$id)->get();
        return view('operation.operationAttachment' ,compact('operation','attachments'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\OperationAttachment  $operationAttachment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OperationAttachment $operationAttachment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OperationAttachment  $operationAttachment
     * @return \Illuminate\Http\Response
     */
    public function destroy(OperationAttachment $operationAttachment)
    {
        //
    }

    public function openFile( $ticket_number , $file_name ){
        $st="Tickets";
        $files = public_path($st.'/'.$ticket_number.'/'.$file_name);
        return response()->file($files);
    }
    public function downloadFile( $ticket_number , $file_name ){
        $st="Tickets";
        $files = public_path($st.'/'.$ticket_number.'/'.$file_name);
        return response()->download($files);
    }
}
