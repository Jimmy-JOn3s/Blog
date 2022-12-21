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
    <title>User</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <h3>Users</h3>
            <hr>
            <div class=" d-flex justify-content-between">
                <h5>User List</h5>
                <hr>
                <a href="{{ url ('/users/create')}}" class=" btn btn-primary"> Add New</a>
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
                        <td>id</td>
                        <td>name</td>
                        <td>email</td>
                        <td>phone</td>
                        <td>address</td>
                        <td>role</td>
                        <td>action</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $u)
                    <tr>
                        <td>{{$u->id}}</td>
                        <td>{{$u->name}}</td>
                        <td>{{$u->email}}</td>
                        <td>{{$u->phone}}</td>
                        <td>{{$u->address}}</td>
                        <td>{{$u->role}}</td>

                        <td>
                            <form action="{{url('/users/' .$u->id) }}" method="post"> 
                                @method('delete')
                                @csrf
                               
                            <a href="{{ url('/users/' .$u->id. '/edit')}}" class="btn btn-primary ">Edit</a>
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