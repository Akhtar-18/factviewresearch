<?php //include("header.php");
?>
@extends('front.layout')
@section('title', 'Report')
@section('frontpage')
    <script src="https://cdn.jsdelivr.net/npm/chart.js">
    </script>
    <!-- PAGE TITLE
        ================================================== -->
    <section class="page-title-section2 bg-img cover-background" data-overlay-dark="7"
        data-background="{{ asset('front/img/bg/bg5.jpg') }}">
        <div class="container">

            <div class="row">
                <div class="col-md-12">
                    <ul class="ps-0">
                        <li><a href="{{ route('front.home') }}">Home</a></li>
                        <li><a href="{{ route('front.report', ['category' => strtolower($reports->getCategoryName->cat_name), 'subcategory' => strtolower($reports->getSubCategoryName->sub_category), 'id' => $reports->url]) }}">{{ $reports->heading }}</a>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
    </section>

    <!-- REPORT DETAILS
        ================================================== -->
    <section class="blogs">
        <div class="container">
            <div class="row">

                <!--  start blog left-->
                <div class="col-lg-9 pe-xl-1-9 mb-1-9 mb-lg-0">
                    <article class=blog-list-simple>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="blog-list-simple-text">
                                    <!-- <span>Business</span> -->
                                    <h5><a href="{{ route('front.report', ['category' => strtolower($reports->getCategoryName->cat_name), 'subcategory' => strtolower($reports->getSubCategoryName->sub_category), 'id' => $reports->url]) }}" class="text-primary-use">{{ $reports->heading }}</a></h5>
                                    <ul class="meta ps-0">
                                        <li>
                                            <i aria-hidden="true" class="fas fa-clock text-primary-new"></i> Published Date:
                                            {{ date('M, Y', strtotime($reports->publish_month)) }}
                                        </li>|
                                        <li>
                                            <i aria-hidden="true" class="fas fa-book text-primary-new"></i> Pages:
                                            {{ $reports->pages }}
                                        </li>|
                                        <li>
                                            <i aria-hidden="true" class="fas fa-industry text-primary-new"></i> Industry:
                                            @if (isset($reports->getSubCategoryName->sub_category))
                                                {{ $reports->getSubCategoryName->sub_category }}
                                            @endif
                                        </li>
                                        <li>
                                            <i aria-hidden="true" class="fas fa-file-alt text-primary-new"></i> Format: <i
                                                aria-hidden="true" class="fas fa-file-pdf text-danger"></i> PDF
                                        </li>
                                    </ul>
                                    <p class="text-primary"></p>
                                </div>
                            </div>
                        </div>
                        <div class="row box-hover mb-1-9 mb-lg-6">

                            <div class="col-12">
                                <div class="horizontaltab">
                                    <ul class="resp-tabs-list hor_1">
                                        <li>Report Summary</li>
                                        <li>Table of Comments</li>
                                        <li>Segmentation</li>
                                        <li>Methodology</li>
                                    </ul>
                                    <div class="resp-tabs-container hor_1">
                                        <div>
                                            <p>
                                                {!! html_entity_decode($reports->description) !!}
                                            </p>

                                            <div class="row">
                                                @if (!empty(json_decode($marketyear, true)))
                                                    <div class="col-md-4">
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <canvas id="mybarChart" height="300"></canvas>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                                @if (!empty($reports->getReportCAGR->cagr))
                                                    <div class="col-md-4">
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <canvas id="mypieChart"></canvas>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                                @if (!empty(json_decode($segmentname, true)))
                                                    <div class="col-md-4">
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <canvas id="mysegmentChart"></canvas>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                                <div class="col-md-12"><br></div>
                                                @if (!empty(json_decode($regionname, true)))
                                                    <div class="col-md-4">
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <canvas id="myregionChart"></canvas>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                                @if (!empty(json_decode($marketsharename, true)))
                                                    <div class="col-md-4">
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <canvas id="mshareChart"></canvas>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif

                                            </div>

                                            <script>
                                                const barChart = document.getElementById('mybarChart');
                                                new Chart(barChart, {
                                                    type: "bar",
                                                    data: {
                                                        labels: {!! json_encode($marketyear) !!},
                                                        datasets: [{
                                                            label: "Market Value Current and Forecast",
                                                            data: {!! json_encode($marketvalue) !!},
                                                            backgroundColor: [
                                                                "rgba(28, 51, 65,0.8)",
                                                                "rgba(0, 135, 115,0.8)",
                                                                "rgba(107, 185, 131,0.8)",
                                                                "rgba(242, 201, 117,0.8)",
                                                                "rgba(237, 99, 83,0.8)",
                                                                "rgba(242, 190, 84,0.8)",
                                                                "rgba(240, 217, 207,0.8)",
                                                            ]
                                                        }]
                                                    },
                                                    options: {
                                                        plugins: {
                                                            title: {
                                                                display: true,
                                                                text: 'Market Value Current and Forecast (%)',
                                                            }
                                                        },
                                                        scales: {
                                                            xAxes: [{
                                                                barPercentage: 0.5,
                                                                categoryPercentage: 1
                                                            }],
                                                            yAxes: [{
                                                                ticks: {
                                                                    beginAtZero: !1
                                                                }
                                                            }]
                                                        },
                                                        legend: {
                                                            display: !1
                                                        }
                                                    }
                                                });

                                                const pieChart = document.getElementById('mypieChart');
                                                new Chart(pieChart, {
                                                    type: "pie",
                                                    data: {
                                                        // labels: ["CAGR", "Others"],
                                                        datasets: [{
                                                            data: [
                                                                @if (isset($reports->getReportCAGR->cagr))
                                                                    {{ $reports->getReportCAGR->cagr }}
                                                                @endif
                                                            ],
                                                            backgroundColor: [
                                                                "rgba(255, 99, 132, 0.8)",
                                                                "rgba(54, 162, 235, 0.8)",
                                                                "rgba(255, 206, 86, 0.8)",
                                                                "rgba(75, 192, 192, 0.8)"
                                                            ]
                                                        }]
                                                    },
                                                    options: {
                                                        plugins: {
                                                            title: {
                                                                display: true,
                                                                text: 'CAGR Report (%)'
                                                            }
                                                        }
                                                    },
                                                });

                                                const segmentChart = document.getElementById('mysegmentChart');
                                                new Chart(segmentChart, {
                                                    type: "pie",
                                                    data: {
                                                        labels: {!! json_encode($segmentname) !!},
                                                        datasets: [{
                                                            data: {!! json_encode($segmentvalue) !!},
                                                            backgroundColor: [
                                                                "rgba(28, 51, 65,0.8)",
                                                                "rgba(0, 135, 115,0.8)",
                                                                "rgba(107, 185, 131,0.8)",
                                                                "rgba(242, 190, 84,0.8)",
                                                                "rgba(240, 217, 207,0.8)",
                                                            ]
                                                        }]
                                                    },
                                                    options: {
                                                        plugins: {
                                                            title: {
                                                                display: true,
                                                                text: 'Segmentation Report (%)'
                                                            }
                                                        },
                                                    }
                                                });

                                                const regionChart = document.getElementById('myregionChart');
                                                new Chart(regionChart, {
                                                    type: "pie",
                                                    data: {
                                                        labels: {!! json_encode($regionname) !!},
                                                        datasets: [{
                                                            data: {!! json_encode($regionvalue) !!},
                                                            backgroundColor: [
                                                                "rgba(28, 51, 65,0.8)",
                                                                "rgba(0, 135, 115,0.8)",
                                                                "rgba(107, 185, 131,0.8)",
                                                                "rgba(242, 201, 117,0.8)",
                                                                "rgba(237, 99, 83,0.8)",
                                                                // "rgba(242, 190, 84,0.8)",
                                                                // "rgba(240, 217, 207,0.8)",
                                                                // "rgba(135, 174, 180,0.8)",
                                                                // "rgba(21, 62, 92,0.8)",
                                                                // "rgba(237, 85, 96,0.8)",
                                                                // "rgba(201, 223, 241,0.8)",
                                                                // "rgba(240, 217, 207,0.9)"
                                                            ]
                                                        }]
                                                    },
                                                    options: {
                                                        plugins: {
                                                            title: {
                                                                display: true,
                                                                text: 'Region-wise Report (%)'
                                                            }
                                                        },
                                                    }
                                                });

                                                const marketshareChart = document.getElementById('mshareChart');
                                                new Chart(marketshareChart, {
                                                    type: "doughnut",
                                                    data: {
                                                        labels: {!! json_encode($marketsharename) !!},
                                                        datasets: [{
                                                            data: {!! json_encode($marketsharevalue) !!},
                                                            backgroundColor: [
                                                                "rgba(28, 51, 65,0.8)",
                                                                "rgba(0, 135, 115,0.8)",
                                                                "rgba(107, 185, 131,0.8)",
                                                                "rgba(242, 201, 117,0.8)",
                                                                "rgba(237, 99, 83,0.8)"
                                                            ]
                                                        }]
                                                    },
                                                    options: {
                                                        plugins: {
                                                            title: {
                                                                display: true,
                                                                text: 'Market Share Report (%)'
                                                            }
                                                        },
                                                    }

                                                });
                                            </script>


                                        </div>
                                        <div>
                                            @if (isset($reports->toc))
                                                {!! html_entity_decode($reports->toc) !!}
                                            @endif
                                        </div>
                                        <div>
                                            @if (isset($reports->segment))
                                                {!! html_entity_decode($reports->segment) !!}
                                            @endif
                                        </div>
                                        <div>
                                            @if (isset($reports->methodology))
                                                {!! html_entity_decode($reports->methodology) !!}
                                            @endif
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </article>


                    <div class="col-md-12">
                        <div class="section-heading">
                            <h2>Frequently Asked Questions</h2>
                        </div>
                        <div id="accordion" class="accordion-style bg-warning">
                            @if (isset($reports->getReportFaq))
                                @foreach ($reports->getReportFaq as $key => $faq)
                                    <div class="card">
                                        <div class="card-header bg-warning text-white" id="headingOne{{ $key }}">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link" data-bs-toggle="collapse"
                                                    data-bs-target="#collapseOne{{ $key }}" aria-expanded="true"
                                                    aria-controls="collapseOne{{ $key }}">
                                                    @if (isset($faq->question))
                                                        {!! html_entity_decode($faq->question) !!}
                                                    @endif
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseOne{{ $key }}" class="collapse show"
                                            aria-labelledby="headingOne{{ $key }}" data-bs-parent="#accordion">
                                            <div class="card-body text-white">
                                                @if (isset($faq->answer))
                                                    {!! html_entity_decode($faq->answer) !!}
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif

                        </div>
                    </div>

                    <div class="col-md-12">
                        <br />
                    </div>


                    <div class="col-md-12">
                        <div class="section-heading">
                            <h2>Get Your Customized Report</h2>
                        </div>
                        <article class="card card-style1">
                            <div class="card-header bg-success text-white">
                                Get Your Customized Report
                            </div>
                            <div class="card-body">

                                @if (isset($reports->customized))
                                    {!! html_entity_decode($reports->customized) !!}
                                @endif
                                <div class="text-center">
                                    <a class="btn btn-success mt-2" href="#!"><span>Request for Customization</span></a>
                                </div>
                            </div>
                        </article>
                    </div>


                </div>
                <!-- end blog left -->

                <!-- blog right -->
                <div class="col-lg-3">
                    <div class="side-bar">

                        <div class="widget">

                            <article class="card card-style1">
                                <div class="card-header bg-primary text-white">
                                    Choose License Type
                                </div>
                                <div class="card-body">

                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault"
                                            id="flexRadioDefault1" checked>
                                        <label class="form-check-label" for="flexRadioDefault1">
                                            <h5>$ @if (isset($reports->getReportLicenses->single_user))
                                                    {{ $reports->getReportLicenses->single_user }}
                                                @endif
                                            </h5>
                                            <p>Single User <i class="fa fa-info-circle" title="Check"></i></p>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault"
                                            id="flexRadioDefault2">
                                        <label class="form-check-label" for="flexRadioDefault2">
                                            <h5>$ @if (isset($reports->getReportLicenses->multi_user))
                                                    {{ $reports->getReportLicenses->multi_user }}
                                                @endif
                                            </h5>
                                            <p>Multi User <i class="fa fa-info-circle" title="Check"></i></p>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault"
                                            id="flexRadioDefault3">
                                        <label class="form-check-label" for="flexRadioDefault3">
                                            <h5>$ @if (isset($reports->getReportLicenses->enterprise_user))
                                                    {{ $reports->getReportLicenses->enterprise_user }}
                                                @endif
                                            </h5>
                                            <p>Enterprise User <i class="fa fa-info-circle" title="Check"></i></p>
                                        </label>
                                    </div>

                                    <a class="butn primary mt-2" href="#!"><span>Buy Now</span></a>
                                </div>
                            </article>
                        </div>

                        <div class="widget">
                            <article class="card card-style1">

                                <div class="card-body text-center">
                                    <a class="butn primary mt-2" href="{{route('front.buynow',$reports->id)}}"><span>Buy Report</span></a>
                                    <a class="butn primary mt-2"
                                        href="{{ route('front.enquiry', ['id' => $reports->url, 'type' => 'request']) }}"><span>Free
                                            Sample</span></a>
                                    <a class="butn primary mt-2"
                                        href="{{ route('front.enquiry', ['id' => $reports->url, 'type' => 'enquiry']) }}"><span>Enquiry</span></a>
                                    <a class="butn primary mt-2"
                                        href="{{ route('front.enquiry', ['id' => $reports->url, 'type' => 'discount']) }}"><span>Discount</span></a>
                                </div>
                            </article>
                        </div>


                        <div class="widget">
                            <div class="widget-title">
                                <h6>Follow Us</h6>
                            </div>
                            <ul class="social-listing ps-0 display-30">
                                <li><a href="@if (isset($contactData->facebook)) {{ $contactData->facebook }} @endif"><i
                                            class="fab fa-facebook-f"></i></a></li>
                                <li><a href="@if (isset($contactData->twitter)) {{ $contactData->twitter }} @endif"><i
                                            class="fab fa-twitter"></i></a></li>
                                <li><a href="@if (isset($contactData->instagram)) {{ $contactData->instagram }} @endif"><i
                                            class="fab fa-instagram"></i></a></li>
                                <!-- <li><a href="#!"><i class="fab fa-youtube"></i></a></li> -->
                                <li><a href="@if (isset($contactData->linkedin)) {{ $contactData->linkedin }} @endif"><i
                                            class="fab fa-linkedin-in"></i></a></li>
                            </ul>
                        </div>

                        <div class="widget">

                            <article class="card card-style1">
                                <div class="card-header bg-primary text-white">
                                    Get In Touch With Us
                                </div>
                                <div class="card-body">
                                    <!-- help -->
                                    <div class="bg-img cover-background theme-overlay border-radius-5 mb-1-9"
                                        data-overlay-dark="8" data-background="{{ asset('front/img/bg/bg2.jpg') }}">
                                        <div class="position-relative z-index-9 text-center px-1-9 py-1-9 py-lg-6">
                                            <i
                                                class="fas fa-headset display-20 dispaly-md-16 display-lg-10 text-white mb-3"></i>
                                            <h5 class="text-white font-weight-600 mb-1 h4">How can we help?</h5>
                                            <p class="text-white font-weight-500 display-30">Let's get in touch!!</p>
                                            <div class="bg-white separator-line-horrizontal-full opacity3 mb-3"></div>
                                            <ul class="text-center p-0 m-0 list-unstyled">
                                                <li class="text-white mb-1"><i class="fa fa-phone text-white me-2"></i><a
                                                        href="tel:@if (isset($contactData->contact_no)) {{ $contactData->contact_no }} @endif"
                                                        class="text-white">
                                                        @if (isset($contactData->contact_no))
                                                            {{ $contactData->contact_no }}
                                                        @endif
                                                    </a></li>
                                                <li class="text-white"><i
                                                        class="fa fa-envelope-open text-white me-2"></i><a
                                                        href="mailto:@if (isset($contactData->email_address)) {{ $contactData->email_address }} @endif"
                                                        class="text-white">
                                                        @if (isset($contactData->email_address))
                                                            {{ $contactData->email_address }}
                                                        @endif
                                                    </a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- end help -->
                                </div>
                            </article>
                        </div>

                        <div class="widget">

                            <article class="card card-style1">
                                <div class="card-header bg-primary text-white">
                                    Testimonials
                                </div>
                                <div class="card-body">

                                    <!-- testimonial -->
                                    <div class="bg-light p-4 border-radius-5 mb-1-9">
                                        <div class="testimonial-style6 owl-carousel owl-theme">
                                            @if (getTestimonial())
                                                @foreach (getTestimonial() as $testimonial)
                                                    <div class="testmonial-single mx-auto w-95 w-lg-85">
                                                        <p>{!! html_entity_decode($testimonial->content) !!}</p>
                                                        <img src="{{ asset('front/img/testmonials/t-1.jpg') }}"
                                                            class="rounded-circle" alt="...">
                                                        <div class="d-block vertical-align-middle text-center">
                                                            <h4>{{ $testimonial->heading }}</h4>
                                                            <!-- <h6>Networking Lead</h6> -->
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @endif
                                            <!-- <div class="testmonial-single mx-auto w-95 w-lg-85">
                                        <p>Exercitation ullamco laboris nisiut aliqu exeaea commo. Duisltrtohg aute
                                        irure.</p>
                                        <img src="{{ asset('front/img/testmonials/t-2.jpg') }}" class="rounded-circle" alt="...">
                                        <div class="d-block vertical-align-middle text-center">
                                            <h4>Stepha Kruse</h4>
                                            <h6>Design Lead</h6>
                                        </div>
                                    </div>
                                    <div class="testmonial-single mx-auto w-95 w-lg-85">
                                        <p>Exercitation ullamco laboris nisiut aliqu exeaea commo. Duisltrtohg aute
                                        irure.</p>
                                        <img src="{{ asset('front/img/testmonials/t-3.jpg') }}" class="rounded-circle" alt="...">
                                        <div class="d-block vertical-align-middle text-center">
                                            <h4>Dunican keithly</h4>
                                            <h6>Networking Lead</h6>
                                        </div>
                                    </div> -->
                                        </div>
                                    </div>
                                    <!-- start testimonial -->
                                </div>
                            </article>
                        </div>

                    </div>






                </div>
                <!-- end blog right -->

            </div>


        </div>
    </section>



    <?php //include("footer.php");
    ?>

@endsection
