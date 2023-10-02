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
                        <li><a href="{{ route('front.service-single', $services->slug) }}"
                                class="text-white">{{ $services->heading }}</a></li>
                    </ul>
                </div>
            </div>

        </div>
    </section>

    <!-- SERVICES DETAILS
                ================================================== -->
    <section class="md">
        <div class="container">
            <div class="ps-lg-1-9">
                <h4 class="h3 mb-4 text-primary">
                    @if (isset($services->heading))
                        {{ $services->heading }}
                    @endif
                </h4>
                {{-- $about->content --}}
                {!! html_entity_decode($services->content) !!}
            </div>
        </div>
    </section>

    @include('front.testimonial-section')
    @include('front.client-section')

@endsection
