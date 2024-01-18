<!DOCTYPE html>
<html lang="en">
<head>
    <!-- metas -->
    <meta charset="utf-8">


    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name='viewport' content='width=device-width, initial-scale=1, user-scalable=1, minimum-scale=1, maximum-scale=5'/>
    <!-- Favicon -->
    <link rel="shortcut icon" href="https://ik.imagekit.io/0g6xszoan/favicon/fvr-72-72.png">
    <link rel="apple-touch-icon" href="https://ik.imagekit.io/0g6xszoan/favicon/fvr-72-72.png">
    <link rel="apple-touch-icon" sizes="72x72" href="https://ik.imagekit.io/0g6xszoan/favicon/fvr-72-72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="https://ik.imagekit.io/0g6xszoan/favicon/fvr-114-114.png">
    <!-- plugins -->
    <link rel="preload" href="{{ asset('front/css/plugins.css') }}" rel="stylesheet" as="style" onload="this.onload=null;this.rel='stylesheet'" defer>
    <link rel="stylesheet" tyle="text/css" href="{{ asset('front/css/plugins.css') }}" defer>
    <!-- quform css -->
    <link rel="stylesheet" href="{{ asset('front/quform/css/base.css') }}" defer>
    <!-- search css -->
    <link rel="stylesheet" href="{{ asset('front/search/search.css') }}" defer>
    <!-- theme core css -->
    <link rel="stylesheet" href="{{ asset('front/css/styles-4.css') }}" defer>
    <link rel="stylesheet" href="{{ asset('front/css/responsive.css') }}" media="screen and (max-width: 600px)" defer>

    <!-- <script type="text/javascript" src="{{ asset('front/js/ajax.js') }}"></script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    @php
        $route = Route::currentRouteName();
    @endphp
    @if ($route == 'front.home')
        <meta name="keywords"
            content="Market Research Reports, Custom Research and Consulting, Micro Monitoring & Intelligence Procurement" />
        <meta name="description"
            content="Factview Research pioneers the future of market intelligence, delivering unparalleled insights, your business decisions & insightful analysis." />

        <!-- title  -->
        <title>Factview Research | Market Research | Consulting Services</title>
    @endif

    @if ($route == 'front.services')
        <meta name="keywords" content="Services, market services, market research services" />
        <meta name="description"
            content="FactView provides a vast variety of industry services which will help clients conquer the market" />

        <!-- title  -->
        <title>Market Research Services, Competitive Services</title>
    @endif

    @if ($route == 'front.reportcategory')
        <meta name="keywords" content="Reports, market research reports, market reports, industry research" />
        <meta name="description" content="FactView Research has a repository of reports dealing in various segments" />

        <!-- title  -->
        <title>Market Research Reports | Industry Research Reports</title>
    @endif

    @if ($route == 'front.reports')
        <meta name="keywords" content="Reports, market research reports, market reports, industry research" />
        <meta name="description" content="FactView Research has a repository of reports dealing in various segments" />

        <!-- title  -->
        <title>Market Research Reports | Industry Research Reports</title>
    @endif

    @if ($route == 'front.about')
        <meta name="keywords"
            content="FactView research, market reports, industry reports, market services, market research firm" />
        <meta name="description"
            content="FactView Research is a leading market research firm that provides comprehensive and advanced insights to various industries" />

        <!-- title  -->
        <title>FactView Research | About Us</title>
    @endif

    @if ($route == 'front.whowe')
        <meta name="keywords" content="Market reports, industry reports, market services, market research firm" />
        <meta name="description"
            content="FactView Research is a prominent market research firm that offers comprehensive and advanced insights to various industries" />

        <!-- title  -->
        <title>Who We Are | FactView Research</title>
    @endif

    @if ($route == 'front.whyus')
        <meta name="keywords"
            content="Market research firm, FactView research, market reports, industry reports, market services" />
        <meta name="description"
            content="FactView Research aims to provide businesses with accurate market intelligence, enabling them to make informed decisions and stay competitive in the market" />

        <!-- title  -->
        <title>Why Choose Us | FactView Research</title>
    @endif

    @if ($route == 'front.testimonials')
        <meta name="keywords" content="Services, clients' testimonials" />
        <meta name="description" content="FactView Research strives to provide excellent services to its clients" />

        <!-- title  -->
        <title>Client Testimonials</title>
    @endif

    @if ($route == 'front.partners')
        <meta name="keywords" content="Clients, key players, companies, service providers" />
        <meta name="description" content="We deal with a variety of firms dealing in various industries" />

        <!-- title  -->
        <title>Partners | Clients | Service Providers</title>
    @endif

    @if ($route == 'front.blogs')
        <meta name="keywords" content="Blog, company trends, market trends, recent breakthroughs" />
        <meta name="description" content="Our blog covers detailed insights on trending topic of the industry" />

        <!-- title  -->
        <title>FactView Research's Blog</title>
    @endif

    @if ($route == 'front.press-releases')
        <meta name="keywords" content="Press releases, PRs, trending content" />
        <meta name="description"
            content="FactView Research has a portfolio of press releases covering different domains in different segments" />

        <!-- title  -->
        <title>Press Releases</title>
    @endif

    @if ($route == 'front.case-studies')
        <meta name="keywords" content="Case studies, portfolio services, licensing services" />
        <meta name="description"
            content="FactView Research has a portfolio of case studies covering different domains in different segments" />

        <!-- title  -->
        <title>Case Studies</title>
    @endif

    @if ($route == 'front.contact')
        <meta name="keywords" content="Contact us, market research reports" />
        <meta name="description" content="FactView Research is available 24*7 to fulfill its clients' needs" />

        <!-- title  -->
        <title>Contact Us</title>
    @endif


    @if ($route == 'front.services')
        <meta name="keywords" content="Services, market services, market research services" />
        <meta name="description"
            content="FactView provides a vast variety of industry services which will help clients conquer the market" />

        <!-- title  -->
        <title>Market Research Services, Competitive Services</title>
    @endif

    @if ($route == 'front.report')
        @yield('reportmetasection')
    @endif

    <link rel="canonical" href="https://factviewresearch.com/" />
    <meta name="document-type" content="Public" />
    <meta name="Page-Topic" content="Market Research Reports" />
    <meta name="copyright" content="Fact View Research" />
    <meta name="classification" content="market research reports" />
    <meta name="document-classification" content="Market Research Reports Services" />
    <meta name="distribution" content="global" />
    <meta name="coverage" content="global" />
    <meta name="abstract" content="consulting services, market research reports, industry analysis, reports" />
    <meta name="author" content="FactViewResearch, https://www.factviewresearch.com" />
    <meta name="Audience" content="All, Business, Management, Research, Services" />

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="google-site-verification" content="ttXl7RH9nKnXlHD17fSjZEaoD-uIiT5OROVTnU4EPG0" />

    <!-- Google tag (gtag.js) -->
    <script defer async src="https://www.googletagmanager.com/gtag/js?id=G-HES2Q3T6V1"></script>
    <script defer async async>
        function gtag(){dataLayer.push(arguments)}window.dataLayer=window.dataLayer||[],gtag("js",new Date),gtag("config","G-HES2Q3T6V1");
    </script>

    <script defer async type="text/javascript" src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
    <script defer async type="text/javascript" src="{{ asset('front/js/translate.js') }}"></script>

</head>

<body>
    <div id="google_translate_element"></div>
    <!-- PAGE LOADING
    ================================================== -->
    <!-- <div id="preloader"></div> -->

    <!-- MAIN WRAPPER==================================================-->
    <div class="main-wrapper">

        <header class="header">

            <div id="top-bar">
                <div class="container">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="top-bar-info">
                                <ul class="ps-0">
                                    <li><i class="fas fa-mobile-alt"></i>
                                        @if (getCompanyDetail())
                                            {{ getCompanyDetail()->no_prefix }}{{ getCompanyDetail()->contact_no }}
                                        @endif
                                    </li>
                                    <li><i class="fas fa-envelope"></i>
                                        @if (getCompanyDetail())
                                            {{ getCompanyDetail()->email_address }}
                                        @endif
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-3 d-none d-md-block">
                            <ul class="top-social-icon ps-0">
                                <li><a
                                        href="@if (getCompanyDetail()) {{ getCompanyDetail()->facebook }} @endif" target="_blank" aria-label="social"><i
                                            class="fab fa-facebook-f"></i></a></li>
                                <li><a
                                        href="@if (getCompanyDetail()) {{ getCompanyDetail()->twitter }} @endif" target="_blank" aria-label="social"><i
                                            class="fab fa-twitter"></i></a></li>
                                <li><a
                                        href="@if (getCompanyDetail()) {{ getCompanyDetail()->instagram }} @endif" target="_blank" aria-label="social"><i
                                            class="fab fa-instagram"></i></a></li>
                                <li><a
                                        href="@if (getCompanyDetail()) {{ getCompanyDetail()->linkedin }} @endif" target="_blank" aria-label="social"><i
                                            class="fab fa-linkedin-in"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="navbar-default">

                <!-- top search -->
                <div class="top-search bg-primary">
                    <div class="container">
                        <form class="search-form" action="{{ route('front.reports') }}" method="GET">
                            <div class="input-group">
                                <span class="input-group-addon cursor-pointer">
                                    <button class="search-form_submit fas fa-search text-white" type="submit" arial-label="search"></button>
                                </span>
                                <input type="text" class="search-form_input form-control" name="search" autocomplete="off" placeholder="Type & hit enter...">
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
                                <nav class="navbar navbar-expand-lg p-0">

                                    <div class="navbar-header navbar-header-custom">
                                        <!-- logo -->
                                        <a href="{{ route('front.home') }}" class="navbar-brand logodefault">
                                            @if (getCompanyDetail())
                                                <img id="logo"
                                                    src="{{ getCompanyDetail()->company_logo }}?tr=w-200,h-40,fo-webp"
                                                    alt="logo" loading="lazy" width="200" height="40">
                                            @elseif(isset(getCompanyDetail()->company_name))
                                                {{ getCompanyDetail()->company_name }}
                                            @endif
                                        </a>
                                        <!-- end logo -->
                                    </div>

                                    <div class="navbar-toggler"></div>

                                    <!-- menu area -->
                                    <ul class="navbar-nav ms-auto" id="nav" style="display: none;">
                                        <li class="current"><a href="{{ route('front.home') }}">Home</a></li>
                                        <li><a href="#industries">Industries</a>
                                            <ul class="row megamenu">
                                                @if (GetReportMenu())
                                                    @foreach (GetReportMenu() as $cate)
                                                        <li class="col-lg-3">
                                                            <a
                                                                href="@if (isset($cate->cat_name)) {{ route('front.reportcategory', gerenaretslug(strtolower($cate->cat_name))) }} @endif"><span
                                                                    class="d-block m-0 mb-lg-3 py-2 py-lg-0 px-1-9 px-lg-0 text-uppercase sub-title">{{ $cate->cat_name }}
                                                                    &raquo;</span></a>

                                                            {{-- <ul>
                                                                @if ($cate->getSubCategory)
                                                                    @foreach ($cate->getSubCategory as $sub)
                                                                        <li><a href="@if (isset($sub->sub_category)){{ route('front.reportsubcategory',strtolower($sub->sub_category))}}@endif">{{ $sub->sub_category }}</a></li>
                                                                    @endforeach
                                                                @endif
                                                            </ul> --}}
                                                        </li>
                                                    @endforeach
                                                @endif
                                            </ul>
                                        </li>
                                        <li><a href="#services">Services</a>

                                            @if (GetServiceMenu())
                                                <ul>
                                                    @foreach (GetServiceMenu() as $service)
                                                        <li><a
                                                                href="{{ route('front.service-single', $service->slug) }}">{{ $service->heading }}</a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            @endif
                                        </li>
                                        <li><a href="#about">About Us</a>
                                            <ul>
                                                <li><a href="{{ route('front.about') }}">About Company</a></li>
                                                <li><a href="{{ route('front.whowe') }}">Who We Are</a></li>
                                                <li><a href="{{ route('front.whyus') }}">Why Choose Us</a></li>
                                                <li><a href="{{ route('front.testimonials') }}">Client
                                                        Testimonials</a></li>
                                                <li><a href="{{ route('front.partners') }}">Partners</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#media">Media/Insights</a>
                                            <ul>
                                                <li><a href="{{ route('front.blogs') }}">Blogs</a></li>

                                                <li><a href="{{ route('front.press-releases') }}">Press
                                                        Releases</a></li>
                                                <li><a href="{{ route('front.case-studies') }}">Case Studies</a>
                                                </li>
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
                                            <li class="search"><a href="#search" aria-label="search"><i class="fas fa-search"></i></a></li>
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
