 @extends('admin-panel.master')
    @section('title','User-Index')
    @section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <div class="container">
        <div class="row">
            <h3>Users</h3>
            <hr>
            <div class=" d-flex justify-content-between">
                <h5>User List</h5>
                <hr>
                <a href="{{ url ('admin/users/create')}}" class=" btn btn-primary"> Add New</a>
            </div>
        </div>
        <div class="mt-3">
                @if(session() -> has('msg'))
                <div class=" alert alert-success">
                    <span>{{ session()->get('msg')}}</span>
                    <button data-bs-dismiss='alert' class='btn btn-close float-end'></button>
                </div>
                @endif 
            <table class=" table table-hover table-bordered table-striped">
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>Name</td>
                        <td>Email</td>
                        <td>Phone</td>
                        <td>Address</td>
                        <td>Role</td>
                        <td>Action</td>
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
                            <form action="{{url('admin/users/' .$u->id) }}" method="post"> 
                                @method('delete')
                                @csrf
                               
                            <a href="{{ url('admin/users/' .$u->id. '/edit')}}" class="btn btn-sm btn-primary ">
                                <i class="fa-solid fa-pen-to-square"></i>Edit</a>
                            <button class="btn btn-sm btn-danger" onclick="return confirm('are you sure to delete?')">
                                <i class="fa-regular fa-trash-can"></i>    Delete</button>
                            </form>
                        </td>
                    </tr>
                
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @endsection