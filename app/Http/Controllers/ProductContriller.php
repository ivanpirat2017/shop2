<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Product_img;

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
        $product = Product::create([
            'name' => $request->name ,
            'description' => $request->description ,
            'price' => $request->price ,
            'categories_id' => $request->categories_id ,
            'count' => $request->count ,
            'tags' => $request->tags ,
            'reting' => $request->reting ?? 0.000,
        ]);

        $images =  $request->file('files');
        if (request()->hasFile('files')) {

            foreach ($images as $image) {
                $fileImg = $image->store('public/images');
                Product_img::create([
                    'image' => $fileImg,
                    'products_id' =>$product->id
                ]);

            }
        }


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
        $product_old = DB::table('products')->find( $request->id );

        Product::where('id', '=', $request->id)->update([
            'name' => $request->name ??$product_old->name,
            'description' => $request->description ??$product_old->description,
            'price' => $request->price ??$product_old->price,
            'categories_id' => $request->categories_id ??$product_old->categories_id,
            'count' => $request->count ??$product_old->count,
            'tags' => $request->tags ??$product_old->tags,
            'reting' => $request->reting ??$product_old->reting,
        ]);

        $images =  $request->file('files');
        if (request()->hasFile('files')) {

            foreach ($images as $image) {
                $fileImg = $image->store('public/images');
                Product_img::create([
                    'image' => $fileImg,
                    'products_id' =>$product_old->id
                ]);

            }
        }


        return response()->json(null, 204);
    }
    function getProduct(Request $request)
    {
        $categories = Product::get();

        return response()->json(['data' => $categories], 200);
    }
    function getSearchProduct(Request $request)
    {
        $search = $_GET['query'];

        $categories = Product::orWhere('tags', 'like', '%' . $search . '%')->orWhere('name', 'like', '%' . $search . '%')->orWhere('description', 'like', '%' . $search . '%')->get();

        return response()->json(['data' => $categories], 200);
    }

    function deleteProduct($id)
    {
        if (!Auth::user()->user->role == 'admin') {
            return response()->json([
                'error' => [
                    'code' => 401,
                    'message' => 'not admin',
                ]
            ], 401);
        }
        DB::table('products')->delete($id);
        return response()->json(null, 204);
    }
}
