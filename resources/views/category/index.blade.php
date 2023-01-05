@extends('admin-panel.master')
    @section('title','Category-Index')
    @section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <div class="container">
        <div class="row">
            <hr>
            <div class=" d-flex justify-content-between">
                <h5>Category List</h5>
                <hr>
                <a href="{{ url ('admin/categories/create')}}" class=" btn btn-primary"> Add New</a>
            </div>
        </div>
        <div>
            @if(session() -> has('msg'))
            <div class=" alert alert-success">
                <span>{{ session()->get('msg')}}</span>
                <button data-bs-dismiss='alert' class='btn btn-close float-end'></button>
            </div>
            @endif 
            <table class=" table table-hover table-striped">
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>Name</td>
                        <td>Post Title</td>
                        <td>Action</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $c)
                    <tr>
                        <td>{{$c->id}}</td>
                        <td>{{$c->name}}</td>
                        <td>
                            @foreach ($c->posts as $post)
                                <div>
                                     # {{$post->title}}
                                </div>
                            @endforeach
                        </td>
                        <td>
                            <form action="{{url('admin/categories/' .$c->id) }}" method="post"> 
                                @method('delete')
                                @csrf
                               
                            <a href="{{ url('admin/categories/' .$c->id. '/edit')}}" class="btn btn-sm btn-primary ">Edit</a>
                            <button class="btn btn-sm btn-danger" onclick="return confirm('are you sure to delete?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection