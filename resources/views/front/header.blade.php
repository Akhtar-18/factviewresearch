<!DOCTYPE html>
<html lang="en">


<head>

    <!-- metas -->
    <meta charset="utf-8">
    <meta name="author" content="" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="keywords" content="" />
    <meta name="description" content="" />

    <!-- title  -->
    <title>FactViewResearch</title>

    <!-- favicon -->
    <link rel="shortcut icon" href="">
    <link rel="apple-touch-icon" href="">
    <link rel="apple-touch-icon" sizes="72x72" href="">
    <link rel="apple-touch-icon" sizes="114x114" href="">

    <!-- plugins -->
    <link rel="stylesheet" href="{{ asset('front/css/plugins.css') }}">

    <!-- revolution slider css -->
    <link rel="stylesheet" href="{{ asset('front/css/rev_slider/settings.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/rev_slider/layers.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/rev_slider/navigation.css') }}">

    <!-- quform css -->
    <link rel="stylesheet" href="{{ asset('front/quform/css/base.css') }}">

    <!-- search css -->
    <link rel="stylesheet" href="{{ asset('front/search/search.css') }}">

    <!-- theme core css -->
    <link href="{{ asset('front/css/styles-4.css') }}" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style type="text/css">
        li.pagination .active a {
            background-color: #212529 !important;
        }
    </style>

</head>

<body>

    <!-- PAGE LOADING
    ================================================== -->
    <!-- <div id="preloader"></div> -->

    <!-- MAIN WRAPPER
    ================================================== -->
    <div class="main-wrapper">

        <header class="header">

            <div id="top-bar">
                <div class="container">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="top-bar-info">
                                <ul class="ps-0">
                                    <li><i class="fas fa-mobile-alt"></i>@if(getCompanyDetail()){{getCompanyDetail()->contact_no}}@endif</li>
                                    <li><i class="fas fa-envelope"></i>@if(getCompanyDetail()){{getCompanyDetail()->email_address}}@endif</li>
                                    <li><i class="fas fa-map-marker-alt"></i>@if(getCompanyDetail()){{getCompanyDetail()->address}}@endif</li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-3 d-none d-md-block">
                            <ul class="top-social-icon ps-0">
                                <li><a href="@if(getCompanyDetail()){{getCompanyDetail()->facebook}}@endif"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="@if(getCompanyDetail()){{getCompanyDetail()->twitter}}@endif"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="@if(getCompanyDetail()){{getCompanyDetail()->instagram}}@endif"><i class="fab fa-instagram"></i></a></li>
                                <li><a href="@if(getCompanyDetail()){{getCompanyDetail()->linkedin}}@endif"><i class="fab fa-linkedin-in"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="navbar-default">

                <!-- top search -->
                <div class="top-search bg-primary">
                    <div class="container">
                        <form class="search-form" action="{{route('front.reports')}}" method="GET">
                            <div class="input-group">
                                <span class="input-group-addon cursor-pointer">
                                    <button class="search-form_submit fas fa-search text-white" type="submit"></button>
                                </span>
                                <input type="text" class="search-form_input form-control" name="search"
                                    autocomplete="off" placeholder="Type & hit enter...">
                                <span class="input-group-addon close-search"><i class="fas fa-times mt-1"></i></span>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- end top search -->
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-12">
                            <div class="menu_area alt-font">
                                <nav class="navbar navbar-expand-lg navbar-light p-0">

                                    <div class="navbar-header navbar-header-custom">
                                        <!-- logo -->
                                        <a href="{{ route('front.home') }}" class="navbar-brand logodefault">
                                            @if(getCompanyDetail())
                                            <img id="logo" src="{{asset('company_logo')}}/{{getCompanyDetail()->company_logo}}" alt="logo">
                                            @elseif(isset(getCompanyDetail()->company_name))
                                            {{getCompanyDetail()->company_name}}
                                            @endif
                                        </a>
                                        <!-- end logo -->
                                    </div>

                                    <div class="navbar-toggler"></div>

                                    <!-- menu area -->
                                    <ul class="navbar-nav ms-auto" id="nav" style="display: none;">
                                        <li class="current"><a href="{{ route('front.home') }}">Home</a></li>
                                        <li><a href="#!">Industries</a>
                                            <ul class="row megamenu">
                                                @if (GetReportMenu())
                                                    @foreach (GetReportMenu() as $cate)
                                                        <li class="col-lg-3">
                                                            <span
                                                                class="d-block m-0 mb-lg-3 py-2 py-lg-0 px-1-9 px-lg-0 text-uppercase sub-title">{{ $cate->cat_name }}
                                                                &raquo;</span>
                                                            <ul>
                                                                @if ($cate->getSubCategory)
                                                                    @foreach ($cate->getSubCategory as $sub)
                                                                        <li><a href="@if(isset($sub->sub_category)){{ route('front.reportsubcategory',strtolower($sub->sub_category))}}@endif">{{ $sub->sub_category }}</a></li>
                                                                    @endforeach
                                                                @endif
                                                            </ul>
                                                        </li>
                                                    @endforeach
                                                @endif
                                            </ul>
                                        </li>
                                        <li><a href="#!">Services</a>
                                            <ul>
                                            @if (GetServiceMenu())
                                                    @foreach (GetServiceMenu() as $service)
                                                <li><a href="{{ route('front.service-single',$service->id) }}">{{$service->heading}}</a>
                                                </li>
                                                @endforeach
                                            @endif
                                            </ul>
                                        </li>
                                        <li><a href="#!">About Us</a>
                                            <ul>
                                                <li><a href="{{ route('front.about') }}">About Company</a></li>
                                                <li><a href="{{ route('front.whowe') }}">Who We Are</a></li>
                                                <li><a href="{{ route('front.whyus') }}">Why Choose Us</a></li>
                                                <li><a href="{{ route('front.testimonials') }}">Client
                                                        Testimonials</a></li>
                                                <li><a href="{{ route('front.partners') }}">Partners</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#!">Media/Insights</a>
                                            <ul>
                                                <li><a href="{{route('front.blogs')}}">Blogs</a></li>

                                                <li><a href="{{route('front.press-releases')}}">Press Releases</a></li>
                                                <li><a href="{{route('front.case-studies')}}">Case Studies</a></li>
                                                 <!-- <li><a href="">Articles</a></li>
                                                <li><a href="">Infographics</a></li> -->
                                            </ul>
                                        </li>
                                        <li><a href="{{ route('front.contact') }}">Contact Us</a></li>
                                    </ul>
                                    <!-- end menu area -->

                                    <!-- atribute navigation -->
                                    <div class="attr-nav">
                                        <ul>
                                            <li class="search"><a href="#!"><i class="fas fa-search"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- end atribute navigation -->

                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </header>
