@extends('admin-panel.master')
    @section('title','Comment')
    @section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <div class="container">
        <div class="row">
            <hr>
            <div class=" d-flex justify-content-between">
                
                <h5>Comment List</h5>
                <hr>
                <a href="{{ url ('admin/posts')}}" class=" btn btn-primary">Back</a>
            </div>
        </div>
        <div class="my-2"><strong>Post Name: </strong>{{$post->title}} </div>
        <div>
            @if(session() -> has('msg'))
            <div class=" alert alert-success">
                <span>{{ session()->get('msg')}}</span>
                <button data-bs-dismiss='alert' class='btn btn-close float-end'></button>
            </div>
            @endif 
            <table class=" table table-hover table-bordered">
                <thead>
                    <tr>
                        <td>id</td>
                        <td>text</td>
                        <td>status</td>
                        <td>action</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($comments  as $c)
                    <tr>
                        <td>{{$c->id}}</td>
                        <td>{{$c->text}}</td>
                        <td>{{$c->status}}</td>
                        <td>
                            @if ($c->status === 'approved')
                            <form action="{{url ('admin/posts/comments/'. $c->id.'/deny')}}" method="post"> 
                                @csrf
                            <button class="btn btn-danger" onclick="return confirm('are you sure to deny?')">Deny </button>
                            </form>
                            @else
                            <span class="badge bg-success">Denied</span>
                            @endif
                            
                        </td>
                    </tr>
                
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection