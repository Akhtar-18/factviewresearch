@if (getTestimonial())
        <section class="testimonials relative z-2 lg:py-14 sm:py-14 py-10 bg-surface">
            <div class="container">
                <h3 class="heading3 text-center animate animate_top" style="--i: 1">What Say Our Client's!</h3>
                <p class="body2 text-secondary text-center mt-1 animate animate_top" style="--i: 2">Discover exceptional experiences through testimonials from our satisfied customers.</p>
                <div class="list-testimonials -style-3">
                    @foreach (getTestimonial() as $testimonial)
                    <div class="testimonials_slide">
                        <div class="testimonials_item animate animate_top" style="--i: 1">
                            <div class="inner flex max-sm:flex-col items-start gap-6 p-8 rounded-lg bg-white duration-300 shadow-md">
                                <div class="testimonials_avatar flex-shrink-0 w-[100px] h-[100px] rounded-full overflow-hidden">
                                    <img src="{{ $testimonial->client_image }}" alt="{{ $testimonial->name }}" class="w-full h-full object-cover" />
                                </div>
                                <div class="testimonials_info w-full">
                                    <strong class="text-title">{!! html_entity_decode($testimonial->comments) !!}</strong>
                                    <div class="flex items-center justify-between mt-4">
                                        <div class="testimonials_user">
                                            <h6 class="testimonials_name heading6">{{ $testimonial->name }}</h6>
                                            <span class="caption1 text-secondary">{{ $testimonial->profile }}</span>
                                        </div>
                                        <span class="ph ph-quotes text-5xl opacity-10 duration-300"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                     @endforeach
                    <!-- <div class="testimonials_slide">
                        <div class="testimonials_item animate animate_top" style="--i: 1">
                            <div class="inner flex max-sm:flex-col items-start gap-6 p-8 rounded-lg bg-white duration-300 shadow-md">
                                <div class="testimonials_avatar flex-shrink-0 w-[100px] h-[100px] rounded-full overflow-hidden">
                                    <img src="https://ik.imagekit.io/0g6xszoan/testimonials/20231126115941.jpg" alt="IMG-1" class="w-full h-full object-cover" />
                                </div>
                                <div class="testimonials_info w-full">
                                    <strong class="text-title">Choosing FreelanHub was the best decision we made for our business. Their expertise in SEO and digital marketing has significantly boosted our traffic.</strong>
                                    <div class="flex items-center justify-between mt-4">
                                        <div class="testimonials_user">
                                            <h6 class="testimonials_name heading6">Emily Johnson</h6>
                                            <span class="caption1 text-secondary">Head of Recruitment</span>
                                        </div>
                                        <span class="ph ph-quotes text-5xl opacity-10 duration-300"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="testimonials_slide">
                        <div class="testimonials_item animate animate_top" style="--i: 1">
                            <div class="inner flex max-sm:flex-col items-start gap-6 p-8 rounded-lg bg-white duration-300 shadow-md">
                                <div class="testimonials_avatar flex-shrink-0 w-[100px] h-[100px] rounded-full overflow-hidden">
                                    <img src="https://ik.imagekit.io/0g6xszoan/testimonials/20231126115941.jpg" alt="IMG-1" class="w-full h-full object-cover" />
                                </div>
                                <div class="testimonials_info w-full">
                                    <strong class="text-title">Choosing FreelanHub was the best decision we made for our business. Their expertise in SEO and digital marketing has significantly boosted our traffic.</strong>
                                    <div class="flex items-center justify-between mt-4">
                                        <div class="testimonials_user">
                                            <h6 class="testimonials_name heading6">Emily Johnson</h6>
                                            <span class="caption1 text-secondary">Head of Recruitment</span>
                                        </div>
                                        <span class="ph ph-quotes text-5xl opacity-10 duration-300"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="testimonials_slide">
                        <div class="testimonials_item animate animate_top" style="--i: 1">
                            <div class="inner flex max-sm:flex-col items-start gap-6 p-8 rounded-lg bg-white duration-300 shadow-md">
                                <div class="testimonials_avatar flex-shrink-0 w-[100px] h-[100px] rounded-full overflow-hidden">
                                    <img src="https://ik.imagekit.io/0g6xszoan/testimonials/20231126115941.jpg" alt="IMG-1" class="w-full h-full object-cover" />
                                </div>
                                <div class="testimonials_info w-full">
                                    <strong class="text-title">Choosing FreelanHub was the best decision we made for our business. Their expertise in SEO and digital marketing has significantly boosted our traffic.</strong>
                                    <div class="flex items-center justify-between mt-4">
                                        <div class="testimonials_user">
                                            <h6 class="testimonials_name heading6">Emily Johnson</h6>
                                            <span class="caption1 text-secondary">Head of Recruitment</span>
                                        </div>
                                        <span class="ph ph-quotes text-5xl opacity-10 duration-300"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
        </section>
        @endif