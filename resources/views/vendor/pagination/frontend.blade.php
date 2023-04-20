@if ($paginator->hasPages())
    <div class="pagination-container">
        <nav class="pagination">
            <ul>
                {{-- Pagination Elements --}}
                @foreach ($elements as $element)
                    {{-- Array Of Links --}}
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <li><a href="" class="current-page">{{ $page }}</a></li>
                            @else
                                <li><a href="{{ $url }}">{{ $page }}</a></li>
                            @endif
                        @endforeach
                    @endif
                @endforeach
            </ul>
        </nav>
        <nav class="pagination-next-prev full-width">
            <ul>
                @if ($paginator->onFirstPage())
                    <li class="disabled" aria-disabled="true">
                        <a class="prev" aria-hidden="true">&lsaquo;</a>
                    </li>
                @else
                    <li>
                        <a class="prev" href="{{ $paginator->previousPageUrl() }}" rel="prev"></a>
                    </li>
                @endif
                @if ($paginator->hasMorePages())
                    <li>
                        <a class="next" href="{{ $paginator->nextPageUrl() }}" rel="next"></a>
                    </li>
                @else
                    <li class="disabled" aria-disabled="true">
                        <a class="next" aria-hidden="true"></a>
                    </li>
                @endif
            </ul>
        </nav>
    </div>
    
@endif
