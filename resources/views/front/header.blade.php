<!DOCTYPE html>
<html lang="en">


<head>

    <!-- metas -->
    <meta charset="utf-8">
    <meta name="author" content="" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    @php
        $route = Route::currentRouteName();
    @endphp
    @if ($route == 'front.home')
        <meta name="keywords"
            content="Market research, Data analysis, Fact-finding, Research studies, Statistical analysis, Research reports, Data-driven insights, Research methodologies, Data visualization, Survey analysis" />
        <meta name="description"
            content="Unlock valuable insights through data-driven Market Research. Expert Fact-Finding, Research Studies, and Statistical Analysis. Explore our Research Reports and Data Visualization methodologies" />

        <!-- title  -->
        <title>Market Research Reports, Industry Reports, Market Research, Data Analysis, Fact-Finding | FactView
            Research</title>
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

    <!-- favicon -->
    <link rel="shortcut icon" href="{{ asset('front/img/logos/fvr-72-72.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('front/img/logos/fvr-72-72.png') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('front/img/logos/fvr-72-72.png') }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('front/img/logos/fvr-114-114.png') }}">

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

        .testmonial-single p:before {
            display: none !important;
        }
    </style>
    <style>
        #google_translate_element,
        .skiptranslate {
            display: none;
        }

        body {
            top: 0 !important;
        }
    </style>
    <meta name="google-site-verification" content="ttXl7RH9nKnXlHD17fSjZEaoD-uIiT5OROVTnU4EPG0" />

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-HES2Q3T6V1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'G-HES2Q3T6V1');
    </script>

    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit">
    </script>
    <script type="text/javascript">
        var usrlang = navigator.language ||
            navigator.userLanguage;
        console.log(
            "User's preferred language is: " +
            usrlang);

        function googleTranslateElementInit() {
            setCookie('googtrans', '/en/' + usrlang, 1);
            new google.translate.TranslateElement({
                pageLanguage: 'ES',
                layout: google.translate.TranslateElement.InlineLayout.SIMPLE
            }, 'google_translate_element');
        }

        function setCookie(key, value, expiry) {
            var expires = new Date();
            expires.setTime(expires.getTime() + (expiry * 24 * 60 * 60 * 1000));
            document.cookie = key + '=' + value + ';expires=' + expires.toUTCString();
        }
    </script>
    <!-- <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit">
    </script>
<script type="text/javascript">
    function googleTranslateElementInit() {
        var userLang = navigator.language || navigator.userLanguage; // Get the user's browser language
        console.log(userLang);
        new google.translate.TranslateElement({
            pageLanguage: userLang,
            includedLanguages: userLang,
            layout: google.translate.TranslateElement.InlineLayout.SIMPLE
        }, 'google_translate_element');
    }
    //googleTranslateElementInit();
</script> -->
    <!-- <div id="google_translate_element"></div>
<script type="text/javascript">
    function googleTranslateElementInit() {
        var userLang = navigator.language || navigator.userLanguage; // Get the user's browser language
        console.log(userLang);
        new google.translate.TranslateElement({
            pageLanguage: 'ar',
            layout: google.translate.TranslateElement.InlineLayout.SIMPLE
        }, 'google_translate_element');
    }
</script><script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit">
</script> -->

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
                                    <li><i class="fas fa-map-marker-alt"></i>
                                        @if (getCompanyDetail())
                                            {{ getCompanyDetail()->address }}
                                        @endif
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-3 d-none d-md-block">
                            <ul class="top-social-icon ps-0">
                                <li><a
                                        href="@if (getCompanyDetail()) {{ getCompanyDetail()->facebook }} @endif"><i
                                            class="fab fa-facebook-f"></i></a></li>
                                <li><a
                                        href="@if (getCompanyDetail()) {{ getCompanyDetail()->twitter }} @endif"><i
                                            class="fab fa-twitter"></i></a></li>
                                <li><a
                                        href="@if (getCompanyDetail()) {{ getCompanyDetail()->instagram }} @endif"><i
                                            class="fab fa-instagram"></i></a></li>
                                <li><a
                                        href="@if (getCompanyDetail()) {{ getCompanyDetail()->linkedin }} @endif"><i
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
                                    <button class="search-form_submit fas fa-search text-white"
                                        type="submit"></button>
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
                                <nav class="navbar navbar-expand-lg p-0">

                                    <div class="navbar-header navbar-header-custom">
                                        <!-- logo -->
                                        <a href="{{ route('front.home') }}" class="navbar-brand logodefault">
                                            @if (getCompanyDetail())
                                                <img id="logo"
                                                    src="{{ asset('company_logo') }}/{{ getCompanyDetail()->company_logo }}"
                                                    alt="logo">
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
                                        <li><a href="">Industries</a>
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
                                        <li><a href="">Services</a>

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
                                        <li><a href="">About Us</a>
                                            <ul>
                                                <li><a href="{{ route('front.about') }}">About Company</a></li>
                                                <li><a href="{{ route('front.whowe') }}">Who We Are</a></li>
                                                <li><a href="{{ route('front.whyus') }}">Why Choose Us</a></li>
                                                <li><a href="{{ route('front.testimonials') }}">Client
                                                        Testimonials</a></li>
                                                <li><a href="{{ route('front.partners') }}">Partners</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="">Media/Insights</a>
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
                                            <li class="search"><a href=""><i class="fas fa-search"></i></a>
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
