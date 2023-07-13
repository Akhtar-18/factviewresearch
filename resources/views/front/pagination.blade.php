@if ($paginator->hasPages())
<ul class="pager">
	@if ($paginator->onFirstPage())
	<li class="disabled"><a class="content" rel="prev"><i class="fas fa-long-arrow-alt-left me-1 d-none d-md-inline-block"></i> Prev</a></li>
	@else
	<li><a class="content" href="{{ $paginator->previousPageUrl() }}" rel="prev"><i class="fas fa-long-arrow-alt-left me-1 d-none d-md-inline-block"></i>Prev</a></li>
	@endif

	@foreach ($elements as $element)
	@if (is_string($element))
	<li class="disabled"><a class="content" rel="prev">{{ $element }}</a></li>
	@endif

	@if (is_array($element))
	@foreach ($element as $page => $url)
	@if ($page == $paginator->currentPage())
	<li class="content"><a class="content active my-active" href="{{ $url }}">{{ $page }}</a></li>
	@else
	<li><a class="content" href="{{ $url }}">{{ $page }}</a></li>
	@endif
	@endforeach
	@endif
	@endforeach

	@if ($paginator->hasMorePages())
	<li><a class="content"  href="{{ $paginator->nextPageUrl() }}" rel="next">Next <i
		class="fas fa-long-arrow-alt-right ms-1 d-none d-md-inline-block"></i></a></li>
		@else
		<li class="disabled"><a class="content" rel="prev">Next <i
			class="fas fa-long-arrow-alt-right ms-1 d-none d-md-inline-block"></i></a></li>
			@endif
		</ul>
		@endif 
