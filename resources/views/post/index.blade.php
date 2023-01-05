@extends('admin-panel.master')
    @section('title','Post-Index')
    @section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
            </div>
            <hr>
            <div class=" d-flex justify-content-between">
                <h5>List of Posts: 
                    @if (auth()->check())
                        {{auth()->user()->name}}
                    @endif
                    </h5>
                
                <a href="{{ url ('admin/posts/create/')}}" class=" btn btn-primary"> Add New</a>
            </div>
            <!-- <ul class=" list-group list-group-fluid">
                @foreach($posts as $post)
                    <li class="list-group-item">{{$post}}</li>
                @endforeach
            </ul> -->
            
        </div>
        <div class="mt-3">
            @if(session() -> has('msg'))
            <div class=" alert alert-success">
                <span>{{ session()->get('msg')}}</span>
                <button data-bs-dismiss='alert' class='btn btn-close float-end'></button>
            </div>
            @endif 
            <table class=" table table-hover table-bordered">
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>Title</td>
                        <td>Content</td>
                        <td>Category</td>
                        <td>Action</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($posts as $p)
                    <tr>
                        <td>{{$p->id}}</td>
                        <td>{{$p->title}}</td>
                        <td>{{$p->content}}</td>
                        <td>{{$p->category->name }}</td>
                        <td>
                            <form action="{{url('admin/posts/' .$p->id . '/delete') }}" method="post"> 
                                @csrf
                            <a href="{{ url('admin/posts/' .$p->id. '/comments')}}" class="btn btn-sm btn-success ">Comments
                                <span class="badge text-bg-secondary">{{$p->comments->count()}}</span>
                            </a>
                            <a href="{{ url('admin/posts/'.$p->id.'/edit')}}" class="btn btn-sm btn-primary "><i class="fa-solid fa-pen-to-square"></i>
                                Edit</a>
                            <button class="btn btn-sm btn-danger" onclick="return confirm('are you sure to delete?')"><i class="fa-regular fa-trash-can"></i>
                                Delete</button>
                            </form>
                        </td>
                    </tr>
                
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection