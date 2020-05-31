<?php

namespace App\Http\Controllers;

use App\Helpers\APIHelpers;
use App\Http\Requests\SaveProductRequest;
use App\Product;
use Illuminate\Http\Request;

class apiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::all();
        $response = APIHelpers::createAPIResponce(false, 200, '', $product);
        return response()->json($response, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaveProductRequest $request)
    {
        $product = new Product();
        $product->id = $request->id;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;
        $product_bool = $product->save();
        if ($product_bool) {
            $response = APIHelpers::createAPIResponce(false, 201, 'Product Added Success', null);
            return response()->json($response, 201);
        }else
        {
            $response = APIHelpers::createAPIResponce(true, 400, 'Product Addition Failed', null);
            return response()->json($response, 400);
        }
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
        $response = APIHelpers::createAPIResponce(false, 200, '', $product);
        return response()->json($response, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SaveProductRequest $request, $id)
    {
        $product = Product::find($id);
        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;
        $product_bool = $product->save();
        if ($product_bool) {
            $response = APIHelpers::createAPIResponce(false, 200, 'Product Updation Success', null);
            return response()->json($response, 200);
        }else
        {
            $response = APIHelpers::createAPIResponce(true, 400, 'Product Updation Failed', null);
            return response()->json($response, 400);
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
        $product = Product::find($id);
        $product_bool=$product->delete();
        if ($product_bool) {
            $response = APIHelpers::createAPIResponce(false, 200, 'Product Deletion Success', null);
            return response()->json($response, 200);
        }else
        {
            $response = APIHelpers::createAPIResponce(true, 400, 'Product Deletion Failed', null);
            return response()->json($response, 400);
        }
    }
}
