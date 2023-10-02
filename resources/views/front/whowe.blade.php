@extends('front.layout')
@section('title', 'Who We Are | FactView Research')
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
                        <li><a href="{{ route('front.whowe') }}" class="text-white">Who We Are</a></li>
                    </ul>
                </div>
            </div>

        </div>
    </section>



    <!-- WHO WE ARE
                            ================================================== -->
    <section class="md">
        <div class="container">
            <div class="col-md-12 text-center">
                <br />
                <h1 class="text-primary">Who We Are | FactView Research</h1>
                <br />
            </div>
            @if ($whoweData)
                @foreach ($whoweData as $whowe)
                    <div class="ps-lg-1-9">
                        <!-- <h4 class="h3 mb-4">{{ $whowe->heading }}</h4> -->
                        {{-- $whowe->content --}}
                        {!! html_entity_decode($whowe->content) !!}
                    </div>
                @endforeach
            @endif
        </div>
    </section>

    @include('front.testimonial-section')
    @include('front.client-section')
@endsection
