<footer style="background: #2a66b1">
    <div class="container">
        <div class="row mt-n1-9">

            <div class="col-lg-4 col-md-6 mt-1-9">

                <!-- <img alt="footer-logo" src="img/logos/logo-footer.png"> -->
                <a href="{{ url('/') }}" class="navbar-brand logodefault">
                    @if(getCompanyDetail())
                    <img id="logo" src="{{asset('company_logo')}}/{{getCompanyDetail()->company_logo}}" alt="logo">
                    @elseif(isset(getCompanyDetail()->company_name))
                    {{getCompanyDetail()->company_name}}
                    @endif
                </a>

                @if (aboutData())
                    @foreach (aboutData() as $about)
                    <p class="mt-3 display-30">{!! html_entity_decode(strip_tags(wordLimitset($about->content,100))) !!}</p>
                    @endforeach
                @endif
                <div class="mt-4 footer-social-icons">
                    <ul class="mb-0 ps-0">
                        <li><a href="@if (getCompanyDetail()) {{ getCompanyDetail()->facebook }} @endif"><i
                                    class="fab fa-facebook-f"></i></a></li>
                        <li><a href="@if (getCompanyDetail()) {{ getCompanyDetail()->twitter }} @endif"><i
                                    class="fab fa-twitter"></i></a></li>
                        <li><a href="@if (getCompanyDetail()) {{ getCompanyDetail()->instagram }} @endif"><i
                                    class="fab fa-instagram"></i></a></li>
                        <!-- <li><a href="#!"><i class="fab fa-youtube"></i></a></li> -->
                        <li><a href="@if (getCompanyDetail()) {{ getCompanyDetail()->linkedin }} @endif"><i
                                    class="fab fa-linkedin-in"></i></a></li>
                    </ul>
                </div>

            </div>

            <div class="col-lg-4 col-md-6 mt-1-9">
                <h3 class="footer-title-style2 text-primary-new">Quick Links</h3>
                <div class="row">
                    <div class="col-md-6 ps-md-0 text-primary">
                        <ul class="footer-list-style3 mb-2 mb-md-0 ps-0">
                            <li><a href="{{ route('front.home') }}">Home</a></li>
                            <li><a href="{{ route('front.about') }}">About Us</a></li>
                            <li><a href="{{ route('front.reports') }}">Reports</a></li>
                            <li><a href="{{route('front.blogs')}}">Blogs</a></li>
                            <li><a href="{{route('front.contact')}}">Contact Us</a></li>
                        </ul>
                    </div>
                    <div class="col-md-6 ps-md-0">
                        <ul class="footer-list-style3 mb-2 mb-md-0 ps-0">
                            <li><a href="{{ route('front.privacy-policy') }}">Privacy Policy</a></li>
                            <li><a href="{{ route('front.refund') }}">Refund Policy</a></li>
                            <li><a href="{{ route('front.disclaimer') }}">Disclaimer</a></li>
                            <li><a href="{{ route('front.terms') }}">Terms & Conditions</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 offset-lg-1 mt-1-9">
                <h3 class="footer-title-style2 text-primary-new">Get in Touch</h3>
                <ul class="footer-list ps-0 mb-0">
                    <li>
                        <span class="d-inline-block vertical-align-top"><i
                                class="fas fa-map-marker-alt text-primary-new"></i></span>
                        <span class="d-inline-block w-85 vertical-align-top ps-2 display-30">
                            @if (getCompanyDetail())
                                {{ getCompanyDetail()->address }}
                            @endif
                        </span>
                    </li>
                    <li>
                        <span class="d-inline-block vertical-align-top"><i
                                class="fas fa-mobile-alt text-primary-new"></i></span>
                        <span class="d-inline-block w-85 vertical-align-top ps-2 display-30">
                            @if (getCompanyDetail())
                                {{ getCompanyDetail()->contact_no }}
                            @endif
                        </span>
                    </li>
                    <li>
                        <span class="d-inline-block vertical-align-top"><i
                                class="far fa-envelope text-primary-new"></i></span>
                        <span class="d-inline-block w-85 vertical-align-top ps-2 display-30">
                            @if (getCompanyDetail())
                                {{ getCompanyDetail()->email_address }}
                            @endif
                        </span>
                    </li>
                    <!-- <li>
                        <span class="d-inline-block vertical-align-top"><i
                                class="fas fa-globe text-primary-new"></i></span>
                        <span
                            class="d-inline-block w-85 vertical-align-top ps-2 display-30">www.yourwebsitehere.com</span>
                    </li> -->
                </ul>
            </div>

        </div>

    </div>
    <div class="footer-bar">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-md-start text-center mb-1 mb-md-0">
                    <p class="mb-0">&copy; Copyright <span class="current-year"></span>. All Rights Reserved.</p>
                </div>
                <div class="col-md-6 text-md-end text-center display-30">
                    Design and Developed by: <a href="" target="_blank"
                        class="text-light-gray">FactViewResearch</a>
                </div>
            </div>
        </div>
    </div>
</footer>

</div>

<!-- SCROLL TO TOP
    ================================================== -->
<a href="#!" class="scroll-to-top"><i class="fas fa-angle-up" aria-hidden="true"></i></a>

<!-- all js include start -->

<!-- jQuery -->
<script src="{{ asset('front/js/jquery.min.js') }}"></script>

<!-- popper js -->
<script src="{{ asset('front/js/popper.min.js') }}"></script>

<!-- bootstrap -->
<script src="{{ asset('front/js/bootstrap.min.js') }}"></script>

<!-- core.min.js -->
<script src="{{ asset('front/js/core.min.js') }}"></script>

<!-- search -->
<script src="{{ asset('search/search.js') }}"></script>

<!-- revolution slider js files start -->
<script src="{{ asset('front/js/rev_slider/jquery.themepunch.tools.min.js') }}"></script>
<script src="{{ asset('front/js/rev_slider/jquery.themepunch.revolution.min.js') }}"></script>
<script src="{{ asset('front/js/rev_slider/extensions/revolution.extension.actions.min.js') }}"></script>
<script src="{{ asset('front/js/rev_slider/extensions/revolution.extension.carousel.min.js') }}"></script>
<script src="{{ asset('front/js/rev_slider/extensions/revolution.extension.kenburn.min.js') }}"></script>
<script src="{{ asset('front/js/rev_slider/extensions/revolution.extension.layeranimation.min.js') }}"></script>
<script src="{{ asset('front/js/rev_slider/extensions/revolution.extension.migration.min.js') }}"></script>
<script src="{{ asset('front/js/rev_slider/extensions/revolution.extension.navigation.min.js') }}"></script>
<script src="{{ asset('front/js/rev_slider/extensions/revolution.extension.parallax.min.js') }}"></script>
<script src="{{ asset('front/js/rev_slider/extensions/revolution.extension.slideanims.min.js') }}"></script>
<script src="{{ asset('front/js/rev_slider/extensions/revolution.extension.video.min.js') }}"></script>

<!-- theme core scripts -->
<script src="{{ asset('front/js/main.js') }}"></script>

<script src="{{ asset('front/quform/js/plugins.js') }}"></script>

<!-- quform scripts js -->
<script src="{{ asset('front/quform/js/scripts.js') }}"></script>

<!-- all js include end -->

<script>
    $(document).ready(function() {
        $('body').bind('cut copy', function(e) {
            e.preventDefault();
        });
        $("body").on("contextmenu", function(e) {
            return false;
        });
    });
</script>


</body>

</html>
