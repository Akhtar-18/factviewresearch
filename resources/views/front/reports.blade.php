@extends('front.layout')
@section('title', 'Market Research Reports | Industry Research Reports')
@section('frontpage')
<style>
    .active{
        background-color: #174f81;
        color: #fff;
    }
</style>
        <!-- Breadcrumb -->
        <section class="breadcrumb">
            <div class="breadcrumb_inner report_bg bg-[#091E33] relative py-15">
                <!-- <div class="breadcrumb_bg absolute top-0 left-0 w-full h-full">
                    <img src="./assets/images/components/breadcrumb_project.webp" alt="breadcrumb_project" class="w-full h-full object-cover" />
                </div> -->
                <div class="container relative h-full">
                    <div class="breadcrumb_content flex flex-col items-start justify-center lg:w-[531px] md:w-5/6 w-full h-full">
                        <div class="list_breadcrumb flex items-center gap-2 animate animate_top" style="--i: 1">
                            <a href="{{ route('front.home') }}" class="caption1 text-white"><i class="ph ph-house"></i></a>
                            <span class="caption1 text-white opacity-40">/</span>
                            <a href="{{ route('front.all-category') }}" class="caption1 text-white"><span class="caption1 text-white">Industries</span></a>
                            <!-- <span class="caption1 text-white opacity-40">/</span>
                            <span class="caption1 text-white opacity-60">Projects</span> -->
                        </div>
                        <h3 class="heading3 text-white mt-2 animate animate_top" style="--i: 2">Industries</h3>
                        <div class="form_search w-full mt-5 animate animate_top" style="--i: 3">
                            <form action="{{ route('front.reports') }}" method="GET" class="form_inner flex items-center justify-between gap-6 gap-y-4 relative w-full p-3 rounded-lg bg-white">
                                <div class="form_input relative w-full">
                                    <span class="icon_search ph-bold ph-magnifying-glass absolute top-1/2 -translate-y-1/2 left-2 text-xl"></span>
                                    <input type="text" name="search" class="input_search w-full h-full pl-10" placeholder="Job title, key words or company" required />
                                </div>
                                <button type="submit" class="button-main text-center flex-shrink-0" aria-label="search"><span class="btn_txt">Search</span><i class="ph-bold ph-arrow-bend-up-right arrow_right ml-1"></i><i class="ph-bold ph-magnifying-glass arrow_search"></i></button>
                            </form>
                        </div>
                        <!-- <div class="list_tags flex flex-wrap items-center gap-3 mt-5 animate animate_top" style="--i: 4">
                            <strong class="text-button-sm text-white">Services:</strong>
                            <a href="#!" class="tag -small -border border-opacity-20 text-button-sm text-white hover:text-black hover:bg-white">Price Strategy</a>
                            <a href="#!" class="tag -small -border border-opacity-20 text-button-sm text-white hover:text-black hover:bg-white">Market Entry Strategy</a>
                        </div> -->
                    </div>
                </div>
            </div>
        </section>

        <!-- List employers -->
        <div class="employers bg-surface lg:py-15 sm:py-14 py-10">
            <div class="container flex max-lg:flex-col-reverse gap-y-10">
                <div class="sidebar_inner -relative flex-shrink-0 lg:w-[300px] lg:pr-7 w-full">

                    <ul id="NavMenu" class="list grid lg:gap-1 gap-1">
                        @foreach ($ReportCategory as $key => $cat)
                        <li class="">
                            <a href="{{ route('front.reports')}}?id={{gerenaretslug(strtolower($cat->cat_name))}}" class="w-100 font-bold block border border-line rounded-md py-2 px-3 {{gerenaretslug(strtolower($cat->cat_name))==request()->id?'active':''}}"><i style="top:3px;" class="relative ph-bold ph-cpu text-xl"></i> {{ $cat->cat_name }} <i style="float:right;top:3px;" class="relative ph-bold ph-arrow-bend-up-right ml-2"></i></a>
                        <li>
                        @endforeach
                    </ul>

                    <div class="sidebarsticky">
                    <div class="apply get_touch rounded-xl bg-white sm:mt-5 mt-5 lg:w-[272px] shadow-md duration-300">
                        <div class="px-5 py-3 border-b border-line">
                            <h6 class="heading6">Get In Touch with Us</h6>
                        </div>

                        <ul class="list grid xl:grid-cols-1 lg:grid-cols-1 sm:grid-cols-1 gap-4 justify-between px-5 py-3">
                        <li class="flex items-start gap-2">
                            <i class="ph ph-phone-call heading3 text-primary relative" style="top:4px;"></i>
                            <div class="">
                            <strong class="text-title">Call on:</strong>
                            <p class="desc body2 text-secondary">@if (getCompanyDetail()) {{ getCompanyDetail()->no_prefix }}{{ getCompanyDetail()->contact_no }} @endif
                            </p>
                            </div>
                        </li>
                        <li class="flex items-start gap-2">
                            <i class="ph ph-paper-plane-tilt heading3 text-primary relative" style="top:4px;"></i>
                            <div class="">
                            <strong class="text-title">Mail Us at:</strong>
                            <p class="desc body2 text-secondary">@if (getCompanyDetail()) {{ getCompanyDetail()->email_address }} @endif
                            </p>
                            </div>
                        </li>
                    </ul>

                        <div class="group_btn p-5">
                            <button class="btn_open_popup apply_btn button-main bg-dark w-full text-center" data-type="modal_apply"><i class="ph ph-headset body1 mr-1"></i>Help Desk</button>
                        </div>
                    </div>
                    </div>

                </div>
                <div id="lists">
                    @include('front.ajax.report')
                </div>
            </div>
            <div class="footerend"></div>
        </div>

<script>
    $(document).ready(function() {
        $(document).on('click', '.pager a', function(event) {
            event.preventDefault();
            var page = $(this).attr('href').split('page=')[1];
            fetch_datas(page);
        });

        function fetch_datas(page) {
            let id = '{{request()->id}}' ??'';
            $.ajax({
                url: "?page=" + page + "&id="+id,
                success: function(data) {
                    $('#lists').html(data);
                }
            });
        }

    });
</script>
@endsection
