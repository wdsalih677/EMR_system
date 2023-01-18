<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('patients.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('patients.add');
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
        return view('patients.f_data');
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
        //
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
    public function search(){
        $values = $_GET['value'];
        $tickets = Ticket::where('ticket_num','like','%'.$values.'%')->get();
        $output = '';
        foreach($tickets as $ticket){
            $output = '
            <div class="mb-3">
                <input type="hidden" name="id" value="'.$ticket->id.'">
                <label class="form-label" for="exampleInputEmail1">اسم :</label>
                <label class="form-control" value="'.$ticket->name.'" style="height: 49px;">
            </div>
            <div class="mb-3">
                <label class="form-label" for="exampleInputEmail1">العمر :</label>
                <label class="form-control" value="'.$ticket->age.'" style="height: 49px;">
            </div>
            ';
        }
        return $data = array(
            'row_result'=>$output,
        );
    }
}
