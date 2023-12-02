@extends('front.layout')
@section('title', 'Report')
@section('frontpage')
@section('reportmetasection')

    <meta name="keywords" content="{{ strip_tags($reports->metal_keywords) }}" />
    <meta name="description" content="{{ strip_tags($reports->meta_des) }}" />

    <!-- title  -->
    <title>{{ strip_tags($reports->meta_title) }}</title>
@endsection
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<!-- PAGE TITLE
                                            ================================================== -->
<section class="page-title-section pt-1-9 pb-1-9 bg-primary">
    <div class="container">

        <div class="row">
            <div class="col-md-12">
                <ul class="ps-0">
                    <li><a href="{{ route('front.home') }}">Home</a></li>
                    <li><a
                            href="{{ route('front.reportcategory', ['id' => strtolower($reports->getCategoryName->cat_name)]) }}">{{ $reports->getCategoryName->cat_name }}</a>
                    </li>
                    <li><a href="{{ route('front.report', ['id' => $reports->url]) }}"
                            class="text-white">{!! html_entity_decode(wordLimitset($reports->heading, 5)) !!}</a>
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
                <article class="blog-list-simple">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="blog-list-simple-text">
                                <!-- <span>Business</span> -->
                                <h1 class="d-none">{{ $reports->h1_column ?? '' }}</h1>
                                <h6 class="text-primary">{{ $reports->heading }}</h6>
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
                                    </li>|
                                    <li>
                                        <i aria-hidden="true" class="fas fa-file-alt text-primary-new"></i> Format: <i
                                            aria-hidden="true" class="fas fa-file-pdf text-danger"></i> PDF
                                    </li>|
                                    <li><i aria-hidden="true" class="fas fa-share-alt text-primary-new"></i> Share: <a
                                            href="@if (getCompanyDetail()) {{ getCompanyDetail()->facebook }} @endif"><i
                                                class="fab fa-facebook-f"></i></a>
                                    </li>
                                    <li><a
                                            href="@if (getCompanyDetail()) {{ getCompanyDetail()->twitter }} @endif"><i
                                                class="fab fa-twitter"></i></a>
                                    </li>
                                    <li><a
                                            href="@if (getCompanyDetail()) {{ getCompanyDetail()->instagram }} @endif"><i
                                                class="fab fa-instagram"></i></a>
                                    </li>
                                    <li><a
                                            href="@if (getCompanyDetail()) {{ getCompanyDetail()->linkedin }} @endif"><i
                                                class="fab fa-linkedin-in"></i></a>
                                    </li>
                                    </li>
                                </ul>
                                <p class="text-primary"></p>
                            </div>
                        </div>
                    </div>
                    <div class="row box-hover mb-1-9 mb-lg-6">

                        <div class="col-12">
                            <div class="horizontaltab">
                                <div class="col-md-12 mt-2 mb-2 d-lg-none text-center">
                                    <a class="btn btn-danger"
                                        href="{{ route('front.enquiry', ['id' => $reports->url, 'type' => 'request']) }}"><span>Download
                                            Sample</span></a>
                                </div>
                                <ul class="resp-tabs-list hor_1">
                                    <li>Report Summary</li>
                                    <li>Table of Contents</li>
                                    <li>Segmentation</li>
                                    <li>Methodology</li>
                                    <li class="bg-danger text-white d-xl-inline-block d-md-none d-none"><a
                                            href="{{ route('front.enquiry', ['id' => $reports->url, 'type' => 'request']) }}"
                                            class="text-white">Download Sample</a></li>
                                </ul>
                                <div class="resp-tabs-container hor_1">
                                    <div>
                                        <p>
                                            {!! html_entity_decode($reports->description) !!}
                                        </p>

                                        <div class="row">
                                            @if (count($reports->getReportTblSummary) > 0)
                                                <div class="col-md-12 mt-3">
                                                    <div class="table-responsive">
                                                        <table class="table table-bordered border-dark">
                                                            <thead>
                                                                <tr
                                                                    style="background-color: #4472c4;color:#fff;width: 24%;">
                                                                    <th style="width: 24%">Report Components</th>
                                                                    <th>Details</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($reports->getReportTblSummary as $tbl)
                                                                    <tr>
                                                                        <td><b>{{ $tbl->heading }}</b></td>
                                                                        <td>{!! html_entity_decode($tbl->details) !!}</td>
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>

                                                        </table>
                                                    </div>
                                                </div>
                                            @endif

                                            @if (!empty(json_decode($marketyear, true)))
                                                <div class="col-md-8">
                                                    <div class="card-body">
                                                        <canvas id="mybarChart" height="300"></canvas>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="card-body">
                                                        <p><a href="{{ route('front.home') }}"
                                                                class="navbar-brand logodefault">
                                                                @if (getCompanyDetail())
                                                                    <img id="logo"
                                                                        src="{{ asset('company_logo') }}/{{ getCompanyDetail()->company_logo }}"
                                                                        alt="logo" width="200" height="50">
                                                                @elseif(isset(getCompanyDetail()->company_name))
                                                                    {{ getCompanyDetail()->company_name }}
                                                                @endif
                                                            </a></p>
                                                        @if (!empty($reports->getReportCAGR->cagr))
                                                            @if (isset($reports->getReportCAGR->cagr))
                                                                <div class="title text-center mb-2">
                                                                    <div class="section-heading">
                                                                        <h2>{{ $reports->getReportCAGR->cagr }}
                                                                            %</h2>
                                                                    </div>
                                                                    <h6 class="text-primary">Current CAGR
                                                                        Report</strong></h6>
                                                                    <p>
                                                                        @foreach ($marketyear as $markyr)
                                                                            @if ($loop->first)
                                                                                {{ $markyr }} -
                                                                            @endif
                                                                            @if ($loop->last)
                                                                                {{ $markyr }}
                                                                            @endif
                                                                        @endforeach
                                                                    </p>
                                                                </div>
                                                            @endif
                                                        @endif
                                                    </div>


                                                </div>
                                            @endif
                                            <!-- Segment Graph -->
                                            @if (count($SegmentType) > 0)
                                                @foreach ($SegmentType as $segments)
                                                    <div class="col-md-4">
                                                        @php $SegmentGraph = getSementGraph($segments->id);
                                                             $segmentname = $SegmentGraph->pluck('segmentname');
                                                             $segmentvalue = $SegmentGraph->pluck('segmentvalue');
                                                        @endphp
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <canvas
                                                                    id="mysegmentChart{{ $segments->id }}"></canvas>
                                                            </div>
                                                        </div>
                                                        <script>
                                                           var segmentChart = document.getElementById('mysegmentChart{{ $segments->id }}');
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
                                                                                text: '{{ $segments->segmenttypename }} Segmentation  (%)'
                                                                            }
                                                                        },
                                                                    }
                                                                });
                                                        </script>
                                                    </div>
                                                @endforeach
                                            @endif
                                            <!-- Region Graph -->
                                            @if (!empty(json_decode($regionname, true)))
                                                <div class="col-md-4">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <canvas id="myregionChart"></canvas>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                            <!-- Market Share Graph -->
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
                                <a class="btn btn-success mt-2"
                                    href="{{ route('front.enquiry', ['id' => $reports->url, 'type' => 'enquiry']) }}"><span>Request
                                        for
                                        Customization</span></a>
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
                                        <p style="font-size: 14px;">$ @if (isset($reports->getReportLicenses->single_user))
                                                {{ $reports->getReportLicenses->single_user }}
                                            @endif
                                            - Single User <i class="fa fa-info-circle" data-toggle="tooltip"
                                                data-html="true" title="Report access for Single User only"></i>
                                        </p>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault"
                                        id="flexRadioDefault2">
                                    <label class="form-check-label" for="flexRadioDefault2">
                                        <p style="font-size: 14px;">$ @if (isset($reports->getReportLicenses->multi_user))
                                                {{ $reports->getReportLicenses->multi_user }}
                                            @endif
                                            - Multi User <i class="fa fa-info-circle" data-toggle="tooltip"
                                                data-html="true" title="Report access for six users"></i>
                                        </p>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault"
                                        id="flexRadioDefault3">
                                    <label class="form-check-label" for="flexRadioDefault3">
                                        <p style="font-size: 14px;">$ @if (isset($reports->getReportLicenses->enterprise_user))
                                                {{ $reports->getReportLicenses->enterprise_user }}
                                            @endif
                                            - Enterprise User <i class="fa fa-info-circle" data-toggle="tooltip"
                                                data-html="true" title="Report access for unlimited users"></i>
                                        </p>
                                    </label>
                                </div>
                                <div class="col-md-12 text-center">
                                    <a class="butn primary"
                                        href="{{ route('front.buynow', $reports->id) }}"><span>Buy
                                            Now</span></a>
                                </div>
                            </div>
                        </article>
                    </div>

                    <div class="widget">
                        <article class="card card-style1">

                            <div class="card-body text-center">
                                <a class="btn btn-danger m-2 text-white" style="width:150px"
                                    href="{{ route('front.enquiry', ['id' => $reports->url, 'type' => 'request']) }}"><span>Free
                                        Sample</span></a>
                                <a class="btn btn-warning m-2 text-white" style="width:150px"
                                    href="{{ route('front.enquiry', ['id' => $reports->url, 'type' => 'enquiry']) }}"><span>Enquiry</span></a>
                                <a class="btn btn-success m-2 text-white" style="width:150px"
                                    href="{{ route('front.enquiry', ['id' => $reports->url, 'type' => 'discount']) }}"><span>Discount</span></a>
                                <!-- <a class="butn bg-danger m-2" style="width:150px"
                                        href="{{ route('front.enquiry', ['id' => $reports->url, 'type' => 'request']) }}"><span>Free
                                            Sample</span></a>
                                    <a class="butn bg-warning m-2" style="width:150px"
                                        href="{{ route('front.enquiry', ['id' => $reports->url, 'type' => 'enquiry']) }}"><span>Enquiry</span></a>
                                    <a class="butn bg-success m-2" style="width:150px"
                                        href="{{ route('front.enquiry', ['id' => $reports->url, 'type' => 'discount']) }}"><span>Discount</span></a>-->
                                <!-- <a class="butn bg-info m-2" style="width:150px"
                                        href="{{ route('front.buynow', $reports->id) }}"><span>Buy
                                            Report</span></a> -->


                            </div>
                        </article>
                    </div>

                    <div class="widget">
                        <article class="card card-style1">
                            <div class="card-header bg-primary text-white">
                                Testimonials
                            </div>
                            <div class="card-body">

                                <!-- start testimonials -->

                                <div class="owl-carousel owl-theme w-100">
                                    @if (getTestimonial())
                                        @foreach (getTestimonial() as $testimonial)
                                            <div class="testimonial-style4 text-center">
                                                <img src="{{ asset('testimonials/client_image/') }}/{{ $testimonial->client_image }}"
                                                    alt="..." class="d-inline-block" width="200" height="50">
                                                <p class="my-4">{!! html_entity_decode($testimonial->comments) !!}</p>
                                                <span
                                                    class="name font-weight-600 text-uppercase font-size12 alt-font small">{{ $testimonial->name }}
                                                    - {{ $testimonial->profile }}</span>
                                                <span
                                                    class="quote font-weight-600 text-uppercase d-block alt-font opacity2">“</span>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </article>
                    </div>

                    <div class="widget">

                        <article class="card card-style1">
                            <div class="card-header bg-primary text-white">
                                Clients
                            </div>
                            <div class="card-body">

                                <!-- start clients -->
                                <div class="bg-light p-4 border-radius-5 mb-1-9">
                                    <div class="container">

                                        <div class="position-relative">
                                            <div class="owl-carousel owl-theme">
                                                @if (getClient())
                                                    @foreach (getClient() as $client)
                                                        <div class="item"><img alt="partner-image"
                                                                src="{{ asset('clients/images/') }}/{{ $client->image }}" width="200" height="50">
                                                        </div>
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end clients -->
                            </div>
                        </article>
                    </div>

                    <div class="widget">
                        <article class="card card-style1">
                            <div class="card-header bg-primary text-white">
                                Get In Touch With Us
                            </div>
                            <div class="card-body">
                                <!--<p class="text-center"><i class="fas fa-headset display-20 dispaly-md-16 display-lg-10 text-primary"></i></p>
                                                <h5 class="text-primary text-center font-weight-600 mb-1">How can we help?</h5>
                                                <p class="text-primary text-center font-weight-500 display-30">Let's get in touch!!</p>-->
                                <p class="text-center text-primary"><i class="fa fa-phone"></i><br /><a
                                        href="tel:@if (getCompanyDetail()) {{ getCompanyDetail()->no_prefix }}{{ getCompanyDetail()->contact_no }} @endif"
                                        class="text-primary">
                                        @if (getCompanyDetail())
                                            {{ getCompanyDetail()->no_prefix }}{{ getCompanyDetail()->contact_no }}
                                        @endif

                                    </a></p>
                                <p class="text-center text-primary"><i class="fa fa-envelope-open me-2"></i><br /><a
                                        href="mailto:@if (getCompanyDetail()) {{ getCompanyDetail()->email_address }} @endif"
                                        class="text-primary">
                                        @if (getCompanyDetail())
                                            {{ getCompanyDetail()->email_address }}
                                        @endif
                                    </a></p>

                                <!-- <h6 class="text-primary text-center page-title-section">Follow Us</h6>

                                                <ul class="social-listing text-center ps-0 display-30">
                                                    <li><a
                                                            href="@if (getCompanyDetail()) {{ getCompanyDetail()->facebook }} @endif"><i
                                                                class="fab fa-facebook-f"></i></a>
                                                    </li>
                                                    <li><a
                                                            href="@if (getCompanyDetail()) {{ getCompanyDetail()->twitter }} @endif"><i
                                                                class="fab fa-twitter"></i></a>
                                                    </li>
                                                    <li><a
                                                            href="@if (getCompanyDetail()) {{ getCompanyDetail()->instagram }} @endif"><i
                                                                class="fab fa-instagram"></i></a>
                                                    </li>
                                                    <li><a
                                                            href="@if (getCompanyDetail()) {{ getCompanyDetail()->linkedin }} @endif"><i
                                                                class="fab fa-linkedin-in"></i></a>
                                                    </li>
                                                </ul> -->

                            </div>
                        </article>
                    </div>

                </div>
            </div>
            <!-- end blog right -->

        </div>


    </div>
</section>

<!-- Modal -->
<div class="modal" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="exampleModalLabel">Looking for Solution...</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h4>What are you looking for?</h4>
                <p>We are here for all solutions..</p>
                <a href="{{ route('front.contact') }}" class="butn primary white-hover"><span>Speak to
                        Anlayst</span></a>
                <a href="{{ route('front.enquiry', ['id' => $reports->url, 'type' => 'request']) }}"
                    class="butn primary white-hover"><span>Request a Sample pdf</span></a>
            </div>
            <!-- <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">Save changes</button>
                                        </div> -->
        </div>
    </div>
</div>

<script>
    //  window.onload = function() {
    //jQuery('#exampleModal').modal('show');
    //}
</script>
<script>
    $(document).ready(function() {
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>

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
                        "rgba(242, 190, 84,0.8)",
                        "rgba(240, 217, 207,0.8)",
                        "rgba(135, 174, 180,0.8)",
                        "rgba(21, 62, 92,0.8)",
                        "rgba(237, 85, 96,0.8)",
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
                        "rgba(237, 99, 83,0.8)",
                        "rgba(242, 190, 84,0.8)",
                        "rgba(240, 217, 207,0.8)",
                        "rgba(135, 174, 180,0.8)",
                        "rgba(21, 62, 92,0.8)",
                        "rgba(237, 85, 96,0.8)",
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

@endsection
