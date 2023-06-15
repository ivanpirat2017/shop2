<?php

namespace App\Http\Controllers;

use App\Models\Token;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;


class AuthController extends Controller
{
    function login(Request $request)
    {
        $valide = Validator::make($request->all(), [
            'email' => 'required|max:100|email',
        ]);
        if ($valide->fails()) {
            return  response()->json([
                'error' => $valide->errors()
            ], 422);
        }
        if ($user = User::where('email', '=', $request->email)->first()) {
            if ($user->verification) {
                Mail::send('authreg', ['userid' => $user->id, 'request' => $request], function ($message) use ($request, $user) {
                    $message->to($request->email, $user->last_name . ' ' . $user->first_name)->subject('Ваш ключ авторизации');
                    $message->from('buy@scooter-Kursk.ru', 'scooterKursk');
                });
                return  response()->json(null, 204);
            }
            return response()->json([
                'error' => [
                    'code' => 401,
                    'message' => 'Unauthorized',
                    'email' => [
                        'email  не подтвержден',
                    ]
                ]
            ], 401);
        }
        return response()->json([
            'error' => [
                'code' => 401,
                'message' => 'Unauthorized',
                'email' => [
                    'Email некорректен',
                ]
            ]
        ], 401);
    }
    function reg(Request $request)
    {
        $messages = [
            'name' => 'имя',
            'phone' => 'телефон',
            'email' => 'почта',
        ];
        $valide = Validator::make($request->all(), [
            'name' => 'required|max:100',
            'phone' => 'required|max:11',
            'email' => 'required|max:100|email|unique:users,email',
        ]);
        $valide->setAttributeNames($messages);
        if ($valide->fails()) {
            return  response()->json([
                'error' => $valide->errors()
            ], 422);
        }


        $userNull = User::all()->count();
        if ($userNull == 0) {
            $request['role'] = 'admin';
        }


        $userid =  User::create($request->all());
        $rand = Str::random(64);
        $userToken =  Token::create([
            'user_token_id' => $userid->id,
            'api_token' => $rand,
            'del' => false,
        ]);



        // User::where('email', '=', $request->email)->where('verification', '=', null)->delete();
        // $userid =  User::create($request->all());

        // Mail::send('authreg', ['userid' => $userid->id, 'request' => $request], function ($message) use ($request) {
        //     $message->to($request->email, 'Artem')->subject('Подтвердите Email');
        //     $message->from('buy@scooter-Kursk.ru', 'scooterKursk');
        // });


        return  response()->json(["token"=>$userToken->api_token], 200);
    }


    function authCheck()
    {
        return  response()->json([
            'data' => Auth::check()
        ], 200);
    }



    function authAdminCheck(Request $request)
    {
        if (Auth::user()->user->role == 'admin') {
            return  response()->json([
                'data' => Auth::check()
            ], 200);
        }
        return response()->json([
            'error' => [
                'code' => 401,
                'message' => 'not admin',
            ]
        ], 401);
    }

    public function logout(Request $request)
    {
        $token =  Token::where('api_token', '=', $request->api_token)->first();
        $token->api_token = null;
        $token->del = true;
        $token->save();
        return  response()->json(null, 204);
    }



    public function getTokens()
    {
        return  response()->json(['data' => Token::where('user_token_id', '=', Auth::user()->user_token_id)->where('del', '=', false)->get()], 200);
    }



    public function tokenUpdate(Request $request)
    {
        Token::where('api_token', '=', $request->api_token)->update([
            'browser' => $request->browser
        ]);
        return '';
    }


    public function verification(Request $request, $id)
    {
        $user = User::where('verificationkey', '=', $id)->first();
        if ($user) {
            if ($user->verification == false) {
                $user->verification = true;
                $user->save();
            }

            $rand = Str::random(64);
            Token::create([
                'user_token_id' => $user->id,
                'api_token' => $rand,
                'del' => false,
            ]);
            $key  = Str::random(64);
            $user->verificationkey = $key;
            $user->save();
            return Redirect::to(URL::to('/authgenreratetoken/' . $rand));
        }
        return Redirect::to(URL::to('/'));
    }
}
