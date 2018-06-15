<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Query\Expression as Expression;

use App\Secciones;

class SeccionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        $data = Secciones::all();
        $output = $data->transform(function($item){
            return $this->build_categoria($item);
        });

        return response()->json($output);
    }


    public function has(Request $req)
    {
      $matches = $req->input("matches");
      $matches = array_unique($matches); 

      $data = Secciones::whereIn('has', $matches)->get();

      $data->transform(function($r) {

        return $this->build_categoria($r);

      });

      return response()->json($data);

    }

    public function register(Request $request){
        $output = [];
        $data = $request->input();
        $cliente = Secciones::create($data);
       return $this->build_categoria($cliente);

    }

     public function update (Request $request, $id) {
        $data = $request->input();        
        $cliente = Secciones::find($id);       
        $cliente->update($data);
        return $this->build_categoria($cliente);

    }
    public function show($id)
    {          
         $data = Secciones::find($id);  
         return response()->json($data);
    }
     public function seccion($seccion)
    {          
         $data = Secciones::where('seccion','=',$seccion)->get();  
         return response()->json($data);
    }

     public function destroy($id)
    {        
        $item = Secciones::find($id);
        $item->delete();
    }
    public function build_categoria($u){
        return [

            'value'     => $u->id,
            'has'     => "#".$u->seccion,
            'lat'     => $u->lat,
            'lng'     => $u->lng,
           
            
        ];
    }

}