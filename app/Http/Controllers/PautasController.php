<?php

namespace App\Http\Controllers;

include 'mikml.php';

use Illuminate\Http\Request;
use Illuminate\Database\Query\Expression as Expression;

use App\Porcentajes;
use App\Porcentajes_senadores;
use PDF;
use DB;

class PautasController extends Controller
{

    public function seccionesPautadas($distrito , $periodo ) {

        $pautas = DB::table('pautas')
                ->select('*')
                ->get();

        $output = $pautas->transform(function($item){
            $colores = array( 'pan'=>'#0000ff','pri'=>'#aa0000', 'morena' => '#aa5500' , 'panpri'=>'#aa00ff' , 'panmorena'=>'#ffff00' , 'primorena'=>'#000000' );
            $color = '#0000ff';

            return [
                'seccion'   => $item->seccion,
                'color'     => $color,
                'distrito'  => 3
            ];
        });
        return response()->json($output);

    }
}