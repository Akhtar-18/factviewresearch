@extends('front.layout')
@section('title', 'Market Research Services, Competitive Services')
@section('frontpage')

        <!-- Breadcrumb -->
        <section class="breadcrumb">
            <div class="breadcrumb_inner report_bg bg-[#091E33] relative py-10">
                <div class="container relative h-full">
                    <div class="breadcrumb_content flex flex-col items-start justify-center xl:w-[1000px] lg:w-[848px] md:w-5/6 w-full h-full">
                        <div class="list_breadcrumb flex items-center gap-2 animate animate_top" style="--i: 1">
                            <a href="{{ route('front.home') }}" class="caption1 text-white"><i class="ph ph-house"></i></a>
                            <span class="caption1 text-white opacity-40">/</span>
                            <span class="caption1 text-white opacity-40">Services</span>
                            <span class="caption1 text-white opacity-40">/</span>
                            <span class="caption1 text-white opacity-60">{{ $services->heading }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- List blogs -->
        <div class="blogs relative lg:py-16 sm:py-14 py-10">
            <div class="container flex max-lg:flex-col gap-y-12">
                <div class="list lg:pr-20">
                    <h2 class="heading3 mb-3">{{ $services->heading }}</h2>
                    <p class="text-justify">{!! html_entity_decode($services->content) !!}</p>
                </div>
                <div class="blog_sidebar relative flex-shrink-0 lg:w-[360px] w-full h-fit">
                    <div class="sidebarsticky">
                    <div class="free_sample_block about overflow-hidden rounded-xl bg-surface duration-300">
                        <div class="text-center px-5 py-3 border-b border-line">
                            <h6 class="heading6">Get In Touch with Us</h6>
                        </div>
                        <div class="employer_info text-center p-5 pt-3">
                            <p class="mb-3">The free sample includes data points such as market estimates, growth rate, size of the largest region and segment of the market.</p>
                            <a href="tel:@if (getCompanyDetail()){{ getCompanyDetail()->no_prefix }}{{ getCompanyDetail()->contact_no }} @endif" class="button-main bg-dark w-full text-center blinking"><i class="ph ph-phone-call body1 mr-1"></i>@if (getCompanyDetail()){{ getCompanyDetail()->no_prefix }}{{ getCompanyDetail()->contact_no }} @endif</a>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="footerend"></div>
            </div>
        </div>

@endsection