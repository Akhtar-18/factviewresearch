@extends('front.layout')
@section('title','Market Research Reports, Industry Reports, Market Research, Data Analysis, Fact-Finding | FactView Research')
@section('frontpage')
@if (GetSlider())
        <!-- Slider -->
       <section class="slider home_banner">
            <div class="banner-slider">
            @foreach (GetSlider() as $list)
            <div class="slider_inner relative md:h-[520px] max-md:py-28 overflow-hidden">
                <div class="slider_bg absolute top-0 left-0 w-full h-full z-[-1]" style="background-image:url('{{ $list->slider_image }}?tr=w-1400,h-auto,fo-webp')" aria-hidden="true"></div>
                <div class="container h-full">
                    <div class="slider_content flex flex-col items-start justify-center sm:pt-0 pt-0 md:w-[637px] xl:w-[720px] w-full h-full">
                        <h2 class="heading1 text-white animate animate_top" style="--i: 1">{{ $list->heading }}</h2>
                        <p class="body2 text-white mt-2 animate animate_top" style="--i: 2">{{ $list->subheading }}</p>
                        <div class="form_search max-xl:hidden z-[1] w-full md:mt-10 mt-7 animate animate_top" style="--i: 3">
                            <form action="{{ route('front.reports') }}" method="GET" class="form_inner flex items-center justify-between gap-6 gap-y-4 relative w-full p-3 rounded-lg bg-white">
                                <div class="form_input relative w-full">
                                    <span class="icon_search ph-bold ph-magnifying-glass absolute top-1/2 -translate-y-1/2 left-2 text-xl"></span>
                                    <input type="text" name="search" class="input_search w-full h-full pl-10" placeholder="Report title, keywords or company" required />
                                </div>
                                <button type="submit" class="button-main text-center flex-shrink-0" aria-label="search"><span class="btn_txt">Search</span><i class="ph-bold ph-arrow-bend-up-right arrow_right ml-1"></i><i class="ph-bold ph-magnifying-glass arrow_search"></i></button>
                            </form>
                        </div>
                        <!-- <div class="list_tags max-xl:hidden flex flex-wrap items-center gap-3 mt-5 animate animate_top" style="--i: 4">
                            <strong class="text-button-sm text-white">Services:</strong>
                            <a href="#!" class="tag -small -border border-opacity-20 text-button-sm text-white hover:text-black hover:bg-white">Price Strategy</a>
                            <a href="#!" class="tag -small -border border-opacity-20 text-button-sm text-white hover:text-black hover:bg-white">Market Entry Strategy</a>
                        </div> -->
                    </div>
                </div>
            </div>
            @endforeach
            <!-- <div class="slider_inner relative md:h-[520px] max-md:py-28 overflow-hidden">
                <div class="slider_bg absolute top-0 left-0 w-full h-full z-[-1]" style="background-image:url('https://emeritus.org/in/wp-content/uploads/sites/3/2022/12/What-is-Market-Research_-Definition-and-Types.jpg.webp?tr=w-1400,h-auto,fo-webp')" aria-hidden="true"></div>
                <div class="container h-full">
                    <div class="slider_content flex flex-col items-start justify-center sm:pt-0 pt-0 md:w-[637px] xl:w-[720px] w-full h-full">
                        <h2 class="heading1 text-white animate animate_top" style="--i: 1">Green Hydrogen Most Sustainable Energy Option</h2>
                        <p class="body2 text-white mt-2 animate animate_top" style="--i: 2">Europe has Been Pioneering this Transition with Nearly 40 GW of Electrolyser Capacity Planned by 2030 with the Rest of the World to Follow.</p>
                        <div class="form_search max-xl:hidden z-[1] w-full md:mt-10 mt-7 animate animate_top" style="--i: 3">
                            <form class="form_inner flex items-center justify-between gap-6 gap-y-4 relative w-full p-3 rounded-lg bg-white">
                                <div class="form_input relative w-full">
                                    <span class="icon_search ph-bold ph-magnifying-glass absolute top-1/2 -translate-y-1/2 left-2 text-xl"></span>
                                    <input type="text" class="input_search w-full h-full pl-10" placeholder="Report title, keywords or company" required />
                                </div>
                                <button type="submit" class="button-main text-center flex-shrink-0" aria-label="search"><span class="btn_txt">Search</span><i class="ph-bold ph-arrow-bend-up-right arrow_right ml-1"></i><i class="ph-bold ph-magnifying-glass arrow_search"></i></button>
                            </form>
                        </div>
                        <div class="list_tags max-xl:hidden flex flex-wrap items-center gap-3 mt-5 animate animate_top" style="--i: 4">
                            <strong class="text-button-sm text-white">Services:</strong>
                            <a href="#!" class="tag -small -border border-opacity-20 text-button-sm text-white hover:text-black hover:bg-white">Price Strategy</a>
                            <a href="#!" class="tag -small -border border-opacity-20 text-button-sm text-white hover:text-black hover:bg-white">Market Entry Strategy</a>
                        </div>
                    </div>
                </div>
            </div> -->

            <!-- <div class="slider_inner relative md:h-[520px] max-md:py-28 overflow-hidden">
                <div class="slider_bg absolute top-0 left-0 w-full h-full z-[-1]" style="background-image:url('https://www.hstoday.us/wp-content/uploads/2025/02/ai-7111802_640.jpg?tr=w-1400,h-auto,fo-webp')" aria-hidden="true"></div>
                <div class="container h-full">
                    <div class="slider_content flex flex-col items-start justify-center sm:pt-0 pt-0 md:w-[637px] xl:w-[720px] w-full h-full">
                        <h2 class="heading1 text-white animate animate_top" style="--i: 1">Green Hydrogen Most Sustainable Energy Option</h2>
                        <p class="body2 text-white mt-2 animate animate_top" style="--i: 2">Europe has Been Pioneering this Transition with Nearly 40 GW of Electrolyser Capacity Planned by 2030 with the Rest of the World to Follow.</p>
                        <div class="form_search max-xl:hidden z-[1] w-full md:mt-10 mt-7 animate animate_top" style="--i: 3">
                            <form class="form_inner flex items-center justify-between gap-6 gap-y-4 relative w-full p-3 rounded-lg bg-white">
                                <div class="form_input relative w-full">
                                    <span class="icon_search ph-bold ph-magnifying-glass absolute top-1/2 -translate-y-1/2 left-2 text-xl"></span>
                                    <input type="text" class="input_search w-full h-full pl-10" placeholder="Report title, keywords or company" required />
                                </div>
                                <button type="submit" class="button-main text-center flex-shrink-0" aria-label="search"><span class="btn_txt">Search</span><i class="ph-bold ph-arrow-bend-up-right arrow_right ml-1"></i><i class="ph-bold ph-magnifying-glass arrow_search"></i></button>
                            </form>
                        </div>
                        <div class="list_tags max-xl:hidden flex flex-wrap items-center gap-3 mt-5 animate animate_top" style="--i: 4">
                            <strong class="text-button-sm text-white">Services:</strong>
                            <a href="#!" class="tag -small -border border-opacity-20 text-button-sm text-white hover:text-black hover:bg-white">Price Strategy</a>
                            <a href="#!" class="tag -small -border border-opacity-20 text-button-sm text-white hover:text-black hover:bg-white">Market Entry Strategy</a>
                        </div>
                    </div>
                </div>
            </div> -->
            </div>
        </section>

        <!-- Benefit -->
 @endif
        <!-- Benefit -->
        @if ($aboutData)
            @foreach ($aboutData as $about)
        <section class="benefit lg:py-15 sm:py-14 py-10">
            <div class="container">
                <div class="benefit_inner flex max-lg:flex-col-reverse items-center justify-between gap-y-8">
                    <div class="benefit_content xl:w-[570px] lg:w-5/12 w-full">
                        <h3 class="heading2 animate animate_top" style="--i: 1">{{ $about->heading }}</h3>
                        <p class="body2 mt-3 animate animate_top text-justify" style="--i: 2">
                            {!! html_entity_decode(wordLimitset($about->content, 200)) !!}
                        </p>
                        <!-- <p class="body2 mt-2 animate animate_top text-justify" style="--i: 2">
                            We intend to transform how companies access and use market research, fostering growth and success on a worldwide scale. This is in line with our clear vision for the future.
                        </p> -->
                        <!-- <ul class="list_benefit flex flex-col gap-1 mt-6">
                            <li class="benefit_item flex items-center gap-3 animate animate_top animate_active" style="--i: 3">
                                <span class="ph-fill ph-check-circle flex-shrink-0 text-2xl text-success"></span>
                                <p class="body2 desc">Unparalleled Expertise</p>
                            </li>
                            <li class="benefit_item flex items-center gap-3 animate animate_top animate_active" style="--i: 4">
                                <span class="ph-fill ph-check-circle flex-shrink-0 text-2xl text-success"></span>
                                <p class="body2 desc">Comprehensive Research Solutions</p>
                            </li>
                            <li class="benefit_item flex items-center gap-3 animate animate_top animate_active" style="--i: 5">
                                <span class="ph-fill ph-check-circle flex-shrink-0 text-2xl text-success"></span>
                                <p class="body2 desc">Global Market Coverage</p>
                            </li>
                        </ul> -->
                        <a href="{{ route('front.about') }}" class="project_apply_btn button-main -border mt-8">About company <i class="ph-bold ph-arrow-bend-up-right ml-2"></i></a>
                    </div>
                    <div class="benefit_bg relative lg:w-5/12 sm:w-[45%]">
                        <img src="https://ik.imagekit.io/0g6xszoan/resources/about_img.webp?tr=w-auto,h-420,fo-webp" width="496" height="420" alt="benefit1" class="w-full rounded-20" />
                        <div class="flag_benefit flex items-center gap-3 absolute sm:top-44 top-36 lg:right-0 -right-8 p-3 bg-white rounded-xl shadow-xl animate animate_left" style="--i: 1">
                            <span class="ph ph-chart-line-up sm:text-4xl text-3xl text-primary flex-shrink-0"></span>
                            <div class="flag_info">
                                <span class="heading6 block">1200+</span>
                                <span class="caption1">Reports Annually</span>
                            </div>
                        </div>
                        <div class="flag_benefit flex items-center gap-3 absolute bottom-15 sm:-left-28 -left-7 p-3 bg-white rounded-xl shadow-xl animate animate_right" style="--i: 2">
                            <div class="flag_info pl-[14px] border-l-2 border-primary">
                                <span class="heading6 block">30+</span>
                                <span class="caption1">Geography Covered</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
            @endforeach
        @endif


        <!-- Top Categories -->
        @if (count($services) > 0)
        <section class="top_categories lg:py-15 sm:py-14 py-10">
            <div class="container">
                <div class="heading flex items-end justify-between flex-wrap gap-4">
                    <div class="left animate animate_top" style="--i: 1">
                        <h3 class="heading2">Wide range of services</h3>
                        <p class="body2 text-secondary mt-0">Where Research Meets Opportunity.</p>
                    </div>
                    <a href="{{ route('front.services') }}" class="text-button pb-0.5 border-b-2 border-primary duration-300 hover:text-primary animate animate_top" style="--i: 2">Explore more services</a>
                </div>
                <ul class="list grid xl:grid-cols-3 sm:grid-cols-2 grid-cols-1 lg:gap-7.5 gap-5 md:mt-10 mt-7">
                    @foreach ($services as $key => $service)
                    <li class="category_item h-full animate animate_top" style="--i: {{$key+1}}">
                        <div class="category_inner block h-full sm:p-7 p-4 rounded-lg bg-white shadow-md duration-300 hover:shadow-xl">
                            <div class="flex items-center gap-3">
                                <span class="ph ph-chart-line-up flex-shrink-0 text-4xl"></span>
                                <span class="heading6 duration-300 hover:text-primary"><a href="{{ route('front.service-single', $service->slug) }}">{{ $service->heading }}</a></span>
                            </div>
                            <p class="desc mt-3 mb-3 text-secondary">{!! html_entity_decode(wordLimitset($service->content, 20)) !!}</p>
                            <a href="{{ route('front.service-single', $service->slug) }}" class="text-button pb-0.5 border-b-2 border-primary duration-300 text-primary">Know more <i class="ph-bold ph-arrow-bend-up-right ml-2"></i></a>
                        </div>
                    </li>
                    @endforeach
                    <!-- <li class="category_item h-full animate animate_top" style="--i: 2">
                        <div class="category_inner block h-full sm:p-7 p-4 rounded-lg bg-white shadow-md duration-300 hover:shadow-xl">
                            <div class="flex items-center gap-3">
                                <span class="ph ph-chart-line-up flex-shrink-0 text-4xl"></span>
                                <span class="heading6 duration-300 hover:text-primary"><a href="single-services.php">Product Launch Strategy</a></span>
                            </div>
                            <p class="desc mt-3 mb-3 text-secondary">Determining the right pricing strategy is crucial for success. Fact View Research's Price Strategy services analyze market dynamics, customer behavior, and competition</p>
                            <a href="single-services.php" class="text-button pb-0.5 border-b-2 border-primary duration-300 text-primary">Know more <i class="ph-bold ph-arrow-bend-up-right ml-2"></i></a>
                        </div>
                    </li>
                    <li class="category_item h-full animate animate_top" style="--i: 3">
                        <div class="category_inner block h-full sm:p-7 p-4 rounded-lg bg-white shadow-md duration-300 hover:shadow-xl">
                            <div class="flex items-center gap-3">
                                <span class="ph ph-chart-line-up flex-shrink-0 text-4xl"></span>
                                <span class="heading6 duration-300 hover:text-primary"><a href="single-services.php">Full-Time Engagement Services</a></span>
                            </div>
                            <p class="desc mt-3 mb-3 text-secondary">Determining the right pricing strategy is crucial for success. Fact View Research's Price Strategy services analyze market dynamics, customer behavior, and competition</p>
                            <a href="single-services.php" class="text-button pb-0.5 border-b-2 border-primary duration-300 text-primary">Know more <i class="ph-bold ph-arrow-bend-up-right ml-2"></i></a>
                        </div>
                    </li>
                    <li class="category_item h-full animate animate_top" style="--i: 4">
                        <div class="category_inner block h-full sm:p-7 p-4 rounded-lg bg-white shadow-md duration-300 hover:shadow-xl">
                            <div class="flex items-center gap-3">
                                <span class="ph ph-chart-line-up flex-shrink-0 text-4xl"></span>
                                <span class="heading6 duration-300 hover:text-primary"><a href="single-services.php">Growth Strategy Development</a></span>
                            </div>
                            <p class="desc mt-3 mb-3 text-secondary">Determining the right pricing strategy is crucial for success. Fact View Research's Price Strategy services analyze market dynamics, customer behavior, and competition</p>
                            <a href="single-services.php" class="text-button pb-0.5 border-b-2 border-primary duration-300 text-primary">Know more <i class="ph-bold ph-arrow-bend-up-right ml-2"></i></a>
                        </div>
                    </li>
                    <li class="category_item h-full animate animate_top" style="--i: 5">
                        <div class="category_inner block h-full sm:p-7 p-4 rounded-lg bg-white shadow-md duration-300 hover:shadow-xl">
                            <div class="flex items-center gap-3">
                                <span class="ph ph-chart-line-up flex-shrink-0 text-4xl"></span>
                                <span class="heading6 duration-300 hover:text-primary"><a href="single-services.php">Emerging Technologies Analysis</a></span>
                            </div>
                            <p class="desc mt-3 mb-3 text-secondary">Determining the right pricing strategy is crucial for success. Fact View Research's Price Strategy services analyze market dynamics, customer behavior, and competition</p>
                            <a href="single-services.php" class="text-button pb-0.5 border-b-2 border-primary duration-300 text-primary">Know more <i class="ph-bold ph-arrow-bend-up-right ml-2"></i></a>
                        </div>
                    </li>
                    <li class="category_item h-full animate animate_top" style="--i: 6">
                        <div class="category_inner block h-full sm:p-7 p-4 rounded-lg bg-white shadow-md duration-300 hover:shadow-xl">
                            <div class="flex items-center gap-3">
                                <span class="ph ph-chart-line-up flex-shrink-0 text-4xl"></span>
                                <span class="heading6 duration-300 hover:text-primary"><a href="single-services.php">Market Entry Strategy</a></span>
                            </div>
                            <p class="desc mt-3 mb-3 text-secondary">Determining the right pricing strategy is crucial for success. Fact View Research's Price Strategy services analyze market dynamics, customer behavior, and competition</p>
                            <a href="single-services.php" class="text-button pb-0.5 border-b-2 border-primary duration-300 text-primary">Know more <i class="ph-bold ph-arrow-bend-up-right ml-2"></i></a>
                        </div> -->
                    </li>
                </ul>
            </div>
        </section>
        @endif
        <!-- Projects -->
        @if (count($reportsData)>0)
        <section class="projects lg:py-15 sm:py-14 py-10 bg-surface">
            <div class="container">
                <div class="heading flex items-center justify-between flex-wrap gap-4">
                    <div class="left animate animate_top animate_active" style="--i: 1">
                        <h3 class="heading2">Recent Reports</h3>
                        <p class="body2 text-secondary mt-1">Gain Actionable Knowledge to Fuel Success with Our In-Depth Market Research Reports.</p>
                    </div>
                    <a href="{{ route('front.reports') }}" class="text-button pb-0.5 border-b-2 border-primary duration-300 hover:text-primary animate animate_top animate_active" style="--i: 2">All Market Research Report</a>
                </div>
                <ul class="list grid md:grid-cols-4 grid-cols-1 lg:gap-5.5 gap-5 md:mt-10 mt-7">
                    @foreach ($reportsData as $report)
                    <li class="project_item sm:p-6 p-4 rounded-lg bg-white duration-300 shadow-md animate animate_top" style="--i: 1">
                        <div class="project_innner">
                            <div class="project_info flex justify-between gap-3 pb-4 border-b border-line">
                                <div class="project_content">
                                    <div class="project_related_info flex items-center gap-2 mb-3">
                                        <div class="report_img"></div>
                                        <div class="contnt">
                                            <div class="project_date flex items-center gap-1">
                                                <span class="ph ph-calendar-blank text-xl text-secondary"></span>
                                                <span class="caption1 text-secondary">Date: {{ date('M, Y', strtotime($report->publish_month)) }}</span>
                                            </div>
                                            <div class="flex items-center gap-1 mt-1">
                                                <span class="ph ph-book-open text-xl text-secondary"></span>
                                                <span class="project_address -style-1 caption1 text-secondary">Pages: {{ $report->pages }}+</span>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="{{ route('front.report', ['id' => $report->url]) }}" aria-label="Descriptive text" class="project_name heading6 duration-300 hover:underline">{!! html_entity_decode(wordLimitset($report->heading, 10)) !!}</a>
                                    <p class="project_desc mt-3 text-secondary">{!! html_entity_decode(wordLimitset($report->description, 10)) !!}</p>
                                </div>
                            </div>
                            <div class="project_more_info pt-4">
                                <div class="project_price">
                                    <span class="price text-title">Forecast Period: 2024-2031</span>
                                </div>
                            </div>
                        </div>
                        <div class="project_action mt-3">
                            <a href="{{ route('front.report', ['id' => $report->url]) }}" aria-label="Descriptive text" class="project_apply_btn button-main -border w-full">Know more <i class="ph-bold ph-arrow-bend-up-right ml-2"></i></a>
                        </div>
                    </li>
                    @endforeach
                    <!-- <li class="project_item sm:p-6 p-4 rounded-lg bg-white duration-300 shadow-md animate animate_top" style="--i: 1">
                        <div class="project_innner">
                            <div class="project_info flex justify-between gap-3 pb-4 border-b border-line">
                                <div class="project_content">
                                    <div class="project_related_info flex items-center gap-2 mb-3">
                                        <div class="report_img"></div>
                                        <div class="contnt">
                                            <div class="project_date flex items-center gap-1">
                                                <span class="ph ph-calendar-blank text-xl text-secondary"></span>
                                                <span class="caption1 text-secondary">Date: Aug, 2023</span>
                                            </div>
                                            <div class="flex items-center gap-1 mt-1">
                                                <span class="ph ph-book-open text-xl text-secondary"></span>
                                                <span class="project_address -style-1 caption1 text-secondary">Pages: 200+</span>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="single-report.php" aria-label="Descriptive text" class="project_name heading6 duration-300 hover:underline">Global Digital Transformation Market Size, Share & Trends Analysis Report  By End-user, By Region, and Segment</a>
                                    <p class="project_desc mt-3 text-secondary">According to WHO, Dengue is a viral infection caused by the dengue virus (DENV), transmitted to humans through the bite of infected mosquitoes.</p>
                                </div>
                            </div>
                            <div class="project_more_info pt-4">
                                <div class="project_price">
                                    <span class="price text-title">Forecast Period: 2024-2031</span>
                                </div>
                            </div>
                        </div>
                        <div class="project_action mt-3">
                            <a href="single-report.php" aria-label="Descriptive text" class="project_apply_btn button-main -border w-full">Know more <i class="ph-bold ph-arrow-bend-up-right ml-2"></i></a>
                        </div>
                    </li>
                    <li class="project_item sm:p-6 p-4 rounded-lg bg-white duration-300 shadow-md animate animate_top" style="--i: 1">
                        <div class="project_innner">
                            <div class="project_info flex justify-between gap-3 pb-4 border-b border-line">
                                <div class="project_content">
                                    <div class="project_related_info flex items-center gap-2 mb-3">
                                        <div class="report_img"></div>
                                        <div class="contnt">
                                            <div class="project_date flex items-center gap-1">
                                                <span class="ph ph-calendar-blank text-xl text-secondary"></span>
                                                <span class="caption1 text-secondary">Date: Aug, 2023</span>
                                            </div>
                                            <div class="flex items-center gap-1 mt-1">
                                                <span class="ph ph-book-open text-xl text-secondary"></span>
                                                <span class="project_address -style-1 caption1 text-secondary">Pages: 200+</span>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="single-report.php" aria-label="Descriptive text" class="project_name heading6 duration-300 hover:underline">Global Digital Transformation Market Size, Share & Trends Analysis Report  By End-user, By Region, and Segment</a>
                                    <p class="project_desc mt-3 text-secondary">According to WHO, Dengue is a viral infection caused by the dengue virus (DENV), transmitted to humans through the bite of infected mosquitoes.</p>
                                </div>
                            </div>
                            <div class="project_more_info pt-4">
                                <div class="project_price">
                                    <span class="price text-title">Forecast Period: 2024-2031</span>
                                </div>
                            </div>
                        </div>
                        <div class="project_action mt-3">
                            <a href="single-report.php" aria-label="Descriptive text" class="project_apply_btn button-main -border w-full">Know more <i class="ph-bold ph-arrow-bend-up-right ml-2"></i></a>
                        </div>
                    </li>
                    <li class="project_item sm:p-6 p-4 rounded-lg bg-white duration-300 shadow-md animate animate_top" style="--i: 1">
                        <div class="project_innner">
                            <div class="project_info flex justify-between gap-3 pb-4 border-b border-line">
                                <div class="project_content">
                                    <div class="project_related_info flex items-center gap-2 mb-3">
                                        <div class="report_img"></div>
                                        <div class="contnt">
                                            <div class="project_date flex items-center gap-1">
                                                <span class="ph ph-calendar-blank text-xl text-secondary"></span>
                                                <span class="caption1 text-secondary">Date: Aug, 2023</span>
                                            </div>
                                            <div class="flex items-center gap-1 mt-1">
                                                <span class="ph ph-book-open text-xl text-secondary"></span>
                                                <span class="project_address -style-1 caption1 text-secondary">Pages: 200+</span>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="single-report.php" aria-label="Descriptive text" class="project_name heading6 duration-300 hover:underline">Global Digital Transformation Market Size, Share & Trends Analysis Report  By End-user, By Region, and Segment</a>
                                    <p class="project_desc mt-3 text-secondary">According to WHO, Dengue is a viral infection caused by the dengue virus (DENV), transmitted to humans through the bite of infected mosquitoes.</p>
                                </div>
                            </div>
                            <div class="project_more_info pt-4">
                                <div class="project_price">
                                    <span class="price text-title">Forecast Period: 2024-2031</span>
                                </div>
                            </div>
                        </div>
                        <div class="project_action mt-3">
                            <a href="single-report.php" aria-label="Descriptive text" class="project_apply_btn button-main -border w-full">Know more <i class="ph-bold ph-arrow-bend-up-right ml-2"></i></a>
                        </div>
                    </li> -->
                </ul>
            </div>
        </section>
        @endif

        <!-- Blog -->
        @if (count($blogs)>0)
        <section class="blog style_home_blog lg:py-15 sm:py-14 py-10">
            <div class="container">
                <h3 class="heading2 text-center animate animate_top" style="--i: 1">FactView Research's Blog</h3>
                <p class="body2 text-secondary text-center mt-0 animate animate_top" style="--i: 2">Connect with The Latest Industry Buzz Through Our Informative & Engaging Content.</p>
                <ul class="list_blog grid lg:grid-cols-4 sm:grid-cols-2 lg:gap-5.5 gap-6 md:mt-10 mt-7">
                    @foreach ($blogs as $key => $blog)
                    <li class="blog_item animate animate_top" style="--i: {{$key+1}}">
                        <a href="{{ route('front.blog', $blog->url) }}" class="blog_thumb block overflow-hidden rounded-lg" @if($blog->image) style="background-image:url('{{ $blog->image }}?tr=w-1400,h-auto,fo-webp')" @endif aria-label="Blog" rel="noopener"></a>
                        <div class="blog_info flex items-center gap-2 mt-5">
                            <span class="blog_date caption1"><i class="ph ph-calendar-blank mr-1"></i>{{ date('M D Y', strtotime($blog->created_at)) }}</span>
                        </div>
                        <a href="{{ route('front.blog', $blog->url) }}" class="heading6 blog_title mt-1 mb-3 hover:underline">{{ $blog->heading }}</a>
                        <a href="{{ route('front.blog', $blog->url) }}" class="text-button pb-0.5 border-b-2 border-primary duration-300 text-primary">Know more <i class="ph-bold ph-arrow-bend-up-right ml-2"></i></a>
                    </li>
                    @endforeach
                    <!-- <li class="blog_item animate animate_top" style="--i: 2">
                        <a href="single-blog.php" class="blog_thumb block overflow-hidden rounded-lg" aria-label="Blog" rel="noopener"></a>
                        <div class="blog_info flex items-center gap-2 mt-5">
                            <span class="blog_date caption1"><i class="ph ph-calendar-blank mr-1"></i>February 28, 2024</span>
                        </div>
                        <a href="single-blog.php" class="heading6 blog_title mt-1 mb-3 hover:underline">5 ways to enhance your business website in 2024</a>
                        <a href="single-blog.php" class="text-button pb-0.5 border-b-2 border-primary duration-300 text-primary">Know more <i class="ph-bold ph-arrow-bend-up-right ml-2"></i></a>
                    </li>
                    <li class="blog_item max-lg:hidden animate animate_top" style="--i: 3">
                        <a href="single-blog.php" class="blog_thumb block overflow-hidden rounded-lg" aria-label="Blog" rel="noopener"></a>
                        <div class="blog_info flex items-center gap-2 mt-5">
                            <span class="blog_date caption1"><i class="ph ph-calendar-blank mr-1"></i>February 28, 2024</span>
                        </div>
                        <a href="single-blog.php" class="heading6 blog_title mt-1 mb-3 hover:underline">How No-Code Solutions Let You Build Apps Without Coding Skills</a>
                        <a href="single-blog.php" class="text-button pb-0.5 border-b-2 border-primary duration-300 text-primary">Know more <i class="ph-bold ph-arrow-bend-up-right ml-2"></i></a>
                    </li>
                    <li class="blog_item animate animate_top" style="--i: 2">
                        <a href="single-blog.php" class="blog_thumb block overflow-hidden rounded-lg" aria-label="Blog" rel="noopener"></a>
                        <div class="blog_info flex items-center gap-2 mt-5">
                            <span class="blog_date caption1"><i class="ph ph-calendar-blank mr-1"></i>February 28, 2024</span>
                        </div>
                        <a href="single-blog.php" class="heading6 blog_title mt-1 mb-3 hover:underline">5 ways to enhance your business website in 2024</a>
                        <a href="single-blog.php" class="text-button pb-0.5 border-b-2 border-primary duration-300 text-primary">Know more <i class="ph-bold ph-arrow-bend-up-right ml-2"></i></a>
                    </li> -->
                </ul>
            </div>
        </section>
        @endif

        <!-- Banner -->
        <section class="banner">
            <div class="container">
                <div class="banner_inner relative sm:px-16 px-8 py-14 overflow-hidden rounded-xl animate animateZoomOutUp" style="--i: 5">
                    <!-- <div class="banner_bg absolute top-0 left-0 w-full h-full z-[-1]">
                        <img src="" loading="lazy" alt="banner1" class="w-full h-full object-cover bg-white" />
                    </div> -->
                    <div class="banner_content">
                        <h3 class="heading3 text-white animate animate_top" style="--i: 1">Our accomplishments are evident, as recognized<br class="max-sm:hidden" /> by these industry leaders.</h3>
                        <p class="desc mt-2 text-white animate animate_top" style="--i: 2">Client testimonials the feedback they provided about our services.</p>
                        <div class="md:mt-7 mt-5 animate animate_top" style="--i: 3">
                            <a href="{{ route('front.testimonials') }}" class="button-main bg-dark">Client Review's <i class="ph-bold ph-note-pencil ml-2"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Brand -->
         @if (getClient())
        <section class="brand home_page py-14">
            <div class="container">
                <span class="heading6 text-center block">Trusted by leading enterprise organizations and freelancers globally</span>
                <div class="mt-6">
                    <div class="list grid grid-cols-3 md:grid-cols-6 lg:gap-3 gap-3">
                        @foreach (getClient() as $client)
                        <div class="brand-item relative">
                            <img src="{{ $client->image }}?tr=w-136,h-49,fo-webp,cm-pad_resize" width="136" height="49" loading="lazy" alt="1" class="duration-500 relative" />
                        </div>
                        @endforeach
                        <!-- <div class="brand-item relative">
                            <img src="https://ik.imagekit.io/0g6xszoan/clients/20230731120956.png?tr=w-136,h-49,fo-webp,cm-pad_resize" width="136" height="49" loading="lazy" alt="2" class="duration-500 relative" />
                        </div>
                        <div class="brand-item relative">
                            <img src="https://ik.imagekit.io/0g6xszoan/clients/20230731120943.jpg?tr=w-136,h-49,fo-webp,cm-pad_resize" width="136" height="49" loading="lazy" alt="3" class="duration-500 relative" />
                        </div>
                        <div class="brand-item relative">
                            <img src="https://ik.imagekit.io/0g6xszoan/clients/20230731120808.png?tr=w-136,h-49,fo-webp,cm-pad_resize" width="136" height="49" loading="lazy" alt="4" class="duration-500 relative" />
                        </div>
                        <div class="brand-item relative">
                            <img src="https://ik.imagekit.io/0g6xszoan/clients/20230726171114.png?tr=w-136,h-49,fo-webp,cm-pad_resize" width="136" height="49" loading="lazy" alt="5" class="duration-500 relative" />
                        </div>
                        <div class="brand-item relative">
                            <img src="https://ik.imagekit.io/0g6xszoan/clients/20230731122155.png?tr=w-136,h-49,fo-webp,cm-pad_resize" width="136" height="49" loading="lazy" alt="6" class="duration-500 relative" />
                        </div> -->
                    </div>
                </div>
            </div>
        </section>  
        @endif  
@endsection 