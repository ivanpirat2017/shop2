<?php

namespace App\Http\Controllers;

use App\Http\Resources\CommentResource;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CommentController extends Controller
{
    function addcoment(Request $request)
    {
        if (DB::table('comments')->where('user_id', '=', Auth::user()->user_token_id)->where('product_id', '=', $request->product_id)->count() != 0) {
            return response()->json(['error' => 'Вы уже  оставили коментарий'], 422);
        }
        DB::table('comments')->insert([
            'user_id' => Auth::user()->user_token_id,
            'product_id' => $request->product_id,
            'message' => $request->message,
        ]);
        return response()->json(null, 204);
    }

    function getcommentbook($product_id)
    {
        $commets = CommentResource::collection(Comment::where('comments.product_id', '=', $product_id)->where('selection', '=', true)->orderBy('id', 'desc')->get());
        return response()->json(['data' => $commets,], 200);
    }
    function getcommentAdmin($cmd)
    {
        if (Auth::user()->user->getAdminBool()) {
            if ($cmd == 'dell') {
                $commets = CommentResource::collection(Comment::where('dell', '=', true)->orderBy('id', 'desc')->limit(400)->get());
            } else  if ($cmd == 'push') {
                $commets = CommentResource::collection(Comment::where('selection', '=', true)->orderBy('id', 'desc')->limit(400)->get());
            } else {
                $commets = CommentResource::collection(Comment::where('dell', '=', false)->where('selection', '=', false)->orderBy('id', 'desc')->limit(400)->get());
            }

            return response()->json(['data' => $commets,], 200);
        }
        return response()->json([], 404);
    }
    function UpdataCommentAdmin(Request $request)
    {
        if (Auth::user()->user->getAdminBool()) {
            if ($request->comand == 'dell') {
                Comment::find($request->id)->dell();
            }
            if ($request->comand == 'push') {
                Comment::find($request->id)->push();
            }
            return response()->json([], 204);
        }
        return response()->json([], 404);
    }
     
}
