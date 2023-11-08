@extends('front.layout')
@section('title', 'Payment Cancel')
@section('frontpage')


    <!-- 404 PAGE
            ================================================== -->
    <section class="error-box bg-img" data-overlay-dark="0" data-background="{{ asset('front/img/bg/bg4.jpg') }}">
        <div class="container">
            <div class="error-box-text">
                <h3>Sorry Your Payment Not Recieved</h3>
                <h4>We have recieved your enquiry for <span class="text-primary-use">"{{ $reports->heading }}"</span>. Our
                    Reprenstative Will Get Back To You.</h4>
                <div class="mt-1-9"><a href="{{ route('front.home') }}" class="butn"><span>Back Home</span></a></div>
            </div>
        </div>
    </section>

@endsection
