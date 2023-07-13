<?php //include("header.php");?>
@extends('front.layout')
@section('title', 'Why Choose Us')
@section('frontpage')

<!-- PAGE TITLE
        ================================================== -->
<section class="page-title-section2 bg-img cover-background" data-overlay-dark="7" data-background="{{asset('front/img/bg/bg5.jpg')}}">
    <div class="container">

        <div class="row">
            <div class="col-md-12">
                <h1>Why Choose Us</h1>
            </div>
            <div class="col-md-12">
                <ul class="ps-0">
                    <li><a href="{{route('front.home')}}">Home</a></li>
                    <li><a href="{{ route('front.about') }}">About Us</a></li>
                    <li><a href="{{ route('front.whyus') }}">Why Choose Us</a></li>
                </ul>
            </div>
        </div>

    </div>
</section>

<!-- FEATURE
        ================================================== -->
<section class="py-5 p-md-0 bg-extra-dark-gray">

    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-7">

                <div class="p-md-8 p-lg-10">

                    <div class="section-heading title-style5 left white">
                        <h4>Why choose us</h4>
                        <div class="square">
                            <span class="separator-left bg-primary"></span>
                            <span class="separator-right bg-primary"></span>
                        </div>
                    </div>

                    <div class="row mt-n1-9">
                        <div class="col-md-6 mt-1-9">
                            <div class="feature-flex-square">
                                <div class="clearfix">
                                    <div class="feature-flex-square-icon">
                                        <i class="fa ti-package"></i>
                                    </div>
                                    <div class="feature-flex-square-content">
                                        <h4><a href="#!" class="text-white">Interior Expertise</a></h4>
                                        <p class="text-light-gray mb-0">Our Mission is to deliver true results for your
                                            impressive international dream.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mt-1-9">
                            <div class="feature-flex-square">
                                <div class="clearfix">
                                    <div class="feature-flex-square-icon">
                                        <i class="ti-layers"></i>
                                    </div>
                                    <div class="feature-flex-square-content">
                                        <h4><a href="#!" class="text-white">Free Consultation</a></h4>
                                        <p class="text-light-gray mb-0">Our Mission is to deliver true results for your
                                            impressive international dream.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mt-1-9">
                            <div class="feature-flex-square">
                                <div class="clearfix">
                                    <div class="feature-flex-square-icon">
                                        <i class="fa ti-wallet"></i>
                                    </div>
                                    <div class="feature-flex-square-content">
                                        <h4><a href="#!" class="text-white">Affordable Price</a></h4>
                                        <p class="text-light-gray mb-0">Our Mission is to deliver true results for your
                                            impressive international dream.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mt-1-9">
                            <div class="feature-flex-square">
                                <div class="clearfix">
                                    <div class="feature-flex-square-icon">
                                        <i class="ti-world"></i>
                                    </div>
                                    <div class="feature-flex-square-content">
                                        <h4><a href="#!" class="text-white">Guaranteed Works</a></h4>
                                        <p class="text-light-gray mb-0">Our Mission is to deliver true results for your
                                            impressive international dream.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

            <div class="col-lg-5 pe-0 d-none d-lg-block">

                <div class="position-relative h-100 cover-background bg-img" data-overlay-dark="0"
                    data-background="{{asset('front/img/interior/feature-04.jpg')}}"></div>

            </div>

        </div>
    </div>

</section>

<!-- WHY CHOOSE US
        ================================================== -->
<section class="bg-grey">
    <div class="container">
        <div class="section-heading"><span class="badge">Success With Us!</span>
            <h2>Why choose us</h2>
            <p class="w-95 w-md-75 w-lg-55 mx-auto">Business consulting excepteur sint occaecat cupidatat consulting non
                proident, sunt in culpa qui officia deserunt laborum Market.</p>
        </div>
        <div class="service-grids owl-carousel owl-theme" id="service-grids">
            @if($whyusData)
            @php $i=1; @endphp
            @foreach($whyusData as $list)
            <div class="service-block">
                <div class="img-holder">
                    <img alt="..." src="{{asset('front/img/content/services/service-1b.jpg')}}">
                </div>
                <div class="details">
                    <div class="number alt-font">{{$i}}</div>
                    <h4>{{$list->heading}}</h4>
                    <p>{!! html_entity_decode($list->content) !!}</p>
                    <a class="read-more" href="#!">Read More</a>
                </div>
            </div>
            @php $i++; @endphp
            @endforeach
            @endif
            <!-- <div class="service-block">
                <div class="img-holder">
                    <img alt="" src="img/content/services/service-2b.jpg">
                </div>
                <div class="details">
                    <div class="number alt-font">02</div>
                    <h4>Investment Plan</h4>
                    <p>Perspiciatis unde omnis iste natus voluptatem accusantium.</p>
                    <a class="read-more" href="#!">Read More</a>
                </div>
            </div> -->
            <!-- <div class="service-block">
                <div class="img-holder">
                    <img alt="" src="img/content/services/service-3b.jpg">
                </div>
                <div class="details">
                    <div class="number alt-font">03</div>
                    <h4>Business Plan</h4>
                    <p>Perspiciatis unde omnis iste natus voluptatem accusantium.</p>
                    <a class="read-more" href="#!">Read More</a>
                </div>
            </div> -->
            <!-- <div class="service-block">
                <div class="img-holder">
                    <img alt="" src="img/content/services/service-4b.jpg">
                </div>
                <div class="details">
                    <div class="number alt-font">04</div>
                    <h4>Risk Management</h4>
                    <p>Perspiciatis unde omnis iste natus voluptatem accusantium.</p>
                    <a class="read-more" href="#!">Read More</a>
                </div>
            </div> -->
        </div>
    </div>
</section>

<!-- TAB
        ================================================== -->
<section>
    <div class="container">
        <div class="section-heading">
            <h3>Our Working Process</h3>
        </div>
    </div>
    <div class="container-fluid px-lg-0">
        <div class="horizontaltab tab-style7">
            <ul class="resp-tabs-list hor_1">
                <li>Discover</li>
                <li>Planning</li>
                <li>Marketing</li>
                <li>Growth</li>
            </ul>
            <div class="resp-tabs-container hor_1 p-0">
                <div>

                    <div class="container p-0 p-lg-auto">
                        <div class="row">
                            <div class="col-lg-6 mb-4 mb-lg-0 text-center text-lg-start">
                                <div class="box-shadow-large p-3">
                                    <img src="{{asset('front/img/content/content-04.jpg')}}" alt="...">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="ps-0 ps-lg-3 ps-xl-4">
                                    <h4 class="mb-3">Integration of business</h4>
                                    <p>Duis Integration aute irure design in reprehenderit in voluptate velit esse
                                        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                        design proident.</p>

                                    <ul class="list-style-16 mb-0">
                                        <li>Exclusive design</li>
                                        <li>Life time supports</li>
                                        <li>Solve your problem with us</li>
                                        <li>We Provide Awesome Services</li>
                                        <li>Your business deserves best software</li>
                                    </ul>

                                </div>

                            </div>
                        </div>
                    </div>

                </div>
                <div>

                    <div class="container p-0 p-lg-auto">
                        <div class="row">
                            <div class="col-lg-6 order-lg-1 order-2">
                                <div class="pe-0 pe-lg-3 pe-xl-4">
                                    <h4 class="mb-3">Vision to planning</h4>
                                    <p>Build integration aute irure design in reprehenderit in voluptate velit esse
                                        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat design
                                        proident.</p>

                                    <ul class="list-style-16 mb-0">
                                        <li>Life time supports</li>
                                        <li>Exclusive design</li>
                                        <li>Solve your problem with us</li>
                                        <li>We Provide Awesome Services</li>
                                        <li>Your business deserves best software</li>
                                    </ul>
                                </div>

                            </div>
                            <div class="col-lg-6 order-lg-2 order-1 text-center text-lg-start mb-4 mb-lg-0">
                                <div class="box-shadow-large p-3">
                                    <img src="{{asset('front/img/content/content-01.jpg')}}" alt="...">
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div>

                    <div class="container p-0 p-lg-auto">
                        <div class="row">
                            <div class="col-lg-6 text-center text-lg-start mb-4 mb-lg-0">
                                <div class="box-shadow-large p-3">
                                    <img src="{{asset('front/img/content/content-02.jpg')}}" alt="...">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="ps-0 ps-lg-3 ps-xl-4">
                                    <h4 class="mb-3">Plan to marketing</h4>
                                    <p>Ready site integration aute irure design in reprehenderit in voluptate velit esse
                                        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat design
                                        proident.</p>

                                    <ul class="list-style-16 mb-0">
                                        <li>Creating Stunning design</li>
                                        <li>Solve your problem with us</li>
                                        <li>Grow your business</li>
                                        <li>We Provide Awesome Services</li>
                                        <li>Exclusive design</li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div>

                    <div class="container p-0 p-lg-auto">
                        <div class="row">
                            <div class="col-lg-6 order-lg-1 order-2">
                                <div class="pe-0 pe-lg-3 pe-xl-4">
                                    <h4 class="mb-3">Start to growth</h4>
                                    <p>Build integration aute irure design in reprehenderit in voluptate velit esse
                                        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat design
                                        proident.</p>

                                    <ul class="list-style-16 mb-0">
                                        <li>Research & Devloping</li>
                                        <li>Fully customizable</li>
                                        <li>Solve your problem faster</li>
                                        <li>There are many variations</li>
                                        <li>Your business deserves best software</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-6 order-lg-2 order-1 text-center text-lg-start mb-4 mb-lg-0">
                                <div class="box-shadow-large p-3">
                                    <img src="{{asset('front/img/content/content-03.jpg')}}" alt="..." class="w-100 w-lg-auto">
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
@include('front.testimonial-section')
        @include('front.client-section')


@endsection
