@extends('front.layout')
@section('title', 'All Reports')
@section('frontpage')

    <!-- PAGE TITLE
            ==========================      ======================== -->
    <section class="page-title-section2 bg-img cover-background" data-overlay-dark="7" data-background="img/bg/bg5.jpg">
        <div class="container">

            <div class="row">
                <div class="col-md-12 ">
                    <h1>Research Website</h1>
                </div>
                <div class="col-md-12">
                    <ul class="ps-0">
                        <ul class="ps-0">
                            <li><a href="{{ route('front.home') }}">Home</a></li>
                            <li><a href="{{ route('front.reports') }}">All Reports</a></li>
                        </ul>
                    </ul>
                </div>
            </div>

        </div>
    </section>

    <!-- ALL REPORTS
            ================================================== -->
    <section>
        <div class="container">
            <div class="row">

                <!-- product grid left panel -->
                <div class="col-lg-3">

                    <div id="accordion" class="accordion-style2 mb-4">
                        @foreach($ReportCategory as $key=> $cat)
                        <div class="card">
                            <div class="card-header" id="headingOne{{$key}}">
                                <h5 class="mb-0">
                                    <button class="btn btn-link" data-bs-toggle="collapse" data-bs-target="#collapseOne{{$key}}"
                                        aria-expanded="true" aria-controls="collapseOne{{$key}}">{{$cat->cat_name}}</button>
                                </h5>
                            </div>
                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne{{$key}}"
                                data-bs-parent="#accordion">
                                <div class="card-body">
                                    <ul class="list-style-5">
                                        @if($cat->getSubCategory)
                                        @foreach($cat->getSubCategory as $sub)
                                        <li><a href="#!">{{$sub->sub_category}}</a></li>
                                        @endforeach
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="widget">
                        <article class="card card-style1">
                            <div class="card-header bg-primary text-white">
                                Get In Touch With Us
                            </div>
                            <div class="card-body">
                                <!-- help -->
                                <div class="bg-img cover-background theme-overlay border-radius-5 mb-1-9"
                                    data-overlay-dark="8" data-background="{{asset('front/img/bg/bg2.jpg')}}">
                                    <div class="position-relative z-index-9 text-center px-1-9 py-1-9 py-lg-6">
                                        <i
                                            class="fas fa-headset display-20 dispaly-md-16 display-lg-10 text-white mb-3"></i>
                                        <h5 class="text-white font-weight-600 mb-1 h4">How can we help?</h5>
                                        <p class="text-white font-weight-500 display-30">Let's get in touch!!</p>
                                        <div class="bg-white separator-line-horrizontal-full opacity3 mb-3"></div>
                                        <ul class="text-center p-0 m-0 list-unstyled">
                                            <li class="text-white mb-1"><i class="fa fa-phone text-white me-2"></i><a
                                                    href="tel:@if(isset($contactData->contact_no)){{$contactData->contact_no}}@endif" class="text-white">@if(isset($contactData->contact_no)){{$contactData->contact_no}}@endif</a></li>
                                            <li class="text-white"><i class="fa fa-envelope-open text-white me-2"></i><a
                                                    href="mailto:@if(isset($contactData->email_address)){{$contactData->email_address}}@endif" class="text-white">@if(isset($contactData->email_address)){{$contactData->email_address}}@endif</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- end help -->
                            </div>
                        </article>
                    </div>
                </div>
                <!-- end product grid left panel -->

                <!-- right panel section -->
                <div class="col-lg-9 ps-lg-1-9" id="lists">
                   @include('front.ajaxreport')

                </div>
                <!-- end right panel section -->

            </div>
        </div>
    </section>

   <script>

            $(document).ready(function(){
            $(document).on('click', '.pager a', function(event){
            event.preventDefault();
            var page = $(this).attr('href').split('page=')[1];
            fetch_data(page);
            });

            function fetch_data(page)
            {
            $.ajax({
            url:"fetch_data?page="+page,
            success:function(data)
            {
                console.log(data);
             $('#lists').html(data);
            }
            });
            }

            });
        </script>

@endsection
