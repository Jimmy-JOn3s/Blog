@extends('admin-panel.master')
    @section('title','User-Create')
    @section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <div class="container py-5">
        <div class="row">
            <div class="col-md-12">
                <div class="d-flex justify-content-between">
                    <h5>Category Create Form</h5>
                    <a href="{{ url ('admin/users')}}" class="btn btn-secondary"> Back</a>
                 </div>
                 <form action="{{ url ('admin/users')}}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="">Name</label>
                        <input type="text" name="name" value="{{old('name')}}" class="form-control @error('name') is-invalid @enderror">
                        @error('title')
                        <Span class="invalid-feedback">{{$message}}</Span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="">Email</label>
                        <input type="text" name="email" value="{{old('email')}}" class="form-control @error('email') is-invalid @enderror">
                        @error('title')
                        <Span class="invalid-feedback">{{$message}}</Span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="">Phone</label>
                        <input type="text" name="phone" value="{{old('phone')}}" class="form-control @error('phone') is-invalid @enderror">
                        @error('title')
                        <Span class="invalid-feedback">{{$message}}</Span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="">Address</label>
                        <input type="text" name="address" value="{{old('address')}}" class="form-control @error('address') is-invalid @enderror">
                        @error('title')
                        <Span class="invalid-feedback">{{$message}}</Span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="">Role</label>
                        <select name="role" id="role">
                            <option value="Author">Arthor</option>
                            <option value="User">User</option>
                          </select>
                        {{-- <input type="text" name="role" value="{{old('role')}}" class="form-control @error('role') is-invalid @enderror">
                        @error('title')
                        <Span class="invalid-feedback">{{$message}}</Span>
                        @enderror --}}
                    </div>
                    <div class="mb-3">
                        <label for="">Password</label>
                        <input type="password" name="password" value="{{old('password')}}" class="form-control @error('password') is-invalid @enderror">
                        @error('password')
                        <Span class="invalid-feedback">{{$message}}</Span>
                        @enderror
                    </div>
                    <button class="btn btn-primary">Save</button>
                 </form>

            </div>
        </div>
    </div>
@endsection
