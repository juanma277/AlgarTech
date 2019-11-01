<?php

namespace AlgarTech\Http\Controllers;

use Illuminate\Http\Request;
use AlgarTech\Product;
use AlgarTech\Categorie;
use Validator, DB;
use Session;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = DB::table('products')
                    ->join('categories', 'products.category_id', '=', 'categories.id')
                    ->select('products.*', 'categories.name AS categoria')
                    ->get();
        return view('products.index', ["products"=>$products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Categorie::all();
        return view('products.create', ["categories"=>$categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $credentials = $request->only('name', 'category_id', 'quantity');
        
        $rules = [
            'category_id' => 'required',
            'name' => 'required|min:3|max:50',
            'quantity' => 'required|numeric'
        ];

        $validator = Validator::make($credentials, $rules);

        if($validator->fails()) {
            Session::flash('message', 'Error datos incompletos');
            $categories = Categorie::all();
            $products = product::all();
            return view('products.create', ["products"=>$products, "categories" => $categories]);
        }

        $name = $request->name;
        $category_id = $request->category_id;
        $quantity = $request->quantity;
        
        $product = product::create([
            'name' => $name,
            'category_id' => $category_id,
            'quantity' => $quantity
        ]);

        $products = product::all();
        $categories = Categorie::all();

        Session::flash('message', 'Correcto registro creado');

        return view('products.index', ["products"=>$products, "categories" => $categories]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = product::find($id);
        return view('products.delete', ["product"=>$product]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = DB::table('products')
                    ->join('categories', 'products.category_id', '=', 'categories.id')
                    ->select('products.*', 'categories.name AS categoria')
                    ->where('products.id', '=', $id )
                    ->first();
        $categories = Categorie::all();

        return view('products.edit', ["product"=>$product, "categories" =>$categories]);
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
        $credentials = $request->only('name', 'category_id', 'quantity');
        
        $rules = [
            'category_id' => 'required',
            'name' => 'required|min:3|max:50',
            'quantity' => 'required|numeric'
        ];

        $validator = Validator::make($credentials, $rules);

        if($validator->fails()) {
            Session::flash('message', 'Error datos incompletos');
            return view('products.edit');
        }

        $name = $request->name;
        $category_id = $request->category_id;
        $quantity = $request->quantity;
        
        DB::table('products')->where('id', $id)->update([
            'name' => $name,
            'category_id' => $category_id,
            'quantity' => $quantity
        ]);

        $products = DB::table('products')
                ->join('categories', 'products.category_id', '=', 'categories.id')
                ->select('products.*', 'categories.name AS categoria')
                ->get();
        $categories = Categorie::all();

        Session::flash('message', 'Correcto registro actualizado');

        return view('products.index', ["products"=>$products, "categories" =>$categories]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = product::find($id);
        $product->delete();        
        $products = DB::table('products')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->select('products.*', 'categories.name AS categoria')
            ->get();
        Session::flash('message', 'Correcto registro eliminado');
        return view('products.index', ["products"=>$products]);
    }
}
