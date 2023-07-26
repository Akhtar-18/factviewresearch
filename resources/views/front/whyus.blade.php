<?php //include("header.php");
?>
@extends('front.layout')
@section('title', 'Why Choose Us')
@section('frontpage')

    <!-- PAGE TITLE
            ================================================== -->
    <section class="page-title-section2 bg-img cover-background" data-overlay-dark="7"
        data-background="{{ asset('front/img/bg/bg5.jpg') }}">
        <div class="container">

            <div class="row">
                <div class="col-md-12">
                    <h1>Why Choose Us</h1>
                </div>
                <div class="col-md-12">
                    <ul class="ps-0">
                        <li><a href="{{ route('front.home') }}">Home</a></li>
                        <li><a href="{{ route('front.about') }}">About Us</a></li>
                        <li><a href="{{ route('front.whyus') }}">Why Choose Us</a></li>
                    </ul>
                </div>
            </div>

        </div>
    </section>

    <!-- WHY CHOOSE US
                ================================================== -->
    <section class="md">
        <div class="container">
            @if (isset($whyusData))
                @foreach ($whyusData as $whyus)
                    <div class="ps-lg-1-9">
                        <!-- <h4 class="h3 mb-4">{{ $whyus->heading }}</h4> -->
                        {{-- $about->content --}}
                        {!! html_entity_decode($whyus->content) !!}
                    </div>
                @endforeach
            @endif
        </div>
    </section>
    @include('front.testimonial-section')
    @include('front.client-section')


@endsection
