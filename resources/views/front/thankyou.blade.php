@extends('front.layout')
@section('title', 'Thank You')
@section('frontpage')

<section class="breadcrumb">
    <div class="breadcrumb_inner report_bg bg-[#091E33] relative py-10">
        <div class="container relative h-full">
            <div class="breadcrumb_content flex flex-col items-start justify-center xl:w-[1000px] lg:w-[848px] md:w-5/6 w-full h-full">
                <h3 class="heading3 text-white mb-2">
                    Thank You
                </h3>
                <div class="list_breadcrumb flex items-center gap-2 animate animate_top" style="--i: 1">
                    <a href="{{ route('front.home') }}" class="caption1 text-white"><i class="ph ph-house"></i></a>
                    <span class="caption1 text-white opacity-40">/</span>
                    <span class="caption1 text-white">
                        <a href="{{ route('front.report',$reports->url)}}">
                            {!! html_entity_decode(wordLimitset($reports->heading, 5)) !!}
                        </a>
                    </span>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="features lg:py-15 sm:py-14 py-10">
    <div class="container">
        <div class="benefit_content xl:w-[570px] lg:w-5/12 w-full">
            <h3 class="heading2">Thank You</h3>
            <p class="body2 mt-3 text-justify">
                We have recieved your enquiry for <span class="text-primary-use">"{{ $reports->heading }}"</span>. Our Reprenstative Will Get Back To You.
            </p>
            <div class="mt-1-9"><a href="{{ route('front.home') }}" class="button-main max-sm:hidden"><span>Back Home</span></a></div>
        </div>
    </div>
</section>

@endsection