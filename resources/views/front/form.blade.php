@extends('front.layout')
@section('title', 'Form Enquiry')
@section('frontpage')
<meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Breadcrumb -->
        <section class="breadcrumb">
            <div class="breadcrumb_inner report_bg bg-[#091E33] relative py-10">
                <div class="container relative h-full">
                    <div class="breadcrumb_content flex flex-col items-start justify-center xl:w-[1000px] lg:w-[848px] md:w-5/6 w-full h-full">
                        <h3 class="heading3 text-white mb-2">
                            @if ($type == 'request')
                                REQUEST SAMPLE
                            @elseif($type == 'enquiry')
                                ENQUIRY BEFORE BUYING
                            @elseif($type == 'discount')
                                ASK FOR DISCOUNT
                            @endif
                        </h3>
                        <div class="list_breadcrumb flex items-center gap-2 animate animate_top" style="--i: 1">
                            <a href="{{ route('front.home') }}" class="caption1 text-white"><i class="ph ph-house"></i></a>
                            <span class="caption1 text-white opacity-40">/</span>
                            <span class="caption1 text-white"><a href="#!">{{$reports->getCategoryName->cat_name ?? ''}}</a></span>
                            <span class="caption1 text-white opacity-40">/</span>
                            <span class="caption1 text-white">
                                <a href="{{ route('front.report',$reports->url)}}">
                               {!! html_entity_decode(wordLimitset($reports->heading, 5)) !!}
                                </a>
                            </span>
                            <span class="caption1 text-white opacity-40">/</span>
                            <span class="caption1 text-white opacity-40">
                            @if ($type == 'request')
                                {{ 'REQUEST SAMPLE' }}
                            @elseif($type == 'enquiry')
                                {{ 'ENQUIRY BEFORE BUYING' }}
                            @elseif($type == 'discount')
                                {{ 'ASK FOR DISCOUNT' }}
                            @endif
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="jobs_detail relative lg:pt-15 sm:pt-15 pt-15 lg:pb-14 sm:pb-14 pb-7">
            <div class="container flex max-lg:flex-col gap-y-10">
                <div class="jobs_inner w-full lg:pr-15">

                        <div id="form-review" class="form-review">
                            <form class="form grid sm:grid-cols-2 gap-4 gap-y-5 ajaxformfileupload" action="{{ route('submit.enquiry') }}" name="contactUsForm" id="contactUsForm" enctype="multipart/form-data">
                                <div class="name relative">
                                    <label class="font-semibold" for="username">Full name</label>
                                    <input type="hidden" name="types" value="{{ $type }}">
                                    <input type="hidden" name="report_id" value="@if (isset($reports->id)) {{ $reports->id }} @endif">
                                    <input class="w-full mt-1 px-4 py-3 border-line rounded-lg" id="name" type="text" name="name" placeholder="" required />
                                    <i class="input_icon ph ph-user"></i>
                                </div>
                                <div class="mail relative">
                                    <label class="font-semibold" for="email">Email address</label>
                                    <input class="w-full mt-1 px-4 py-3 border-line rounded-lg" id="email" type="email" name="email" placeholder="" required />
                                    <i class="input_icon ph ph-envelope-simple-open"></i>
                                </div>
                                <div class="country relative">
                                    <label class="font-semibold" for="email">Select country</label>
                                    <select class="w-full mt-1 px-4 py-3 border-line rounded-lg" id="country" name="country" required>
                                        <option selected disabled>Select any one</option>
                                        @if (getCountry())
                                            @foreach (getCountry() as $country)
                                                <option value="{{ $country['name'] }}">{{ $country['name'] }}
                                                </option>
                                            @endforeach
                                        @endif
                                    </select>
                                    <i class="input_icon ph ph-globe-hemisphere-east"></i>
                                </div>
                                <div class="mail relative">
                                    <label class="font-semibold" for="email">Contact number</label>
                                    <input class="w-full mt-1 px-4 py-3 border-line rounded-lg" id="contact_no" type="number" name="contact_no" placeholder="" required />
                                    <i class="input_icon ph ph-phone"></i>
                                </div>
                                <div class="col-span-full relative">
                                    <label class="font-semibold" for="email">Company/Organization</label>
                                    <input class="w-full mt-1 px-4 py-3 border-line rounded-lg" id="subject" type="text" name="organizations" placeholder="i.e FactView Research" required />
                                    <i class="input_icon ph ph-buildings"></i>
                                </div>
                                <div class="col-span-full message relative">
                                    <i class="input_icon text_area ph ph-chat-dots"></i>
                                    <label class="font-semibold" for="message">Review</label>
                                    <textarea class="border w-full mt-1 px-4 py-3 border-line rounded-lg" id="message" name="others" rows="3" placeholder="i.e Write comment here... " required></textarea>
                                    <p style="line-height:1;"><small><b>15% Free Customization</b> (Mention the sections of the report that you would like to review so we will share the relevant chapters of report, for your Study):</small></p>
                                </div>
                                {!! NoCaptcha::display() !!}
                                <div class="col-span-full">
                                    <button class="button-main"  type="submit">Send Request <i class="ph ph-arrow-bend-up-right body1 ml-2"></i></button>
                                </div>
                            </form>
                        </div>

                </div>
                <div class="jobs_sidebar relative flex-shrink-0 lg:w-[380px] w-full h-fit">
                    <div class="sidebarsticky">
                        <div class="about overflow-hidden rounded-xl bg-surface border border-primary shadow-lg duration-300">
                        <div class="flex items-center justify-between px-5 py-3 border-b border-line">
                            <h6 class="heading6 text-primary">Report Details</h6>
                        </div>
                        <div class="employer_info p-5">
                            <div class="flex items-start gap-5 w-full">
                                <div class="report_img detail_page form"></div>
                                <div>
                                    <strong class="employers_name heading6">Global Connected Car Market Size, Share & Trends Analysis Report By End-user, By Region, and Segment Forecasts, 2023 - 2030</strong>
                                    <span class="employers_establish text-secondary mt-1 block">Published Date: Aug, 2023</span>
                                </div>
                            </div>
                            <div class="industry flex items-center justify-between w-full pt-5 pb-1 border-b border-line">
                                <span class="text-secondary">Report Id:</span>
                                <strong class="text-button">
                                    @if (isset($reports->id))
                                            {{ $reports->id }}
                                        @endif
                                </strong>
                            </div>
                            <div class="size flex items-center justify-between w-full py-1 border-b border-line">
                                <span class="text-secondary">Category:</span>
                                <strong class="text-button">
                                    @if (isset($reports->getCategoryName->cat_name))
                                        {{ $reports->getCategoryName->cat_name }}
                                    @endif
                                </strong>
                            </div>
                            <div class="address flex items-center justify-between w-full py-1 border-b border-line">
                                <span class="text-secondary">Pages:</span>
                                <strong class="text-button">
                                    @if (isset($reports->pages))
                                        {{ $reports->pages }}
                                    @endif
                                </strong>
                            </div>
                            <div class="address flex items-center justify-between w-full py-1 border-b border-line">
                                <span class="text-secondary">Format:</span>
                                <strong class="text-button">PDF</strong>
                            </div>
                            <div class="list_social flex flex-wrap items-center justify-between gap-4 w-full pt-5">
                                <span class="text-secondary">Share:</span>
                                <ul class="list flex flex-wrap items-center gap-2">
                                    <li>
                                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(Request::url()) }}" target="_blank" class="w-10 h-10 flex items-center justify-center border border-line rounded-full text-black duration-300 bg-white hover:bg-primary">
                                            <span class="ph ph-facebook-logo text-lg"></span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="https://www.linkedin.com/shareArticle?url={{ urlencode(Request::url()) }}&title={{ urlencode($reports->heading) }}" target="_blank" class="w-10 h-10 flex items-center justify-center border border-line rounded-full text-black duration-300 bg-white hover:bg-primary">
                                            <span class="ph ph-linkedin-logo text-lg"></span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="https://twitter.com/intent/tweet?url={{ urlencode(Request::url()) }}&text={{ urlencode($reports->heading) }}" target="_blank" class="w-10 h-10 flex items-center justify-center border border-line rounded-full text-black duration-300 bg-white hover:bg-primary">
                                            <span class="ph ph-x-logo text-lg"></span>
                                        </a>
                                    </li>
                                    <!-- <li>
                                        <a href="https://www.instagram.com/" target="_blank" class="w-10 h-10 flex items-center justify-center border border-line rounded-full text-black duration-300 bg-white hover:bg-primary">
                                            <span class="ph ph-whatsapp-logo text-lg"></span>
                                        </a>
                                    </li> -->
                                </ul>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </section>

<script defer async type="text/javascript">
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    });

    $("body").on("submit",".ajaxformfileupload", function(event){
    event.preventDefault();
   
        var formdata   = $(this);
       var dataValue  = new FormData(this);//new FormData(formdata[0]);
       var UrlValue   = $(this).attr('action');

       var ButtonText = $(this).find('button[type="submit"]').html();
     

       $(this).find('button[type="submit"]').prop('disabled', true);
       $(this).find('button[type="submit"]').html('Loading ...');

       
       $.ajax({
           url     : UrlValue,
           method  : 'post',
           data    :dataValue,
           headers:
           {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           },
           processData: false,
           contentType: false,
           beforeSend: function( xhr ) {

           },
           success: function(data) {
                if ($.isEmptyObject(data.error)) {
                    window.location.href = "{{ url('thankyou') }}/" + data.id;
                } else {
                    printErrorMsg(data.error);
                }
                formdata.find('button[type="submit"]').prop('disabled', false);
               formdata.find('button[type="submit"]').html(ButtonText);
            },
           error: function(data) {
               console.log("error ",data);
               printErrorMsg(data.error);
               console.log(ButtonText);
               formdata.find('button[type="submit"]').prop('disabled', false);
               formdata.find('button[type="submit"]').html(ButtonText);
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

@endsection
