@if ($paginator->hasPages())
<ul class="pager list_pagination menu_tab flex items-center justify-center gap-2 w-full md:mt-10 mt-7" role="tablist">

    {{-- Previous Page Link --}}
    @if ($paginator->onFirstPage())
        <li role="presentation">
            <span class="tab_btn -fill flex items-center justify-center w-10 h-10 rounded border border-line text-gray-400 cursor-not-allowed">‹</span>
        </li>
    @else
        <li role="presentation">
            <a href="{{ $paginator->previousPageUrl() }}" class="tab_btn -fill flex items-center justify-center w-10 h-10 rounded border border-line text-title hover:border-black">‹</a>
        </li>
    @endif

    {{-- Pagination Elements --}}
    @foreach ($elements as $element)
        {{-- "Three Dots" Separator --}}
        @if (is_string($element))
            <li role="presentation">
                <span class="tab_btn flex items-center justify-center w-10 h-10 rounded border border-line text-gray-400">{{ $element }}</span>
            </li>
        @endif

        {{-- Array Of Links --}}
        @if (is_array($element))
            @foreach ($element as $page => $url)
                <li role="presentation">
                    @if ($page == $paginator->currentPage())
                        <span class="tab_btn active -fill flex items-center justify-center w-10 h-10 rounded border border-black bg-black text-white">{{ $page }}</span>
                    @else
                        <a href="{{ $url }}" class="tab_btn -fill flex items-center justify-center w-10 h-10 rounded border border-line text-title hover:border-black">{{ $page }}</a>
                    @endif
                </li>
            @endforeach
        @endif
    @endforeach

    {{-- Next Page Link --}}
    @if ($paginator->hasMorePages())
        <li role="presentation">
            <a href="{{ $paginator->nextPageUrl() }}" class="tab_btn -fill flex items-center justify-center w-10 h-10 rounded border border-line text-title hover:border-black">›</a>
        </li>
    @else
        <li role="presentation">
            <span class="tab_btn -fill flex items-center justify-center w-10 h-10 rounded border border-line text-gray-400 cursor-not-allowed">›</span>
        </li>
    @endif

</ul>
@endif
