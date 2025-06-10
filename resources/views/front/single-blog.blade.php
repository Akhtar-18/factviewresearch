@extends('front.layout')
@section('title', 'Blog Details')
@section('frontpage')

        <!-- Blog Detail -->
        <section class="blog_detail sm:py-20 py-10">
            <div class="container flex max-lg:flex-col gap-y-12">
                <div class="blog_content lg:pr-20">
                    <h2 class="heading2 title">{{ $blog->heading }}</h2>
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
                                <span class="blog_date caption1">{{ date('D M Y', strtotime($blog->created_at)) }}</span>
                            </div>
                        </div>
                    </div>
                    <img src="{{ asset('blogs') }}/{{ $blog->image }}" alt="@if (isset($blog->image_alt)) {{ $blog->image_alt }} @endif" class="blog_img w-full md:mt-7 mt-7 rounded-xl" />
                    <p class="body2 md:mt-10 mt-7">
                       {!! html_entity_decode($blog->description) !!}
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
                                <!-- <li>
                                    <a href="https://www.instagram.com/" target="_blank" class="twitter w-10 h-10 flex items-center justify-center rounded-full duration-300 text-white hover:bg-primary hover:text-white">
                                        <span class="ph ph-x-logo text-xl duration-100"></span>
                                    </a>
                                </li> -->
                                <li>
                                    <a href="https://www.linkedin.com/shareArticle?url={{ urlencode(Request::url()) }}&title={{ urlencode($blog->heading) }}" target="_blank" class="linkedin w-10 h-10 flex items-center justify-center rounded-full duration-300 text-white hover:bg-primary hover:text-white">
                                        <span class="ph ph-linkedin-logo text-xl duration-100"></span>
                                    </a>
                                </li>
                                <!-- <li>
                                    <a href="https://www.youtube.com/" target="_blank" class="email w-10 h-10 flex items-center justify-center rounded-full duration-300 text-white hover:bg-primary hover:text-white">
                                        <span class="ph ph-envelope text-xl duration-100"></span>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://www.youtube.com/" target="_blank" class="whatsapp w-10 h-10 flex items-center justify-center rounded-full duration-300 text-white hover:bg-primary hover:text-white">
                                        <span class="ph ph-whatsapp-logo text-xl duration-100"></span>
                                    </a>
                                </li> -->
                            </ul>
                        </div>
                    </div>

                </div>
                <div class="blog_sidebar lg:sticky lg:top-24 flex-shrink-0 lg:w-[360px] w-full h-fit">
                    <form class="form-search overflow-hidden relative w-full h-12 rounded-lg">
                        <input class="py-2 pl-4 pr-16 w-full h-full border border-line rounded-lg" type="text" placeholder="Search" required />
                        <button class="flex items-center justify-center absolute top-0 right-0 h-full aspect-square rounded-r-lg bg-primary text-white duration-300 hover:bg-black">
                            <span class="ph ph-magnifying-glass text-lg"></span>
                        </button>
                    </form>
                    <div class="recent md:mt-7 mt-7">
                        <h6 class="heading6">Recent Posts</h6>
                        <ul class="list-recent mt-4">
                            @if($recent_blog)
                            <li class="blog_item outstanding_blog">
                                <a href="{{ route('front.blog', $recent_blog->url) }}" class="blog_thumb block w-full rounded-lg overflow-hidden">
                                    <img src="{{ $recent_blog->image }}" alt="@if (isset($recent_blog->image_alt)) {{ $recent_blog->image_alt }} @endif" class="blog_img w-full" />
                                </a>
                                <div class="mt-5 mb-1">
                                    <div class="date flex items-center gap-2">
                                        <span class="ph ph-calendar-blank text-xl"></span>
                                        <span class="blog_date caption1">{{ date('M d, Y', strtotime($recent_blog->created_at)) }}</span>
                                    </div>
                                </div>
                                <a href="{{ route('front.blog', $recent_blog->url) }}" class="blog_name heading6 duration-300 hover:text-primary">{{ $recent_blog->heading }}</a>
                            </li>
                            @endif
                            <div class="sidebarsticky">
                            @foreach($latest as $list)
                            <li class="blog_item flex gap-4 mt-4 pt-4 border-t border-line">
                                <a href="{{ route('front.blog', $list->url) }}" class="blog_thumb block flex-shrink-0 w-[100px] h-fit rounded overflow-hidden">
                                    <img src="{{ $list->image }}" alt="@if (isset($list->image_alt)) {{ $list->image_alt }} @endif" class="blog_img w-full" />
                                </a>
                                <div>
                                    <a href="{{ route('front.blog', $list->url) }}" class="blog_name text-button duration-300 hover:text-primary" style="line-height:20px;">{{ $list->heading }}</a>
                                    <div class="mt-1">
                                        <span class="blog_date caption1">{{ date('M d, Y', strtotime($list->created_at)) }}</span>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                            <!-- <li class="blog_item flex gap-4 mt-4 pt-4 border-t border-line">
                                <a href="single-blog.php" class="blog_thumb block flex-shrink-0 w-[100px] h-fit rounded overflow-hidden">
                                    <img src="https://ik.imagekit.io/9sqym9p8y/@inabilansari/image.svg" alt="blog/7" class="blog_img w-full" />
                                </a>
                                <div>
                                    <a href="single-blog.php" class="blog_name text-button duration-300 hover:text-primary" style="line-height:20px;">Crafting Compelling Digital Narratives</a>
                                    <div class="mt-1">
                                        <span class="blog_date caption1">February 28, 2024</span>
                                    </div>
                                </div>
                            </li>
                            <li class="blog_item flex gap-4 mt-4 pt-4 border-t border-line">
                                <a href="single-blog.php" class="blog_thumb block flex-shrink-0 w-[100px] h-fit rounded overflow-hidden">
                                    <img src="https://ik.imagekit.io/9sqym9p8y/@inabilansari/image.svg" alt="blog/6" class="blog_img w-full" />
                                </a>
                                <div>
                                    <a href="single-blog.php" class="blog_name text-button duration-300 hover:text-primary" style="line-height:20px;">The Role of Empathy in UX/UI Design</a>
                                    <div class="mt-1.">
                                        <span class="blog_date caption1">February 28, 2024</span>
                                    </div>
                                </div>
                            </li>
                            <li class="blog_item flex gap-4 mt-4 pt-4 border-t border-line">
                                <a href="single-blog.php" class="blog_thumb block flex-shrink-0 w-[100px] h-fit rounded overflow-hidden">
                                    <img src="https://ik.imagekit.io/9sqym9p8y/@inabilansari/image.svg" alt="blog/10" class="blog_img w-full" />
                                </a>
                                <div>
                                    <a href="single-blog.php" class="blog_name text-button duration-300 hover:text-primary" style="line-height:20px;">Strategies for Seamless Digital Journeys</a>
                                    <div class="mt-1">
                                        <span class="blog_date caption1">February 28, 2024</span>
                                    </div>
                                </div>
                            </li> -->
                            </div>
                        </ul>
                    </div>
                </div>
                <div class="footerend"></div>
            </div>
        </section>

@endsection