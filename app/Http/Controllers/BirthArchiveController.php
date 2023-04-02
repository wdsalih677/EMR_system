<?php

namespace App\Http\Controllers;

use App\Models\Birth;
use Illuminate\Http\Request;

class BirthArchiveController extends Controller
{
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
}
