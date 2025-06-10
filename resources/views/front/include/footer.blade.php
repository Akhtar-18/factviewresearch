<!-- Scroll to top -->
        <button class="scroll-to-top-btn"><span class="ph-bold ph-caret-up"></span></button>

        <!-- Footer -->
        <footer class="footer relative z-2">
            <div class="footer_inner bg-feature">
                <div class="container">
                    <div class="footer_heading flex flex-wrap items-center justify-between gap-4 w-full md:pt-10 pt-7 md:pb-5 pb-4 border-b border-light">
                        <a href="{{ url('/') }}" class="footer_logo">
                            <img src="{{ getCompanyDetail()->company_logo }}?tr=w-auto,h-40,fo-auto" width="206" height="40" alt="logo-white" class="h-12" style="filter: brightness(0) invert(1)" />
                        </a>
                        <div class="list_social flex flex-wrap items-center gap-4">
                            <span class="text-button text-white">Follow Us:</span>
                            <div class="list flex flex-wrap items-center gap-3">
                                <a href="@if (getCompanyDetail()) {{ getCompanyDetail()->facebook }} @endif" target="_blank" aria-label="social" class="facebook w-10 h-10 flex items-center justify-center text-white rounded-full duration-300 hover:bg-white">
                                    <i class="ph ph-facebook-logo body1"></i>
                                    <span class="blind">link to facebook</span>
                                </a>
                                <a href="@if (getCompanyDetail()) {{ getCompanyDetail()->linkedin }} @endif" target="_blank" aria-label="social" class="linkedin w-10 h-10 flex items-center justify-center text-white rounded-full duration-300 hover:bg-white">
                                    <i class="ph ph-linkedin-logo body1"></i>
                                    <span class="blind">link to linkedin</span>
                                </a>
                                <a href="@if (getCompanyDetail()) {{ getCompanyDetail()->twitter }} @endif" target="_blank" aria-label="social" class="twitter w-10 h-10 flex items-center justify-center text-white rounded-full duration-300 hover:bg-white ">
                                    <i class="ph ph-x-logo body1"></i>
                                    <span class="blind">link to twitter</span>
                                </a>
                                <a href="@if (getCompanyDetail()) {{ getCompanyDetail()->instagram }} @endif" target="_blank" aria-label="social" class="instagram w-10 h-10 flex items-center justify-center text-white rounded-full duration-300 hover:bg-white">
                                    <i class="ph ph-instagram-logo body1"></i>
                                    <span class="blind">link to instagram</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="footer_content flex max-xl:flex-wrap items-start justify-between gap-y-8 md:py-10 py-7">
                        <div class="flex-shrink-0 max-xl:w-full">
                            <div class="company-contact sm:w-[340px]">
                                @if (aboutData())
                                    @foreach (aboutData() as $about)
                                <p class="text-placehover text-justify">{!! html_entity_decode(strip_tags(wordLimitset($about->content, 35))) !!}</p>
                                @endforeach
                                @endif
                                <!-- <strong class="heading block text-button text-white mt-5">Download App</strong> -->
                                <div class="list-download footer_secure mt-6"></div>
                            </div>
                        </div>
                        <div class="footer_nav max-md:w-1/2">
                            <strong class="nav_heading text-button text-white">Industries</strong>
                            <ul class="list_nav flex flex-col gap-1 mt-4">
                                @foreach (GetReportMenu() as $cate)
                                <li><a class="caption1 capitalize line-before line-white text-placehover hover:text-white duration-300" href="{{ route('front.reports')}}?id={{gerenaretslug(strtolower($cate->cat_name))}}">{{ $cate->cat_name }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="footer_nav max-md:w-1/2">
                            <strong class="nav_heading text-button text-white">Useful Links</strong>
                            <ul class="list_nav flex flex-col gap-1 mt-4">
                                <li><a class="caption1 capitalize line-before line-white text-placehover hover:text-white duration-300" href="{{ route('front.all-category') }}">Report Store</a></li>
                                <li><a class="caption1 capitalize line-before line-white text-placehover hover:text-white duration-300" href="{{ route('front.services') }}">Our Services</a></li>
                            </ul>
                            <strong class="nav_heading text-button text-white block mt-5">Insights</strong>
                            <ul class="list_nav flex flex-col gap-1 mt-4">
                                <li><a class="caption1 capitalize line-before line-white text-placehover hover:text-white duration-300" href="{{ route('front.blogs') }}">Blog</a></li>
                                <li><a class="caption1 capitalize line-before line-white text-placehover hover:text-white duration-300" href="{{ route('front.press-releases') }}">Press Releases</a></li>
                                <li><a class="caption1 capitalize line-before line-white text-placehover hover:text-white duration-300" href="{{ route('front.case-studies') }}">Case Studies</a></li>
                            </ul>
                        </div>
                        <div class="footer_nav max-md:w-1/2">
                            <strong class="nav_heading text-button text-white">About Company</strong>
                            <ul class="list_nav flex flex-col gap-2 mt-4">
                                <li><a class="caption1 capitalize line-before line-white text-placehover hover:text-white duration-300" href="{{ route('front.about') }}">About Us</a></li>
                                <li><a class="caption1 capitalize line-before line-white text-placehover hover:text-white duration-300" href="{{ route('front.whowe') }}">Who We Are</a></li>
                                <li><a class="caption1 capitalize line-before line-white text-placehover hover:text-white duration-300" href="{{ route('front.whyus') }}">Why Choose Us</a></li>
                                <li><a class="caption1 capitalize line-before line-white text-placehover hover:text-white duration-300" href="{{ route('front.testimonials') }}">Client Review's</a></li>
                                <li><a class="caption1 capitalize line-before line-white text-placehover hover:text-white duration-300" href="{{ route('front.partners') }}">Partners</a></li>
                            </ul>
                        </div>
                        <div class="footer_nav max-md:w-1/2">
                            <strong class="nav_heading text-button text-white">Support</strong>
                            <ul class="list_nav flex flex-col gap-2 mt-4">
                                <li><a class="caption1 capitalize line-before line-white text-placehover hover:text-white duration-300" href="{{ route('front.contact') }}">Help & Support</a></li>
                                <li><a class="caption1 capitalize line-before line-white text-placehover hover:text-white duration-300" href="{{ route('front.privacy-policy') }}">Privacy Policy</a></li>
                                <li><a class="caption1 capitalize line-before line-white text-placehover hover:text-white duration-300" href="{{ route('front.refund') }}">Refund Policy</a></li>
                                <li><a class="caption1 capitalize line-before line-white text-placehover hover:text-white duration-300" href="{{ route('front.disclaimer') }}">Disclaimer</a></li>
                                <li><a class="caption1 capitalize line-before line-white text-placehover hover:text-white duration-300" href="{{ route('front.terms') }}">Terms & Conditions</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="footer_bottom flex items-center justify-between max-sm:flex-col gap-2 py-3 ">
                        <div class="left-block flex items-center">
                            <div class="copyright text-placehover caption1 block">©2024 FactView Research. All Rights Reserved.</div>
                            <!--<small class="block">Unauthorized duplication or publication of any materials from this site is expressly prohibited.</small>-->
                        </div>
                        <div class="nav-link flex items-center gap-2.5">
                            <a class="text-placehover caption1 hover-underline" href="tel:@if (getCompanyDetail())
                                {{ getCompanyDetail()->no_prefix }}{{ getCompanyDetail()->contact_no }}
                            @endif">@if (getCompanyDetail())
                                {{ getCompanyDetail()->no_prefix }}{{ getCompanyDetail()->contact_no }}
                            @endif</a>
                            <span class="text-placehover caption1">|</span>
                            <a class="text-placehover caption1 hover-underline" href="mailto:@if (getCompanyDetail())
                                {{ getCompanyDetail()->email_address }}
                            @endif" target="_blank">@if (getCompanyDetail())
                                {{ getCompanyDetail()->email_address }}
                            @endif</a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

        <!-- Menu mobile -->
        <div class="menu_mobile">
            <button class="menu_mobile_close flex items-center justify-center absolute top-5 left-5 w-8 h-8 rounded-full bg-surface">
                <span class="ph-bold ph-x"></span>
            </button>
            <div class="heading flex items-center justify-center mt-5">
                <a href="{{ url('/') }}" class="logo">
                    <img src="{{ getCompanyDetail()->company_logo }}?tr=w-auto,h-38,fo-auto" width="196" height="38" alt="logo" class="h-9" />
                </a>
            </div>
            <form class="form-search relative mt-4 mx-5">
                <button class="absolute left-3 top-1/2 -translate-y-1/2 cursor-pointer">
                    <i class="ph ph-magnifying-glass text-xl block"></i>
                </button>
                <input type="text" placeholder="What are you looking for?" class="h-12 rounded-lg border border-line text-sm w-full pl-10 pr-4" required />
            </form>
            <div class="mt-4">
                <ul class="nav_mobile">
                    <li class="nav_item py-2">
                        <a href="{{ url('/') }}" class="text-xl font-semibold flex items-center justify-between">
                            Home
                        </a>
                    </li>
                    <li class="nav_item py-2">
                        <a href="#industries" class="text-xl font-semibold flex items-center justify-between">
                            Industries<span class="text-right"><i class="ph ph-caret-right text-xl"></i></span>
                        </a>
                        <div class="sub_nav_mobile">
                            <button class="back_btn flex items-center gap-3"><i class="ph ph-caret-left text-xl"></i> Back</button>
                            <div class="list-nav-item w-full pt-2 pb-6">
                                <ul>
                                    @foreach (GetReportMenu() as $cate)
                                    <li>
                                        <a href="{{ route('front.reports')}}?id={{gerenaretslug(strtolower($cate->cat_name))}}" class="inline-block text-xl font-semibold py-2 capitalize"> {{ $cate->cat_name }} </a>
                                    </li>
                                    @endforeach
                                    <li>
                                        <a href="{{ route('front.all-category') }}" class="inline-block text-xl font-semibold py-2 capitalize"> All Industries </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li class="nav_item py-2">
                        <a href="#services" class="text-xl font-semibold flex items-center justify-between">
                            Services<span class="text-right"><i class="ph ph-caret-right text-xl"></i></span>
                        </a>
                        <div class="sub_nav_mobile">
                            <button class="back_btn flex items-center gap-3"><i class="ph ph-caret-left text-xl"></i> Back</button>
                            <div class="list-nav-item w-full pt-2 pb-6">
                                @if (GetServiceMenu())
                                <ul>
                                    @foreach (GetServiceMenu() as $service)
                                    <li>
                                        <a href="{{ route('front.service-single', $service->slug) }}" class="inline-block text-xl font-semibold py-2 capitalize"> {{ $service->heading }} </a>
                                    </li>
                                    @endforeach
                                </ul>
                                @endif
                            </div>
                        </div>
                    </li>
                    <li class="nav_item py-2">
                        <a href="#company" class="text-xl font-semibold flex items-center justify-between">
                            About Us<span class="text-right"><i class="ph ph-caret-right text-xl"></i></span>
                        </a>
                        <div class="sub_nav_mobile">
                            <button class="back_btn flex items-center gap-3"><i class="ph ph-caret-left text-xl"></i> Back</button>
                            <div class="list-nav-item w-full pt-2 pb-6">
                                <ul>
                                    <li>
                                        <a href="{{ route('front.about') }}" class="inline-block text-xl font-semibold py-2 capitalize"> About Company </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('front.whowe') }}" class="inline-block text-xl font-semibold py-2 capitalize"> Who We Are </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('front.whyus') }}" class="inline-block text-xl font-semibold py-2 capitalize"> Why Choose us </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('front.testimonials') }}" class="inline-block text-xl font-semibold py-2 capitalize"> Client Testimonials </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('front.partners') }}" class="inline-block text-xl font-semibold py-2 capitalize"> Partners </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li class="nav_item py-2">
                        <a href="#insights" class="text-xl font-semibold flex items-center justify-between">
                            Media/Insights<span class="text-right"><i class="ph ph-caret-right text-xl"></i></span>
                        </a>
                        <div class="sub_nav_mobile">
                            <button class="back_btn flex items-center gap-3"><i class="ph ph-caret-left text-xl"></i> Back</button>
                            <div class="list-nav-item w-full pt-2 pb-6">
                                <ul>
                                    <li>
                                        <a href="{{ route('front.blogs') }}" class="inline-block text-xl font-semibold py-2 capitalize"> Blogs </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('front.press-releases') }}" class="inline-block text-xl font-semibold py-2 capitalize"> Press Releases </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('front.case-studies') }}" class="inline-block text-xl font-semibold py-2 capitalize"> Case Studies </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li class="nav_item py-2">
                        <a href="{{ route('front.contact') }}" class="text-xl font-semibold flex items-center justify-between">
                            Contact us
                        </a>
                    </li>

                    <div class="mt-8">
                        <p><a href="{{ route('front.contact') }}">Help & Support</a></p>
                        <p><a href="{{ route('front.privacy-policy') }}">Privacy Policy</a></p>
                        <p><a href="{{ route('front.refund') }}">Refund Policy</a></p>
                        <p><a href="{{ route('front.disclaimer') }}">Disclaimer</a></p>
                        <p><a href="{{ route('front.terms') }}">Terms & Conditions</a></p>
                    </div>
                </ul>
            </div>
        </div>

        <script type="text/javascript" type="text/javascript" src="{{ asset('front/assets/js/phosphor-icons.js')}}"></script>
        <script type="text/javascript" src="{{ asset('front/assets/js/slick.min.js')}}"></script>
        <!--<script src="assets/js/leaflet.js'"></script>-->
        <script type="text/javascript" src="{{ asset('front/assets/js/swiper-bundle.min.js')}}"></script>
        <script type="text/javascript" src="{{ asset('front/assets/js/main.js')}}"></script>

<script type="text/javascript">
$(document).ready(function () {
  var $window = $(window);
  var $sidebar = $(".sidebarsticky");
  var $sidebarHeight = $sidebar.innerHeight();
  var $footerOffsetTop = $(".footerend").offset().top;
  var $sidebarOffset = $sidebar.offset();

  $window.scroll(function () {
    if ($window.scrollTop() > $sidebarOffset.top) {
      $sidebar.addClass("fixed");
    } else {
      $sidebar.removeClass("fixed");
    }
    if ($window.scrollTop() + $sidebarHeight > $footerOffsetTop) {
      $sidebar.css({
        // top: -($window.scrollTop() + $sidebarHeight - $footerOffsetTop)
      });
    } else {
      $sidebar.css({ top: "0" });
    }
  });
});

$(window).scroll(function () {
  if ($(window).scrollTop() >= 300) {
    $("#reportnav").addClass("fixed-header");
  } else {
    $("#reportnav").removeClass("fixed-header");
  }
});
</script>

<script type="text/javascript">
    $(document).ready(function() {
        var CurrentUrl = window.location.origin + window.location.pathname;
        $('#NavMenu li a').each(function(Key, Value) {
            if (Value['href'] === CurrentUrl) {
                $(Value).parent().addClass('active');
            }
        });
    });
</script>

    </body>
</html>