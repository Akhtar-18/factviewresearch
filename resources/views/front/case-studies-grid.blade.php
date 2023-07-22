@extends('front.layout')
@section('title', 'All Case Studies')
@section('frontpage')

        <!-- PAGE TITLE
        ================================================== -->
        <section class="page-title-section2 bg-img cover-background" data-overlay-dark="7" data-background="{{asset('front/img/bg/bg9.jpg')}}">
            <div class="container">

                <div class="row">
                    <div class="col-md-12">
                        <h1>All Case Studies</h1>
                    </div>
                    <div class="col-md-12">
                        <ul class="ps-0">
                            <li><a href="{{route('front.home')}}">Home</a></li>
                            <li><a href="#!">All Case Studies</a></li>
                        </ul>
                    </div>
                </div>

            </div>
        </section>

        <!-- BLOG
        ================================================== -->
        <section>
            <div class="container">
                <div class="section-heading">
                    <h2>Read Our Recent Case Studies</h2>
                    <p class="w-95 w-md-75 w-lg-55 mx-auto">Business consulting excepteur sint occaecat cupidatat consulting non proident, sunt in culpa qui officia deserunt laborum Market.</p>
                </div>
                <div class="row" id="lists">
                @include('front.ajaxcase')
                
                </div>
            </div>
        </section>


        <script>
        $(document).ready(function() {
            $(document).on('click', '.pager a', function(event) {
                event.preventDefault();
                var page = $(this).attr('href').split('page=')[1];
                fetch_case(page);
            });

            function fetch_case(page) {
                $.ajax({
                    url: "fetch_case?page=" + page,
                    success: function(data) {
                        //console.log(data);
                        $('#lists').html(data);
                    }
                });
            }

        });
    </script>

        @endsection