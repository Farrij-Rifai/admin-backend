<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    //BARIS UNTUK YANG TIDAK LOGIN TIDAK BISA MASUK
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index() 
    {
        return view('pages.dashboard');
    }
}
