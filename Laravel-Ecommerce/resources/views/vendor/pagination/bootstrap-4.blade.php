@if ($paginator->hasPages())



<nav class="navigation align-center">
       
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
            
                <svg class="btn-prev">
                <use xlink:href="#arrow-left"></use>
                </svg>

            @else
              
                    <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</a>
              
                <svg class="btn-prev">
                <use xlink:href="#arrow-left"></use>
                </svg>

            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="page-item disabled" aria-disabled="true"><span class="page-link">{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                          
                            <a href="#" class="page-numbers bg-border-color current"><span>{{ $page }}</span></a>
                        @else
                          
                            <a href="{{ $url }}" class="page-numbers bg-border-color"><span>{{ $page }}</span></a>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
               
                    <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a>
              
                <svg class="btn-next">
    <use xlink:href="#arrow-right"></use>
</svg>
            @else
              
                <svg class="btn-next">
    <use xlink:href="#arrow-right"></use>
</svg>
            @endif
        </ul>
    </nav>
@endif
