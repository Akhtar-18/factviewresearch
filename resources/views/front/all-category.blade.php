@extends('front.layout')
@section('title', 'Market Research All Industry, Competitive All Industry')
@section('frontpage')

<!-- PAGE TITLE
                ================================================== -->
<section class="page-title-section pt-1-9 pb-1-9 bg-primary">
    <div class="container">

        <div class="row">
            <div class="col-md-12">
                <ul class="ps-0">
                    <li><a href="{{ route('front.home') }}">Home</a></li>
                    <li><a href="{{ route('front.all-category') }}" class="text-white">Industry</a></li>
                </ul>
            </div>
        </div>

    </div>
</section>

<!-- WE OFFER
                ================================================== -->

<section class="box-hover">
    <div class="container">
        <div class="section-heading">
            <br />
            <h1 class="text-primary">Market Research Industry, Competitive Industry</h1>
            <br />
        </div>
        <div class="position-relative">
            <div class="row mt-n4">
                @if (count($category) > 0)
                @foreach ($category as $key => $row)
                <div class="col-lg-4 mt-4">
                    <div class="feature-box-01">
                        <h3 class="display-28 mt-3">{{ $row->cat_name }}</h3>
                        <a href="{{ route('front.reportcategory', gerenaretslug(strtolower($row->cat_name))) }}" class="butn small"><span>Know More</span></a>
                    </div>
                </div>
                @endforeach
                @endif
            </div>
        </div>
    </div>
</section>


@include('front.testimonial-section')
@include('front.client-section')
@endsection