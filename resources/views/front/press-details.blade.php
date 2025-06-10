@extends('front.layout')
@section('title', 'Press Release Details')
@section('frontpage')

<!-- Blog Detail -->
<section class="blog_detail sm:py-20 py-10">
    <div class="container flex max-lg:flex-col gap-y-12">
        <div class="blog_content lg:pr-20">
            <h2 class="heading2 title">{{ $press->heading }}</h2>
            <div class="mt-4">
                <div class="flex flex-wrap items-center gap-4">
                    <div class="flex items-center gap-3">
                        <img src="https://ik.imagekit.io/9sqym9p8y/@inabilansari/profile.svg" loading="lazy" alt="avatar/IMG-10" class="flex-shrink-0 w-9 h-9 rounded-full overflow-hidden" />
                        <span>
                            <span class="text-placehover">by </span>
                            <span class="blog_author">FactView Research</span>
                        </span>
                    </div>
                    <div class="line w-px h-4 bg-line"></div>
                    <div class="date flex items-center gap-2">
                        <span class="ph ph-calendar-blank text-xl"></span>
                        <span class="blog_date caption1">{{ date('D M Y', strtotime($press->created_at)) }}</span>
                    </div>
                </div>
            </div>
            <img src="{{ $press->image }}" alt="@if (isset($press->image_alt)) {{ $press->image_alt }} @endif" class="blog_img w-full md:mt-7 mt-7 rounded-xl" />
            <p class="body2 md:mt-10 mt-7">
                {!! html_entity_decode($press->description) !!}
            </p>

            <div class="action md:mt-10 mt-7">
                <div class="list_social flex items-center gap-3 flex-wrap">
                    <span>Share:</span>
                    <ul class="list list_social flex flex-wrap items-center gap-2">
                        <li>
                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(Request::url()) }}" target="_blank" class="facebook w-10 h-10 flex items-center justify-center rounded-full duration-300 text-white hover:bg-primary hover:text-white">
                                <span class="ph ph-facebook-logo text-xl duration-100"></span>
                            </a>
                        </li>

                        <li>
                            <a href="https://www.linkedin.com/shareArticle?url={{ urlencode(Request::url()) }}&title={{ urlencode($press->heading) }}" target="_blank" class="linkedin w-10 h-10 flex items-center justify-center rounded-full duration-300 text-white hover:bg-primary hover:text-white">
                                <span class="ph ph-linkedin-logo text-xl duration-100"></span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

        </div>

        <div class="footerend"></div>
    </div>
</section>

@endsection