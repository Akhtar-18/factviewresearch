<?php //include("header.php");
?>
@extends('front.layout')
@section('title', 'Clients Testimonials')
@section('frontpage')

    <!-- PAGE TITLE
                ================================================== -->
    <section class="page-title-section2 bg-img cover-background" data-overlay-dark="7"
        data-background="{{ asset('front/img/bg/bg5.jpg') }}">
        <div class="container">

            <div class="row">
                <div class="col-md-12">
                    <h1>Our Testimonials</h1>
                </div>
                <div class="col-md-12">
                    <ul class="ps-0">
                        <li><a href="{{ route('front.home') }}">Home</a></li>
                        <li><a href="{{ route('front.about') }}">About Us</a></li>
                        <li><a href="{{ route('front.testimonials') }}">Testimonials</a></li>
                    </ul>
                </div>
            </div>

        </div>
    </section>
    <section class="parallax box-hover" data-overlay-dark="8" data-background="{{ asset('front/img/bg/bg8.jpg') }}">
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
