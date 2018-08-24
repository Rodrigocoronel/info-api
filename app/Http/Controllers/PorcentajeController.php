<?php

namespace App\Http\Controllers;

include 'mikml.php';

use Illuminate\Http\Request;
use Illuminate\Database\Query\Expression as Expression;

use App\Porcentajes;
use App\Porcentajes_senadores;
use PDF;
use DB;

class PorcentajeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function build_seccion($item) {

        return [
            'seccion'   => (int)$item->seccion,
            'distrito'  => (int)$item->distrito,
            'municipio' => $item->municipio,
            'agua'      => (double)$item->agua,
            'basura'    => (double)$item->basura,
            'c_morena'  => (double)$item->c_morena,
            'c_otros'   => (double)$item->c_otros,
            'c_pan'     => (double)$item->c_pan,
            'c_pri'     => (double)$item->c_pri,
            'empleo'    => (double)$item->empleo,
            'gasolina'  => (double)$item->gasolina,
            'habitantes_seccion'  => (double)$item->habitantes_seccion,
            'p_morena'  => (double)$item->p_morena,
            'p_otros'   => (double)$item->p_otros,
            'p_pan'     => (double)$item->p_pan,
            'p_pri'     => (double)$item->p_pri,
            'seguridad' => (double)$item->seguridad,
            'servicios_publicos' => (double)$item->servicios_publicos,
            'varios'    => (double)$item->varios,
            'infrastructura_urbana' => (double) $item->infrastructura_urbana,
            'pie_partidos' => array(
                array( 'value' => (double) $item->p_pan, 'name' => 'Pan' ),
                array( 'value' => (double) $item->p_pri, 'name' => 'Pri'),
                array( 'value' => (double) $item->p_morena, 'name' => 'Morena'),
                array( 'value' => (double) $item->p_otros, 'name' => 'Otros') ),
            'pie_candidatos' => array(
                array( 'value' => (double) $item->c_pan, 'name' => 'Pan' ),
                array( 'value' => (double) $item->c_pri, 'name' => 'Pri'),
                array( 'value' => (double) $item->c_morena, 'name' => 'Morena'),
                array( 'value' => (double) $item->c_otros, 'name' => 'Otros') ),
            'labelP'    => 'Procupaciones',
            'created_at'    => $item->created_at,

        ];

    }

    public function build_seccion_senadores($item) {

        return [
            'seccion'   => (int)$item->seccion,
            'distrito'  => (int)$item->distrito,
            'municipio' => $item->municipio,
            'agua'      => (double)$item->agua,
            'basura'    => (double)$item->basura,
            'c_morena'  => (double)$item->c_morena,
            'c_otros'   => (double)$item->c_otros,
            'c_pan'     => (double)$item->c_pan,
            'c_pri'     => (double)$item->c_pri,
            'empleo'    => (double)$item->empleo,
            'gasolina'  => (double)$item->gasolina,
            'habitantes_seccion'  => (double)$item->habitantes_seccion,
            'p_morena'  => (double)$item->p_morena,
            'p_otros'   => (double)$item->p_otros,
            'p_pan'     => (double)$item->p_pan,
            'p_pri'     => (double)$item->p_pri,
            's1_pan'    => (double)$item->s1_pan,
            's1_pri'    => (double)$item->s1_pri,
            's1_morena'    => (double)$item->s1_morena,
            's1_otros'    => (double)$item->s1_otros,
            's2_pan'    => (double)$item->s2_pan,
            's2_pri'    => (double)$item->s2_pri,
            's2_morena'    => (double)$item->s2_morena,
            's2_otros'    => (double)$item->s2_otros,
            'seguridad' => (double)$item->seguridad,
            'servicios_publicos' => (double)$item->servicios_publicos,
            'varios'    => (double)$item->varios,
            'infrastructura_urbana' => (double) $item->infrastructura_urbana,
            'pie_partidos' => array(
                array( 'value' => (double) $item->p_pan, 'name' => 'Pan' ),
                array( 'value' => (double) $item->p_pri, 'name' => 'Pri'),
                array( 'value' => (double) $item->p_morena, 'name' => 'Morena'),
                array( 'value' => (double) $item->p_otros, 'name' => 'Otros') ),
            'pie_candidatos' => array(
                array( 'value' => (double) $item->s1_pan, 'name' => 'Pan' ),
                array( 'value' => (double) $item->s1_pri, 'name' => 'Pri'),
                array( 'value' => (double) $item->s1_morena, 'name' => 'Morena'),
                array( 'value' => (double) $item->s1_otros, 'name' => 'Otros') ),
            'pie_candidatos2' => array(
                array( 'value' => (double) $item->s2_pan, 'name' => 'Pan' ),
                array( 'value' => (double) $item->s2_pri, 'name' => 'Pri'),
                array( 'value' => (double) $item->s2_morena, 'name' => 'Morena'),
                array( 'value' => (double) $item->s2_otros, 'name' => 'Otros') ),
            'created_at'    => $item->created_at,
        ];

    }
    

     public function seccion($seccion, $periodo)
    {          
        $output = [];
        $container = [];
        $data = Porcentajes::where('seccion','=',$seccion)->where('created_at','=',$periodo)->get(); 

        $output = $data->transform(function($item){
            return $this->build_seccion($item);
        });

         return response()->json($output);
         
    }

    public function seccionSen($seccion, $periodo)
    {
        $output = [];

        $data = Porcentajes_senadores::where('seccion','=',$seccion)->where('created_at','=',$periodo)->get();  

        $output = $data->transform(function($item){
            return $this->build_seccion_senadores($item);
        });

         return response()->json($output);
    }

    public function Diputados($distrito, $periodo){
        $data = Porcentajes::where('distrito', '=' , $distrito)->where('created_at','=',$periodo)->get();

        return response()->json($data);
    }

    public function Senadores($distrito, $periodo){
        $data = Porcentajes_senadores::where('distrito', '=' , $distrito)->where('created_at','=',$periodo)->get();

        return response()->json($data);
    }

    public function promedioDiputados($distrito , $periodo) {
       
        $output[] = [];

        $distrito = Porcentajes::where('distrito','=',$distrito)->where('created_at','=',$periodo)->get();

            $output['pan']      = round($distrito->avg('c_pan'),2);
            $output['pri']      = round($distrito->avg('c_pri'),2);
            $output['morena']   = round($distrito->avg('c_morena'),2);
            $output['otros']    = round($distrito->avg('c_otros'),2);
            $output['label']    = 'candidatos';

        return response()->json($output);
    }

    public function promedioSenadores($periodo) {
        $output = [];
        $prom = Porcentajes_senadores::where('created_at','=',$periodo)->get();

        $promPan = $prom->avg('p_pan');
        $promPri = $prom->avg('p_pri');
        $promMorena = $prom->avg('p_morena');
        $promOtros = $prom->avg('p_otros');

        $output['pan'] = round($promPan,2);
        $output['pri'] = round($promPri,2);
        $output['morena'] = round($promMorena,2);
        $output['otros']  = round($promOtros,2);
        $output['label'] = 'partidos';

        return response()->json($output);
    }

    public function periodoDiputados(){

        $periodos = DB::table('porcentajes')
                ->select('created_at')
                ->groupBy('created_at')
                ->get();

        return response()->json($periodos);
    }   

    public function periodoSenadores(){

        $periodos = DB::table('porcentajes_senadores')
                ->select('created_at')
                ->groupBy('created_at')
                ->get();

        return response()->json($periodos);
    }  


    public function generarKml() {
        $x =1;

        for($x ; $x<9 ; $x++) {

            GenerarKML("Diputados","Distrito ".$x,"2018-05-31");

        }

        return response()->json(['done']);
    }


    public function seccionesDiputadosDistrito( $distrito,$periodo ) {

       

        $porcentajes = DB::table('porcentajes')
                ->select('seccion','c_pan','c_pri','c_morena','distrito')
                ->where('distrito','=',$distrito)
                ->where('created_at','=',$periodo)
                ->orderBy('seccion','asc')
                ->get();

        $output = $porcentajes->transform(function($item){
            $colores = array( 'pan'=>'#0000ff','pri'=>'#aa0000', 'morena' => '#aa5500' , 'panpri'=>'#aa00ff' , 'panmorena'=>'#ffff00' , 'primorena'=>'#000000' );
            $color = '';
            $finalKey = '';
            $array = [];
            $array['pan']       = (double)$item->c_pan;
            $array['pri']       = (double)$item->c_pri;
            $array['morena']    = (double)$item->c_morena;

            arsort($array);
            $keys = array_keys($array);

            $diferencia = abs($array[$keys[0]] - $array[$keys[1]] );

            if($diferencia > 2){
                if(array_key_exists($keys[0], $colores)){
                    $color = $colores[$keys[0]];
                    $finalKey = $keys[0];
                }else{
                    $color = 'default';
                }
            }else{
                if(array_key_exists($keys[0].''.$keys[1], $colores)){
                    $color = $colores[$keys[0].''.$keys[1]];
                    $finalKey = $keys[0].''.$keys[1];
                }else{
                    $color = $colores[$keys[1].''.$keys[0]];
                    $finalKey = $keys[1].''.$keys[0];
                }
                
            }
            return [
                'seccion'   => $item->seccion,
                'color'     => $color,
                'distrito'  => $item->distrito
            ];
        });
        return response()->json($output);

    }

    public function seccionesSenadoresDistrito( $distrito,$periodo ) {

       

        $porcentajes = DB::table('porcentajes_senadores')
                ->select('seccion','p_pan','p_pri','p_morena','distrito')
                ->where('distrito','=',$distrito)
                ->where('created_at','=',$periodo)
                ->orderBy('seccion','asc')
                ->get();

        $output = $porcentajes->transform(function($item){
            $colores = array( 'pan'=>'#0000ff','pri'=>'#aa0000', 'morena' => '#aa5500' , 'panpri'=>'#aa00ff' , 'panmorena'=>'#ffff00' , 'primorena'=>'#000000' );
            $color = '';
            $finalKey = '';
            $array = [];
            $array['pan']       = (double)$item->p_pan;
            $array['pri']       = (double)$item->p_pri;
            $array['morena']    = (double)$item->p_morena;

            arsort($array);
            $keys = array_keys($array);

            $diferencia = abs($array[$keys[0]] - $array[$keys[1]] );

            if($diferencia > 2){
                if(array_key_exists($keys[0], $colores)){
                    $color = $colores[$keys[0]];
                    $finalKey = $keys[0];
                }else{
                    $color = 'default';
                }
            }else{
                if(array_key_exists($keys[0].''.$keys[1], $colores)){
                    $color = $colores[$keys[0].''.$keys[1]];
                    $finalKey = $keys[0].''.$keys[1];
                }else{
                    $color = $colores[$keys[1].''.$keys[0]];
                    $finalKey = $keys[1].''.$keys[0];
                }
                
            }
            return [
                'seccion'   => $item->seccion,
                'color'     => $color,
                'distrito'  => $item->distrito
            ];
        });
        return response()->json($output);

    }

   
}