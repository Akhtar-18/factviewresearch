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
            <div class="row align-items-center">
                <div class="col-lg-6 mb-1-9 mb-lg-0">
                    <div>
                        <div class="section-heading left half">
                            <h2 class="title-style2">Welcome to Research Website</h2>
                        </div>
                        <p>Perspiciatis unde omnis iste natus error sit voluptatem accusantium accusantium laudantium, totam
                            rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae explicabo
                            ratione voluptatem sequi nesciunt.Perspiciatis unde omnis iste natus error sit voluptatem
                            accusantium accusantium laudantium.</p>
                        <a href="#!" class="butn medium"><span>About Company</span></a>
                    </div>
                </div>
                <!-- <div class="col-lg-5 offset-lg-1 text-center">
                            <div>
                                <img src="img/content/team-11.jpg" alt="..." class="w-50 float-start pe-1 border-radius-5">
                                <img src="img/content/team-10.jpg" alt="..." class="w-50 float-start ps-1 border-radius-5">

                            </div>
                        </div> -->
                <div class="col-lg-5 story-video offset-lg-1 text-center d-table">
                    <div class="d-table-cell vertical-align-middle border-radius-5 box-shadow-primary">
                        <a class="video" href="https://www.youtube.com/watch?v=f5BBJ4ySgpo">
                            <img src="{{asset('front/img/content/tab-img-02.jpg')}}" alt="..." class="w-100 float-start border-radius-5">
                            <div class="py-4 float-start w-100">
                                <h6 class="m-0"><span class="video_btn border-grey small me-3"><i
                                            class="fas fa-play"></i></span> Watch Our Story</h6>

                            </div>
                        </a>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ABOUT
            ================================================== -->
    <section>
        <div class="container">
            <div class="row">

                <div class="col-lg-5 mb-sm-4 mb-md-5 mb-lg-0">
                    <img src="{{asset('front/img/content/feature-01.jpg')}}" alt="..." class="border-radius-5 box-shadow-primary">
                </div>

                <div class="col-lg-7">
                    @if($aboutData)
                    @foreach($aboutData as $about)
                    <div class="ps-lg-1-9">
                        <h4 class="h3 mb-4">{{$about->heading}}</h4>
                        {{-- $about->content --}}
                        {!! html_entity_decode($about->content) !!}
                        <!-- <ul class="list-style-3">
                            <li>Marketing business plan</li>
                            <li>Advice business plan</li>
                            <li>Strategic business plan</li>
                            <li>Analize business plan</li>
                            <li>Consulting business plan</li>
                        </ul> -->
                        <a class="butn primary mt-2" href="#!"><span>Read more</span></a>
                    </div>
                    @endforeach
                    @endif

                </div>
            </div>
        </div>
    </section>

    <!-- BUSINESS WITH US
            ================================================== -->
    <section class="p-0 bg-black">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 cover-background d-none d-lg-block bg-img" data-overlay-dark="0"
                    data-background="{{asset('front/img/content/about-img7.jpg')}}"> </div>
                <div class="col-lg-6">
                    <div class="py-6 py-md-7 py-lg-10 px-3 px-lg-5 pull-left px-lg-0">
                        <div class="row">
                            <div class="col-12 px-0 px-md-auto">
                                <div class="section-heading left white">
                                    <h3>Improve business with us!</h3>
                                </div>
                            </div>
                            <!-- start feature box item-->
                            <div class="col-md-6 mb-4">
                                <div class="p-4 border-radius-5 bg-white h-100">
                                    <div class="text-extra-dark-gray alt-font display-27">
                                        <span class="me-2 d-block d-md-inline-block">01.</span>We believe Investment Banking
                                    </div>
                                    <p class="mb-0 mt-2">Ncididunt ut labore et dolore magna aliqua. Ut enim ad minim
                                        veniam, quis nostrud exercitation commodo consequat dummy text.</p>
                                </div>
                            </div>
                            <!-- end feature box item-->

                            <!-- start feature box item-->
                            <div class="col-md-6 mb-4">
                                <div class="p-4 border-radius-5 bg-white h-100">
                                    <div class="text-extra-dark-gray alt-font display-27">
                                        <span class="me-2 d-block d-md-inline-block">02.</span>We believe Online Consulting
                                    </div>
                                    <p class="mb-0 mt-2">Ncididunt ut labore et dolore magna aliqua. Ut enim ad minim
                                        veniam, quis nostrud exercitation commodo consequat dummy text.</p>
                                </div>
                            </div>
                            <!-- end feature box item-->

                            <!-- start feature box item-->
                            <div class="col-md-6 mb-4 mb-md-0">
                                <div class="p-4 border-radius-5 bg-white h-100">
                                    <div class="text-extra-dark-gray alt-font display-27">
                                        <span class="me-2 d-block d-md-inline-block">03.</span>We believe Saving Investments
                                    </div>
                                    <p class="mb-0 mt-2">Ncididunt ut labore et dolore magna aliqua. Ut enim ad minim
                                        veniam, quis nostrud exercitation commodo consequat dummy text.</p>
                                </div>
                            </div>
                            <!-- end feature box item-->

                            <!-- start feature box item-->
                            <div class="col-md-6">
                                <div class="p-4 border-radius-5 bg-white h-100">
                                    <div class="text-extra-dark-gray alt-font display-27">
                                        <span class="me-2 d-block d-md-inline-block">04.</span>We believe Financial Analysis
                                    </div>
                                    <p class="mb-0 mt-2">Ncididunt ut labore et dolore magna aliqua. Ut enim ad minim
                                        veniam, quis nostrud exercitation commodo consequat dummy text.</p>
                                </div>
                            </div>
                            <!-- end feature box item-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('front.testimonial-section')
        @include('front.client-section')
      

@endsection
