<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Section;
use App\Models\User;
use App\Models\Ward;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $sections = Section::get()->count();
        $wards = Ward::get()->count();
        $users = User::get();
        $doctors = Doctor::get()->count();
        return view('dashboard',compact('users','doctors','wards','sections'));
    }
}
