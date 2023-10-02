@extends('front.layout')
@section('title', 'Market Research Reports | Industry Research Reports')
@section('frontpage')

    <!-- PAGE TITLE
                            ==========================      ======================== -->
    <section class="page-title-section pt-1-9 pb-1-9 bg-primary">
        <div class="container">

            <div class="row">
                <div class="col-md-12">
                    <ul class="ps-0">
                        <ul class="ps-0">
                            <li><a href="{{ route('front.home') }}">Home</a></li>
                            <li><a href="{{ route('front.reports') }}" class="text-white">Reports</a></li>
                            <li><a href="{{ route('front.reportcategory', ['id' => $category]) }}"
                                    class="text-white">{{ strtoupper($category) }}</a></li>
                        </ul>
                    </ul>
                </div>
            </div>

        </div>
    </section>

    <!-- ALL REPORTS
                            ================================================== -->
    <section>
        <div class="container">
            <div class="row">



                <!-- left panel section -->
                <input type="hidden" id="category" value="{{ $category }}">
                <div class="col-lg-9 ps-lg-1-9" id="lists">
                    <div class="section-heading">
                        <h2 class="title-style2 text-center">{{ strtoupper($category) }}</h2>
                    </div>
                    @include('front.ajaxreport')

                </div>
                <!-- end left panel section -->

                <!-- product grid right panel -->
                <div class="col-lg-3">

                    <div id="accordion" class="accordion-style2 mb-4">
                        @foreach ($ReportCategory as $key => $cat)
                            <div class="card">
                                <div class="card-header" id="headingOne{{ $key }}">
                                    <a
                                        href="{{ route('front.reportcategory', gerenaretslug(strtolower($cat->cat_name))) }}">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link" data-bs-toggle="collapse"
                                                data-bs-target="#collapseOne{{ $key }}" aria-expanded="true"
                                                aria-controls="collapseOne{{ $key }}">{{ $cat->cat_name }}</button>
                                        </h5>
                                    </a>
                                </div>
                                {{-- <div id="collapseOne" class="collapse show" aria-labelledby="headingOne{{ $key }}"
                                    data-bs-parent="#accordion">
                                    <div class="card-body">
                                        <ul class="list-style-5">
                                            @if ($cat->getSubCategory)
                                                @foreach ($cat->getSubCategory as $sub)
                                                    <li><a href="@if (isset($sub->sub_category)){{ route('front.reportsubcategory',gerenaretslug(strtolower($sub->sub_category)))}}@endif">{{ $sub->sub_category }}</a></li>
                                                @endforeach
                                            @endif
                                        </ul>
                                    </div>
                                </div> --}}
                            </div>
                        @endforeach
                    </div>
                    <div class="widget">
                        <article class="card card-style1">
                            <div class="card-header bg-primary text-white">
                                Get In Touch With Us
                            </div>
                            <div class="card-body">
                                <!--<p class="text-center"><i class="fas fa-headset display-20 dispaly-md-16 display-lg-10 text-primary"></i></p>
                                        <h5 class="text-primary text-center font-weight-600 mb-1">How can we help?</h5>
                                        <p class="text-primary text-center font-weight-500 display-30">Let's get in touch!!</p> -->
                                <p class="text-center text-primary"><i class="fa fa-phone"></i><br /><a
                                        href="tel:@if (getCompanyDetail()) {{ getCompanyDetail()->no_prefix }}{{ getCompanyDetail()->contact_no }} @endif"
                                        class="text-primary">
                                        @if (getCompanyDetail())
                                            {{ getCompanyDetail()->no_prefix }}{{ getCompanyDetail()->contact_no }}
                                        @endif

                                    </a></p>
                                <p class="text-center text-primary"><i class="fa fa-envelope-open me-2"></i><br /><a
                                        href="mailto:@if (getCompanyDetail()) {{ getCompanyDetail()->email_address }} @endif"
                                        class="text-primary">
                                        @if (getCompanyDetail())
                                            {{ getCompanyDetail()->email_address }}
                                        @endif
                                    </a></p>

                                <!--<h6 class="text-primary text-center page-title-section">Follow Us</h6>

                                        <ul class="social-listing text-center ps-0 display-30">
                                            <li><a
                                                    href="@if (getCompanyDetail()) {{ getCompanyDetail()->facebook }} @endif"><i
                                                        class="fab fa-facebook-f"></i></a>
                                            </li>
                                            <li><a
                                                    href="@if (getCompanyDetail()) {{ getCompanyDetail()->twitter }} @endif"><i
                                                        class="fab fa-twitter"></i></a>
                                            </li>
                                            <li><a
                                                    href="@if (getCompanyDetail()) {{ getCompanyDetail()->instagram }} @endif"><i
                                                        class="fab fa-instagram"></i></a>
                                            </li>
                                            <li><a
                                                    href="@if (getCompanyDetail()) {{ getCompanyDetail()->linkedin }} @endif"><i
                                                        class="fab fa-linkedin-in"></i></a>
                                            </li>
                                        </ul>-->

                            </div>
                        </article>
                    </div>
                </div>
                <!-- end product grid right panel -->

            </div>
        </div>
    </section>

    <script>
        $(document).ready(function() {
            $(document).on('click', '.pager a', function(event) {
                event.preventDefault();
                var page = $(this).attr('href').split('page=')[1];
                var category = $('#category').val();
                fetchcategory_data(page, category);
            });

            function fetchcategory_data(page, category) {
                $.ajax({
                    url: "fetchcategory_data/" + category + "?page=" + page,
                    success: function(data) {
                        //console.log(data);
                        $('#lists').html(data);
                    }
                });
            }

        });
    </script>

@endsection
