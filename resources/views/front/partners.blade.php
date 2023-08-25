<?php //include("header.php");
?>
@extends('front.layout')
@section('title', 'Our Partners')
@section('frontpage')

    <!-- PAGE TITLE
            ================================================== -->
    <section class="page-title-section2 bg-img cover-background" data-overlay-dark="7"
        data-background="{{ asset('front/img/bg/bg5.jpg') }}">
        <div class="container">

            <div class="row">
                <div class="col-md-12">
                    <h1>Our Partners</h1>
                </div>
                <div class="col-md-12">
                    <ul class="ps-0">
                        <li><a href="{{ route('front.home') }}">Home</a></li>
                        <li><a href="{{ route('front.about') }}">About Us</a></li>
                        <li><a href="{{ route('front.partners') }}">Partners</a></li>
                    </ul>
                </div>
            </div>

        </div>
    </section>
    <section class="bg-light box-hover p-10">
        <div class="container">
            <div class="position-relative">
                <div class="owl-carousel owl-theme clients" id="clients">
                    @if (getClient())
                        @foreach (getClient() as $client)
                            <div class="item"><img alt="partner-image"
                                    src="{{ asset('clients/images/') }}/{{ $client->image }}"></div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </section>

@endsection
