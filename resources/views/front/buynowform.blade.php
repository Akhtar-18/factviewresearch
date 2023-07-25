<?php //include("header.php");
?>
@extends('front.layout')
@section('title', 'Buy Now')
@section('frontpage')
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- PAGE TITLE
            ================================================== -->
    <section class="page-title-section2 bg-img cover-background" data-overlay-dark="7"
        data-background="{{ asset('front/img/bg/bg5.jpg') }}">
        <div class="container">

            <div class="row">
                <div class="col-md-12">
                    <h1>
                    PURCHASE
                    </h1>
                </div>
                <div class="col-md-12">
                    <ul class="ps-0">
                        <li><a href="{{ route('front.home') }}">Home</a></li>
                        <li><a href="#">{{ $reports->heading }}</a>
                            </li>


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
                        PURCHASE
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
                    <div class="contact-form-box">
                        <div class="alert alert-danger print-error-msg" style="display:none">
                            <ul></ul>
                        </div>

                        <form class="contact" name="contactUsForm" id="contactUsForm" enctype="multipart/form-data"
                            method="POST">
                            <div class="quform-elements">
                                <div class="row">

                                    <!-- Begin Text input element -->
                                    <div class="col-md-6">
                                        <div class="quform-element form-group">
                                            <div class="quform-input">
                                                <label>Name:</label>
                                                <input type="hidden" name="report_id"
                                                    value="@if (isset($reports->id)) {{ $reports->id }} @endif">
                                                <input class="form-control" id="name" type="text" name="name"
                                                    placeholder="Enter Name" required />
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Text input element -->
                                    <!-- Begin Text input element -->
                                    <div class="col-md-6">
                                        <div class="quform-element form-group">
                                            <div class="quform-input">
                                            <label>Company Name:</label>
                                                <input class="form-control" id="name" type="text" name="name"
                                                    placeholder="Enter Company Name" required />

                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="quform-element form-group">
                                            <div class="quform-input">
                                            <label>Job Title:</label>
                                                <input class="form-control" id="name" type="text" name="name"
                                                    placeholder="Job Title" required />

                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Text input element -->
                                    <div class="col-md-6">
                                        <div class="quform-element form-group">
                                            <div class="quform-input">
                                                <label>Country:</label>
                                                <select class="form-control" id="country" type="text" name="country"
                                                    placeholder="Select Country" required>
                                                    <option value="">Select Country</option>
                                                    @if (getCountry())
                                                        @foreach (getCountry() as $country)
                                                            <option value="{{ $country['name'] }}">{{ $country['name'] }}
                                                            </option>
                                                        @endforeach
                                                    @endif

                                                </select>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="quform-element form-group">
                                            <div class="quform-input">
                                                <label>State:</label>
                                                <select class="form-control" id="country" type="text" name="country"
                                                    placeholder="Select State" required>
                                                    <option value="">Select Country</option>
                                                    @if (getCountry())
                                                        @foreach (getCountry() as $country)
                                                            <option value="{{ $country['name'] }}">{{ $country['name'] }}
                                                            </option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="quform-element form-group">
                                            <div class="quform-input">
                                            <label>City:</label>
                                                <input class="form-control" id="name" type="text" name="name"
                                                    placeholder="City name" required />

                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="quform-element form-group">
                                            <div class="quform-input">
                                            <label>Zip Code:</label>
                                                <input class="form-control" id="name" type="text" name="name"
                                                    placeholder="Zip Code" required />

                                            </div>
                                        </div>
                                    </div>

                                    <!-- Begin Text input element -->
                                    <div class="col-md-6">
                                        <div class="quform-element form-group">
                                            <div class="quform-input">
                                                <label>Email:</label>
                                                <input class="form-control" id="email" type="text" name="email"
                                                    placeholder="Enter Email" required />
                                            </div>
                                        </div>
                                    </div>

                                    <!-- End Text input element -->
                                    <div class="col-md-6">
                                        <div class="quform-element form-group">
                                            <div class="quform-input">
                                                <label>Contact No:</label>
                                                <input class="form-control" id="contact_no" type="number" name="contact_no"
                                                    placeholder="Enter Contact No" required />
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Begin Text input element -->
                                    <div class="col-md-6">
                                        <div class="quform-element form-group">
                                            <div class="quform-input">
                                                <label>License Type:</label>
                                                <select class="form-control" id="country" type="text" name="country"
                                                    placeholder="Select State" required>
                                                    <option value="">Select License Type</option>
                                                    @if ($reports->getReportLicenses)
                                                    <option value="{{ $reports->getReportLicenses->single_user}}">{{ 'Single User' }}($ {{$reports->getReportLicenses->single_user}})</option>
                                                    <option value="{{ $reports->getReportLicenses->multi_user}}">{{ 'Multi User' }}($ {{$reports->getReportLicenses->multi_user}})</option>
                                                    <option value="{{ $reports->getReportLicenses->enterprise_user}}">{{ 'EnterPrise User' }}($ {{$reports->getReportLicenses->enterprise_user}})</option>
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Text input element -->
                                    <!-- Begin Text input element -->

                                    <!-- End Text input element -->
                                    <!-- Begin Text input element -->

                                    <!-- End Text input element -->
                                    <!-- Begin Text input element -->

                                    <!-- End Text input element -->

                                    <div class="col-md-12">
                                        <div class="quform-element form-group">
                                            <div class="quform-input">
                                                <label>Address :</label>
                                                    <textarea class="form-control h-100" id="message" name="others" rows="6"
                                                    placeholder="Address" required></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Begin Textarea element -->

                                    <!-- End Textarea element -->

                                    <!-- Begin Submit button -->
                                    <div class="col-md-12 text-center">
                                        <div class="quform-submit-inner">
                                            <button class="butn btn-submit" type="button"><span>Submit</span></button>
                                        </div>
                                        <div class="quform-loading-wrap text-start"><span class="quform-loading"></span>
                                        </div>
                                    </div>
                                    <!-- End Submit button -->

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- end contact form  -->

                <!-- contact detail -->
                <div class="col-lg-4">
                    <div class="contact-info-box ps-lg-1-9">
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
                    </div>
                </div>
                <!-- end contact detail -->
            </div>
        </div>
    </section>
    @include('front.testimonial-section')
    @include('front.client-section')


    <script type="text/javascript">
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });

        $(".btn-submit").click(function(e) {

            e.preventDefault();
            var ButtonText = $(this).find('button[type="button"]').html();
       /*$(this).find('button').prop('disabled', true);
       $(this).find('button').html('Loading ...');*/
       $(this).find('.btn-submit').prop('disabled', true);
       $(this).find('.btn-submit').html('Loading ...');


       $(this).find('button[type="button"]').prop('disabled', true);
       $(this).find('button[type="button"]').html('Loading ...');

            $.ajax({
                type: 'POST',
                url: "{{ route('submit.enquiry') }}",
                data: $('#contactUsForm').serialize(),
                success: function(data) {
                    if ($.isEmptyObject(data.error)) {
                        window.location.href="{{url('thankyou')}}/"+data.id;
                    } else {
                        printErrorMsg(data.error);
                    }
                }
            });

        });

        function printErrorMsg(msg) {
            $(".print-error-msg").find("ul").html('');
            $(".print-error-msg").css('display', 'block');
            $.each(msg, function(key, value) {
                $(".print-error-msg").find("ul").append('<li>' + value + '</li>');
            });
        }

          $('#reload').click(function () {
        $.ajax({
            type: 'GET',
            url: '{{route("reload-from-captcha")}}',
            success: function (data) {
                $(".captcha span").html(data.captcha);
            }
        });
    });
    </script>

@endsection
