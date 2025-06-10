@extends('front.layout')
@section('title', 'Report')
@section('frontpage')
@section('reportmetasection')

<meta name="keywords" content="{{ strip_tags($reports->metal_keywords) }}" />
<meta name="description" content="{{ strip_tags($reports->meta_des) }}" />
<!-- title  -->
<title>{{ strip_tags($reports->meta_title) }}</title>
@endsection

<!-- Breadcrumb -->
<section class="breadcrumb">
    <div class="breadcrumb_inner report_bg bg-[#091E33] relative py-10">
        <div class="container relative h-full">
            <div class="breadcrumb_content flex flex-col items-start justify-center xl:w-[1000px] lg:w-[848px] md:w-5/6 w-full h-full">
                <div class="list_breadcrumb flex items-center gap-2 animate animate_top" style="--i: 1">
                    <a href="{{ route('front.home') }}" class="caption1 text-white"><i class="ph ph-house"></i></a>
                    <span class="caption1 text-white opacity-40">/</span>
                    <span class="caption1 text-white"><a href="#!">
                        @if (isset($reports->getCategoryName->cat_name))
                            {{ $reports->getCategoryName->cat_name }}
                        @endif</a></span>
                    <span class="caption1 text-white opacity-40">/</span>
                    <span class="caption1 text-white opacity-60">{!! html_entity_decode(wordLimitset($reports->heading, 5)) !!}</span>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="jobs_detail relative lg:pt-15 sm:pt-15 pt-8 lg:pb-14 sm:pb-14 pb-7">
    <div class="container flex max-lg:flex-col gap-y-10">
        <div class="jobs_inner w-full lg:pr-15">
            <div class="pb-10 border-b border-line">
                <div class="jobs_info flex sm:gap-4 gap-2">
                    <div class="report_img detail_page"></div>
                    <div class="flex flex-col">
                        <h4 class="jobs_name heading5 -style-1 mb-1">
                            {{ $reports->heading }}
                        </h4>
                        <div class="flex flex-wrap items-center gap-5 gap-y-1.5 mt-1">
                            <div class="jobs_date text-secondary">
                                <span class="ph ph-calendar-blank text-xl"></span>
                                <span class="date align-top">Published Date: {{ date('M, Y', strtotime($reports->publish_month)) }}</span>
                            </div>
                            <div class="jobs_address -style-1 text-secondary">
                                <span class="ph ph-factory text-xl"></span>
                                <span class="address align-top">Industry: 
                                    @if (isset($reports->getCategoryName->cat_name))
                                            {{ $reports->getCategoryName->cat_name }}
                                    @endif</span>
                            </div>
                            <div class="jobs_address -style-1 text-secondary">
                                <span class="ph ph-file-text text-xl"></span>
                                <span class="address align-top">Format: PDF</span>
                            </div>
                        </div>
                        <div class="flex flex-wrap items-center gap-2.5 mt-3">
                            <a href="{{ route('front.enquiry', ['id' => $reports->url, 'type' => 'request']) }}" class="jobs_tag font-semibold tag text-white bg-red whitespace-nowrap"><i class="ph ph-file-lock body1 mr-1" style="position:relative;top:2px;"></i>Free Sample</a>
                            <a href="{{ route('front.enquiry', ['id' => $reports->url, 'type' => 'enquiry']) }}" class="jobs_tag font-semibold tag text-white bg-yellow whitespace-nowrap"><i class="ph ph-chat-dots body1 mr-1" style="position:relative;top:2px;"></i>Enquiry</a>
                            <a href="{{ route('front.enquiry', ['id' => $reports->url, 'type' => 'discount']) }}" class="jobs_tag font-semibold tag text-white bg-success whitespace-nowrap"><i class="ph ph-seal-percent body1 mr-1" style="position:relative;top:2px;"></i>Discount</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="overview md:mt-7 mt-7">
                <div class="content">
                    <div id="reportnav" class="menu_tab">
                        <ul class="menu flex gap-2" role="tablist">
                            <li class="indicator absolute bottom-0 h-0.5 bg-primary rounded-full duration-300"></li>
                            <li class="tab_item" role="presentation">
                                <button class="tab_btn -before py-1 hover:text-primary duration-300 active" id="report_tab01" role="tab" aria-controls="about_01" aria-selected="true">Report Summary</button>
                            </li>
                            <li class="tab_item" role="presentation">
                                <button class="tab_btn -before py-1 hover:text-primary duration-300" id="report_tab02" role="tab" aria-controls="about_02" aria-selected="false">Table of Contents</button>
                            </li>
                            <li class="tab_item" role="presentation">
                                <button class="tab_btn -before py-1 hover:text-primary duration-300" id="report_tab03" role="tab" aria-controls="about_03" aria-selected="false">Segmentation</button>
                            </li>
                            <li class="tab_item" role="presentation">
                                <button class="tab_btn -before py-1 hover:text-primary duration-300" id="report_tab04" role="tab" aria-controls="about_04" aria-selected="false">Methodology</button>
                            </li>
                            <li class="tab_item">
                                <button onclick="location.href='{{ route('front.enquiry', ['id' => $reports->url, 'type' => 'request']) }}';" class="tab_btn btn_download -before py-1 hover:text-primary duration-300"><i class="ph ph-download-simple mr-1"></i>Download Sample</button>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="list_desc">
                    
                    <div id="about_01" class="tab_list mt-5 active" role="tabpanel" aria-labelledby="report_tab01" aria-hidden="false">
                        <div class="row">
                            <p>
                        @php
                            $content = html_entity_decode($reports->description);
                            // Check if the content contains anchor tags
                            $containsLink = strpos($content, '<a') !== false;
                        @endphp

                        @if ($containsLink)
                            <!-- Replace 'style="color: blue;"' with your desired formatting -->
                            {!! str_replace('<a', '<a style="color: blue;"', $content) !!}
                        @else
                            {!! $content !!}
                        @endif
                    </p>
                                            @if (count($reports->getReportTblSummary) > 0)
                                                <div class="col-md-12 mt-3">
                                                    <div class="table-responsive">
                                                        <table class="table table-bordered border-dark" style="border: 1px solid #433e3e;">
                                                            <thead>
                                                                <tr
                                                                    style="background-color: #4472c4;color:#fff;width: 24%;">
                                                                    <th style="width: 24%">Report Components</th>
                                                                    <th>Details</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($reports->getReportTblSummary as $tbl)
                                                                    <tr style="border: 1px solid #433e3e;">
                                                                        <td style="border: 1px solid #433e3e;padding:5px"><b>{{ $tbl->heading }}</b></td>
                                                                        <td style="border: 1px solid #433e3e;padding:5px">{!! html_entity_decode($tbl->details) !!}</td>
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>

                                                        </table>
                                                    </div>
                                                </div>
                                            @endif

                                            @if (!empty(json_decode($marketyear, true)))
                                                <div class="col-md-8">
                                                    <div class="card-body">
                                                        <canvas id="mybarChart" height="300"></canvas>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="card-body">
                                                        <p><a href="{{ route('front.home') }}"
                                                                class="navbar-brand logodefault">
                                                                @if (getCompanyDetail())
                                                                    <img id="logo"
                                                                        src="{{ getCompanyDetail()->company_logo }}"
                                                                        alt="logo" width="200" height="50">
                                                                @elseif(isset(getCompanyDetail()->company_name))
                                                                    {{ getCompanyDetail()->company_name }}
                                                                @endif
                                                            </a></p>
                                                        @if (!empty($reports->getReportCAGR->cagr))
                                                            @if (isset($reports->getReportCAGR->cagr))
                                                                <div class="title text-center mb-2">
                                                                    <div class="section-heading">
                                                                        <h2>{{ $reports->getReportCAGR->cagr }}
                                                                            %</h2>
                                                                    </div>
                                                                    <h6 class="text-primary">Current CAGR
                                                                        Report</strong></h6>
                                                                    <p>
                                                                        @foreach ($marketyear as $markyr)
                                                                            @if ($loop->first)
                                                                                {{ $markyr }} -
                                                                            @endif
                                                                            @if ($loop->last)
                                                                                {{ $markyr }}
                                                                            @endif
                                                                        @endforeach
                                                                    </p>
                                                                </div>
                                                            @endif
                                                        @endif
                                                    </div>


                                                </div>
                                            @endif
                                            <!-- Segment Graph -->
                                            @if (count($SegmentType) > 0)
                                                @foreach ($SegmentType as $segments)
                                                    <div class="col-md-4">
                                                        @php $SegmentGraph = getSementGraph($segments->id);
                                                            $segmentname = $SegmentGraph->pluck('segmentname');
                                                            $segmentvalue = $SegmentGraph->pluck('segmentvalue');
                                                        @endphp
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <canvas
                                                                    id="mysegmentChart{{ $segments->id }}"></canvas>
                                                            </div>
                                                        </div>
                                                        <script>
                                                            var segmentChart = document.getElementById('mysegmentChart{{ $segments->id }}');
                                                            new Chart(segmentChart, {
                                                                type: "pie",
                                                                data: {
                                                                    labels: {!! json_encode($segmentname) !!},
                                                                    datasets: [{
                                                                        data: {!! json_encode($segmentvalue) !!},
                                                                        backgroundColor: [
                                                                            "rgba(28, 51, 65,0.8)",
                                                                            "rgba(0, 135, 115,0.8)",
                                                                            "rgba(107, 185, 131,0.8)",
                                                                            "rgba(242, 190, 84,0.8)",
                                                                            "rgba(240, 217, 207,0.8)",
                                                                            "rgba(28, 51, 65,0.8)",
                                                                            "rgba(0, 135, 115,0.8)",
                                                                            "rgba(107, 185, 131,0.8)",
                                                                            "rgba(242, 190, 84,0.8)",
                                                                            "rgba(240, 217, 207,0.8)",
                                                                        ]
                                                                    }]
                                                                },
                                                                options: {
                                                                    plugins: {
                                                                        title: {
                                                                            display: true,
                                                                            text: '{{ $segments->segmenttypename }} Segmentation  (%)'
                                                                        }
                                                                    },
                                                                }
                                                            });
                                                        </script>
                                                    </div>
                                                @endforeach
                                            @endif
                                            <!-- Region Graph -->
                                            @if (!empty(json_decode($regionname, true)))
                                                <div class="col-md-4">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <canvas id="myregionChart"></canvas>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                            <!-- Market Share Graph -->
                                            @if (!empty(json_decode($marketsharename, true)))
                                                <div class="col-md-4">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <canvas id="mshareChart"></canvas>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif

                                        </div>
                    </div>
                    <div id="about_02" class="tab_list mt-5" role="tabpanel" aria-labelledby="report_tab02" aria-hidden="true">
                        @if (isset($reports->toc))
                            {!! html_entity_decode($reports->toc) !!}
                        @endif
                    </div>
                    <div id="about_03" class="tab_list mt-5" role="tabpanel" aria-labelledby="report_tab03" aria-hidden="true">
                        @if (isset($reports->segment))
                            {!! html_entity_decode($reports->segment) !!}
                        @endif
                    </div>
                    <div id="about_04" class="tab_list mt-5" role="tabpanel" aria-labelledby="report_tab04" aria-hidden="true">
                        @if (isset($reports->methodology))
                            {!! html_entity_decode($reports->methodology) !!}
                        @endif
                    </div>
                </div>
            </div>

        </div>
        <div class="jobs_sidebar relative flex-shrink-0 lg:w-[380px] w-full h-fit">
            <div class="sidebarsticky">
                <div class="apply rounded-xl bg-white shadow-md duration-300">
                    <div class="flex items-center justify-between px-5 py-3 border-b border-line">
                        <h6 class="heading6">Choose License Type</h6>
                        <button class="button_share flex items-center justify-center w-9 h-9 border border-line rounded-full bg-white duration-300 hover:border-black">
                            <span class="ph ph-share-network text-xl"></span>
                            <ul class="social">
                                <li class="social_item">
                                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(Request::url()) }}" target="_blank" class="social_link text-xl w-9 h-9 flex items-center justify-center border border-line text-white rounded-full duration-300 hover:bg-white hover:text-black">
                                        <span class="ph ph-facebook-logo"></span>
                                    </a>
                                </li>
                                <li class="social_item">
                                    <a href="https://www.linkedin.com/shareArticle?url={{ urlencode(Request::url()) }}&title={{ urlencode($reports->heading) }}" target="_blank" class="social_link text-xl w-9 h-9 flex items-center justify-center border border-line text-white rounded-full duration-300 hover:bg-white hover:text-black">
                                        <span class="ph ph-linkedin-logo"></span>
                                    </a>
                                </li>
                                <li class="social_item">
                                    <a href="https://twitter.com/intent/tweet?url={{ urlencode(Request::url()) }}&text={{ urlencode($reports->heading) }}" target="_blank" class="social_link text-xl w-9 h-9 flex items-center justify-center border border-line text-white rounded-full duration-300 hover:bg-white hover:text-black">
                                        <span class="ph ph-x-logo"></span>
                                    </a>
                                </li>
                                <!-- <li class="social_item">
                                    <a href="https://www.twitter.com/" target="_blank" class="social_link text-xl w-9 h-9 flex items-center justify-center border border-line text-white rounded-full duration-300 hover:bg-white hover:text-black">
                                        <span class="ph ph-whatsapp-logo"></span>
                                    </a>
                                </li> -->
                            </ul>
                        </button>
                    </div>
                    <div class="group_btn p-5">

                        <div class="radio_buttons">
                            <label class="custom-radio mb-2">
                                <input type="radio" name="license" value="singleLicense" checked="">
                                <span class="radio-btn">
                                    <i class="fal fa-check"></i>
                                    <div class="hobbies-icon">
                                        <div class="flex items-center">
                                            <div class="package_icon single_user"></div>
                                            <div class="h6 ml-2"><span>Single User License</span></div>
                                        </div>
                                        <div class="h6">$ @if (isset($reports->getReportLicenses->single_user))
                                                {{ $reports->getReportLicenses->single_user }}
                                            @endif</div>
                                    </div>
                                </span>
                            </label>
                            <label class="custom-radio mb-2">
                                <input type="radio" name="license" value="multiLicense">
                                <span class="radio-btn">
                                    <i class="fal fa-check"></i>
                                    <div class="hobbies-icon">
                                        <div class="flex items-center">
                                            <div class="package_icon corporate_user"></div>
                                            <div class="h6 ml-2"><span>Multi User License</span></div>
                                        </div>
                                        <div class="h6">$@if (isset($reports->getReportLicenses->multi_user))
                                                {{ $reports->getReportLicenses->multi_user }}
                                            @endif</div>
                                    </div>
                                </span>
                            </label>
                            <label class="custom-radio">
                                <input type="radio" name="license" value="corporateLicense">
                                <span class="radio-btn">
                                    <i class="fal fa-check"></i>
                                    <div class="hobbies-icon">
                                        <div class="flex items-center">
                                            <div class="package_icon corporate_user"></div>
                                            <div class="h6 ml-2"><span>Enterprice User License</span></div>
                                        </div>
                                        <div class="h6">$@if (isset($reports->getReportLicenses->enterprise_user))
                                                {{ $reports->getReportLicenses->enterprise_user }}
                                            @endif</div>
                                    </div>
                                </span>
                            </label>
                        </div>
                        <button onclick="location.href='{{ route('front.buynow', $reports->id) }}';" class="btn_open_popup apply_btn button-main w-full text-center mt-3" data-type="modal_apply"><i class="ph ph-shopping-cart-simple body1 mr-1"></i>Buy Now</button>
                    </div>
                </div>
                <div class="free_sample_block about mt-7.5 overflow-hidden rounded-xl bg-surface duration-300">
                    <div class="text-center px-5 py-3 border-b border-line">
                        <h6 class="heading6">Get A FREE Sample</h6>
                    </div>
                    <div class="employer_info text-center p-5 pt-3">
                        <p class="mb-3">The free sample includes data points such as market estimates, growth rate, size of the largest region and segment of the market.</p>
                        <a href="{{ route('front.enquiry', ['id' => $reports->url, 'type' => 'request']) }}" class="button-main bg-dark w-full text-center blinking"><i class="ph ph-chat-dots body1 mr-1"></i>Send me a Free Sample</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="footerend"></div>
    </div>
</section>


<!-- Testimonials -->
@include('front.testimonial-section')

@endsection