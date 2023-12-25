<!-- CLIENTS
        ================================================== -->
        @if (getClient())
<section class="bg-light box-hover pt-4">
    <div class="container">
        <div class="section-heading">
            <h2>Our Clients</h2>
        </div>
        <div class="position-relative">
            <div class="owl-carousel owl-theme clients" id="clients">
                @if (getClient())
                    @foreach (getClient() as $client)
                        <div class="item"><img alt="partner-image" src="{{ $client->image }}?tr=w-165,h-50,fo-webp,cm-pad_resize" width="165" height="50" loading="lazy"></div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</section>
@endif
