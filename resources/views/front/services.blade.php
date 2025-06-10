@extends('front.layout')
@section('title', 'Market Research Services, Competitive Services')
@section('frontpage')

        <!-- Breadcrumb -->
        <section class="breadcrumb">
            <div class="breadcrumb_inner report_bg bg-[#091E33] relative py-10">
                <div class="container relative h-full">
                    <div class="breadcrumb_content flex flex-col items-start justify-center xl:w-[1000px] lg:w-[848px] md:w-5/6 w-full h-full">
                        <h3 class="heading3 text-white mb-2">Market Research Services, Competitive Services</h3>
                        <div class="list_breadcrumb flex items-center gap-2 animate animate_top" style="--i: 1">
                            <a href="{{ route('front.home') }}" class="caption1 text-white"><i class="ph ph-house"></i></a>
                            <span class="caption1 text-white opacity-40">/</span>
                            <span class="caption1 text-white opacity-40">Services</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- List blogs -->
        <div class="blogs seprate_service_page relative lg:py-16 sm:py-14 py-10 bg-surface">
            <div class="container flex max-lg:flex-col gap-y-12">
                <div class="list lg:pr-20">

                <ul class="list grid xl:grid-cols-2 sm:grid-cols-2 grid-cols-1 gap-7.5">
                    @if (count($services) > 0)
                    @foreach ($services as $key => $service)
                    <li class="category_item h-full animate animate_top" style="--i: {{$key+1}}">
                        <div class="block category_inner block h-full p-7 rounded-lg bg-white shadow-md duration-300 hover:shadow-xl">
                            <div class="flex items-center gap-3">
                                <span class="ph ph-chart-line-up flex-shrink-0 text-4xl"></span>
                                <h5 class="heading6 duration-300 hover:text-primary"><a href="{{ route('front.service-single', $service->slug) }}">{{ $service->heading }}</a></h5>
                            </div>
                            <p class="desc mt-3 mb-3 text-secondary">{!! html_entity_decode(wordLimit($service->content)) !!}</p>
                            <a href="{{ route('front.service-single', $service->slug) }}" class="button-main -border h-fit mt-3">Read more<i class="ph-bold ph-arrow-bend-up-right ml-2"></i></a>
                        </div>
                    </li>
                     @endforeach
                @endif
                </ul>
                    
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