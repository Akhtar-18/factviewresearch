@extends('front.layout')
@section('title', 'Service Name')
@section('frontpage')

    <!-- PAGE TITLE
            ================================================== -->
    <section class="page-title-section2 bg-img cover-background" data-overlay-dark="7"
        data-background="{{ asset('front/img/bg/bg5.jpg') }}">
        <div class="container">

            <div class="row">
                <div class="col-md-12">
                    <h1>Services</h1>
                </div>
                <div class="col-md-12">
                    <ul class="ps-0">
                        <li><a href="{{ route('front.home') }}">Home</a></li>
                        <li><a href="{{ route('front.service-single', $services->id) }}">{{ $services->heading }}</a></li>
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
                <h4 class="h3 mb-4">
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
