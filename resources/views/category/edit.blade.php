@extends('admin-panel.master')
    @section('title','Category-Edit')
    @section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <div class="container py-3">
        <div class="row">
            <hr>
            <div class="col-md-12">
                <div class=" d-flex justify-content-between">
                    <h5>Category Edit Form</h5>
                    <a href="{{ url ('admin/categories')}}" class="btn btn-secondary"> Back</a>
                 </div>
                 <form action="{{ url ('admin/categories/'. $category->id)}}" method="post">
                    @csrf
                    @method('put')
                    <div class="mb-3">
                        <label for="">Title</label>
                        <input type="text" name="name" value="{{old('name') ?? $category->name}}" class="form-control @error('title') is-invalid @enderror">
                        @error('title')
                        <Span class="invalid-feedback">{{$message}}</Span>
                        @enderror
                    </div>
                    <button class="btn btn-primary">Save</button>
                 </form>

            </div>
        </div>
        <hr>
    </div>
@endsection