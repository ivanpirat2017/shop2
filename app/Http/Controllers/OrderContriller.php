<?php

namespace App\Http\Controllers;
use App\Models\Order;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Resources\OrderResource;
use Illuminate\Support\Facades\Auth;
class OrderContriller extends Controller
{
    function addOrder(Request $request)
    {

        $valide = Validator::make($request->all(), [
            'adress_id' => 'required',
        ]);

        if ($valide->fails()) {
            return  response()->json([
                'error' => $valide->errors()
            ], 422);
        }
        $products = DB::table('products')->whereIn('id', json_decode($request->products_buy))->get();


        // DB::table('orders')->insert([
        //     'user_id' => Auth::user()->user_token_id ,
        //     'description' => $request->description ?? '',
        //     'sum' => $request->sum  ,
        //     'adress_id' => $request->adress_id ,
        // ]);


        foreach ($products as $key) {

        }



        return response()->json(null, 204);
    }
    function getOrder(Request $request)
    {
        $order = OrderResource::collection(Order::where('id', '=',Auth::user()->user_token_id)->get());
        return response()->json(['data' => $order], 200);
    }
}
