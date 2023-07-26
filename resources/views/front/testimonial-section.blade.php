<!-- TESTIMONIAL
        ================================================== -->
        <section class="parallax box-hover" data-overlay-dark="8" data-background="{{ asset('front/img/bg/bg8.jpg') }}">
            <div class="container">
                <div class="section-heading">
                    <h2 class="text-white">Testimonials</h2>
                </div>
                <div class="position-relative">
                    <div class="owl-carousel owl-theme">
                        @if(getTestimonial())
                        @foreach(getTestimonial() as $testimonial)
                        <div class="testmonial-single mx-auto w-95 w-lg-65">
                            <p class="text-light-gray">{!! html_entity_decode($testimonial->comments) !!}</p>
                            <h4 class="pt-4 text-white">{{$testimonial->name}}</h4>
                            <h6 class="mb-1-9">{{$testimonial->profile}}</h6>
                        </div>
                        @endforeach
                        @endif
                        <!-- <div class="testmonial-single mx-auto w-95 w-lg-65">
                            <p class="text-light-gray">Exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa.</p>
                            <h4 class="pt-4 text-white">Stepha Kruse</h4>
                            <h6 class="mb-1-9">Design Lead</h6>
                        </div>
                        <div class="testmonial-single mx-auto w-95 w-lg-65">
                            <p class="text-light-gray">Exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa.</p>
                            <h4 class="pt-4 text-white">Dunican keithly</h4>
                            <h6 class="mb-1-9">Networking Lead</h6>
                        </div> -->
                    </div>
                </div>
            </div>
        </section>
