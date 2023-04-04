<?php
// **********************************************************************************************
// **********************************************************************************************
// *********************  Controoler to archive births & deaths   *******************************
// **********************************************************************************************
// **********************************************************************************************
namespace App\Http\Controllers;

use App\Models\Birth;
use App\Models\Death;
use Illuminate\Http\Request;

class BirthArchiveController extends Controller
{
    function __construct(){

        $this->middleware('permission:إرشيف المواليد', ['only' => ['index']]);

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $births = Birth::onlyTrashed()->get();
        return view('births.archiveBirth',compact('births'));
    }
    public function create(){
        $deaths = Death::onlyTrashed()->get();
        return view('deaths.archiveDeath',compact('deaths'));
    }
}
