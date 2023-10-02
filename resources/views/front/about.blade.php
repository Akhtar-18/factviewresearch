@extends('front.layout')
@section('title', 'FactView Research | About Us')
@section('frontpage')

    <!-- PAGE TITLE
                        ================================================== -->
    <section class="page-title-section pt-1-9 pb-1-9 bg-primary">
        <div class="container">

            <div class="row">
                <div class="col-md-12">
                    <ul class="ps-0">
                        <li><a href="{{ route('front.home') }}">Home</a></li>
                        <li><a href="{{ route('front.about') }}" class="text-white">About Us</a></li>
                    </ul>
                </div>
            </div>

        </div>
    </section>

    <!-- ABOUT
                        ================================================== -->
    <section class="md">
        <div class="container">
            <div class="col-md-12 text-center">
                <br />
                <h1 class="text-primary">FactView Research | About Us</h1>
                <br />
            </div>
            @if ($aboutData)
                @foreach ($aboutData as $about)
                    <div class="ps-lg-1-9">
                        <!-- <h4 class="h3 mb-4">{{ $about->heading }}</h4> -->
                        {{-- $about->content --}}
                        {!! html_entity_decode($about->content) !!}
                    </div>
                @endforeach
            @endif
        </div>
    </section>


    @include('front.testimonial-section')
    @include('front.client-section')


@endsection
