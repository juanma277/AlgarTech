<?php

namespace AlgarTech\Http\Controllers;

use Illuminate\Http\Request;
use Validator, DB;
use AlgarTech\Categorie;
use Session;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Categorie::all();
        return view('categories.index', ["categories"=>$categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $credentials = $request->only('name');
        
        $rules = [
            'name' => 'required|min:3',
        ];

        $validator = Validator::make($credentials, $rules);

        if($validator->fails()) {
            Session::flash('message', 'Error datos incompletos');
            return view('categories.create');
        }

        $name = $request->name;
        
        $categorie = Categorie::create([
                'name' => $name,
        ]);

        $categories = Categorie::all();

        Session::flash('message', 'Correcto registro creado');

        return view('categories.index', ["categories"=>$categories]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categorie = Categorie::find($id);
        return view('categories.delete', ["categorie"=>$categorie]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categorie = Categorie::find($id);
        return view('categories.edit', ["categorie"=>$categorie]);
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
        $credentials = $request->only('name');
        
        $rules = [
            'name' => 'required|min:3',
        ];

        $validator = Validator::make($credentials, $rules);

        if($validator->fails()) {
            Session::flash('message', 'Error datos incompletos');
            return view('categories.edit');
        }

        $name = $request->name;
        
        DB::table('categories')->where('id', $id)->update([
            'name' => $name
        ]);

        $categories = Categorie::all();

        Session::flash('message', 'Correcto registro actualizado');

        return view('categories.index', ["categories"=>$categories]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categorie = Categorie::find($id);
        $categorie->delete();        
        $categories = Categorie::all();
        Session::flash('message', 'Correcto registro actualizado');
        return view('categories.index', ["categories"=>$categories]);
    }
}
