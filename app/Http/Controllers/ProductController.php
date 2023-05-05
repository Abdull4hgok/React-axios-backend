<?php

namespace App\Http\Controllers;

use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth; 
use Validator;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return response ()-> json($products);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        
      $product = new Product();
      $product->name = $request->name;
      $product->price = $request->price;
      $product->description = $request->description;
      $product->save();
      return response()->json('Urun basariyla eklendi.');
        
      
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
        $product = Product::find($id);
        return response()->json($product);



        
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
      
        $product = Product::find($id);
        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->update();
        return response()->json('Urun basariyla duzenlendi.');
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::destroy($id);
        return response()->json('Urun basariyla silindi.');
    }
}
