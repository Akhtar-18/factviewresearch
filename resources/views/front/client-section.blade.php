<!-- CLIENTS
        ================================================== -->
<section class="bg-light box-hover">
    <div class="container">
        <div class="section-heading">
            <h2>Our Clients</h2>
        </div>
        <div class="position-relative">
            <div class="owl-carousel owl-theme clients" id="clients">
                @if (getClient())
                    @foreach (getClient() as $client)
                        <div class="item"><img alt="partner-image"
                                src="{{ asset('clients/images/') }}/{{ $client->image }}"></div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</section>
