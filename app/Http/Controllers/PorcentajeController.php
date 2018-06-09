<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Query\Expression as Expression;

use App\Porcentajes;
use PDF;

class PorcentajeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function print($poId)
    {
        $po  = Porcentajes::find(1);

        $pdf    = PDF::loadView('pdf.seccion', ['po' => $po ]);

        //
        return $pdf->stream("Seccion".$po->id.".pdf");
    }

     public function seccion($seccion)
    {          
         $data = Porcentajes::where('seccion','=',$seccion)->get();  
         return response()->json($data);
    }

   
}