
@extends('website.layout.app')

@section('content')
   <section class="error">
        <div class="error__inner">
            <div class="error__content">
                <img class="d-block mb-4" src="assets/images/error/404.png" alt="404 image">
                <h3 class="color--gradient-y mb-3">Opps! This Page Not Found</h3>
                <p>We are working hard to bring you new experience</p>
                <div class="text-center mt-5">
                    <a href="{{ url('/') }}" class="default-btn">Go Back To Home</a>
                </div>
            </div>
            <div class="error__thumb">
                <a href="index.html"><img src="assets/images/error/01.jpg" alt="Event Image"> </a>
            </div>
        </div>

    </section>

@endsection