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



        $order = Order::create([
            'user_id' => Auth::user()->user_token_id ,
            'description' => $request->description ?? '',
            'adress_id' => $request->adress_id ,
        ]);

        foreach ($products as $value) {
               DB::table('ordered_products')->insert([
                'product_id' => $value->id,
                'orders_id' => $order->id,
                'status' => 0,
                'delivery' => date("Y-m-d H:i:s",strtotime('+3 days')) ,
                'creating_product' => date("Y-m-d H:i:s"),
                'price' => $value->price,
        ]);
        }



        return response()->json(null, 204);
    }
    function getOrder(Request $request)
    {
        $order = OrderResource::collection(Order::where('user_id', '=',Auth::user()->user_token_id)->get());

        return response()->json(['data' => $order], 200);
    }
}
