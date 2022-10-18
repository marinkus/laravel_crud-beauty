@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row mb-4 mt-4">
            <div class="col-4 block justify-content-center hero-box">
                <h1 class="heading">About me</h1>
                <p class="description">Greeting! My name is Viktorija and I am a professional hari stylist - colorist. I'm
                    work at 2 salons - Elektrenai and Vilnius. You can contact me by Facebook - („Plauku stiliste - MAC“).
                </p>
                <h2 style="color: crimson">Site is in development mode</h2>
            </div>
            <div class="col-6 block">
                <img style="width: 100%" src="{{ URL::asset('images/received_627319622214407.jpeg') }}" alt="#">
            </div>
        </div>
        <div class="row bg-color-grey justify-content-center">
            <div class="col-5">
                <h2 class="heading margins">Where can you find me?</h2>
            </div>
        </div>
        <div class="row map-row">
            <div class="col-4 block map mt-4">
                <h3 class="heading">Salon: „Beauty house“</h3>
                <p class="description">Address: Trakų st. 3-4, Elektrėnai</p>
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1367.9704938819168!2d24.669168700803105!3d54.78624273120421!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46e7671fb5df108b%3A0x5549d2792926f822!2sTrak%C5%B3%20g.%203%2C%20Elektr%C4%97nai%2026118!5e0!3m2!1slt!2slt!4v1666015922274!5m2!1slt!2slt"
                    width="auto" height="auto" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <div class="col-4 block map mt-4">
                <h3 class="heading">Salon: „Mano harmonija“</h3>
                <p class="description">Address: Dainavos st. 6, Vilnius</p>
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2306.214637922914!2d25.26538691576592!3d54.68825048105209!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46dd94093aa4a40f%3A0x835bf3eb6bb992da!2sDainavos%20g.%206%2C%20Vilnius%2001400!5e0!3m2!1slt!2slt!4v1666016103266!5m2!1slt!2slt"
                    width="auto" height="auto" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>
@endsection
