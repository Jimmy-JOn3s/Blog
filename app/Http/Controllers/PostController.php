<?php

namespace App\Http\Controllers;
 
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;



class PostController extends Controller
{
    public function indexPost()
    {
        $posts  = Post::all();
        return view('post.postShow',compact('posts'));

    }


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
        return redirect('/posts')->with('msg', 'Post has been created!! ');
    }

    public function edit($id)
    {
        $post = Post::find($id);
        return view('/post.edit',compact('post'));
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
        return redirect('/posts')->with('msg','Post has been updated!!');
      
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

 