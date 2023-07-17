<?php //include("header.php");?>
@extends('front.layout')
@section('title', 'Who We Are')
@section('frontpage')

<!-- PAGE TITLE
        ================================================== -->
        <section class="page-title-section2 bg-img cover-background" data-overlay-dark="7" data-background="{{asset('front/img/bg/bg5.jpg')}}">
    <div class="container">

        <div class="row">
            <div class="col-md-12">
                <h1>Who We Are</h1>
            </div>
            <div class="col-md-12">
                <ul class="ps-0">
                    <li><a href="{{route('front.home')}}">Home</a></li>
                    <li><a href="{{ route('front.about') }}">About Us</a></li>
                    <li><a href="{{ route('front.whowe') }}">Who We Are</a></li>
                </ul>
            </div>
        </div>

    </div>
</section>

<!-- WHO WE ARE
            ================================================== -->
            <section class="md">
                <div class="container">
                    @if($whoweData)
                    @foreach($whoweData as $whowe)
                    <div class="ps-lg-1-9">
                        <h4 class="h3 mb-4">{{$whowe->heading}}</h4>
                        {{-- $whowe->content --}}
                        {!! html_entity_decode($whowe->content) !!}
                    </div>
                    @endforeach
                    @endif
                </div>
            </section>

        @include('front.testimonial-section')
        @include('front.client-section')
@endsection
