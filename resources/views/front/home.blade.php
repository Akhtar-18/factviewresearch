<?php //include("header.php");
?>
@extends('front.layout')
@section('title', 'Home')
@section('frontpage')

    <!-- REVOLUTION SLIDER
            ================================================== -->
    <div class="rev_slider_wrapper custom-controls custom-paragraph">
        <div id="rev_slider_2" class="rev_slider" style="display: none;" data-version="5.4.5">
            <ul>
                @if (GetSlider())
                    @foreach (GetSlider() as $list)
                        <li data-transition="parallaxtoright">

                            <!-- overlay -->
                            <div class="opacity-extra-medium bg-black z-index-1"></div>

                            <img src="{{ asset('images') }}/{{ $list->slider_image }}" alt="slide1" class="rev-slidebg">

                            <!-- layer 1 -->
                            <div class="tp-caption tp-resizeme max-style alt-font" id="slide-2-layer-1"
                                data-x="['center','center','center','center']"
                                data-y="['middle','middle','middle','middle']" data-hoffset="['0','0','0','0']"
                                data-voffset="['-100','-100','-100','-120']" data-width="none" data-height="none"
                                data-whitespace="nowrap" data-transform_idle="o:1;"
                                data-transform_in="x:[-175%];y:0px;z:0;rX:0;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0.01;s:3000;e:Power3.easeOut;"
                                data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;"
                                data-mask_in="x:[100%];y:0;s:inherit;e:inherit;" data-start="1000" data-splitin="chars"
                                data-splitout="none" data-responsive_offset="on" data-elementdelay="0.05"
                                style="z-index: 5; white-space: nowrap; color: #fff; font-weight: 700; text-transform: uppercase;">
                                {{ $list->heading }}
                            </div>
                            <!-- end layer 1 -->

                            <!-- layer nr. 2 -->
                            <div class="tp-caption tp-resizeme slider-text" id="slide-2-layer-2"
                                data-x="['center','center','center','center']"
                                data-y="['middle','middle','middle','middle']" data-hoffset="['0','0','0','0']"
                                data-voffset="['-20','-20','-20','-40']" data-fontsize="['18','20','20','20']"
                                data-lineheight="['30','30','28','28']" data-width="none" data-height="none"
                                data-transform_idle="o:1;"
                                data-transform_in="x:[175%];y:0px;z:0;rX:0;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0.01;s:3000;e:Power3.easeOut;"
                                data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;"
                                data-mask_in="x:[-100%];y:0;s:inherit;e:inherit;" data-start="2500" data-splitin="none"
                                data-splitout="none" data-responsive_offset="on"
                                style="z-index: 5; white-space: nowrap; color: #fff; text-align: center;">
                                <p class="white-space text-center px-3 px-md-0">{{ $list->subheading }}</p>
                            </div>
                            <!-- layer nr. 3 -->
                            <div class="tp-caption tp-resizeme" id="slide-2-layer-3"
                                data-x="['center','center','center','center']"
                                data-y="['middle','middle','middle','middle']" data-hoffset="['0','0','0','0']"
                                data-voffset="['65','65','65','65']" data-fontsize="['18','18','14','14']"
                                data-lineheight="['26','26','22','22']" data-width="none" data-height="none"
                                data-transform_idle="o:1;"
                                data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:2000;e:Power4.easeInOut;"
                                data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;" data-start="2800"
                                data-splitin="none" data-splitout="none" data-responsive_offset="on"
                                style="z-index: 5; white-space: nowrap; line-height: 22px;"><a href="#!"
                                    class="butn primary"><span>Contact Us</span></a>
                            </div>
                        </li>
                    @endforeach
                @endif
            </ul>
        </div>
    </div>
    <!-- <section class="full-screen p-0 top-position top-position3">
                <div class="row slider-fade">
                    <div class="owl-carousel owl-theme w-100">
                        <div class="text-center item bg-img" data-overlay-dark="7" data-background="{{ asset('front/img/slider/slide9.jpg') }}">
                            <div class="h-100 d-table caption position-relative">
                                <div class="overflow-hidden d-table-cell align-middle h-100">
                                    <h3 class="alt-font text-white m-0">We Are Awesome</h3>
                                    <h1 class="text-white">Creative for Startup</h1>
                                    <p class="d-none d-lg-block mb-3 mb-lg-4">We provide best for our client and respect their business design idea.</p>
                                    <a href="#!" class="butn medium primary">
                                        <span class="alt-font">Learn More</span><i class="fas fa-angle-right text-white ms-2"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="text-center item bg-img" data-overlay-dark="6" data-background="{{ asset('front/img/slider/slide17.jpg') }}">
                            <div class="h-100 d-table caption position-relative">
                                <div class="overflow-hidden d-table-cell align-middle h-100">
                                    <h3 class="alt-font text-white m-0">We Are Awesome</h3>
                                    <h1 class="text-white">Creative for Website</h1>
                                    <p class="d-none d-lg-block mb-3 mb-lg-4">We provide best for our client and respect their business design idea.</p>
                                    <a href="#!" class="butn medium primary">
                                        <span class="alt-font">Learn More</span><i class="fas fa-angle-right text-white ms-2"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="text-center item bg-img" data-overlay-dark="6" data-background="{{ asset('front/img/slider/slide8.jpg') }}">
                            <div class="h-100 d-table caption position-relative">
                                <div class="overflow-hidden d-table-cell align-middle h-100">
                                    <h3 class="alt-font text-white m-0">We Are Awesome</h3>
                                    <h1 class="text-white">Creative for Agency</h1>
                                    <p class="d-none d-lg-block mb-3 mb-lg-4">We provide best for our client and respect their business design idea.</p>
                                    <a href="#!" class="butn medium primary">
                                        <span class="alt-font">Learn More</span><i class="fas fa-angle-right text-white ms-2"></i>
                                    </a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </section> -->

    <!-- ABOUT
            ================================================== -->
    <section class="md">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-1-9 mb-lg-0">
                    <div>
                        @if ($aboutData)
                            @foreach ($aboutData as $about)
                                <div class="section-heading left half">
                                    <h2 class="title-style2">{{ $about->heading }}</h2>
                                </div>
                                <p>{!! html_entity_decode($about->content) !!}</p>
                                <a href="{{ route('front.about') }}" class="butn medium"><span>About Company</span></a>
                            @endforeach
                        @endif
                    </div>
                </div>
                <!-- <div class="col-lg-5 offset-lg-1 text-center">
                            <div>
                                <img src="{{ asset('front/img/content/team-11.jpg') }}" alt="..." class="w-50 float-start pe-1 border-radius-5">
                                <img src="{{ asset('front/img/content/team-10.jpg') }}" alt="..." class="w-50 float-start ps-1 border-radius-5">

                            </div>
                        </div> -->
                <div class="col-lg-5 story-video offset-lg-1 text-center d-table">
                    <div class="d-table-cell vertical-align-middle border-radius-5 box-shadow-primary">
                        <a class="video" href="https://www.youtube.com/watch?v=f5BBJ4ySgpo">
                            <img src="{{ asset('front/img/content/tab-img-02.jpg') }}" alt="..."
                                class="w-100 float-start border-radius-5">
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

    <!-- ADVICE
            ================================================== -->
    <section class="parallax md" data-overlay-dark="8" data-background="{{ asset('front/img/bg/bg1.jpg') }}">
        <div class="container text-center">
            <div class="section-heading half white">
                <h2>Are you looking for professional advice?</h2>
                <p>We always try to provide you our best business consulting service.</p>
            </div>
            <a href="#!" class="butn primary white-hover"><span>Contact Us</span></a>
        </div>
    </section>

    <!-- WHAT WE WORK
            ================================================== -->
    <section>
        <div class="container">
            <div class="section-heading"><span>How We Work</span>
                <h2>Make Successful Business</h2>
                <p class="w-95 w-md-75 w-lg-55 mx-auto">Business consulting excepteur sint occaecat cupidatat consulting
                    non proident, sunt in culpa qui officia deserunt laborum Market.</p>
            </div>
            <div class="row mt-n4">
                @if (count($services) > 0)
                    @foreach ($services as $key => $service)
                        @php $key++; @endphp
                        <div class="col-lg-3 mt-4">
                            <div class="feature-box-01">
                                <i class="ti-world display-19"></i>
                                <h3 class="display-28 mt-3">{{ $service->heading }}</h3>
                                <p>{!! html_entity_decode(wordLimit($service->content)) !!}</p>
                                <a class="butn medium primary read-more"
                                    href="{{ route('front.service-single', $service->id) }}">Read More</a>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section>

    <!-- SERVICES
            ================================================== -->
    <section>
        <div class="container">

            <div class="section-heading">
                <h2>Our Services</h2>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="services-grids owl-carousel owl-theme">
                        @if (count($services) > 0)
                            @foreach ($services as $key => $service)
                                @php $key++; @endphp
                                <!-- feature box item-->
                                <div class="bg-white border border-color-light-black p-4 feature-box-08">
                                    <div class="p-0 mb-3 mb-md-4 alt-font">
                                        <i class="text-primary ti-world display-18"></i>
                                        <h3 class="h5 mb-0 mt-2 w-100">{{ $service->heading }}</h3>
                                    </div>
                                    <p class="w-95">{!! html_entity_decode(wordLimit($service->content)) !!}</p>
                                    <div class="border-top border-color-light-black pt-3">
                                        <a href="{{ route('front.service-single', $service->id) }}"
                                            class="font-weight-700">Read More...</a>
                                    </div>
                                    <div class="show-details">
                                        <img src="img/content/feature-04.jpg" alt="...">
                                        <div class="feature-box-detail p-1-9">
                                            <div class="border border-color-light-white h-100 p-4">
                                                <h4 class="display-28 mb-2 w-100 text-primary font-weight-600">
                                                    {{ $service->heading }}</h4>

                                                <a href="{{ route('front.service-single', $service->id) }}"
                                                    class="font-weight-700 text-primary mt-3 d-inline-block">Read
                                                    more...</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end feature box item-->
                            @endforeach
                        @endif


                    </div>
                </div>
            </div>

        </div>
    </section>


    <!-- COUNTER
            ================================================== -->
    <section class="parallax md" data-overlay-dark="7" data-background="{{ asset('front/img/bg/bg5.jpg') }}">
        <div class="container">
            <div class="row mt-n1-9">
                <div class="col-6 col-lg-3 mt-1-9">
                    <div class="counter-box">
                        <h4 class="countup text-white d-block">1826</h4>
                        <div class="separator-line-horrizontal-medium-light3 bg-white mb-2 mt-3 opacity5 mx-auto"></div>
                        <p class="display-27 display-md-24 font-weight-600 text-white m-0 text-center">Satisfied Visitors
                        </p>
                    </div>
                </div>
                <div class="col-6 col-lg-3 mt-1-9">
                    <div class="counter-box">
                        <h4 class="countup text-white d-block">875</h4>
                        <div class="separator-line-horrizontal-medium-light3 bg-white mb-2 mt-3 opacity5 mx-auto"></div>
                        <p class="display-27 display-md-24 font-weight-600 text-white m-0 text-center">Destinations</p>
                    </div>
                </div>
                <div class="col-6 col-lg-3 mt-1-9">
                    <div class="counter-box">
                        <h4 class="countup text-white d-block">1412</h4>
                        <div class="separator-line-horrizontal-medium-light3 bg-white mb-2 mt-3 opacity5 mx-auto"></div>
                        <p class="display-27 display-md-24 font-weight-600 text-white m-0 text-center">Tours</p>
                    </div>
                </div>
                <div class="col-6 col-lg-3 mt-1-9">
                    <div class="counter-box">
                        <h4 class="countup text-white d-block">100</h4>
                        <div class="separator-line-horrizontal-medium-light3 bg-white mb-2 mt-3 opacity5 mx-auto"></div>
                        <p class="display-27 display-md-24 font-weight-600 text-white m-0 text-center">Tour Types</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- SERVICES
            ================================================== -->
    <section class="md">
        <div class="container">
            <div class="section-heading">
                <h2>Our Business Services</h2>
                <p class="w-95 w-md-75 w-lg-55 mx-auto">Business consulting excepteur sint occaecat cupidatat consulting
                    non proident, sunt in culpa qui officia deserunt laborum Market.</p>
            </div>
            <div class="row mt-n1-9">
                @if (count($services) > 0)
                    @foreach ($services as $service)
                        <div class="col-lg-4 col-md-6 mt-1-9">
                            <div class="feature-flex-square">
                                <div class="clearfix">
                                    <div class="feature-flex-square-icon">
                                        <i class="ti-ruler-pencil"></i>
                                    </div>
                                    <div class="feature-flex-square-content">
                                        <h4><a
                                                href="{{ route('front.service-single', $service->id) }}">{{ $service->heading }}</a>
                                        </h4>
                                        <p>{!! html_entity_decode(wordLimit($service->content)) !!}</p>
                                        <a href="{{ route('front.service-single', $service->id) }}"
                                            class="feature-flex-square-content-button">Learn More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
                <!-- <div class="col-lg-4 col-md-6 mt-1-9">
                            <div class="feature-flex-square">
                                <div class="clearfix">
                                    <div class="feature-flex-square-icon">
                                        <i class="ti-world"></i>
                                    </div>
                                    <div class="feature-flex-square-content">
                                        <h4><a href="#!">Online Consulting</a></h4>
                                        <p>Our Mission is to deliver true results for your impressive international Businesses consultant.</p>
                                        <a href="#!" class="feature-flex-square-content-button">Learn More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 mt-1-9">
                            <div class="feature-flex-square">
                                <div class="clearfix">
                                    <div class="feature-flex-square-icon">
                                        <i class="ti-tablet"></i>
                                    </div>
                                    <div class="feature-flex-square-content">
                                        <h4><a href="#!">Investment Plan</a></h4>
                                        <p>Our Mission is to deliver true results for your impressive international Businesses consultant.</p>
                                        <a href="#!" class="feature-flex-square-content-button">Learn More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 mt-1-9">
                            <div class="feature-flex-square">
                                <div class="clearfix">
                                    <div class="feature-flex-square-icon">
                                        <i class="ti-layers-alt"></i>
                                    </div>
                                    <div class="feature-flex-square-content">
                                        <h4><a href="#!">Investment Bank</a></h4>
                                        <p>Our Mission is to deliver true results for your impressive international Businesses consultant.</p>
                                        <a href="#!" class="feature-flex-square-content-button">Learn More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 mt-1-9">
                            <div class="feature-flex-square">
                                <div class="clearfix">
                                    <div class="feature-flex-square-icon">
                                        <i class="ti-blackboard"></i>
                                    </div>
                                    <div class="feature-flex-square-content">
                                        <h4><a href="#!">Business Consult</a></h4>
                                        <p>Our Mission is to deliver true results for your impressive international Businesses consultant.</p>
                                        <a href="#!" class="feature-flex-square-content-button">Learn More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 mt-1-9">
                            <div class="feature-flex-square">
                                <div class="clearfix">
                                    <div class="feature-flex-square-icon">
                                        <i class="ti-package"></i>
                                    </div>
                                    <div class="feature-flex-square-content">
                                        <h4><a href="#!">Finance Analysis</a></h4>
                                        <p>Our Mission is to deliver true results for your impressive international Businesses consultant.</p>
                                        <a href="#!" class="feature-flex-square-content-button">Learn More</a>
                                    </div>
                                </div>
                            </div>
                        </div> -->
            </div>
        </div>
    </section>



    <!-- REPORTS
            ================================================== -->
    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-5 mb-lg-5">
                    <h2 class="alt-font text-uppercase title-style8">Recent Reports</h2>
                </div>
                <!-- <div class="col-lg-7 mb-1-9 mb-lg-6">
                            <div class="d-table h-100">
                                <div class="d-table-cell vertical-align-middle">
                                    <p class="mb-0 border-lg-start border-color-light-black py-lg-4 ps-lg-6">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt.</p>
                                </div>
                            </div>
                        </div> -->
            </div>
            <div class="carousel-style3">
                <div class="owl-carousel owl-theme">

                    <!-- blog -->
                    @if (!empty($reportsData))
                        @foreach ($reportsData as $report)
                            <article class="card card-style2 box-shadow-none">
                                <div class="border border-width-2 border-color-extra-light-gray p-1-9">
                                    <h3 class="h5 mb-3"><a
                                            href="{{ route('front.report', ['category' => strtolower($report->getCategoryName->cat_name), 'subcategory' => strtolower($report->getSubCategoryName->sub_category), 'id' => $report->url]) }}"
                                            class="post-title d-block">{{ $report->heading }}</a></h3>
                                    <div class="author">
                                        <span class="text-uppercase display-30 d-inline-block">Published Date:
                                            {{ date('M, Y', strtotime($report->publish_month)) }} </span>
                                        <span class="text-uppercase display-30 d-inline-block">Pages:
                                            {{ $report->pages }}</span>
                                    </div>
                                    <div class="separator-line-horrizontal-full bg-medium-gray my-3 my-lg-4"></div>
                                    <a href="{{ route('front.report', ['category' => strtolower($report->getCategoryName->cat_name), 'subcategory' => strtolower($report->getSubCategoryName->sub_category), 'id' => $report->url]) }}"
                                        class="btn-style4 btn-small min-width-auto"><span>Read more</span></a>
                                </div>

                            </article>
                        @endforeach
                    @endif
                    <!-- end blog -->

                    <!-- blog -->
                    <!--  <article class="card card-style2 box-shadow-none">
                                <div class="border border-width-2 border-color-extra-light-gray p-1-9">
                                    <h3 class="h5 mb-3"><a href="blog-post.html" class="post-title d-block">Create some different design for Redesigning With Individuality.</a></h3>
                                    <div class="author">
                                        <span class="text-uppercase display-30 d-inline-block">Published Date: May 2023 </span>
                                        <span class="text-uppercase display-30 d-inline-block">Pages: 200</span>
                                    </div>
                                    <div class="separator-line-horrizontal-full bg-medium-gray my-3 my-lg-4"></div>
                                    <a href="blog-post.html" class="btn-style4 btn-small min-width-auto"><span>Read more</span></a>
                                </div>

                            </article> -->
                    <!-- end blog -->

                    <!-- blog -->
                    <!--  <article class="card card-style2 box-shadow-none">
                                <div class="border border-width-2 border-color-extra-light-gray p-1-9">
                                    <h3 class="h5 mb-3"><a href="blog-post.html" class="post-title d-block">Create some different design for Redesigning With Individuality.</a></h3>
                                    <div class="author">
                                        <span class="text-uppercase display-30 d-inline-block">Published Date: May 2023 </span>
                                        <span class="text-uppercase display-30 d-inline-block">Pages: 200</span>
                                    </div>
                                    <div class="separator-line-horrizontal-full bg-medium-gray my-3 my-lg-4"></div>
                                    <a href="blog-post.html" class="btn-style4 btn-small min-width-auto"><span>Read more</span></a>
                                </div>

                            </article> -->
                    <!-- end blog -->

                </div>
            </div>
            <div class="row align-items-center">
                <div class="col-md-12 mt-1-9 text-center">
                    <a href="{{ route('front.reports') }}" class="btn-style4 btn-small"><span>Read More
                            Reports</span></a>
                </div>
            </div>
        </div>
    </section>

    <!-- SUBSCRIBE
            ================================================== -->
    <section class="parallax" data-overlay-dark="6" data-background="{{ asset('front/img/bg/bg2.jpg') }}">
        <div class="container">
            <div class="section-heading white">
                <span>News Letter</span>
                <h2>Stay informed</h2>
                <p class="w-95 w-md-75 w-lg-55 mx-auto">Business consulting excepteur sint occaecat cupidatat consulting
                    non proident, sunt in culpa qui officia deserunt laborum Market.</p>
            </div>
            <div class="text-center">
                <form class="quform newsletter-form2 w-sm-85 w-md-65 w-lg-45 w-xl-35 mx-auto"
                    action="https://fabrex.websitelayout.net/quform/newsletter-two.php" method="post"
                    enctype="multipart/form-data" onclick="">

                    <div class="quform-elements text-center">

                        <div class="row">

                            <!-- Begin Text input element -->
                            <div class="col-md-12">
                                <div class="quform-element form-group mb-0">
                                    <div class="quform-input">
                                        <input class="form-control" id="email_address" type="email"
                                            name="email_address" placeholder="Subscribe with us">
                                    </div>
                                </div>
                            </div>
                            <!-- End Text input element -->

                            <!-- Begin Submit button -->
                            <div class="col-md-12">
                                <div class="quform-submit-inner">
                                    <button class="butn primary" type="submit"><span>Subscribe</span></button>
                                </div>
                                <div class="quform-loading-wrap"><span class="quform-loading"></span></div>
                            </div>
                            <!-- End Submit button -->

                        </div>

                    </div>

                </form>
            </div>
        </div>
    </section>

    <!-- BLOGS
            ================================================== -->
    <!-- <section>
                <div class="container">

                    <div class="row">
                        <div class="col-lg-5 mb-lg-5">
                            <h2 class="alt-font text-uppercase title-style8">Recent Blogs</h2>
                        </div>
                        <div class="col-lg-7 mb-1-9 mb-lg-6">
                            <div class="d-table h-100">
                                <div class="d-table-cell vertical-align-middle">
                                    <p class="mb-0 border-lg-start border-color-light-black py-lg-4 ps-lg-6">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-n1-9">

                        <div class="col-md-6 col-lg-4 mt-1-9">
                            <article>
                                <div class="position-relative">
                                    <a href="blog-post.html">
                                        <img src="{{ asset('front/img/blog/blog-01.jpg') }}" alt="...">
                                    </a>
                                    <div class="position-absolute position-right position-bottom"><a href="blog-list-sidebar.html" class="text-uppercase display-32 alt-font py-2 px-3 d-inline-block bg-black text-white">Redesign</a></div>
                                </div>
                                <div class="border border-width-2 border-color-extra-light-gray p-1-9">
                                    <h3 class="h5 mb-3"><a href="blog-post.html" class="post-title d-block">Create some different design for Redesigning With Individuality.</a></h3>
                                    <div class="author">
                                        <span class="text-uppercase display-30 d-inline-block">by <a href="#!">JAY BENJAMIN</a>&nbsp;&nbsp;|&nbsp;&nbsp;20 April 2020</span>
                                    </div>
                                    <div class="separator-line-horrizontal-full bg-medium-gray my-3 my-lg-4"></div>
                                    <p >Lorem ipsum dolor sit amet, tempor consectetur adipisicing elit, sed do eiusmod incididunt ut labore et dolore magna aliqua. Ut enim ad Lorem ipsum dolor sit amet ... </p>
                                    <a href="blog-post.html" class="btn-style4 btn-small min-width-auto"><span>Read more</span></a>
                                </div>
                            </article>
                        </div>

                        <div class="col-md-6 col-lg-4 mt-1-9">
                            <article>
                                <div class="position-relative">
                                    <a href="blog-post.html">
                                        <img src="{{ asset('front/img/blog/blog-02.jpg') }}" alt="...">
                                    </a>
                                    <div class="position-absolute position-right position-bottom"><a href="blog-list-sidebar.html" class="text-uppercase display-32 alt-font py-2 px-3 d-inline-block bg-black text-white">creative ideas</a></div>
                                </div>
                                <div class="border border-width-2 border-color-extra-light-gray p-1-9">
                                    <h3 class="h5 mb-3"><a href="blog-post.html" class="post-title d-block">Creative idea for creative design. make some new design.</a></h3>
                                    <div class="author">
                                        <span class="text-uppercase display-30 d-inline-block">by <a href="#!">JASON BOURNE</a>&nbsp;&nbsp;|&nbsp;&nbsp;20 April 2020</span>
                                    </div>
                                    <div class="separator-line-horrizontal-full bg-medium-gray my-3 my-lg-4"></div>
                                    <p >Lorem ipsum dolor sit amet, tempor consectetur adipisicing elit, sed do eiusmod incididunt ut labore et dolore magna aliqua. Ut enim ad Lorem ipsum dolor sit amet ... </p>
                                    <a href="blog-post.html" class="btn-style4 btn-small min-width-auto"><span>Read more</span></a>
                                </div>
                            </article>
                        </div>

                        <div class="col-md-6 col-lg-4 mt-1-9">
                            <article>
                                <div class="position-relative">
                                    <a href="blog-post.html">
                                        <img src="{{ asset('front/img/blog/blog-03.jpg') }}" alt="...">
                                    </a>
                                    <div class="position-absolute position-right position-bottom"><a href="blog-list-sidebar.html" class="text-uppercase display-32 alt-font py-2 px-3 d-inline-block bg-black text-white">better design</a></div>
                                </div>
                                <div class="border border-width-2 border-color-extra-light-gray p-1-9">
                                    <h3 class="h5 mb-3"><a href="blog-post.html" class="post-title d-block">We are creating strong and idol blogs for a better tomorrow.</a></h3>
                                    <div class="author">
                                        <span class="text-uppercase display-30 d-inline-block">by <a href="#!">NICK STRONG</a>&nbsp;&nbsp;|&nbsp;&nbsp;20 April 2020</span>
                                    </div>
                                    <div class="separator-line-horrizontal-full bg-medium-gray my-3 my-lg-4"></div>
                                    <p >Lorem ipsum dolor sit amet, tempor consectetur adipisicing elit, sed do eiusmod incididunt ut labore et dolore magna aliqua. Ut enim ad Lorem ipsum dolor sit amet ... </p>
                                    <a href="blog-post.html" class="btn-style4 btn-small min-width-auto"><span>Read more</span></a>
                                </div>
                            </article>
                        </div>

                    </div>

                </div>
            </section> -->


    <!-- Press Releases
            ================================================== -->
    <!-- <section>
                <div class="container">

                    <div class="row">
                        <div class="col-lg-5 mb-lg-5">
                            <h2 class="alt-font text-uppercase title-style8">Publications</h2>
                        </div>
                        <div class="col-lg-7 mb-1-9 mb-lg-6">
                            <div class="d-table h-100">
                                <div class="d-table-cell vertical-align-middle">
                                    <p class="mb-0 border-lg-start border-color-light-black py-lg-4 ps-lg-6">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-n1-9">

                        <div class="col-md-6 col-lg-4 mt-1-9">
                            <article>
                                <div class="border border-width-2 border-color-extra-light-gray p-1-9">
                                    <h3 class="h5 mb-3"><a href="blog-post.html" class="post-title d-block">Create some different design for Redesigning With Individuality.</a></h3>
                                    <div class="author">
                                        <span class="text-uppercase display-30 d-inline-block">by <a href="#!">JAY BENJAMIN</a>&nbsp;&nbsp;|&nbsp;&nbsp;20 April 2020</span>
                                    </div>
                                    <div class="separator-line-horrizontal-full bg-medium-gray my-3 my-lg-4"></div>
                                    <p >Lorem ipsum dolor sit amet, tempor consectetur adipisicing elit, sed do eiusmod incididunt ut labore et dolore magna aliqua. Ut enim ad Lorem ipsum dolor sit amet ... </p>
                                    <a href="blog-post.html" class="btn-style4 btn-small min-width-auto"><span>Read more</span></a>
                                </div>
                            </article>
                        </div>

                        <div class="col-md-6 col-lg-4 mt-1-9">
                            <article>
                                <div class="border border-width-2 border-color-extra-light-gray p-1-9">
                                    <h3 class="h5 mb-3"><a href="blog-post.html" class="post-title d-block">Creative idea for creative design. make some new design.</a></h3>
                                    <div class="author">
                                        <span class="text-uppercase display-30 d-inline-block">by <a href="#!">JASON BOURNE</a>&nbsp;&nbsp;|&nbsp;&nbsp;20 April 2020</span>
                                    </div>
                                    <div class="separator-line-horrizontal-full bg-medium-gray my-3 my-lg-4"></div>
                                    <p >Lorem ipsum dolor sit amet, tempor consectetur adipisicing elit, sed do eiusmod incididunt ut labore et dolore magna aliqua. Ut enim ad Lorem ipsum dolor sit amet ... </p>
                                    <a href="blog-post.html" class="btn-style4 btn-small min-width-auto"><span>Read more</span></a>
                                </div>
                            </article>
                        </div>

                        <div class="col-md-6 col-lg-4 mt-1-9">
                            <article>
                                <div class="border border-width-2 border-color-extra-light-gray p-1-9">
                                    <h3 class="h5 mb-3"><a href="blog-post.html" class="post-title d-block">We are creating strong and idol blogs for a better tomorrow.</a></h3>
                                    <div class="author">
                                        <span class="text-uppercase display-30 d-inline-block">by <a href="#!">NICK STRONG</a>&nbsp;&nbsp;|&nbsp;&nbsp;20 April 2020</span>
                                    </div>
                                    <div class="separator-line-horrizontal-full bg-medium-gray my-3 my-lg-4"></div>
                                    <p >Lorem ipsum dolor sit amet, tempor consectetur adipisicing elit, sed do eiusmod incididunt ut labore et dolore magna aliqua. Ut enim ad Lorem ipsum dolor sit amet ... </p>
                                    <a href="blog-post.html" class="btn-style4 btn-small min-width-auto"><span>Read more</span></a>
                                </div>
                            </article>
                        </div>

                    </div>

                </div>
            </section> -->

    <!-- Case Studies
            ================================================== -->
    <!-- <section>
                <div class="container">

                    <div class="row">
                        <div class="col-lg-5 mb-lg-5">
                            <h2 class="alt-font text-uppercase title-style8">Publications</h2>
                        </div>
                        <div class="col-lg-7 mb-1-9 mb-lg-6">
                            <div class="d-table h-100">
                                <div class="d-table-cell vertical-align-middle">
                                    <p class="mb-0 border-lg-start border-color-light-black py-lg-4 ps-lg-6">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-n1-9">

                        <div class="col-md-6 col-lg-4 mt-1-9">
                            <article>
                                <div class="border border-width-2 border-color-extra-light-gray p-1-9">
                                    <h3 class="h5 mb-3"><a href="blog-post.html" class="post-title d-block">Create some different design for Redesigning With Individuality.</a></h3>
                                    <div class="author">
                                        <span class="text-uppercase display-30 d-inline-block">by <a href="#!">JAY BENJAMIN</a>&nbsp;&nbsp;|&nbsp;&nbsp;20 April 2020</span>
                                    </div>
                                    <div class="separator-line-horrizontal-full bg-medium-gray my-3 my-lg-4"></div>
                                    <p >Lorem ipsum dolor sit amet, tempor consectetur adipisicing elit, sed do eiusmod incididunt ut labore et dolore magna aliqua. Ut enim ad Lorem ipsum dolor sit amet ... </p>
                                    <a href="blog-post.html" class="btn-style4 btn-small min-width-auto"><span>Read more</span></a>
                                </div>
                            </article>
                        </div>

                        <div class="col-md-6 col-lg-4 mt-1-9">
                            <article>
                                <div class="border border-width-2 border-color-extra-light-gray p-1-9">
                                    <h3 class="h5 mb-3"><a href="blog-post.html" class="post-title d-block">Creative idea for creative design. make some new design.</a></h3>
                                    <div class="author">
                                        <span class="text-uppercase display-30 d-inline-block">by <a href="#!">JASON BOURNE</a>&nbsp;&nbsp;|&nbsp;&nbsp;20 April 2020</span>
                                    </div>
                                    <div class="separator-line-horrizontal-full bg-medium-gray my-3 my-lg-4"></div>
                                    <p >Lorem ipsum dolor sit amet, tempor consectetur adipisicing elit, sed do eiusmod incididunt ut labore et dolore magna aliqua. Ut enim ad Lorem ipsum dolor sit amet ... </p>
                                    <a href="blog-post.html" class="btn-style4 btn-small min-width-auto"><span>Read more</span></a>
                                </div>
                            </article>
                        </div>

                        <div class="col-md-6 col-lg-4 mt-1-9">
                            <article>
                                <div class="border border-width-2 border-color-extra-light-gray p-1-9">
                                    <h3 class="h5 mb-3"><a href="blog-post.html" class="post-title d-block">We are creating strong and idol blogs for a better tomorrow.</a></h3>
                                    <div class="author">
                                        <span class="text-uppercase display-30 d-inline-block">by <a href="#!">NICK STRONG</a>&nbsp;&nbsp;|&nbsp;&nbsp;20 April 2020</span>
                                    </div>
                                    <div class="separator-line-horrizontal-full bg-medium-gray my-3 my-lg-4"></div>
                                    <p >Lorem ipsum dolor sit amet, tempor consectetur adipisicing elit, sed do eiusmod incididunt ut labore et dolore magna aliqua. Ut enim ad Lorem ipsum dolor sit amet ... </p>
                                    <a href="blog-post.html" class="btn-style4 btn-small min-width-auto"><span>Read more</span></a>
                                </div>
                            </article>
                        </div>

                    </div>

                </div>
            </section> -->

    @include('front.testimonial-section')
    @include('front.client-section')
@endsection
