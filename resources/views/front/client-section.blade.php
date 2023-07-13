<!-- CLIENTS
        ================================================== -->
        <section class="bg-light box-hover">
            <div class="container">
                <div class="section-heading">
                    <h2>Our Clients</h2>
                </div>
                <div class="position-relative">
                    <div class="owl-carousel owl-theme clients" id="clients">
                        @if(getClient())
                        @foreach(getClient() as $client)
                        <div class="item"><img alt="partner-image" src="{{ asset('clients/images/') }}/{{$client->image}}"></div>
                        @endforeach
                        @endif
                        <!-- <div class="item"><img alt="partner-image" src="{{ asset('front/img/partners/client-02.png') }}"></div>
                        <div class="item"><img alt="partner-image" src="{{ asset('front/img/partners/client-03.png') }}"></div>
                        <div class="item"><img alt="partner-image" src="{{ asset('front/img/partners/client-04.png') }}"></div>
                        <div class="item"><img alt="partner-image" src="{{ asset('front/img/partners/client-05.png') }}"></div>
                        <div class="item"><img alt="partner-image" src="{{ asset('front/img/partners/client-06.png') }}"></div> -->
                    </div>
                </div>
            </div>
        </section>