<!-- TESTIMONIAL
        ================================================== -->
<section class="parallax box-hover" data-overlay-dark="8" data-background="{{ asset('front/img/bg/bg8.jpg') }}">
    <div class="container">
        <div class="section-heading">
            <h2 class="text-white">Testimonials</h2>
        </div>
        <div class="position-relative">
            <div class="owl-carousel owl-theme">
                @if (getTestimonial())
                    @foreach (getTestimonial() as $testimonial)
                        <div class="testmonial-single mx-auto w-95 w-lg-65">
                            <p class="text-light-gray">{!! html_entity_decode($testimonial->comments) !!}</p>
                            <img src="{{ asset('testimonials/client_image/') }}/{{ $testimonial->client_image }}"
                                class="rounded-circle" style="width: 300px;" alt="...">
                            <h4 class="pt-4 text-white">{{ $testimonial->name }}</h4>
                            <h6 class="mb-1-9">{{ $testimonial->profile }}</h6>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</section>
