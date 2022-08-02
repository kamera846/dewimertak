@if ($paginator->hasPages())
<div class="col-12 text-center margin-100px-top md-margin-50px-top position-relative wow animate__fadeInUp" style="visibility: hidden; animation-name: none;">
    <div class="pagination text-small text-uppercase text-extra-dark-gray">
        <ul class="mx-auto">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <span aria-hidden="true">&lsaquo;</span>
                </li>
            @else
                <li>
                    <a href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="disabled" aria-disabled="true"><span>{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="active" aria-current="page"><span>{{ $page }}</span></li>
                        @else
                            <li><a href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li>
                    <a href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a>
                </li>
            @else
                <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <span aria-hidden="true">&rsaquo;</span>
                </li>
            @endif
        </ul>
    </div>
</div>
@endif


<!-- start pagination -->
                {{-- <div class="col-12 text-center margin-100px-top md-margin-50px-top position-relative wow animate__fadeInUp" style="visibility: hidden; animation-name: none;">
                    <div class="pagination text-small text-uppercase text-extra-dark-gray">
                        <ul class="mx-auto">
                            <li><a href="#"><i class="fas fa-long-arrow-alt-left margin-5px-right d-none d-md-inline-block"></i> Prev</a></li>
                            <li class="active"><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">Next <i class="fas fa-long-arrow-alt-right margin-5px-left d-none d-md-inline-block"></i></a></li>
                        </ul>
                    </div>
                </div> --}}
                <!-- end pagination -->
