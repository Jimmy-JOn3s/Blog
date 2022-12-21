<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <title>Index</title>
</head>
<body>
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
                
                <a href="{{ url ('/posts/create/')}}" class=" btn btn-primary"> Add New</a>
            </div>
            <!-- <ul class=" list-group list-group-fluid">
                @foreach($posts as $post)
                    <li class="list-group-item">{{$post}}</li>
                @endforeach
            </ul> -->
            
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
                        <td>id</td>
                        <td>title</td>
                        <td>content</td>
                        <td>category</td>
                        <td>action</td>
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
                            <form action="{{url('/posts/' .$p->id . '/delete') }}" method="post"> 
                                @csrf
                            <a href="{{ url('/posts/' .$p->id. '/comments')}}" class="btn btn-success ">Comments
                                <span class="badge text-bg-secondary">{{$p->comments->count()}}</span>
                            </a>
                            <a href="{{ url('/comments/')}}" class="btn btn-primary ">Edit</a>
                            <button class="btn btn-danger" onclick="return confirm('are you sure to delete?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>