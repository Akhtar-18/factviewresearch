@extends('front.layout')
@section('title', 'Case Studies')
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
                <br />
                <h1 class="text-primary">Case Studies</h1>
                <br />
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
