<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Query\Expression as Expression;

use App\Porcentajes;
use App\Porcentajes_senadores;
use PDF;

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
        ];

    }
    

     public function seccion($seccion)
    {          
        $output = [];
        $container = [];
        $data = Porcentajes::where('seccion','=',$seccion)->get(); 

        $output = $data->transform(function($item){
            return $this->build_seccion($item);
        });

         return response()->json($output);
         
    }

    public function seccionSen($seccion)
    {
        $output = [];

        $data = Porcentajes_senadores::where('seccion','=',$seccion)->get();  

        $output = $data->transform(function($item){
            return $this->build_seccion_senadores($item);
        });

         return response()->json($output);
    }

    public function Diputados($distrito){
        $data = Porcentajes::where('distrito', '=' , $distrito)->get();

        return response()->json($data);
    }

    public function Senadores($distrito){
        $data = Porcentajes_senadores::where('distrito', '=' , $distrito)->get();

        return response()->json($data);
    }

    public function promedioDiputados() {
       
        $output = [];

        for ($x=1; $x < 9; $x++) { 
            $distrito = Porcentajes::where('distrito','=',$x)->get();
            array_push($output, 
                array(
                    'pan'       => round($distrito->avg('p_pan'),2),
                    'pri'       => round($distrito->avg('p_pri'),2), 
                    'morena'    => round($distrito->avg('p_morena'),2),
                    'otros'     => round($distrito->avg('p_otros'),2),
                )
            );

        }

        return response()->json($output);
    }

    public function promedioSenadores() {
        $output = [];
        $promPan = Porcentajes_senadores::avg('p_pan');
        $promPri = Porcentajes_senadores::avg('p_pri');
        $promMorena = Porcentajes_senadores::avg('p_morena');
        $promOtros = Porcentajes_senadores::avg('p_otros');

        $output['pan'] = round($promPan,2);
        $output['pri'] = round($promPri,2);
        $output['morena'] = round($promMorena,2);
        $output['otros']  = round($promOtros,2);
        $output['label'] = 'partidos';

        return response()->json($output);
    }

   

   
}