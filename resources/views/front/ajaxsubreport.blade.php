@if (count($reports) > 0)
    @foreach ($reports as $list)
        <article class="blog-list-simple">
            <div class="row">
                <div class="col-md-12">
                    <div class="blog-list-simple-text">
                        <!-- <span>Business</span> -->
                        <h5><a
                                href="{{ route('front.report', ['id' => $list->url]) }}">{{ $list->heading }}</a>
                        </h5>
                        <ul class="meta ps-0">
                            <li>
                                <i aria-hidden="true" class="fas fa-clock text-success"></i> Published Date:
                                {{ date('M, Y', strtotime($list->publish_month)) }}
                            </li>|
                            <li>
                                <i aria-hidden="true" class="fas fa-book text-success"></i> Pages: {{ $list->pages }}
                            </li>|
                            <li>
                                <i aria-hidden="true" class="fas fa-industry text-success"></i>
                                @if (isset($list->getSubCategoryName->sub_category))
                                    {{ $list->getSubCategoryName->sub_category }}
                                @endif
                            </li>
                            <li>
                                <i aria-hidden="true" class="fas fa-file-alt text-success"></i> Format: <i
                                    aria-hidden="true" class="fas fa-file-pdf text-danger"></i> PDF
                            </li>
                        </ul>
                        <p>{!! html_entity_decode(wordLimit($list->description)) !!}.
                        <div class="text-start mt-2"><a
                                href="{{ route('front.report', ['id' => $list->url]) }}"
                                class="btn btn-warning text-white"><span>Read
                                    More</span></a></div>
                    </div>
                </div>
            </div>
        </article>
    @endforeach

    <div class="row">
        <div class="col-12 px-lg-0">
            <div class="pagination text-small text-uppercase text-extra-dark-gray">
                <!-- <ul> -->
                {{ $reports->onEachSide(0)->render('front.pagination') }}
                <!-- </ul> -->

            </div>
        </div>
    </div>
@else
    <article class="blog-list-simple">
        <div class="row">
            <div class="col-md-12">
                <div class="blog-list-simple-text text-center">

                    <p class="h3">No Data Found</p>
                </div>
            </div>
        </div>
    </article>

@endif
