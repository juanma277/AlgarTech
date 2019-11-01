<?php

namespace AlgarTech\Http\Controllers;

use Illuminate\Http\Request;
use Validator, DB;
use AlgarTech\Client;
use Session;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::all();
        return view('clients.index', ["clients"=>$clients]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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
            Session::flash('message', 'Error datos incompletos');
            return view('clients.create')->withErrors($validator->errors());
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

        $clients = Client::all();

        Session::flash('message', 'Correcto registro creado');

        return view('clients.index', ["clients"=>$clients]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $client = Client::find($id);
        return view('clients.delete', ["client"=>$client]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $client = Client::find($id);
        return view('clients.edit', ["client"=>$client]);
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
        $credentials = $request->only('nombre', 'direccion', 'telefono', 'tipoCliente', 'pais', 'departamento', 'ciudad');
        
        $rules = [
            'nombre'  => 'required|min:3', 
            'direccion' => 'required|min:3', 
            'telefono'  => 'required|min:3', 
            'tipoCliente'  => 'required', 
            'pais'  => 'required|min:3', 
            'departamento'  => 'required|min:3', 
            'ciudad'  => 'required|min:3'
        ];

        $validator = Validator::make($credentials, $rules);

        if($validator->fails()) {
            Session::flash('message', 'Error datos incompletos');
            return view('clients.edit')->withErrors($validator->errors());;
        }

        $nombre = $request->nombre;
        $direccion = $request->direccion;
        $telefono = $request->telefono;
        $tipoCliente = $request->tipoCliente;
        $pais = $request->pais;
        $departamento = $request->departamento;
        $ciudad = $request->ciudad;
        
        DB::table('clients')->where('id', $id)->update([
            'nombre'  => $nombre, 
            'direccion' => $direccion,
            'telefono'  => $telefono, 
            'tipoCliente'  => $tipoCliente, 
            'pais'  => $pais, 
            'departamento'  => $departamento, 
            'ciudad'  => $ciudad
        ]);

        $clients = Client::all();

        Session::flash('message', 'Correcto registro actualizado');
        return view('clients.index', ["clients"=>$clients]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $client = Client::find($id);
        $client->delete();        
        $clients = Client::all();
        Session::flash('message', 'Correcto registro eliminado');
        return view('clients.index', ["clients"=>$clients]);
    }
}
