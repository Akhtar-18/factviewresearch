<div class="row mt-n1-9">
    @if ($case)
        @foreach ($case as $list)
            <div class="col-lg-4 col-md-6 mt-1-9">
                <article class="card card-style1">
                    <div class="card-img"><img class="home-card-img" alt="@if (isset($list->image_alt)) {{ $list->image_alt }} @endif image"
                            src="{{ $list->image }}?tr=w-365,h-auto,fo-webp" loading="lazy" width="365" height="180">
                    </div>
                    <div class="card-body">
                        <!-- <span></span> -->
                        <div class="card-date">
                            <h5>{{ date('d', strtotime($list->created_at)) }}</h5>
                            <p>{{ date('M', strtotime($list->created_at)) }}</p>
                        </div>
                        <h3 class="h5"><a href="{{ route('front.case-study', $list->url) }}">{{ $list->heading }}</a>
                        </h3>
                        <p class="card-text">{!! html_entity_decode(wordLimitset($list->description, 80)) !!}</p>
                        <a href="{{ route('front.case-study', $list->url) }}" class="btn-style4 orange btn-small min-width-auto"><span>Read
                                More</span></a>
                    </div>
                </article>
            </div>
        @endforeach
    @endif
</div>
<div class="row">
    <div class="col-sm-12">
        <!-- pager -->
        <div class="text-center mt-1-9 mt-lg-6">
            <div class="pagination text-small text-uppercase text-extra-dark-gray">
                {{ $case->onEachSide(0)->render('front.pagination') }}
            </div>
        </div>
        <!-- end pager -->
    </div>
</div>
