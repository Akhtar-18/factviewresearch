@extends('front.layout')
@section('title', 'Clients Testimonials')
@section('frontpage')

    <!-- PAGE TITLE
                            ================================================== -->
    <section class="page-title-section pt-1-9 pb-1-9 bg-primary">
        <div class="container">

            <div class="row">
                <div class="col-md-12">
                    <ul class="ps-0">
                        <li><a href="{{ route('front.home') }}">Home</a></li>
                        <li><a href="{{ route('front.about') }}" class="text-white">About Us</a></li>
                        <li><a href="{{ route('front.testimonials') }}" class="text-white">Client Testimonials</a></li>
                    </ul>
                </div>
            </div>

        </div>
    </section>
    <section class="md">
        <div class="container">
            <div class="col-md-12 text-center">

                <h1 class="text-primary">Client Testimonials</h1>

            </div>
        </div>
    </section>
    <section class="parallax box-hover">
        <div class="container">
            <div class="position-relative">
                <div class="owl-carousel owl-theme">
                    @if (getTestimonial())
                        @foreach (getTestimonial() as $testimonial)
                            <div class="testmonial-single">
                                <p class="text-light-gray">{!! html_entity_decode($testimonial->comments) !!}</p>
                                <img src="{{ asset('testimonials/client_image/') }}/{{ $testimonial->client_image }}"
                                    class="rounded-circle" style="width: 100px;" alt="...">
                                <h4 class="pt-4 text-white">{{ $testimonial->name }}</h4>
                                <h6 class="mb-1-9">{{ $testimonial->profile }}</h6>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </section>

@endsection
