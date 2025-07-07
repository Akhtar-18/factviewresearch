@extends('front.layout')
@section('title', 'Clients Testimonials')
@section('frontpage')

        <!-- Breadcrumb -->
        <section class="breadcrumb">
            <div class="breadcrumb_inner report_bg bg-[#091E33] relative py-10">
                <div class="container relative h-full animate animate_top" style="--i: 1">
                    <div class="breadcrumb_content flex flex-col items-start justify-center xl:w-[1000px] lg:w-[848px] md:w-5/6 w-full h-full">
                        <h3 class="heading3 text-white mb-2">What Say Our Client's!</h3>
                        <div class="list_breadcrumb flex items-center gap-2">
                            <a href="{{ route('front.home') }}" class="caption1 text-white"><i class="ph ph-house"></i></a>
                            <span class="caption1 text-white opacity-40">/</span>
                            <a href="{{ route('front.about') }}" class="caption1 text-white"><span class="caption1 text-white">Company</span></a>
                            <span class="caption1 text-white opacity-40">/</span>
                            <a href="{{ route('front.testimonials') }}" class="caption1 text-white"><span class="caption1 text-white">Testimonials</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Testimonials -->
        @if (getTestimonial())
        <section class="testimonials relative z-2 lg:py-14 sm:py-14 py-10 bg-surface">
            <div class="container">
                <div class="grid lg:grid-cols-2 gap-7.5">
                    @foreach (getTestimonial() as $testimonial)
                    <div class="testimonials_slide">
                        <div class="testimonials_item animate animate_top" style="--i: 1">
                            <div class="inner flex max-sm:flex-col items-start gap-6 p-8 rounded-lg bg-white duration-300 shadow-md">
                                <div class="testimonials_avatar flex-shrink-0 w-[100px] h-[100px] rounded-full overflow-hidden">
                                    <img src="{{ $testimonial->client_image }}" alt="{{ $testimonial->name }}" class="w-full h-full object-cover" />
                                </div>
                                <div class="testimonials_info w-full">
                                    <strong class="text-title">{!! html_entity_decode($testimonial->comments) !!}</strong>
                                    <div class="flex items-center justify-between mt-4">
                                        <div class="testimonials_user">
                                            <h6 class="testimonials_name heading6">{{ $testimonial->name }}</h6>
                                            <span class="caption1 text-secondary">{{ $testimonial->profile }}</span>
                                        </div>
                                        <span class="ph ph-quotes text-5xl opacity-10 duration-300"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
        @endif

@endsection
