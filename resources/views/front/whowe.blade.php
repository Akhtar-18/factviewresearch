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

<!-- ABOUT
        ================================================== -->
        <section class="md">
            <div class="container">
                <div class="row">

                    <!-- about left section -->
                    <div class="col-lg-5 mb-1-9 mb-lg-0">

                        <div class="section-heading title-style5 left half">
                            <span>Who We Are</span>
                            <h2 class="text-uppercase font-weight-600">We are creative</h2>
                            <div class="square">
                                <span class="separator-left bg-primary"></span>
                                <span class="separator-right bg-primary"></span>
                            </div>
                        </div>

                        <p >Interior ipsum dolor sit amet, consectetur adipisicing elit. Assumenda veritatis quibusdam perferendis architecto impedit, libero eos, aut ea minima delectus autem, facilis, quia rerum beatae. Odio sapiente, consequatur libero obcaecati!</p>
                        <p >Design ipsum dolor sit amet, consectetur adipisicing elit. Assumenda veritatis quibusdam perferendis architecto impedit. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda veritatis quibusdam perferendis architecto impedit.</p>
                        <a href="#!" class="butn primary medium"><span>Read More</span></a>
                    </div>
                    <!-- end about left section -->

                    <!-- about right section -->
                    <div class="col-lg-7">
                        <div class="about-carousel ms-md-6 ms-lg-9">
                            <div class="owl-carousel owl-theme">
                                <div class="item"><img src="{{asset('front/img/interior/interior-about-01.jpg')}}" alt="..."></div>
                                <div class="item"><img src="{{asset('front/img/interior/interior-about-02.jpg')}}" alt="..."></div>
                                <div class="item"><img src="{{asset('front/img/interior/interior-about-03.jpg')}}" alt="..."></div>
                            </div>
                        </div>
                    </div>
                    <!-- end about right section -->

                </div>
            </div>

        </section>

        <!-- WHAT WE DO
        ================================================== -->
        <section class="parallax md" data-background="{{asset('front/img/interior/bg-pattern.png')}}" data-overlay-dark="9">
            <div class="container">
                <div class="row mt-n1-9">
                    <div class="col-lg-4 mt-1-9">

                        <div class="p-1-9 h-100 md-height-auto border border-color-dark-gray">

                            <div class="section-heading title-style5 half left white">
                                <h5>What we do</h5>
                                <div class="square">
                                    <span class="separator-left bg-primary"></span>
                                    <span class="separator-right bg-primary"></span>
                                </div>
                            </div>

                            <p class="text-light-gray">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda veritatis quibusdam perferendis architecto impedit, libero eos aut ea minima delectus autem, facilis.</p>
                            <p class="text-light-gray">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda veritatis quibusdam perferendis architecto impedit, libero eos, aut ea minima delectus autem, facilis, quia rerum quia rerum beatae.</p>
                            <a href="#!" class="butn small primary white-hover"><span>Read More</span></a>

                        </div>

                    </div>
                    <div class="col-lg-4 mt-1-9">
                        <div class="h-100 card border-0 rounded-0">
                            <img alt="..." src="{{asset('front/img/interior/interior-com.jpg')}}" class="card-img rounded-0">
                            <div class="card-body p-1-6 p-lg-2-6 text-center">
                                <h3 class="text-center font-weight-600 h5 text-uppercase mb-2">Commercial design</h3>
                                <p >Exhaustive commercial design of implementing office is putting your project successful.</p>
                                <div class="mt-2"><a href="#!" class="butn small primary"><span>Read More</span></a></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mt-1-9">
                        <div class="h-100 card border-0 rounded-0">
                            <img alt="..." src="{{asset('front/img/interior/interior-home.jpg')}}" class="card-img rounded-0">
                            <div class="card-body p-1-6 p-lg-2-6 text-center">
                                <h3 class="text-center font-weight-600 h5 text-uppercase mb-2">Residential design</h3>
                                <p >Exhaustive residential design of implementing home is putting your project successful.</p>
                                <div class="mt-2"><a href="#!" class="butn small primary"><span>Read More</span></a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        @include('front.testimonial-section')
        @include('front.client-section')
@endsection
