@extends('layouts.app')
@section('content')
    <div class="container ">
        <div class="row justify-content-center block">
            <div class="col-4 block justify-content-center hero-box">
                <h1 class="heading">Hair stylist - MAC</h1>
                <p class="description">Ladies! When you look good - you feel good, when you feel good - you do good! Beauty
                    is key to success!</p>
                <div class="buttons">
                    <button type="button" class="btn btn-secondary" data-bs-toggle="modal"
                        data-bs-target="#staticBackdrop">Gallery</button>
                    <a class="btn btn-secondary" href="#">About</a>
                </div>
            </div>
            <div class="col-6 block logo-box">
                <img src="{{ URL::asset('assets/IMG_1665918435840.jpg') }}" alt="#">
            </div>
        </div>


        {{--  Modal context lands here --}}
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Gallery</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        {{-- Carousel starts here --}}

                        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                @foreach ($photos as $photo)
                                    <div class="carousel-item {{$loop->iteration == 1 ? 'active' : ''}}">
                                        <img src="{{ $photo->url }}" class="d-block w-100" alt="...">
                                        <div class="carousel-caption d-md-block">
                                            <div class="modal-context">
                                                <h5 class="modal-content-title">{{ $photo->getPosts->title }}</h5>
                                                <h6 class="modal-date">{{ $photo->getPosts->created_at }}</h6>
                                                <p class="modal-description">{{ $photo->getPosts->comment }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach


                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                                data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                                data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>

                        {{-- Carousel ends here --}}
                    </div>
                    <div class="modal-footer">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
