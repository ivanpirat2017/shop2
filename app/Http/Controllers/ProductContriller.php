<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
class ProductContriller extends Controller
{
    function addProduct(Request $request)
    {

        $valide = Validator::make($request->all(), [
            'name' => 'required|max:255|unique:products,name',
            'description' => 'required',
            'price' => 'required',
            'categories_id' => 'required',
        ]);

        if ($valide->fails()) {
            return  response()->json([
                'error' => $valide->errors()
            ], 422);
        }

        // if (request()->hasFile('logo')) {
        //     $logo = $request->logo ?  $request->file('logo')->store('public/images') : null;
        // }

        DB::table('products')->insert([
            'name' => $request->name ,
            'description' => $request->description ,
            'price' => $request->price ,
            'categories_id' => $request->categories_id ,
            'count' => $request->count ,
            'tags' => $request->tags ,
            'reting' => $request->reting ?? 0.000,
        ]);
        return response()->json(null, 204);
    }

    function editProduct(Request $request)
    {
        $valide = Validator::make($request->all(), [
            'id' => 'required',
            'name' => 'required|max:255|unique:products,name',
        ]);


        if ($valide->fails()) {
            return  response()->json([
                'error' => $valide->errors()
            ], 422);
        }

        $productId = DB::table('products')->find($request->id);
        DB::table('products')->where('id', '=', $request->id)->update([
            'name' => $request->name  ?? $productId->name,
            'description' => $request->description  ?? $productId->description ,
            'price' => $request->price  ?? $productId->price ,
            'categories_id' => $request->categories_id  ?? $productId->categories_id ,
            'count' => $request->count  ?? $productId->count ,
            'tags' => $request->tags  ?? $productId->tags ,
            'reting' => $request->reting  ?? $productId->reting  ,

        ]);
        return response()->json(null, 204);
    }
    function getCategories(Request $request)
    {
        $categories = DB::table('categories')->select('name', 'id', 'logo')->get();

        return response()->json(['data' => $categories], 200);
    }

    function deleteCategories($id)
    {
        if (!Auth::user()->user->role == 'admin') {
            return response()->json([
                'error' => [
                    'code' => 401,
                    'message' => 'not admin',
                ]
            ], 401);
        }
        DB::table('categories')->delete($id);
        return response()->json(null, 204);
    }
}
