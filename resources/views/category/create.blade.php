@extends('admin-panel.master')
    @section('title','Category-Create')
    @section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <div class="container py-5">
        <div class="row">
            <div class="col-md-12">
                <div class="d-flex justify-content-between">
                    <h5>Category Create Form</h5>
                    <a href="{{ url ('admin/categories')}}" class="btn btn-secondary"> Back</a>
                 </div>
                 <form action="{{ url ('admin/categories')}}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="">Title</label>
                        <input type="text" name="name" value="{{old('name')}}" class="form-control @error('name') is-invalid @enderror">
                        @error('title')
                        <Span class="invalid-feedback">{{$message}}</Span>
                        @enderror
                    </div>
                    <button class="btn btn-primary">Save</button>
                 </form>

            </div>
        </div>
    </div>
@endsection