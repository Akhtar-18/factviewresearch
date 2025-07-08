@extends('front.layout')
@section('title', 'Market Research All Industry, Competitive All Industry')
@section('frontpage')

<!-- Breadcrumb -->
<section class="breadcrumb">
    <div class="breadcrumb_inner report_bg bg-[#091E33] relative py-10">
        <div class="container relative h-full">
            <div class="breadcrumb_content flex flex-col items-start justify-center xl:w-[1000px] lg:w-[848px] md:w-5/6 w-full h-full">
                <h3 class="heading3 text-white mb-2">Industries</h3>
                <div class="list_breadcrumb flex items-center gap-2 animate animate_top" style="--i: 1">
                    <a href="{{ route('front.home') }}" class="caption1 text-white"><i class="ph ph-house"></i></a>
                    <span class="caption1 text-white opacity-40">/</span>
                    <a href="{{ route('front.all-category') }}" class="caption1 text-white"><span class="caption1 text-white">Industries</span></a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Browse by category -->
<section class="top_categories lg:py-20 sm:py-14 py-10 bg-surface">
    <div class="container">

        <div class="list grid xl:grid-cols-5 lg:grid-cols-4 grid-cols-2 lg:gap-7.5 gap-6">
            @if (count($category) > 0)
            @foreach ($category as $key => $row)
            <a href="{{ route('front.reports')}}?id={{gerenaretslug(strtolower($row->cat_name))}}" class="category_item flex flex-col items-center sm:p-7.5 p-5 rounded-xl bg-white shadow-md duration-300 hover:shadow-xl animate animate_top" style="--i: {{$key+1}}">
                <div class="icon pb-3 w-fit line-before line-2px">
                    <span class="ph-bold ph-cpu text-5xl"></span>
                </div>
                <strong class="heading6 text-center mt-3">{{ $row->cat_name }}</strong>
            </a>
            @endforeach
            @endif
        </div>
    </div>
</section>

@endsection
