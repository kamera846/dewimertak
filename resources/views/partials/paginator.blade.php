@if ($paginator->hasPages())
    <div class="ui pagination menu mx-auto" role="navigation">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <a class="icon item disabled border-1" aria-disabled="true" aria-label="@lang('pagination.previous')"> <i class="fas fa-long-arrow-alt-left margin-5px-right d-none d-md-inline-block"></i> Prev </a>
        @else
            <a class="icon item border-1" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')"> <i class="fas fa-long-arrow-alt-left margin-5px-right d-none d-md-inline-block"></i> Prev </a>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <a class="icon item disabled" aria-disabled="true">{{ $element }}</a>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <a class="item disabled active bg-dark text-light" aria-current="page">{{ $page }}</a>
                    @else
                        <a class="item" href="{{ $url }}">{{ $page }}</a>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a class="icon item border-1" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')"> Next <i class="fas fa-long-arrow-alt-right margin-5px-left d-none d-md-inline-block"></i> </a>
        @else
            <a class="icon item disabled border-1" aria-disabled="true" aria-label="@lang('pagination.next')"> Next <i class="fas fa-long-arrow-alt-right margin-5px-left d-none d-md-inline-block"></i> </a>
        @endif
    </div>
@endif
