<?php

namespace App\Http\Controllers;

use App\Models\Token;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Str;


class AuthController extends Controller
{
    function login(Request $request)
    {
        $messages = [
        'name' => 'Имя',
        'password' => 'Пароль',
        'login' => 'Логин',

    ];


        $valide = Validator::make($request->all(), [
            'login' => 'required|max:100|email',
        ]);


        $valide->setAttributeNames($messages);


        if ($valide->fails()) {
            return  response()->json([
                'error' => $valide->errors()
            ], 422);
        }


        $login = User::where('email', '=', $request->login)->first();
        if ($login) {
            if ($login->password == $request->password) {
                $rand = Str::random(64);
                $userToken =  Token::create([
                    'user_token_id' => $login->id,
                    'api_token' => $rand,
                    'del' => false,
                ]);

                return  response()->json(["token"=>$userToken->api_token], 200);
            }

        }

        return response()->json([
            'error' => [
                'code' => 401,
                'message' => 'Unauthorized',
                'data'=>['Неправильный логин или пароль']
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
            'password' => 'required|min:5',
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

}
