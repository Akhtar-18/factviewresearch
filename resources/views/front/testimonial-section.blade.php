<!-- TESTIMONIAL
        ================================================== -->

<section class="wow fadeIn box-hover">
    <div class="container">
        <div class="section-heading">
            <h2 class="font-weight-600">Testimonials</h2>
        </div>
        <div class="position-relative carousel-style3">
            <div class="owl-carousel">
                @if (getTestimonial())
                    @foreach (getTestimonial() as $testimonial)
                        <div class="testimonial-style4 text-center">
                            <img src="{{ asset('testimonials/client_image/') }}/{{ $testimonial->client_image }}"
                                alt="..." class="d-inline-block">
                            <p class="my-4">{!! html_entity_decode($testimonial->comments) !!}</p>
                            <span
                                class="name font-weight-600 text-uppercase font-size12 alt-font small">{{ $testimonial->name }}
                                - {{ $testimonial->profile }}</span>
                            <span class="quote font-weight-600 text-uppercase d-block alt-font opacity2">“</span>
                        </div>
                    @endforeach
                @endif


            </div>

        </div>

    </div>
</section>

<!-- <section class="parallax box-hover">
    <div class="container">
        <div class="section-heading">
            <h2>Testimonials</h2>
        </div>
        <div class="position-relative">
            <div class="owl-carousel owl-theme">
                @if (getTestimonial())
                    @foreach (getTestimonial() as $testimonial)
<div class="testmonial-single">
                            <p class="text-light-gray">{!! html_entity_decode($testimonial->comments) !!}</p>
                            <img src="{{ asset('testimonials/client_image/') }}/{{ $testimonial->client_image }}"
                                class="rounded-circle" style="width: 100px;" alt="...">
                            <h4 class="pt-4 text-white">{{ $testimonial->name }}</h4>
                            <h6 class="mb-1-9">{{ $testimonial->profile }}</h6>
                        </div>
@endforeach
                @endif
            </div>
        </div>
    </div>
</section> -->
