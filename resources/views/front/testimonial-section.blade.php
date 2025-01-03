<!-- TESTIMONIAL
        ================================================== -->
@if (getTestimonial())
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
                            @if($testimonial->client_image)
                            <img src="{{ $testimonial->client_image }}?tr=w-68,h-auto,fo-webp"
                            alt="{{ $testimonial->name }}" class="d-inline-block" loading="lazy" width="68" height="68">
                            @endif
                            <p class="my-2">{!! html_entity_decode($testimonial->comments) !!}</p>
                            <span
                                class="name font-weight-600 text-uppercase alt-font small">{{ $testimonial->name }}
                                - {{ $testimonial->profile }}</span>
                            <span class="quote font-weight-600 text-uppercase d-block alt-font opacity2">“</span>
                        </div>
                    @endforeach
                @endif


            </div>

        </div>

    </div>
</section>
@endif
