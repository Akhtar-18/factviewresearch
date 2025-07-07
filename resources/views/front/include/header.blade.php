<!DOCTYPE html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <!-- Favicon -->
        <link rel="shortcut icon" href="https://ik.imagekit.io/0g6xszoan/favicon/fvr-72-72.png">
        <link rel="apple-touch-icon" href="https://ik.imagekit.io/0g6xszoan/favicon/fvr-72-72.png">
        <link rel="apple-touch-icon" sizes="72x72" href="https://ik.imagekit.io/0g6xszoan/favicon/fvr-72-72.png">
        <link rel="apple-touch-icon" sizes="114x114" href="https://ik.imagekit.io/0g6xszoan/favicon/fvr-114-114.png">

        <meta name="author" content="FactViewResearch, https://www.factviewresearch.com" />
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
        <meta name="Audience" content="All, Business, Management, Research, Services" />

       <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Style CSS -->
        <link rel="stylesheet" href="{{ asset('front/assets/css/swiper-bundle.min.css')}}" />
        <link rel="stylesheet" href="{{ asset('front/assets/css/slick.css')}}" />

        <link rel="preload" href="{{ asset('front/assets/css/style.css')}}" rel="stylesheet" as="style" onload="this.onload=null;this.rel='stylesheet'" defer>
        <link rel="stylesheet" style="text/css" href="{{ asset('front/assets/css/style.css')}}" defer>

        <link rel="stylesheet" href="{{ asset('front/dist/output-tailwind.css')}}" />
        <link rel="stylesheet" href="{{ asset('front/dist/output-scss.css')}}" />
        <script type="text/javascript" src="{{ asset('front/assets/js/jquery.min.js')}}"></script>
         <meta name="google-site-verification" content="ttXl7RH9nKnXlHD17fSjZEaoD-uIiT5OROVTnU4EPG0" />

    <!-- Google tag (gtag.js) -->
    <script defer async src="https://www.googletagmanager.com/gtag/js?id=G-HES2Q3T6V1"></script>
    <script defer async async>
        function gtag() {
            dataLayer.push(arguments)
        }
        window.dataLayer = window.dataLayer || [], gtag("js", new Date), gtag("config", "G-HES2Q3T6V1");
    </script>

    <script defer async type="text/javascript"
        src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
    <script defer async type="text/javascript" src="{{ asset('front/assets/js/translate.js') }}"></script>
    <style>
       #google_translate_element,.process-steps-xs li:last-child:after,.section-heading.title-style5.left .square .separator-left,.skiptranslate{display:none}
    </style>

    <body>
        <div id="google_translate_element"></div>
        <!-- Header -->
        <header id="header" class="header relative">
            <div class="header_inner flex items-center justify-between z-[1] w-full sm:h-20 h-16 min-[1600px]:px-15 lg:px-9 px-4 border-b border-light">
                <div class="left flex items-center gap-15 max-[1600px]:gap-6 h-full">
                    <h1>
                        <a href="{{ route('front.home') }}">
                            <img src="{{ getCompanyDetail()->company_logo }}?tr=w-auto,h-38,fo-auto" width="196" height="38" loading="lazy" alt="logo-white" class="logo-white md:h-[42px] h-9 w-auto" />
                            <img src="{{ getCompanyDetail()->company_logo }}?tr=w-auto,h-38,fo-auto" width="196" height="38" loading="lazy" alt="logo" class="logo-black md:h-[42px] h-9 w-auto hidden" />
                        </a>
                    </h1>

                </div>
                <div class="right flex items-center gap-6 h-full">
                    <div class="navigator h-full max-xl:hidden">
                        <ul class="list flex items-center gap-5 h-full">
                            <li class="h-full relative">
                                <a href="{{ route('front.home') }}" class="flex items-center gap-1 h-full duration-300">
                                    <span class="text-title relative">Home</span>
                                </a>
                            </li>
                            <li class="h-full relative">
                                <a href="{{ route('front.all-category') }}" class="flex items-center gap-1 h-full duration-300">
                                    <span class="text-title relative">Industries</span>
                                    <span class="ph-bold ph-caret-down"></span>
                                </a>
                                <div class="sub_menu absolute p-3 -left-10 w-max bg-white rounded-lg">
                                    @if (GetReportMenu())
                                    <ul>
                                        @foreach (GetReportMenu() as $cate)
                                        <li>
                                            <a href="{{ route('front.reports')}}?id={{gerenaretslug(strtolower($cate->cat_name))}}" class="link flex items-center justify-between gap-2 w-full text-button py-1.5 px-6 rounded duration-300"> {{ $cate->cat_name }} </a>
                                        </li>
                                        @endforeach
                                        <li>
                                            <a href="{{ route('front.all-category') }}" class="link flex items-center justify-between gap-2 w-full text-button py-1.5 px-6 rounded duration-300"> All Industries </a>
                                        </li>
                                    </ul>
                                    @endif
                                </div>
                            </li>
                            <li class="h-full relative">
                                <a href="{{ route('front.services') }}" class="flex items-center gap-1 h-full duration-300">
                                    <span class="text-title relative">Services</span>
                                    <span class="ph-bold ph-caret-down"></span>
                                </a>
                                <div class="sub_menu absolute p-3 -left-10 w-max bg-white rounded-lg">
                                    @if (GetServiceMenu())
                                    <ul>
                                        @foreach (GetServiceMenu() as $service)
                                        <li>
                                            <a href="{{ route('front.service-single', $service->slug) }}" class="link flex items-center justify-between gap-2 w-full text-button py-1.5 px-6 rounded duration-300"> {{ $service->heading }} </a>
                                        </li>
                                        @endforeach
                                        <li>
                                            <a href="{{ route('front.services') }}" class="link flex items-center justify-between gap-2 w-full text-button py-1.5 px-6 rounded duration-300"> All Services </a>
                                        </li>
                                    </ul>
                                    @endif
                                </div>
                            </li>
                            <li class="h-full relative">
                                <a href="#!" class="flex items-center gap-1 h-full duration-300">
                                    <span class="text-title relative">About Us</span>
                                    <span class="ph-bold ph-caret-down"></span>
                                </a>
                                <div class="sub_menu absolute p-3 -left-10 w-max bg-white rounded-lg">
                                    <ul>
                                        <li>
                                            <a href="{{ route('front.about') }}" class="link flex items-center justify-between gap-2 w-full text-button py-1.5 px-6 rounded duration-300"> About Company </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('front.whowe') }}" class="link flex items-center justify-between gap-2 w-full text-button py-1.5 px-6 rounded duration-300"> Who We Are </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('front.whyus') }}" class="link flex items-center justify-between gap-2 w-full text-button py-1.5 px-6 rounded duration-300"> Why Choose us </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('front.testimonials') }}" class="link flex items-center justify-between gap-2 w-full text-button py-1.5 px-6 rounded duration-300"> Client Testimonials </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('front.partners') }}" class="link flex items-center justify-between gap-2 w-full text-button py-1.5 px-6 rounded duration-300"> Partners </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="h-full relative">
                                <a href="#!" class="flex items-center gap-1 h-full duration-300">
                                    <span class="text-title relative">Media/Insights</span>
                                    <span class="ph-bold ph-caret-down"></span>
                                </a>
                                <div class="sub_menu absolute p-3 -left-10 w-max bg-white rounded-lg">
                                    <ul>
                                        <li>
                                            <a href="{{ route('front.blogs') }}" class="link flex items-center justify-start gap-2 w-full text-button py-1.5 px-6 rounded duration-300"> <i class="ph-bold ph-paper-plane-tilt"></i>Blog </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('front.press-releases') }}" class="link flex items-center justify-start gap-2 w-full text-button py-1.5 px-6 rounded duration-300"> <i class="ph-bold ph-newspaper"></i>Press Releases </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('front.case-studies') }}" class="link flex items-center justify-start gap-2 w-full text-button py-1.5 px-6 rounded duration-300"> <i class="ph-bold ph-briefcase"></i>Case Studies </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="list_action flex items-center gap-7">
                        <a href="{{ route('front.contact') }}" class="button-main max-sm:hidden">Contact Us<i class="ph-bold ph-chat-dots body1 ml-1"></i></a>
                       <div class="notification_block relative">
                        <button class="relative block">
                            <span class="ph-bold ph-magnifying-glass text-2xl block"></span>
                            <!-- <span class="absolute -top-0.5 right-0.5 w-2 h-2 bg-primary rounded-full"></span> -->
                        </button>
                        <div class="notification_submenu absolute w-[400px] p-3 top-[3.25rem] -right-3 bg-white rounded-md animate animate_top" style="--i: 3">
                            <div class="form_search z-[1] w-full">
                            <form action="{{ route('front.reports') }}" method="GET" class="form_inner flex items-center justify-between gap-6 gap-y-4 relative w-full p-0 rounded-lg bg-white">
                                <div class="form_input relative w-full">
                                    <!-- <span class="icon_search ph-bold ph-magnifying-glass absolute top-1/2 -translate-y-1/2 left-2 text-xl"></span> -->
                                    <input type="text" class="input_search w-full h-full pl-0" name="search" placeholder="Report title, keywords or company" required />
                                </div>
                                <button type="submit" class="button-main text-center flex-shrink-0" aria-label="search"><i class="ph-bold ph-magnifying-glass"></i></button>
                            </form>
                            </div>
                        </div>
                        </div>
                        <button class="humburger_btn xl:hidden">
                            <span class="ph-bold ph-list text-4xl block">
                                <span class="blind">button open menu mobile</span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
        </header>
