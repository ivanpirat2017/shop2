<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserContriller extends Controller
{
    function updateprofile(Request $request)
    {
        if (request()->hasFile('logo')) {
            $logo = $request->logo ?  $request->file('logo')->store('public/images') : null;
        }

        $userid = DB::table('users')->find(Auth::user()->user_token_id);
        DB::table('users')->where('id', '=', Auth::user()->user_token_id)->update([
            'logo' => $logo ?? $userid->logo,
            'name' => $request->name ?? $userid->name,
            'email' => $request->email ?? $userid->email,
            'phone' => $request->phone ?? $userid->phone

        ]);
        return response()->json(null, 204);
    }

}
