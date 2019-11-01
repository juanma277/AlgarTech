<?php

namespace AlgarTech\Http\Controllers;

use Illuminate\Http\Request;
use Validator, DB;
use AlgarTech\Client;

class ClientsApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $clients = Client::all();
            
            return response()->json([
                'error' => false,
                'total' => count($clients),
                'data' => $clients
            ]);

        }catch(\Exception $ex){
            return response()->json([
                'error' => true,
                'message' => $ex->getMessage()
            ]);            
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        try{
            $credentials = $request->only('nombre', 'direccion', 'telefono', 'tipoCliente', 'pais', 'departamento', 'ciudad');
        
            $rules = [
                'nombre'  => 'required|min:3', 
                'direccion' => 'required|min:3', 
                'telefono'  => 'required|min:3|numeric', 
                'tipoCliente'  => 'required', 
                'pais'  => 'required|min:3', 
                'departamento'  => 'required|min:3', 
                'ciudad'  => 'required|min:3'
            ];
    
            $validator = Validator::make($credentials, $rules);
    
            if($validator->fails()) {
                return response()->json([
                    'error' => true,
                    'data' => $validator->errors()
                ]);
            }
    
            $nombre = $request->nombre;
            $direccion = $request->direccion;
            $telefono = $request->telefono;
            $tipoCliente = $request->tipoCliente;
            $pais = $request->pais;
            $departamento = $request->departamento;
            $ciudad = $request->ciudad;
           
            $client = Client::create([
                'nombre'  => $nombre, 
                'direccion' => $direccion,
                'telefono'  => $telefono, 
                'tipoCliente'  => $tipoCliente, 
                'pais'  => $pais, 
                'departamento'  => $departamento, 
                'ciudad'  => $ciudad
            ]);

            return response()->json([
                'error' => false,
                'data' => $client
            ]);

        }catch(\Exception $ex){
            return response()->json([
                'error' => true,
                'message' => $ex->getMessage()
            ]);            
        }
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{
            $credentials = $request->only('nombre', 'direccion', 'telefono', 'tipoCliente', 'pais', 'departamento', 'ciudad');
        
            $rules = [
                'nombre'  => 'required|min:3', 
                'direccion' => 'required|min:3', 
                'telefono'  => 'required|min:3|numeric', 
                'tipoCliente'  => 'required', 
                'pais'  => 'required|min:3', 
                'departamento'  => 'required|min:3', 
                'ciudad'  => 'required|min:3'
            ];
    
            $validator = Validator::make($credentials, $rules);
    
            if($validator->fails()) {
                return response()->json([
                    'error' => true,
                    'data' => $validator->errors()
                ]);
            }
    
            $nombre = $request->nombre;
            $direccion = $request->direccion;
            $telefono = $request->telefono;
            $tipoCliente = $request->tipoCliente;
            $pais = $request->pais;
            $departamento = $request->departamento;
            $ciudad = $request->ciudad;
           
            $client = DB::table('clients')->where('id', $id)->update([
                'nombre'  => $nombre, 
                'direccion' => $direccion,
                'telefono'  => $telefono, 
                'tipoCliente'  => $tipoCliente, 
                'pais'  => $pais, 
                'departamento'  => $departamento, 
                'ciudad'  => $ciudad
            ]);

            return response()->json([
                'error' => false,
                'message' => 'Registro actualizado'
            ]);

        }catch(\Exception $ex){
            return response()->json([
                'error' => true,
                'message' => $ex->getMessage()
            ]);            
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $client = Client::find($id);
            $client->delete();
            return response()->json([
                'error' => false,
                'message' => 'Registro eliminado'
            ]);
        }catch(\Exception $ex){
            return response()->json([
                'error' => true,
                'message' => $ex->getMessage()
            ]);            
        }
    }
}
