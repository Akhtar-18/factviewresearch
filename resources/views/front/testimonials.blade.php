<?php //include("header.php");?>
@extends('front.layout')
@section('title', 'Clients Tetimonials')
@section('frontpage')

<!-- PAGE TITLE
        ================================================== -->
<section class="page-title-section2 bg-img cover-background" data-overlay-dark="7" data-background="img/bg/bg5.jpg">
    <div class="container">

        <div class="row">
            <div class="col-md-12">
                <h1>Our Testimonials</h1>
            </div>
            <div class="col-md-12">
                <ul class="ps-0">
                    <li><a href="{{route('front.home')}}">Home</a></li>
                    <li><a href="{{ route('front.about') }}">About Us</a></li>
                    <li><a href="{{ route('front.testimonials') }}">Testimonials</a></li>
                </ul>
            </div>
        </div>

    </div>
</section>
@include('front.testimonial-section')

@endsection
