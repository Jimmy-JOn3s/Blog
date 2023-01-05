<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Post;
use App\Models\LikesDislike;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UiController extends Controller
{
    public function indexPost()
    {
        $categories = Category::all();
        $posts  = Post::all();
        return view('post.postShow',compact('categories','posts'));

    }
    public function detailPost($id)
    {
        if(!Auth::check()){
            return redirect()->route('login');
            // return redirect('/login');
        }
        $post = Post::find($id);
        $likes = LikesDislike::where('post_id',$id)->where('type','like')->get();
        $dislikes = LikesDislike::where('post_id',$id)->where('type','dislike')->get();
        //displaying comments according to the post
        $comments = Comment::where('post_id',$id)->get();

        //disbabled condition for like status
        $likeStatus = LikesDislike::where('post_id',$id)->where('user_id',Auth::user()->id)->first();
       return view('post.post-detail', compact('post','likes','dislikes','likeStatus','comments'));
    }
}
