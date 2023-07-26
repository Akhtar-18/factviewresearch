@extends('front.layout')
@section('title', 'All Press Releases')
@section('frontpage')

        <!-- PAGE TITLE
        ================================================== -->
        <section class="page-title-section2 bg-img cover-background" data-overlay-dark="7" data-background="{{asset('front/img/bg/bg9.jpg')}}">
            <div class="container">

                <div class="row">
                    <div class="col-md-12">
                        <h1>All Press Releases</h1>
                    </div>
                    <div class="col-md-12">
                        <ul class="ps-0">
                            <li><a href="{{route('front.home')}}">Home</a></li>
                            <li><a href="{{route('front.press-releases')}}">All Press Releases</a></li>
                        </ul>
                    </div>
                </div>

            </div>
        </section>

        <!-- BLOG
        ================================================== -->
        <section>
            <div class="container">
                <!-- <div class="section-heading">
                    <h2>Read Our Recent Press Released</h2>
                    <p class="w-95 w-md-75 w-lg-55 mx-auto">Business consulting excepteur sint occaecat cupidatat consulting non proident, sunt in culpa qui officia deserunt laborum Market.</p>
                </div> -->
                <div class="row" id="lists">
                @include('front.ajaxpress')

                </div>
            </div>
        </section>


        <script>
        $(document).ready(function() {
            $(document).on('click', '.pager a', function(event) {
                event.preventDefault();
                var page = $(this).attr('href').split('page=')[1];
                fetch_press(page);
            });

            function fetch_press(page) {
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
