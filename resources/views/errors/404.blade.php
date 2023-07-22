@extends('front.layout')
@section('title', '404 Page')
@section('frontpage')


        <!-- 404 PAGE
        ================================================== -->
        <section class="error-box bg-img" data-overlay-dark="0" data-background="{{asset('front/img/bg/bg4.jpg')}}">
            <div class="container">
                <div class="error-box-text">
                    <h1>404</h1>
                    <h3>Page not Found</h3>
                    <h4>We're sorry, Please try one of the following Pages.</h4>
                    <div class="mt-1-9"><a href="{{ route('front.home') }}" class="butn"><span>Back Home</span></a></div>
                </div>
            </div>
        </section>

        @endsection
        