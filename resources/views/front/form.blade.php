@extends('front.layout')
@section('title', 'Form Enquiry')
@section('frontpage')
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- PAGE TITLE
                                ================================================== -->
    <section class="page-title-section pt-1-9 pb-1-9 bg-primary">
        <div class="container">

            <div class="row">

                <div class="col-md-12">
                    <ul class="ps-0">
                        <li><a href="{{ route('front.home') }}">Home</a></li>
                        @if ($type == 'request')
                            <li><a href="{{ route('front.enquiry', ['id' => $reports->url, 'type' => 'request']) }}"
                                    class="text-white">{{ 'REQUEST SAMPLE' }}</a>
                            </li>
                        @elseif($type == 'enquiry')
                            <li><a href="{{ route('front.enquiry', ['id' => $reports->url, 'type' => 'enquiry']) }}"
                                    class="text-white">{{ 'ENQUIRY BEFORE BUYING' }}</a>
                            </li>
                        @elseif($type == 'discount')
                            <li><a href="{{ route('front.enquiry', ['id' => $reports->url, 'type' => 'discount']) }}"
                                    class="text-white">{{ 'ASK FOR DISCOUNT' }}</a>
                            </li>
                        @endif

                    </ul>
                </div>
            </div>

        </div>
    </section>




    <!-- CONTACT
                                ================================================== -->
    <section class="md">
        <div class="container">
            <div class="row">

                <!-- contact form -->
                <div class="col-lg-8 mb-1-9 mb-lg-0">
                    <div class="section-heading center">
                        <h3>
                            @if ($type == 'request')
                                {{ 'REQUEST SAMPLE' }}
                            @elseif($type == 'enquiry')
                                {{ 'ENQUIRY BEFORE BUYING' }}
                            @elseif($type == 'discount')
                                {{ 'ASK FOR DISCOUNT' }}
                            @endif
                        </h3>
                    </div>

                    <div class="title text-center mb-2">
                        <h5 class="text-center">
                            @if (isset($reports->heading))
                                {{ $reports->heading }}
                            @endif
                        </h5>
                    </div>
                    <div class="col-md-12"><br /></div>
                    <div class="contact-form-box mt-2">
                        <div class="alert alert-danger print-error-msg" style="display:none">
                            <ul></ul>
                        </div>

                        <form class="contact ajaxformfileupload" action="{{ route('submit.enquiry') }}" name="contactUsForm" id="contactUsForm" enctype="multipart/form-data"
                            method="POST">
                            <div class="quform-elements">
                                <div class="row">

                                    <!-- Begin Text input element -->
                                    <div class="col-md-4">
                                        <div class="quform-element form-group">
                                            <div class="quform-input">
                                                <label>Name:</label>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Text input element -->
                                    <!-- Begin Text input element -->
                                    <div class="col-md-8">
                                        <div class="quform-element form-group">
                                            <div class="quform-input">
                                                <input type="hidden" name="types" value="{{ $type }}">
                                                <input type="hidden" name="report_id"
                                                    value="@if (isset($reports->id)) {{ $reports->id }} @endif">
                                                <input class="form-control" id="name" type="text" name="name"
                                                    placeholder="Enter Name" required />
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Text input element -->
                                    <!-- Begin Text input element -->
                                    <div class="col-md-4">
                                        <div class="quform-element form-group">
                                            <div class="quform-input">
                                                <label>Email:</label>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Text input element -->
                                    <!-- Begin Text input element -->
                                    <div class="col-md-8">
                                        <div class="quform-element form-group">
                                            <div class="quform-input">
                                                <input class="form-control" id="email" type="text" name="email"
                                                    placeholder="Enter Email" required />
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Text input element -->

                                    <!-- Begin Text input element -->
                                    <div class="col-md-4">
                                        <div class="quform-element form-group">
                                            <div class="quform-input">
                                                <label>Country:</label>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Text input element -->
                                    <!-- Begin Text input element -->
                                    <div class="col-md-8">
                                        <div class="quform-element form-group">
                                            <div class="quform-input">
                                                <select class="form-control" id="country" type="text" name="country"
                                                    placeholder="Select Country" required>
                                                    <option value="">Select Country</option>
                                                    @if (getCountry())
                                                        @foreach (getCountry() as $country)
                                                            <option value="{{ $country['name'] }}">{{ $country['name'] }}
                                                            </option>
                                                        @endforeach
                                                    @endif
                                                    <option value="USA">USA</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Text input element -->
                                    <!-- Begin Text input element -->
                                    <div class="col-md-4">
                                        <div class="quform-element form-group">
                                            <div class="quform-input">
                                                <label>Contact No:</label>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Text input element -->
                                    <!-- Begin Text input element -->
                                    <div class="col-md-8">
                                        <div class="quform-element form-group">
                                            <div class="quform-input">
                                                <input class="form-control" id="contact_no" type="number" name="contact_no"
                                                    placeholder="Enter Contact No" required />
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Text input element -->
                                    <!-- Begin Text input element -->
                                    <div class="col-md-4">
                                        <div class="quform-element form-group">
                                            <div class="quform-input">
                                                <label>Company/Organization:</label>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Text input element -->
                                    <!-- Begin Text input element -->
                                    <div class="col-md-8">
                                        <div class="quform-element form-group">
                                            <div class="quform-input">
                                                <input class="form-control" id="subject" type="text"
                                                    name="organizations" placeholder="Enter Company/Organization Name"
                                                    required />
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Text input element -->

                                    <div class="col-md-4">
                                        <div class="quform-element form-group">
                                            <div class="quform-input">
                                                <label>15% Free Customization <br />
                                                    (Mention the sections of the report that you would like to review so we
                                                    will share the relevant chapters of report, for your Study):</label>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Begin Textarea element -->
                                    <div class="col-md-8">
                                        <div class="quform-element form-group">
                                            <div class="quform-input">
                                                <textarea class="form-control h-100" id="message" name="others" rows="6"
                                                    placeholder="Any other requirement" required></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Textarea element -->
                                    <div class="col-md-4">
                                        <div class="quform-element form-group">
                                            <div class="quform-input">
                                                <div class="captcha">
                                                    <span>{!! captcha_img() !!}</span>
                                                    <a type="button" class="btn btn-danger" class="reload"
                                                        id="reload">
                                                        &#x21bb;
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="quform-element form-group">
                                            <div class="quform-input">
                                                <input id="captcha" type="text" class="form-control"
                                                    placeholder="Enter Captcha" name="captcha">
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Begin Submit button -->
                                    <div class="col-md-12 text-center">
                                        <div class="quform-submit-inner">
                                            <button class="butn btn-submit" type="submit"><span>Submit</span></button>
                                        </div>
                                        <div class="quform-loading-wrap text-start"><span class="quform-loading"></span>
                                        </div>
                                    </div>
                                    <!-- End Submit button -->

                                </div>
                            </div>
                        </form>
                    </div>
                    <section class="bg-light box-hover">
                        <div class="container">
                            <br /><br />
                            <div class="section-heading">
                                <h2>Our Clients</h2>
                            </div>
                            <div class="position-relative">
                                <div class="owl-carousel owl-theme clients" id="clients">
                                    @if (getClient())
                                        @foreach (getClient() as $client)
                                            <div class="item"><img alt="partner-image"
                                                    src="{{ asset('clients/images/') }}/{{ $client->image }}"
                                                    width="200" height="50"></div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                <!-- end contact form  -->

                <!-- contact detail -->
                <div class="col-lg-4">
                    <div class="side-bar">
                        <div class="widget">

                            <article class="card card-style1">
                                <div class="card-header bg-primary text-white">
                                    Report Details
                                </div>
                                <div class="card-body row">
                                    <div class="col-sm-6">
                                        Report ID

                                    </div>

                                    <div class="col-sm-6">
                                        @if (isset($reports->id))
                                            {{ $reports->id }}
                                        @endif

                                    </div>
                                    <div class="col-sm-6">
                                        Category

                                    </div>

                                    <div class="col-sm-6">
                                        @if (isset($reports->getCategoryName->cat_name))
                                            {{ $reports->getCategoryName->cat_name }}
                                        @endif

                                    </div>
                                    <div class="col-sm-6">
                                        Published Date

                                    </div>

                                    <div class="col-sm-6">
                                        @if (isset($reports->publish_month))
                                            {{ date('F - Y', strtotime($reports->publish_month)) }}
                                        @endif

                                    </div>
                                    <div class="col-sm-6">
                                        Pages

                                    </div>

                                    <div class="col-sm-6">
                                        @if (isset($reports->pages))
                                            {{ $reports->pages }}
                                        @endif

                                    </div>
                                    <div class="col-sm-6">
                                        Format

                                    </div>

                                    <div class="col-sm-6">
                                        PDF

                                    </div>
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


                                    <!--<div class="bg-light p-4 border-radius-5 mb-1-9">
                                                    <div class="container">
                                                        <div class="position-relative">-->
                                    <div class="owl-carousel owl-theme w-100">
                                        @if (getTestimonial())
                                            @foreach (getTestimonial() as $testimonial)
                                                <div class="testmonial-single">
                                                    <p class="text-primary">{!! html_entity_decode($testimonial->comments) !!}</p>
                                                    <img src="{{ asset('testimonials/client_image/') }}/{{ $testimonial->client_image }}"
                                                        class="rounded-circle" style="width:100px;" alt="...">
                                                    <h4 class="pt-4 text-primary">{{ $testimonial->name }}
                                                    </h4>
                                                    <h6 class="mb-1-9">{{ $testimonial->profile }}</h6>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                    <!--</div>
                                                    </div>
                                                </div> -->

                                    <!-- end testimonials -->
                                </div>
                            </article>
                        </div>

                        <!-- <div class="widget">

                                            <article class="card card-style1">
                                                <div class="card-header bg-primary text-white">
                                                    Clients
                                                </div>
                                                <div class="card-body">


                                                    <div class="bg-light p-4 border-radius-5 mb-1-9">
                                                        <div class="container">

                                                            <div class="position-relative">
                                                                <div class="owl-carousel owl-theme">
                                                                    @if (getClient())
                                                                        @foreach (getClient() as $client)
    <div class="item"><img alt="partner-image"
                                                                                    src="{{ asset('clients/images/') }}/{{ $client->image }}">
                                                                            </div>
    @endforeach
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </article>
                                        </div> -->

                        <div class="widget">
                            <article class="card card-style1">
                                <div class="card-header bg-primary text-white">
                                    Get In Touch With Us
                                </div>
                                <div class="card-body">
                                    <p class="text-center"><i
                                            class="fas fa-headset display-20 dispaly-md-16 display-lg-10 text-primary"></i>
                                    </p>
                                    <h5 class="text-primary text-center font-weight-600 mb-1">How can we help?</h5>
                                    <p class="text-primary text-center font-weight-500 display-30">Let's get in touch!!</p>
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
                                    <h6 class="text-primary text-center page-title-section">Follow Us</h6>

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
                                    </ul>

                                </div>
                            </article>
                        </div>

                    </div>
                </div>
                <!-- end contact detail -->
            </div>
        </div>
    </section>
    {{-- @include('front.testimonial-section') --}}
    {{-- @include('front.client-section') --}}




@endsection
