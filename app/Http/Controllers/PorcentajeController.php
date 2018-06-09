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


    public function print($distrito)
    {
        ini_set('memory_limit', '-1');
        $po  = Porcentajes::where('distrito','=',$distrito)->take(10)->get();
        //$po  = Porcentajes::find(1);
        //mkdir(storage_path().'/'.$distrito);
            $pdf    = PDF::loadView('pdf.seccion', ['valores' => $po ]);
            //echo 'oli';

            //$pdf->save("Seccion".$value->id.".pdf");

            $pdf->save(storage_path().'/'.$distrito.'.pdf');
        
        
        //print_r($po);
        

        //
        
    }

     public function seccion($seccion)
    {          
         $data = Porcentajes::where('seccion','=',$seccion)->get();  
         return response()->json($data);
    }

   
}