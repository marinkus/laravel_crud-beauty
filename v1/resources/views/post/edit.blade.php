@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-8 col-lg-6 form-div">
                <form action="{{route('post_edit', $post)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                <h3 class="heading">Edit post: {{$post->title}}</h3>
                <div class="mb-3">
                    <span class="input-group-text">Title</span>
                    <input value="{{ old('title', $post->title) }}" type="text" class="form-control" name="title">
                </div>
                <div class="mb-3">
                    <span class="input-group-text">Price</span>
                    <input value="{{ old('price', $post->price) }}" type="number" step="0.01" class="form-control" name="price">
                </div>
                <div class="mb-3">
                    <span class="input-group-text">Add photo</span>
                    <input type="file" class="form-control" name="title">
                </div>
                <div class="mb-3">
                    <span class="input-group-text">Comment</span>
                    <textarea class="form-control" name="comment">{{ old('comment', $post->comment) }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary mt-4">Save changes</button>
                </form>
            </div>
        </div>
    </div>
@endsection
