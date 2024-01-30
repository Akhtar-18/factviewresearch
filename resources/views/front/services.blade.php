@extends('front.layout')
@section('title', 'Market Research Services, Competitive Services')
@section('frontpage')

    <!-- PAGE TITLE
                ================================================== -->
    <section class="page-title-section pt-1-9 pb-1-9 bg-primary">
        <div class="container">

            <div class="row">
                <div class="col-md-12">
                    <ul class="ps-0">
                        <li><a href="{{ route('front.home') }}">Home</a></li>
                        <li><a href="{{ route('front.services') }}" class="text-white">Services</a></li>
                    </ul>
                </div>
            </div>

        </div>
    </section>

    <!-- WE OFFER
                ================================================== -->
    <section>
        <div class="container">
            <div class="col-md-12 text-center">
                <br />
                <h1 class="text-primary">Market Research Services, Competitive Services</h1>
                <br />
            </div>
            <div class="row mt-n1-9">
                @if (count($services) > 0)
                    @foreach ($services as $key => $service)
                        <div class="col-md-4 col-lg-4 mt-1-9">
                            <div class="service-simple">
                                <div class="service-simple-inner">
                                    <h3 class="display-28">{{ $service->heading }}</h3>
                                    <div class="separator-line-horrizontal-full bg-medium-gray mt-2 mb-4"></div>
                                    <p>{!! html_entity_decode(wordLimit($service->content)) !!}</p>
                                    <a href="{{ route('front.service-single', $service->slug) }}"
                                        class="butn small"><span>Know More</span></a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section>

    @include('front.testimonial-section')
    @include('front.client-section')
@endsection
