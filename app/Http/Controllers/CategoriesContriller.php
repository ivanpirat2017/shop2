<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Categorie;
class CategoriesContriller extends Controller
{
    function addCategories(Request $request)
    {

        $valide = Validator::make($request->all(), [
            'name' => 'required|max:100|unique:categories,name',
        ]);

        if ($valide->fails()) {
            return  response()->json([
                'error' => $valide->errors()
            ], 422);
        }

        if (request()->hasFile('logo')) {
            $logo = $request->logo ?  $request->file('logo')->store('public/images') : null;
        }

        DB::table('categories')->insert([
            'name' => $request->name ,
            'logo' =>  $logo ?? ''
        ]);
        return response()->json(null, 204);
    }

    function editCategories(Request $request)
    {
        $valide = Validator::make($request->all(), [
            'name' => 'required|max:100|unique:categories,name',
        ]);
        if ($valide->fails()) {
            return  response()->json([
                'error' => $valide->errors()
            ], 422);
        }

        if (request()->hasFile('logo')) {
            $logo = $request->logo ?  $request->file('logo')->store('public/images') : null;
        }

        Categorie::where('id', '=', $request->id)->update([
            'name' => $request->name ,
            'logo' =>  $logo ?? ''
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
