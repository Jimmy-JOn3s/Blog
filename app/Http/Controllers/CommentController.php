<?php

namespace App\Http\Controllers;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function comment(Request $request,$postId){

        $request->validate(
            [
                'text'=> 'required',
            ]
            );
        Comment::create([
            'text' => $request->text,
            'post_id'=> $postId,
            'user_id'=> Auth::user()->id
        ]);
        return back();
    }
}
