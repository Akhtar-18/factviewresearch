@extends('front.layout')
@section('title', 'Partners | Clients | Service Providers')
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
                        <li><a href="{{ route('front.partners') }}" class="text-white">Partners</a></li>
                    </ul>
                </div>
            </div>

        </div>
    </section>

    <section class="md">
        <div class="container">
            <div class="col-md-12 text-center">

                <h1 class="text-primary">Partners | Clients | Service Providers</h1>

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
                                    src="{{ asset('clients/images/') }}/{{ $client->image }}" width="200" height="50"></div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </section>

@endsection
