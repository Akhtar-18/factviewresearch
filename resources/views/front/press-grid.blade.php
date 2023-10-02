@extends('front.layout')
@section('title', 'Press Releases')
@section('frontpage')

    <!-- PAGE TITLE
                ================================================== -->
    <section class="page-title-section pt-1-9 pb-1-9 bg-primary">
        <div class="container">

            <div class="row">
                <div class="col-md-12">
                    <ul class="ps-0">
                        <li><a href="{{ route('front.home') }}">Home</a></li>
                        <li><a href="{{ route('front.press-releases') }}" class="text-white">Press Releases</a></li>
                    </ul>
                </div>
            </div>

        </div>
    </section>

    <!-- BLOG
                ================================================== -->
    <section>
        <div class="container">
            <div class="col-md-12 text-center">
                <h1 class="text-primary">Press Releases</h1>
            </div>
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
