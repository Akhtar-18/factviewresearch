@if ($case)
<ul class="list_blog grid lg:gap-6 gap-5 w-full">
    @foreach ($case as $list)
    <li class="blog_item flex max-sm:flex-col sm:items-start gap-8 gap-y-5 w-full border border-line p-4 rounded-lg animate animate_top" style="--i: 1">
        <a href="{{ route('front.case-study', $list->url) }}" class="blog_thumb block">
            <img class="w-full overflow-hidden rounded-lg" src="{{ $list->image }}?updatedAt=1738998257194" loading="lazy" alt="@if (isset($list->image_alt)) {{ $list->image_alt }} @endif">
        </a>
        <div class="">
            <div class="blog_info flex items-center gap-2">
                <span class="blog_date caption1"><i class="ph ph-calendar-blank mr-1"></i>{{ date('M d, Y', strtotime($list->created_at)) }}</span>
            </div>
            <a href="{{ route('front.case-study', $list->url) }}" class="heading6 blog_title mt-1 hover:underline">{{ $list->heading }}</a>
            <p class="blog_desc mb-3">{!! html_entity_decode(wordLimitset($list->description, 80)) !!}</p>
            <a href="{{ route('front.case-study', $list->url) }}" class="text-button pb-0.5 border-b-2 border-primary duration-300 text-primary">Know more <i class="ph-bold ph-arrow-bend-up-right ml-2"></i></a>
        </div>
    </li>
    @endforeach

</ul>
{{ $case->onEachSide(0)->render('front.pagination') }}
@endif