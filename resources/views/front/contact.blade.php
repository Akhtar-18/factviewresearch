@extends('front.layout')
@section('title', 'Contact Us')
@section('frontpage')

    <!-- PAGE TITLE
                            ================================================== -->
    <section class="page-title-section pt-1-9 pb-1-9 bg-primary">
        <div class="container">

            <div class="row">
                <div class="col-md-12">
                    <ul class="ps-0">
                        <li><a href="{{ route('front.home') }}">Home</a></li>
                        <li><a href="{{ route('front.contact') }}"class="text-white">Contact Us</a></li>
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
                <div class="col-md-12 text-center">
                    <br />
                    <h1 class="text-primary">Contact Us</h1>
                    <br />
                </div>
                <!-- contact form -->
                <div class="col-lg-6 mb-1-9 mb-lg-0">
                    <div class="section-heading left">
                        <h3>Let's connect with us</h3>
                    </div>
                    <div class="contact-form-box">
                        <div class="alert alert-danger print-error-msg" style="display:none">
                            <ul></ul>
                        </div>
                        <form class="contact quform contactform"  action="{{ route('submit.contact_enquiry') }}" id="contactUsForm" action="#" method="post"
                            enctype="multipart/form-data">
                            <div class="quform-elements">
                                <div class="row">

                                    <!-- Begin Text input element -->
                                    <div class="col-md-6">
                                        <div class="quform-element form-group">
                                            <div class="quform-input">
                                                <input class="form-control" id="name" type="text" name="name"
                                                    placeholder="Your name here" />
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Text input element -->

                                    <!-- Begin Text input element -->
                                    <div class="col-md-6">
                                        <div class="quform-element form-group">
                                            <div class="quform-input">
                                                <input class="form-control" id="email" type="text" name="email"
                                                    placeholder="Your email here" />
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Text input element -->

                                    <!-- Begin Text input element -->
                                    <div class="col-md-6">
                                        <div class="quform-element form-group">
                                            <div class="quform-input">
                                                <input class="form-control" id="subject" type="text" name="subject"
                                                    placeholder="Your subject here" />
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Text input element -->

                                    <!-- Begin Text input element -->
                                    <div class="col-md-6">
                                        <div class="quform-element form-group">
                                            <div class="quform-input">
                                                <input class="form-control" id="contact_no" type="number" name="contact_no"
                                                    placeholder="Your phone here" />
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Text input element -->

                                    <!-- Begin Textarea element -->
                                    <div class="col-md-12">
                                        <div class="quform-element form-group">
                                            <div class="quform-input">
                                                <textarea class="form-control h-100" id="msg" name="msg" rows="3" placeholder="Tell us a few words"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Textarea element -->

                                    <!-- Begin Captcha element -->
                                    <div class="col-md-12">
                                        <div class="quform-element">
                                            <div class="form-group mt-4 mb-4">
                                                <div class="captcha">
                                                    <span>{!! captcha_img() !!}</span>
                                                    <button type="button" class="btn btn-danger" class="reload"
                                                        id="reload">
                                                        &#x21bb;
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="form-group mb-4">
                                                <input id="captcha" type="text" class="form-control"
                                                    placeholder="Enter Captcha" name="captcha">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Captcha element -->

                                    <!-- Begin Submit button -->
                                    <div class="col-md-12">
                                        <div class="quform-submit-inner">
                                            <button class="butn btn-submit" type="submit"><span>Submit
                                                    comment</span></button>
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
                <div class="col-lg-6">
                    <div class="contact-info-box ps-lg-1-9">
                        <div class="row">
                            <div class="col-12">
                                <div class="contact-info-section mt-0 pt-0">

                                    <h4>Get in Touch With Us</h4>
                                    <p>Please connect with us and solve your queries.</p>

                                </div>
                            </div>
                            <div class="col-12">
                                <div class="contact-info-section">

                                    <h4>The Office</h4>
                                    <ul class="mb-0 ps-0 list-unstyled">
                                        <li class="mb-2">
                                            <p><i class="fas fa-map-marker-alt text-center"></i> <strong>Address:</strong>
                                                @if (isset($contactData->address))
                                                    {{ $contactData->address }}
                                                @endif
                                            </p>
                                        </li>
                                        <li class="mb-2">
                                            <p><i class="fas fa-phone text-center"></i> <strong>Phone:</strong>
                                                @if (isset($contactData->no_prefix) && isset($contactData->contact_no))
                                                    {{ $contactData->no_prefix }}{{ $contactData->contact_no }}
                                                @endif
                                            </p>
                                        </li>
                                        <li>
                                            <p><i class="far fa-envelope text-center"></i> <strong>Email:</strong> <a
                                                    href="">
                                                    @if (isset($contactData->email_address))
                                                        {{ $contactData->email_address }}
                                                    @endif
                                                </a></p>
                                        </li>
                                    </ul>

                                </div>
                            </div>
                            <!-- <div class="col-12">
                                    <div class="contact-info-section border-none pb-0 mb-0">

                                        <h4>Business Hours</h4>
                                        <ul class="list-style-2">
                                            <li>Monday - Friday - 9am to 5pm</li>
                                            <li>Saturday - 9am to 2pm</li>
                                            <li>Sunday - Closed</li>
                                        </ul>

                                    </div>
                                </div> -->

                        </div>
                    </div>
                </div>
                <!-- end contact detail -->
            </div>
        </div>
    </section>

    <!-- MAP
                            ================================================== -->
    <iframe class="map"
        src="https://maps.google.com/maps?q=london&amp;t=&amp;z=13&amp;ie=UTF8&amp;iwloc=&amp;output=embed" scrolling="no"
        marginheight="0" marginwidth="0"></iframe>

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


        function printErrorMsg(msg) {
            $(".print-error-msg").find("ul").html('');
            $(".print-error-msg").css('display', 'block');
            $.each(msg, function(key, value) {
                $(".print-error-msg").find("ul").append('<li>' + value + '</li>');
            });
        }
    </script>

    <script type="text/javascript">
        $('#reload').click(function() {
            $.ajax({
                type: 'GET',
                url: 'reload-captcha',
                success: function(data) {
                    $(".captcha span").html(data.captcha);
                }
            });
        });
    </script>
@endsection
