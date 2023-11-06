<!-- TESTIMONIAL
        ================================================== -->
<section class="parallax box-hover">
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
</section>
