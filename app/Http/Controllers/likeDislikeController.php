<?php

namespace App\Http\Controllers;

use App\Models\LikesDislike;
use Illuminate\Support\Facades\Auth;

class likeDislikeController extends Controller
{
    public function like($postId)
    {
        //variable to pull out just one record
        $isExist = LikesDislike::where('post_id', '=', $postId)->where('user_id', '=', Auth::user()->id)->first();

        //condition for one profile one like
        if ($isExist == true) {
            if ($isExist->type == 'like') {
                return back();
            } else {
                LikesDislike::where('id', $isExist->id)->update([
                    'type' => 'like',
                ]);
                return back();
            }
        } else {
            LikesDislike::create([
                'post_id' => $postId,
                'user_id' => Auth::user()->id,
                'type' => 'like',
            ]);
            return back();
        }
    }

    public function dislike($postId)
    {
        //variable to pull out just one record
        $isExist = LikesDislike::where('post_id', '=', $postId)->where('user_id', '=', Auth::user()->id)->first();

        //condition for one profile one dislike
        if ($isExist) {
            if ($isExist->type == 'dislike') {
                return back();
            } else {
                LikesDislike::where('id', $isExist->id)->update([
                    'type' => 'dislike',
                ]);
                return back();
            }
        } else {
            LikesDislike::create([
                'post_id' => $postId,
                'user_id' => Auth::user()->id,
                'type' => 'dislike',
            ]);
            return back();
        }
    }
}
