<div class="right w-full lg:pl-7.5">
    <div class="filter flex flex-wrap items-end justify-between gap-8 gap-y-3 relative w-full">
        <ul class="list_layout">
            <li>{{count($reports)}} reports available</li>
        </ul>
        <div class="select_filter flex items-center gap-3">
            <!-- <span class="caption1">Sort by:</span>
            <div class="select_block sm:pr-16 pr-10 pl-3 py-1 border border-line rounded">
                <div class="select">
                    <span class="selected caption1 capitalize" data-title="sort default">default</span>
                    <ul class="list_option p-0 bg-white">
                        <li class="capitalize" data-item="default">sort by (default)</li>
                        <li class="capitalize" data-item="newest">New Report</li>
                        <li class="capitalize" data-item="oldest">Old Report</li>
                    </ul>
                </div>
                <span class="icon_down ph ph-caret-down right-3"></span>
            </div> -->
        </div>
    </div>
    <div class="list_filtered flex flex-wrap items-center gap-3 w-full mt-5">
        <span class="quantity pr-3 border-r border-line">{{count($reports)}}+ Results</span>
        <div class="list flex flex-wrap items-center gap-3"></div>
        <button class="clear_all_btn inline-flex items-center gap-1 py-1 px-2 border border-red text-red rounded-full duration-300 hover:bg-red hover:text-white">
            <span class="ph ph-x text-sm"></span>
            <span class="caption1">Clear All</span>
        </button>
    </div>
    @if (count($reports) > 0)
    <ul class="list_layout_cols list_project grid lg:grid-cols-2 grid-cols-1 sm:gap-5 gap-5 md:mt-7 mt-7 cols_1">
        @foreach ($reports as $list)
        <li class="project_item py-4 px-5 rounded-lg bg-white duration-300 shadow-md">
            <div class="project_innner flex max-sm:flex-col items-start justify-between xl:gap-6 gap-6 h-full">
                <div class="project_info">
                    <div class="flex items-start gap-3 mb-2">
                        <div class="report_img detail_page form"></div>
                        <div class="txt_desc">

                            <a href="{{ route('front.report', ['id' => $list->url]) }}" class="project_name heading6 duration-300 hover:underline">
                                {{ $list->heading }}
                            </a>
                            <div class="list_tag flex items-center gap-2.5 flex-wrap mb-3">
                                <span class="project_tag tag bg-surface caption1"><i class="ph ph-cpu mr-1 body1 relative" style="top:3px;"></i>{{$list->getCategoryName->cat_name??''}}</span>
                                <span class="project_tag tag bg-surface caption1"><i class="ph ph-file-pdf mr-1 body1 relative" style="top:3px;"></i>Format: PDF</span>
                            </div>
                        </div>
                    </div>
                    <p class="project_desc mb-2 text-secondary">{!! html_entity_decode(wordLimit($list->description, 100)) !!}</p>
                    <p class="project_desc font-semibold text-primary mb-0 opacity-60">{{ $list->heading }}</p>
                </div>
                <div class="line flex-shrink-0 w-px h-full bg-line max-sm:hidden"></div>
                <div class="project_more_info flex flex-shrink-0 sm:flex-col sm:items-end items-center sm:gap-7 gap-4 max-sm:w-full sm:h-full">
                    <button class="add_wishlist_btn -relative -border max-sm:order-1">
                        <span class="ph-bold ph-arrow-bend-up-right text-xl"></span>
                        <!-- <span class="ph-bold ph-arrow-bend-up-right text-xl"></span> -->
                    </button>
                    <div class="max-sm:w-full max-sm:order-1">
                        <div class="project_proposals sm:text-end">
                            <span class="text-secondary">Date: </span>
                            <span class="proposals">{{ date('M, Y', strtotime($list->publish_month)) }}</span>
                        </div>
                        <!--<div class="project_proposals sm:text-end">
                            <span class="text-secondary">Format: </span>
                            <span class="proposals">PDF</span>
                        </div>-->
                    </div>
                    <a href="{{ route('front.report', ['id' => $list->url]) }}" class="button-main -border h-fit">Read&nbsp;more<i class="ph-bold ph-arrow-bend-up-right ml-2"></i></a>
                </div>
            </div>
        </li>
        @endforeach

    </ul>
    {{ $reports->onEachSide(0)->render('front.pagination') }}
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
</div>
