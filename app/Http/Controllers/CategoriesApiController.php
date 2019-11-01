<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator, DB;
use App\Categorie;

class CategoriesApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $categories = Categorie::all();
            
            return response()->json([
                'error' => false,
                'total' => count($categories),
                'data' => $categories
            ]);

        }catch(\Exception $ex){
            return response()->json([
                'error' => true,
                'message' => $ex->getMessage()
            ]);            
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            return response()->json([
                'error' => true,
                'message' => 'Error intenatlo nuevamente'
            ]);
        }

        $name = $request->name;
        
        $categorie = Categorie::create([
                'name' => $name,
        ]);

        $categories = Categorie::all();
        return response()->json([
            'error' => false,
            'total' => count($categories),
            'data' => $categories
        ]);

        }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
