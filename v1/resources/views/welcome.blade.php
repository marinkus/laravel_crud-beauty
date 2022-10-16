@extends('layouts.app')
@section('content')

<div class="container ">
    <div class="row justify-content-center block">
        <div class="col-5 justify-content-center hero-box">
            <h1>Hair stylist - MAC</h1>
            <p class="description">Ladies! When you look good - you feel good, when you feel good - you do good! Beauty is key to success!</p>
            <div class="buttons">
                <a class="btn btn-secondary" href="#">Gallery</a>
                <a class="btn btn-secondary" href="#">About</a>
            </div>
        </div>
        <div class="col-5 logo-box">
            <img src="{{URL::asset('assets/IMG_1665918435840.jpg')}}" alt="#">
        </div>
    </div>
</div>


@endsection
