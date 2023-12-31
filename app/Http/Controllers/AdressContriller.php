<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
 
class AdressContriller extends Controller
{
    function addAdress(Request $request)
    {
        $valide = Validator::make($request->all(), [
            'name' => 'required|max:100|unique:adresses,name',
        ]);

        if ($valide->fails()) {
            return  response()->json([
                'error' => $valide->errors()
            ], 422);
        }

        DB::table('adresses')->insert([
            'name' => $request->name ,
            'coordinates' => $request->coordinates ?? '',
            'adress_point' => $request->adress_point  ?? '',
        ]);
        return response()->json(null, 204);
    }

    function getAdress(Request $request)
    {
        $adress = DB::table('adresses')->select('name', 'id', 'coordinates', 'adress_point')->get();

        return response()->json(['data' => $adress], 200);
    }

    function deleteAdress($id)
    {
        if (!Auth::user()->user->role == 'admin') {
            return response()->json([
                'error' => [
                    'code' => 401,
                    'message' => 'not admin',
                ]
            ], 401);
        }
        DB::table('adresses')->delete($id);
        return response()->json(null, 204);
    }
}
