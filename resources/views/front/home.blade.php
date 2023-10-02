@extends('front.layout')
@section('title', 'Market Research Reports, Industry Reports, Market Research, Data Analysis, Fact-Finding | FactView
    Research')
@section('frontpage')

    <!-- REVOLUTION SLIDER
                                    ================================================== -->
    <section-new class="top-position top-position3">
        <div class="row slider-fade">
            <div class="owl-carousel owl-theme w-100">
                @if (GetSlider())
                    @foreach (GetSlider() as $list)
                        <div class="text-center item bg-img" data-overlay-dark="7"
                            data-background="{{ asset('images') }}/{{ $list->slider_image }}">
                            <div class="h-100 d-table caption position-relative">
                                <div class="overflow-hidden d-table-cell align-middle h-100">
                                    <h2 class="alt-font text-success m-0">{{ $list->heading }}</h2>
                                    <h5 class="text-warning">{{ $list->subheading }}</h5>
                                    <!-- <p class="d-none d-lg-block mb-3 mb-lg-4">We provide best for our client and respect their business design idea.</p> -->
                                    <p><a href="{{ route('front.contact') }}" class="butn medium primary">
                                            <span class="alt-font">Learn More</span><i
                                                class="fas fa-angle-right text-white ms-2"></i>
                                        </a></p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif

            </div>
        </div>
        </section>

        <!-- ABOUT
                                    ================================================== -->
        <section class="md">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12 mb-1-9 mb-lg-0">
                        <div>
                            @if ($aboutData)
                                @foreach ($aboutData as $about)
                                    <div class="section-heading left half">
                                        <h2 class="title-style2">{{ $about->heading }}</h2>
                                    </div>
                                    <p>{!! html_entity_decode(wordLimitset($about->content, 500)) !!}</p>
                                    <p><a href="{{ route('front.about') }}" class="butn bg-warning medium"><span>About
                                                Company</span></a>
                                    </p>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- ADVICE
                                    ================================================== -->
        <!-- <section class="parallax md" data-overlay-dark="8" data-background="{{ asset('front/img/bg/bg1.jpg') }}">
                    <div class="container text-center">
                        <div class="section-heading half white">
                            <h2>Are you looking for professional advice?</h2>
                            <p>We always try to provide you our best business consulting service.</p>
                        </div>
                        <a href="{{ route('front.contact') }}" class="butn primary white-hover"><span>Contact Us</span></a>
                    </div>
                </section> -->

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
                                        <div class="p-0 mb-3 mb-md-12 alt-font">
                                            <i class="text-primary ti-world display-18"></i>
                                            <h3 class="h5 mb-0 mt-2 w-100">{{ $service->heading }}</h3>
                                        </div>

                                        <p class="w-95">{!! html_entity_decode(wordLimitset($service->content, 20)) !!}</p>
                                        <div class="border-top border-color-light-black pt-3">
                                            <a href="{{ route('front.service-single', $service->id) }}"
                                                class="font-weight-700">Read More...</a>
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
        <section class="parallax md" style="background: #2a66b1">
            <div class="container">
                <div class="row mt-n1-9">
                    <div class="col-6 col-lg-3 mt-1-9">
                        <div class="counter-box">
                            <h4 class="countup text-white d-block">1200</h4>
                            <div class="separator-line-horrizontal-medium-light3 bg-white mb-2 mt-3 opacity5 mx-auto"></div>
                            <p class="display-27 display-md-24 font-weight-600 text-white m-0 text-center">Reports Published
                                Annually
                            </p>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3 mt-1-9">
                        <div class="counter-box">
                            <h4 class="countup text-white d-block">100</h4>
                            <div class="separator-line-horrizontal-medium-light3 bg-white mb-2 mt-3 opacity5 mx-auto"></div>
                            <p class="display-27 display-md-24 font-weight-600 text-white m-0 text-center">Consulting
                                Projects
                                Per Month</p>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3 mt-1-9">
                        <div class="counter-box">
                            <h4 class="countup text-white d-block">30</h4>
                            <div class="separator-line-horrizontal-medium-light3 bg-white mb-2 mt-3 opacity5 mx-auto"></div>
                            <p class="display-27 display-md-24 font-weight-600 text-white m-0 text-center">Geography Covered
                            </p>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3 mt-1-9">
                        <div class="counter-box">
                            <h4 class="countup text-white d-block">50</h4>
                            <div class="separator-line-horrizontal-medium-light3 bg-white mb-2 mt-3 opacity5 mx-auto"></div>
                            <p class="display-27 display-md-24 font-weight-600 text-white m-0 text-center">Subject Matter
                                Expert
                            </p>
                        </div>
                    </div>
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
                    <!--  -->
                </div>
                <div class="carousel-style3">
                    <div class="owl-carousel owl-theme">

                        <!-- blog -->
                        @if (!empty($reportsData))
                            @foreach ($reportsData as $report)
                                <article class="card card-style2 box-shadow-none">
                                    <div class="border border-width-2 border-color-extra-light-gray p-1-9">
                                        <h3 class="h5 mb-3"><a href="{{ route('front.report', ['id' => $report->url]) }}"
                                                class="post-title d-block">{{ $report->heading }}</a></h3>
                                        <div class="author">
                                            <span class="text-uppercase display-30 d-inline-block">Published Date:
                                                {{ date('M, Y', strtotime($report->publish_month)) }} </span>
                                            <span class="text-uppercase display-30 d-inline-block">Pages:
                                                {{ $report->pages }}</span>
                                        </div>
                                        <div class="separator-line-horrizontal-full bg-medium-gray my-3 my-lg-4"></div>
                                        <a href="{{ route('front.report', ['id' => $report->url]) }}"
                                            class="btn-style4 btn-small min-width-auto"><span>Read more</span></a>
                                    </div>

                                </article>
                            @endforeach
                        @endif
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
        <section class="parallax" style="background: #2a66b1">
            <div class="container">
                <div class="section-heading white">
                    <span>News Letter</span>
                    <h2>Stay informed</h2>
                    <p class="w-95 w-md-75 w-lg-55 mx-auto">Please subscribe our newsletter for latest industry updates.</p>
                </div>
                <div class="text-center">
                    <form class="quform newsletter-form2 w-sm-85 w-md-65 w-lg-45 w-xl-35 mx-auto" action=""
                        method="post" enctype="multipart/form-data" onclick="">

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
        <section>
            <div class="container">

                <div class="row">
                    <div class="col-lg-5 mb-lg-5">
                        <h2 class="alt-font text-uppercase title-style8">Recent Blogs</h2>
                    </div>

                </div>

                <div class="row mt-n1-9">
                    @if (count($blogs))
                        @foreach ($blogs as $blog)
                            <div class="col-md-6 col-lg-4 mt-1-9">
                                <article>
                                    <div class="position-relative">
                                        <a href="{{ route('front.blog', $blog->url) }}">
                                            <img src="{{ asset('blogs') }}/{{ $blog->image }}"
                                                alt="{{ $blog->image_alt }}">
                                        </a>
                                        <div class="position-absolute position-right position-bottom"><a
                                                href="{{ route('front.blog', $blog->url) }}"
                                                class="text-uppercase display-32 alt-font py-2 px-3 d-inline-block bg-black text-white">Redesign</a>
                                        </div>
                                    </div>
                                    <div class="border border-width-2 border-color-extra-light-gray p-1-9">
                                        <h3 class="h5 mb-3"><a href="{{ route('front.blog', $blog->url) }}"
                                                class="post-title d-block">{{ $blog->heading }}</a></h3>
                                        <div class="author">
                                            <span class="text-uppercase display-30 d-inline-block">
                                                <!-- by <a href="#!">JAY BENJAMIN</a>&nbsp;&nbsp;|&nbsp;&nbsp; -->
                                                {{ date('M D Y', strtotime($blog->created_at)) }}
                                            </span>
                                        </div>
                                        <div class="separator-line-horrizontal-full bg-medium-gray my-3 my-lg-4"></div>
                                        <p>{!! html_entity_decode(wordLimitset($blog->description, 20)) !!} </p>
                                        <a href="{{ route('front.blog', $blog->url) }}"
                                            class="btn-style4 btn-small min-width-auto"><span>Read more</span></a>
                                    </div>
                                </article>
                            </div>
                        @endforeach
                    @endif

                </div>

            </div>
        </section>


        <!-- Press Releases
                                    ================================================== -->
        <section>
            <div class="container">

                <div class="row">
                    <div class="col-lg-5 mb-lg-5">
                        <h2 class="alt-font text-uppercase title-style8">Press Releases</h2>
                    </div>

                </div>

                <div class="row mt-n1-9">

                    @if (count($press))
                        @foreach ($press as $pres)
                            <div class="col-md-6 col-lg-4 mt-1-9">
                                <article>
                                    <div class="position-relative">
                                        <a href="{{ route('front.press', $pres->url) }}">
                                            <img src="{{ asset('press-releases') }}/{{ $pres->image }}"
                                                alt="{{ $pres->image_alt }}">
                                        </a>
                                        <div class="position-absolute position-right position-bottom"><a
                                                href="{{ route('front.press', $pres->url) }}"
                                                class="text-uppercase display-32 alt-font py-2 px-3 d-inline-block bg-black text-white">Redesign</a>
                                        </div>
                                    </div>
                                    <div class="border border-width-2 border-color-extra-light-gray p-1-9">
                                        <h3 class="h5 mb-3"><a href="{{ route('front.press', $pres->url) }}"
                                                class="post-title d-block">{{ $pres->heading }}</a></h3>
                                        <div class="author">
                                            <span class="text-uppercase display-30 d-inline-block">
                                                <!-- by <a href="#!">JAY BENJAMIN</a>&nbsp;&nbsp;|&nbsp;&nbsp; -->
                                                {{ date('M D Y', strtotime($pres->created_at)) }}
                                            </span>
                                        </div>
                                        <div class="separator-line-horrizontal-full bg-medium-gray my-3 my-lg-4"></div>
                                        <p>{!! html_entity_decode(wordLimitset($pres->description, 20)) !!} </p>
                                        <a href="{{ route('front.press', $pres->url) }}"
                                            class="btn-style4 btn-small min-width-auto"><span>Read more</span></a>
                                    </div>
                                </article>
                            </div>
                        @endforeach
                    @endif

                </div>

            </div>
        </section>

        <!-- Case Studies
                                    ================================================== -->
        <section>
            <div class="container">

                <div class="row">
                    <div class="col-lg-5 mb-lg-5">
                        <h2 class="alt-font text-uppercase title-style8">Case Studies</h2>
                    </div>

                </div>

                <div class="row mt-n1-9">

                    @if (count($casses))
                        @foreach ($casses as $case)
                            <div class="col-md-6 col-lg-4 mt-1-9">
                                <article>
                                    <div class="position-relative">
                                        <a href="{{ route('front.case-study', $case->url) }}">
                                            <img src="{{ asset('case-studies') }}/{{ $case->image }}"
                                                alt="{{ $case->image_alt }}">
                                        </a>
                                        <div class="position-absolute position-right position-bottom"><a
                                                href="{{ route('front.case-study', $case->url) }}"
                                                class="text-uppercase display-32 alt-font py-2 px-3 d-inline-block bg-black text-white">Redesign</a>
                                        </div>
                                    </div>
                                    <div class="border border-width-2 border-color-extra-light-gray p-1-9">
                                        <h3 class="h5 mb-3"><a href="{{ route('front.case-study', $case->url) }}"
                                                class="post-title d-block">{{ $case->heading }}</a></h3>
                                        <div class="author">
                                            <span class="text-uppercase display-30 d-inline-block">
                                                <!-- by <a href="#!">JAY BENJAMIN</a>&nbsp;&nbsp;|&nbsp;&nbsp; -->
                                                {{ date('M D Y', strtotime($case->created_at)) }}
                                            </span>
                                        </div>
                                        <div class="separator-line-horrizontal-full bg-medium-gray my-3 my-lg-4"></div>
                                        <p>{!! html_entity_decode(wordLimitset($case->description, 20)) !!} </p>
                                        <a href="{{ route('front.case-study', $case->url) }}"
                                            class="btn-style4 btn-small min-width-auto"><span>Read more</span></a>
                                    </div>
                                </article>
                            </div>
                        @endforeach
                    @endif

                </div>

            </div>
        </section>

        @include('front.testimonial-section')
        @include('front.client-section')
    @endsection
