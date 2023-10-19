<?php

namespace App\Http\Controllers;

use App\Models\PatientFinalData;
use App\Models\Section;
use App\Models\Ticket;
use Countable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Testing\Constraints\CountInDatabase;
use SebastianBergmann\LinesOfCode\Counter;

class ReportController extends Controller
{
    function __construct(){
        $this->middleware('permission:أورنيك 3', ['only' => ['index']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        $sections = Section::pluck('id');
        $patents = PatientFinalData::whereIn('section_id', $sections)->distinct()->pluck('final_diagnosis');
        $tickets = Ticket::where('age', '<', 1)->get();
        $tickets14 = Ticket::whereBetween('age', [1,4])->get();
        $tickets514 = Ticket::whereBetween('age', [5,14])->get();
        $tickets1544 = Ticket::whereBetween('age', [15,44])->get();
        $tickets4564 = Ticket::whereBetween('age', [45,64])->get();
        $tickets65 = Ticket::where('age', '>', 65)->get();
        $data = [
            '1' => $tickets,
            '1-4' => $tickets14,
            '5-14' => $tickets514,
            '15-44' => $tickets1544,
            '45-64' => $tickets4564,
            '65' => $tickets65,
        ];

        return view('reports.index', compact('patents', 'data'));
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
}
