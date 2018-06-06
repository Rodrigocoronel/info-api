<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Query\Expression as Expression;

use App\Configuracion;

class ConfiguracionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        $data = Configuracion::all();
        $output = $data->transform(function($item){
            return $this->build_configuracion($item);
        });

        return response()->json($output);
    }

    public function register(Request $request){
        $output = [];
        $data = $request->input();
        $cliente = Configuracion::create($data);
       return $this->build_configuracion($cliente);

    }

     public function update (Request $request, $id) {
        $data = $request->input();        
        $cliente = Configuracion::find($id);       
        $cliente->update($data);
        return $this->build_configuracion($cliente);

    }
    public function show()
    {          
         $data = Configuracion::find(1);  
         return response()->json($data);
    }

     public function destroy($id)
    {        
        $item = Configuracion::find($id);
        $item->delete();
    }
    public function build_configuracion($u){
        return [

            'value'     => $u->id,
            'access_token'     => $u->access_token,
            
           
            
        ];
    }

}