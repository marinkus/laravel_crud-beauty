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
                    <input type="file" class="form-control" name="photo[]" multiple>
                </div>
                <div class="img-small-ch mt-3">
                    @forelse($post->getPhotos as $photo)
                        <div class="image">
                            <label for="{{ $photo->id }}-del-photo">
                                X
                            </label>
                            <input type="checkbox" value="{{ $photo->id }}"
                                id="{{ $photo->id }}-del-photo" name="delete_photo[]">
                            <img src="{{ $photo->url }}" alt="photo">
                        </div>
                    @empty
                        <div class="img-small-ch mt-3">
                            <h5>Post has no images</h5>
                        </div>
                    @endforelse
                <div class="mb-3">
                    <span class="input-group-text">Comment</span>
                    <textarea class="form-control" name="comment">{{ old('comment', $post->comment) }}</textarea>
                </div>
                <button type="submit" class="btn btn-secondary mt-4 mb-2 ml-2">Save changes</button>
                </form>
            </div>
        </div>
    </div>
@endsection
