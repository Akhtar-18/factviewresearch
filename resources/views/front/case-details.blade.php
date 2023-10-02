@extends('front.layout')
@section('title', 'Case Studies Details')
@section('frontpage')

    <!-- PAGE TITLE
            ================================================== -->
    <section class="page-title-section pt-1-9 pb-1-9 bg-primary">
        <div class="container">

            <div class="row">
                <div class="col-md-12">
                    <ul class="ps-0">
                        <li><a href="{{ route('front.home') }}">Home</a></li>
                        <li><a href="{{ route('front.case-studies') }}" class="text-white">Case Studies</a></li>
                        <li><a href="{{ route('front.case-study', ['url' => $case->url]) }}"
                                class="text-white">{{ $case->heading }}</a></li>
                    </ul>
                </div>
            </div>

        </div>
    </section>

    <!-- BLOG POST
            ================================================== -->
    <section class="blogs">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <br />
                    <h1 class="text-primary">{{ $case->heading }}</h1>
                    <br />
                </div>
                <!--  start blog left-->
                <div class="col-lg-12 pe-xl-1-9 mb-1-9 mb-lg-0">
                    <div class="posts">
                        <div class="post">
                            <div class="post-img">
                                <a href="#!" class="w-100">
                                    <img src="{{ asset('case-studies') }}/{{ $case->image }}"
                                        alt="@if (isset($case->image_alt)) {{ $case->image_alt }} @endif">
                                </a>
                            </div>
                            <div class="content">
                                <div class="post-meta">
                                    <div class="post-title">
                                        <h2>{{ $case->heading }}</h2>
                                    </div>
                                    <ul class="meta ps-0">
                                        <!-- <li>
                                                    <a href="#!">
                                                        <i class="fa fa-user" aria-hidden="true"></i> Admin
                                                    </a>
                                                </li> -->
                                        <!-- <li>
                                                    <a href="#!">
                                                        <i class="fa fa-folder-open" aria-hidden="true"></i> Designin
                                                    </a>
                                                </li> -->
                                        <li>
                                            <a href="#!">
                                                <i class="fas fa-calendar-alt" aria-hidden="true"></i>
                                                {{ date('D M Y', strtotime($case->created_at)) }}
                                            </a>
                                        </li>
                                        <!-- <li>
                                                    <a href="#!">
                                                        <i class="fa fa-tags" aria-hidden="true"></i> Blog
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#!">
                                                        <i class="fa fa-comments" aria-hidden="true"></i> 0 Comments
                                                    </a>
                                                </li> -->
                                    </ul>
                                </div>
                                <div class="post-cont">
                                    {!! html_entity_decode($case->description) !!}
                                </div>
                                <div class="share-post">
                                    <span>Share Post</span>
                                    <ul class="ps-0 mb-0">
                                        <li><a href="#!"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="#!"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="#!"><i class="fab fa-instagram"></i></a></li>
                                        <li><a href="#!"><i class="fab fa-youtube"></i></a></li>
                                        <li><a href="#!"><i class="fab fa-linkedin-in"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>



                    </div>
                </div>
                <!-- end blog left -->

            </div>
        </div>
    </section>

@endsection
