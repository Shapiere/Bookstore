@if ($paginator->hasPages())
    <nav class="pagination" role="navigation" aria-label="Navigasi halaman">
        @if ($paginator->onFirstPage())
            <span class="is-disabled">Sebelumnya</span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" rel="prev">Sebelumnya</a>
        @endif

        @foreach ($elements as $element)
            @if (is_string($element))
                <span class="is-disabled">{{ $element }}</span>
            @endif

            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <span class="is-current">{{ str_pad((string) $page, 2, '0', STR_PAD_LEFT) }}</span>
                    @else
                        <a href="{{ $url }}">{{ str_pad((string) $page, 2, '0', STR_PAD_LEFT) }}</a>
                    @endif
                @endforeach
            @endif
        @endforeach

        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" rel="next">Berikutnya</a>
        @else
            <span class="is-disabled">Berikutnya</span>
        @endif
    </nav>
@endif
