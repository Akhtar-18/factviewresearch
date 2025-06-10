@extends('front.layout')
@section('title', 'Press Releases')
@section('frontpage')


        <!-- Breadcrumb -->
        <section class="breadcrumb">
            <div class="breadcrumb_inner blog_style relative sm:py-20 py-10">
                <div class="container relative h-full animate animate_top" style="--i: 1">
                    <div class="breadcrumb_content flex flex-col items-start justify-center xl:w-[1000px] lg:w-[848px] md:w-5/6 w-full h-full">
                        <h3 class="heading3 text-white mb-2">Press Releases</h3>
                        <div class="list_breadcrumb flex items-center gap-2">
                            <a href="{{ route('front.home') }}" class="caption1 text-white"><i class="ph ph-house"></i></a>
                            <span class="caption1 text-white opacity-40">/</span>
                            <span class="caption1 text-white opacity-40">Insights</span>
                            <span class="caption1 text-white opacity-40">/</span>
                            <span class="caption1 text-white opacity-40">Press Releases</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- List blogs -->
        <div class="blogs blog_page relative lg:py-16 sm:py-14 py-10">
            <div class="container flex max-lg:flex-col gap-y-12">
                <div class="list lg:pr-20" id="lists">
                    @include('front.ajax.press-releases')
                   
                </div>
                <div class="blog_sidebar relative flex-shrink-0 lg:w-[360px] w-full h-fit">
                    <div class="sidebarsticky">
                    <form class="form-search overflow-hidden relative w-full h-12 rounded-lg">
                        <input class="py-2 pl-4 pr-16 w-full h-full border border-line rounded-lg" type="text" placeholder="Search" required />
                        <button class="flex items-center justify-center absolute top-0 right-0 h-full aspect-square rounded-r-lg bg-primary text-white duration-300 hover:bg-black">
                            <span class="ph ph-magnifying-glass text-lg"></span>
                        </button>
                    </form>
                    <div class="free_sample_block about mt-7.5 overflow-hidden rounded-xl bg-surface duration-300">
                        <div class="text-center px-5 py-3 border-b border-line">
                            <h6 class="heading6">Get In Touch with Us</h6>
                        </div>
                        <div class="employer_info text-center p-5 pt-3">
                            <p class="mb-3">The free sample includes data points such as market estimates, growth rate, size of the largest region and segment of the market.</p>
                            <a href="tel:@if (getCompanyDetail())
                                {{ getCompanyDetail()->no_prefix }}{{ getCompanyDetail()->contact_no }}
                            @endif" class="button-main bg-dark w-full text-center blinking"><i class="ph ph-phone-call body1 mr-1"></i>@if (getCompanyDetail())
                                {{ getCompanyDetail()->no_prefix }}{{ getCompanyDetail()->contact_no }}
                            @endif</a>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="footerend"></div>
            </div>
        </div>


        <script>
        $(document).ready(function() {
            $(document).on('click', '.pager a', function(event) {
                event.preventDefault();
                var page = $(this).attr('href').split('page=')[1];
                fetch_blogs(page);
            });

            function fetch_blogs(page) {
                $.ajax({
                    url: "fetch_press?page=" + page,
                    success: function(data) {
                        //console.log(data);
                        $('#lists').html(data);
                    }
                });
            }

        });
    </script>


@endsection