<?php

namespace App\Http\Controllers;
 
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;
use App\Models\LikesDislike;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;



class PostController extends Controller
{
    // public function indexPost()
    // {
    //     $categories = Category::all();
    //     $posts  = Post::all();
    //     return view('post.postShow',compact('categories','posts'));

    // }

    // public function detailPost($id)
    // {
    //     if(!Auth::check()){
    //         return redirect()->route('login');
    //         // return redirect('/login');
    //     }
    //     $post = Post::find($id);
    //     $likes = LikesDislike::where('post_id',$id)->where('type','like')->get();
    //     $dislikes = LikesDislike::where('post_id',$id)->where('type','dislike')->get();
    //     //displaying comments according to the post
    //     $comments = Comment::where('post_id',$id)->get();

    //     //disbabled condition for like status
    //     $likeStatus = LikesDislike::where('post_id',$id)->where('user_id',Auth::user()->id)->first();
    //    return view('post.post-detail', compact('post','likes','dislikes','likeStatus','comments'));
    // }


    public function Index()
    {
        $title="Laravel-Tuto";
        // $posts=['Laravel','PHP','Python','Javascript','bootstrap'];
        $posts  = Post::all();
        return view('post.index',compact('title','posts'));
    }
    public function Create()
    {
        $categories = Category::all();
        return view('post.create',compact('categories'));
    }
    public function store(Request $request)
    {
        $formTitle = $request->title;
        $content = $request->content;
        $categoryId = $request->category_id;
        
        $request->validate(
            [
                'title'=> 'required',
                'content'=> 'required',
                'category_id' => 'required '

            ]
            );
        Post::create(
            [
                'title' => $formTitle,
                'content' => $content,
                'category_id' => $categoryId
            ]
            );


	

        // return back();
        return redirect('admin/posts')->with('msg', 'Post has been created!! ');
    }

    public function edit($id)
    {
        $post = Post::find($id);
        return view('post.edit',compact('post'));
    }

    Public function update(Request $request, $id)
    {
        $formTitle = $request->title;
        $content = $request->content;

        $request->validate(
            [
                'title'=> 'required',
                'content'=> 'required'
            ]
            );
        $post = Post::find($id);
        $post->update([
                'title' => $formTitle,
                'content' => $content
            ]);
        return redirect('admin/posts')->with('msg','Post has been updated!!');
      
    }


    public function destroy($id)
    {
        Post::find($id)->delete();
        return back()->with('msg','Post has been deleted');
    }

    #post with comment
    public function postComment($id)
    {
        $post  =Post::find($id);
        $comments = Comment::where('post_id', '=',$id)->get();
        return view('post.comment', compact('post','comments'));
    }

    public function deny($commentId)
    {
        $comment = Comment::find($commentId);
        $comment->update([
               'status' => 'denied',
            ]);
        return back()->with('msg','Comment has been denied');
           
    }
    
}

 