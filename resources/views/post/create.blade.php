@extends('admin-panel.master')
    @section('title','Post-create')
    @section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <div class="container py-5">
        <div class="row">
            <div class="col-md-12">
                <div class="d-flex justify-content-between">
                    <h5>Post Create Form</h5>
                    <a href="{{ url ('admin/posts')}}" class="btn btn-secondary">Back</a>
                 </div>
                 <form action="{{ url ('admin/posts')}}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="">Title</label>
                        <input type="text" name="title" value="{{old('title')}}" class="form-control @error('title') is-invalid @enderror">
                        @error('title')
                        <Span class="invalid-feedback">{{$message}}</Span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="">Title</label>
                        <textarea name="content" id=""  rows="4"  class="form-control @error('content') is-invalid @enderror">{{old('content ')}}</textarea>
                        @error('content')
                        <Span class="invalid-feedback">{{$message}}</Span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <select name="category_id" id="" class="form-control @error('category_id') is-invalid @enderror">{{old('category_id ')}}">
                        <option value="">Select Category</option>
                        @foreach ($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select> 
                    @error('category_id')
                    <Span class="invalid-feedback">{{$message}}</Span>
                    @enderror
                    </div>
                    <button class="btn btn-primary">Save</button>
                 </form>

            </div>
        </div>
    </div>
@endsection