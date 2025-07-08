@extends('front.layout')
@section('title', 'Contact Us')
@section('frontpage')

        <!-- map -->
        <section class="map">
            <div class="map_inner lg:h-[360px] h-[360px]">
                <iframe class="w-full h-full" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d742.4556963440328!2d-87.62313632867398!3d41.896668148301984!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x880fd35498b7bfaf%3A0xaf89aff7166aaa5f!2sOlympia%20Centre%20Condos!5e0!3m2!1svi!2s!4v1721272000241!5m2!1svi!2s" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </section>

        <!-- Contact Us -->
        <section class="contact contact_page lg:pb-15 sm:pb-14 pb-10">
            <div class="container flex max-lg:flex-col lg:items-start justify-between gap-y-10">
                <div class="content lg:pt-15 sm:pt-15 pt-15 lg:w-5/12">
                    <div class="heading">
                        <h3 class="heading3">We'd love to help</h3>
                        <p class="body2 text-secondary mt-3">We're here to assist you every step of the way. Let's make your goals a reality.</p>
                    </div>
                    <ul class="list grid xl:grid-cols-2 lg:grid-cols-1 sm:grid-cols-2 gap-8 justify-between sm:mt-8 mt-6">
                        <li class="flex items-start gap-2">
                            <i class="ph ph-map-pin heading2 text-primary relative" style="top:4px;"></i>
                            <div class="">
                                <strong class="text-title">Address:</strong>
                                <p class="desc body2 text-secondary">
                                @if (isset($contactData->address))
                                    {{ $contactData->address }}
                                @endif</p>
                            </div>
                        </li>
                        <li class="flex items-start gap-2">
                            <i class="ph ph-phone-call heading2 text-primary relative" style="top:4px;"></i>
                            <div class="">
                            <strong class="text-title">Call on:</strong>
                            <p class="desc body2 text-secondary">
                                @if (isset($contactData->no_prefix) && isset($contactData->contact_no))
                                    {{ $contactData->no_prefix }}{{ $contactData->contact_no }}
                                @endif
                            </p>
                            </div>
                        </li>
                        <li class="flex items-start gap-2">
                            <i class="ph ph-paper-plane-tilt heading2 text-primary relative" style="top:4px;"></i>
                            <div class="">
                            <strong class="text-title">Mail Us at:</strong>
                            <p class="desc body2 text-secondary">
                            @if (isset($contactData->email_address))
                                {{ $contactData->email_address }}
                            @endif
                            </p>
                            </div>
                        </li>
                        <li class="list_social flex flex-col gap-2">
                            <strong class="text-title">Our social media:</strong>
                            <div class="list flex flex-wrap items-center gap-3">
                                <a href="@if (getCompanyDetail()) {{ getCompanyDetail()->facebook }} @endif" target="_blank" aria-label="social" class="facebook w-8 h-8 flex items-center justify-center text-white rounded-full duration-300 hover:bg-white">
                                    <i class="ph ph-facebook-logo body1"></i>
                                    <span class="blind">link to facebook</span>
                                </a>
                                <a href="@if (getCompanyDetail()) {{ getCompanyDetail()->linkedin }} @endif" target="_blank" aria-label="social" class="linkedin w-8 h-8 flex items-center justify-center text-white rounded-full duration-300 hover:bg-white">
                                    <i class="ph ph-linkedin-logo body1"></i>
                                    <span class="blind">link to linkedin</span>
                                </a>
                                <a href="@if (getCompanyDetail()) {{ getCompanyDetail()->twitter }} @endif" target="_blank" aria-label="social" class="twitter w-8 h-8 flex items-center justify-center text-white rounded-full duration-300 hover:bg-white ">
                                    <i class="ph ph-x-logo body1"></i>
                                    <span class="blind">link to twitter</span>
                                </a>
                                <a href="@if (getCompanyDetail()) {{ getCompanyDetail()->instagram }} @endif" target="_blank" aria-label="social" class="instagram w-8 h-8 flex items-center justify-center text-white rounded-full duration-300 hover:bg-white">
                                    <i class="ph ph-instagram-logo body1"></i>
                                    <span class="blind">link to instagram</span>
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>
                {!! NoCaptcha::renderJs() !!}
                <div class="form_area contact_page flex-shrink-0 xl:w-[520px] lg:w-1/2 sm:p-7 p-5 rounded-xl border-2 border-line bg-white shadow-lg duration-300">
                            <form class="form grid sm:grid-cols-2 gap-4 gap-y-5 contactform" action="{{ route('submit.contact_enquiry') }}" method="post">
                                <div class="name relative">
                                    <label class="font-semibold" for="username">Full name</label>
                                    <input class="w-full mt-1 px-4 py-3 border-line rounded-lg" id="username" name="name" type="text" required />
                                    <i class="input_icon ph ph-user"></i>
                                </div>
                                <div class="mail relative">
                                    <label class="font-semibold" for="email">Email address</label>
                                    <input class="w-full mt-1 px-4 py-3 border-line rounded-lg" id="email" name="email" type="email" required />
                                    <i class="input_icon ph ph-envelope-simple-open"></i>
                                </div>
                                <div class="subject relative">
                                    <label class="font-semibold" for="email">Subject</label>
                                    <input class="w-full mt-1 px-4 py-3 border-line rounded-lg" id="company" name="subject" type="text" required />
                                    <i class="input_icon ph ph-buildings"></i>
                                </div>
                                <div class="phone relative">
                                    <label class="font-semibold" for="phone">Contact number</label>
                                    <input class="w-full mt-1 px-4 py-3 border-line rounded-lg" id="phone" type="phone" name="contact_no" required />
                                    <i class="input_icon ph ph-phone"></i>
                                </div>
                                <div class="col-span-full message relative">
                                    <i class="input_icon text_area ph ph-chat-dots"></i>
                                    <label class="font-semibold" for="message">Write message</label>
                                    <textarea class="border w-full mt-1 px-4 py-3 border-line rounded-lg" id="message" name="msg" rows="3" placeholder="Tell us a few words... " required></textarea>
                                </div>
                                {!! NoCaptcha::display() !!}
                                <div class="col-span-full">
                                    <button class="button-main" type="submit">Send Request <i class="ph ph-arrow-bend-up-right body1 ml-2"></i></button>
                                </div>
                            </form>
                </div>
            </div>
        </section>




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
