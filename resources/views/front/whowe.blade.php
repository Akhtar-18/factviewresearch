@extends('front.layout')
@section('title', 'Who We Are | FactView Research')
@section('frontpage')


        <!-- Breadcrumb -->
        <section class="breadcrumb">
            <div class="breadcrumb_inner report_bg bg-[#091E33] relative py-10">
                <div class="container relative h-full">
                    <div class="breadcrumb_content flex flex-col items-start justify-center xl:w-[1000px] lg:w-[848px] md:w-5/6 w-full h-full">
                        <h3 class="heading3 text-white mb-2">Who We Are</h3>
                        <div class="list_breadcrumb flex items-center gap-2 animate animate_top" style="--i: 1">
                            <a href="{{ route('front.home') }}" class="caption1 text-white"><i class="ph ph-house"></i></a>
                            <span class="caption1 text-white opacity-40">/</span>
                            <span class="caption1 text-white opacity-40">Company</span>
                            <span class="caption1 text-white opacity-40">/</span>
                            <span class="caption1 text-white opacity-40">Who We Are</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Benefit -->
        <section class="benefit lg:py-15 sm:py-14 py-10">
            <div class="container">
                <div class="benefit_inner flex max-lg:flex-col-reverse items-start justify-between gap-y-8">
                    <div class="benefit_bg relative lg:w-5/12 sm:w-[45%] w-[85%]">
                        <img src="https://ik.imagekit.io/0g6xszoan/resources/about_img.webp?tr=w-auto,h-600,fo-webp" width="496" height="420" alt="benefit1" class="w-full rounded-20" />
                        <div class="flag_benefit flex items-center gap-3 absolute sm:top-44 top-36 lg:-right-8 -right-8 p-3 bg-white rounded-xl shadow-xl animate animate_left" style="--i: 1">
                            <span class="ph ph-chart-line-up sm:text-4xl text-3xl text-primary flex-shrink-0"></span>
                            <div class="flag_info">
                                <h6 class="heading6">1200+</h6>
                                <span class="caption1">Reports Published Annually</span>
                            </div>
                        </div>
                        <div class="flag_benefit flex items-center gap-3 absolute bottom-8 sm:left-28 left-7 p-3 bg-white rounded-xl shadow-xl animate animate_right" style="--i: 2">
                            <div class="flag_info pl-[14px] border-l-2 border-primary">
                                <h6 class="heading6">30+</h6>
                                <span class="caption1">Geography Covered</span>
                            </div>
                        </div>
                    </div>
                    <div class="benefit_content xl:w-[570px] lg:w-5/12 w-full">
                        <h3 class="heading2">Who We Are</h3>
                        <p class="body2 mt-3 text-justify">
                            @if ($whoweData)
                                @foreach ($whoweData as $whowe)
                                    {!! html_entity_decode($whowe->content) !!}
                                @endforeach
                            @endif
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Testimonials -->
       @include('front.testimonial-section')


@endsection