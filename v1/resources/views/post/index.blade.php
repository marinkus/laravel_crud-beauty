@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">

                @forelse($posts as $post)
                    <div class="col-3 form-div">
                        @foreach($post->getPhotos as $photo)
                        <img src="{{$photo->url}}" alt="#">
                        @endforeach
                        <h3 class="heading">{{ $post->title }}, {{$post->price}} Eur</h3>
                        <p class="description">{{ $post->comment }}</p>
                        <p>{{ $post->created_at}}</p>
                        <div class="buttons">
                            <a href="{{ route('post_edit', $post) }}" type="button" class="btn btn-warning">Edit</a>
                            <form action="{{ route('post_delete', $post) }}" method="post">
                                @method('delete')
                                @csrf
                                <button type="submit" class="btn btn-secondary" @if (Auth::user()->role < 10) style="opacity: 0.3" disabled @endif>Delete</button>
                            </form>
                        </div>
                    </div>
                @empty
                    <p class="description">Photos will be uploaded soon.</p>
                @endforelse

        </div>
    </div>

@endsection
