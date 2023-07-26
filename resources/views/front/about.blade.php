<?php //include("header.php");?>
@extends('front.layout')
@section('title', 'About Us')
@section('frontpage')

    <!-- PAGE TITLE
            ================================================== -->
    <section class="page-title-section2 bg-img cover-background" data-overlay-dark="7" data-background="{{asset('front/img/bg/bg5.jpg')}}">
        <div class="container">

            <div class="row">
                <div class="col-md-12">
                    <h1>About Us</h1>
                </div>
                <div class="col-md-12">
                    <ul class="ps-0">
                        <li><a href="{{ route('front.home') }}">Home</a></li>
                        <li><a href="{{ route('front.about') }}">About Us</a></li>
                    </ul>
                </div>
            </div>

        </div>
    </section>

    <!-- ABOUT
            ================================================== -->
    <section class="md">
        <div class="container">
            @if($aboutData)
            @foreach($aboutData as $about)
            <div class="ps-lg-1-9">
                <!-- <h4 class="h3 mb-4">{{$about->heading}}</h4> -->
                {{-- $about->content --}}
                {!! html_entity_decode($about->content) !!}
            </div>
            @endforeach
            @endif
        </div>
    </section>


    @include('front.testimonial-section')
    @include('front.client-section')


@endsection
