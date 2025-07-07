@extends('front.layout')
@section('title', 'Why Choose Us | FactView Research')
@section('frontpage')

        <!-- Breadcrumb -->
        <section class="breadcrumb">
            <div class="breadcrumb_inner report_bg bg-[#091E33] relative py-10">
                <div class="container relative h-full animate animate_top" style="--i: 1">
                    <div class="breadcrumb_content flex flex-col items-start justify-center xl:w-[1000px] lg:w-[848px] md:w-5/6 w-full h-full">
                        <h3 class="heading3 text-white mb-2">Why Choose Us</h3>
                        <div class="list_breadcrumb flex items-center gap-2">
                            <a href="{{ route('front.home') }}" class="caption1 text-white"><i class="ph ph-house"></i></a>
                            <span class="caption1 text-white opacity-40">/</span>
                            <a href="{{ route('front.about') }}" class="caption1 text-white"><span class="caption1 text-white">Company</span></a>
                            <span class="caption1 text-white opacity-40">/</span>
                            <a href="{{ route('front.whyus') }}" class="caption1 text-white"><span class="caption1 text-white">Why Choose Us</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- FreelanHub features -->
        <section class="features lg:py-15 sm:py-14 py-10">
            <div class="container">
                <!-- <ul class="grid lg:grid-cols-3 gap-7.5">

                    <li>
                        <div class="flex flex-col items-start h-full p-7 bg-white border-2 border-transparent rounded-xl duration-500 shadow-md hover:border-line animate animate_top" style="--i: 1">
                            <span class="ph ph-user-check text-5xl"></span>
                            <strong class="heading5 mt-5">Unparalleled Expertise: </strong>
                            <p class="desc text-start text-secondary mt-2">Our team at FactView Research consists of seasoned researchers, analysts, and consultants with extensive business knowledge. We have a thorough grasp of a variety of industries, which enables us to provide insights that are in line with the particular needs of our clients.</p>
                        </div>
                    </li>
                    <li>
                        <div class="flex flex-col items-start h-full p-7 bg-white border-2 border-line rounded-xl duration-500 shadow-md hover:border-black animate animate_top" style="--i: 2">
                            <span class="ph ph-magnifying-glass text-5xl"></span>
                            <strong class="heading5 mt-5">Comprehensive Research Solutions: </strong>
                            <p class="desc text-start text-secondary mt-2">We provide a wide range of research services, including competitor analysis, brand research, market analysis, consumer insights, and more. Businesses of all sizes may rely on our customized solutions to help them with their particular challenges.</p>
                        </div>
                    </li>
                    <li>
                        <div class="flex flex-col items-start h-full p-7 bg-white border-2 border-transparent rounded-xl duration-500 shadow-md hover:border-line animate animate_top" style="--i: 3">
                            <span class="ph ph-hard-drives text-5xl"></span>
                            <strong class="heading5 mt-5">Data-driven Insights: </strong>
                            <p class="desc text-start text-secondary mt-2">Data and analytics are the driving forces behind our research, ensuring the accuracy, dependability, and up-to-date information we deliver.</p>
                        </div>
                    </li>

                    <li>
                        <div class="flex flex-col items-start h-full p-7 bg-white border-2 border-transparent rounded-xl duration-500 shadow-md hover:border-line animate animate_top" style="--i: 1">
                            <span class="ph ph-globe-simple text-5xl"></span>
                            <strong class="heading5 mt-5">Global Market Coverage: </strong>
                            <p class="desc text-start text-secondary mt-2">FactView Research offers clients a worldwide perspective on market trends, opportunities, and challenges across a broad range of global marketplaces.</p>
                        </div>
                    </li>
                    <li>
                        <div class="flex flex-col items-start h-full p-7 bg-white border-2 border-line rounded-xl duration-500 shadow-md hover:border-black animate animate_top" style="--i: 2">
                            <span class="ph ph-user-sound text-5xl"></span>
                            <strong class="heading5 mt-5">Client-centric Approach: </strong>
                            <p class="desc text-start text-secondary mt-2">The main goal of our business is to satisfy our clients. We place a high value on open communication, work closely with our clients throughout the research process, and make sure that their goals and requirements are accomplished successfully.</p>
                        </div>
                    </li>
                    <li>
                        <div class="flex flex-col items-start h-full p-7 bg-white border-2 border-transparent rounded-xl duration-500 shadow-md hover:border-line animate animate_top" style="--i: 3">
                            <span class="ph ph-strategy text-5xl"></span>
                            <strong class="heading5 mt-5">Strategic Recommendations: </strong>
                            <p class="desc text-start text-secondary mt-2">Our research insights and analyses serve as the foundation for strategic recommendations that go beyond data analysis. Our knowledge enables clients to be proactive and take advantage of new opportunities.</p>
                        </div>
                    </li>

                    <li>
                        <div class="flex flex-col items-start h-full p-7 bg-white border-2 border-transparent rounded-xl duration-500 shadow-md hover:border-line animate animate_top" style="--i: 2">
                            <span class="ph ph-bug text-5xl"></span>
                            <strong class="heading5 mt-5">Ethical Standards: </strong>
                            <p class="desc text-start text-secondary mt-2">We uphold the highest ethical standards in all our research activities. Confidentiality, data privacy, and integrity are paramount, ensuring that sensitive information is handled with utmost care.</p>
                        </div>
                    </li>
                    <li>
                        <div class="flex flex-col items-start h-full p-7 bg-white border-2 border-line rounded-xl duration-500 shadow-md hover:border-black animate animate_top" style="--i: 3">
                            <span class="ph ph-clock-counter-clockwise text-5xl"></span>
                            <strong class="heading5 mt-5">Timely Delivery: </strong>
                            <p class="desc text-start text-secondary mt-2">We are aware of how critical time is in the world of business. We at FactView Research are dedicated to providing research insights and reports on time without sacrificing quality.</p>
                        </div>
                    </li>
                </ul> -->
                @if (isset($whyusData))
                    @foreach ($whyusData as $whyus)
                        <p class="body2 mt-10 animate animate_top" style="--i: 1">{!! html_entity_decode($whyus->content) !!}</p>
                    @endforeach
                @endif
            </div>
        </section>

        <!-- Testimonials -->
        @include('front.testimonial-section')


@endsection
