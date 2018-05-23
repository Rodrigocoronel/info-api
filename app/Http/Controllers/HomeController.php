<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Transfer;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function ushy()
    {
        // $all = Transfer::all();

        // foreach ($all as $transfer) {
            
        //     $split  = explode('/', $transfer->temporal);
        //     $size   = count($split);

        //     if($size == 3) {

        //         $mes    = $split[0];
        //         $dia    = $split[1];
        //         $anio   = 2017;

        //         $newDate = $anio."/".$mes."/".$dia;

        //         $transfer->date = $newDate;
        //         $transfer->save();

        //     }

        // }
    }
}