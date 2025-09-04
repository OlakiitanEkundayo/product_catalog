@if ($paginator->hasPages())
    <div class="pagination">

        @if ($paginator->onFirstPage())
            <a href="#" class="disabled">&laquo;</a>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" class="active-page">&laquo;</a>
        @endif


        @if ($paginator->currentPage() > 3)
            <a href="{{ $paginator->url(1) }}" class="active-page">1</a>
            @if ($paginator->currentPage() > 4)
                <span>...</span>
            @endif
        @endif


        @for ($i = max(1, $paginator->currentPage() - 2); $i <= min($paginator->lastPage(), $paginator->currentPage() + 2); $i++)
            @if ($i == $paginator->currentPage())
                <a href="#" class="current-page">{{ $i }}</a>
            @else
                <a href="{{ $paginator->url($i) }}" class="active-page">{{ $i }}</a>
            @endif
        @endfor


        @if ($paginator->currentPage() < $paginator->lastPage() - 2)
            @if ($paginator->currentPage() < $paginator->lastPage() - 3)
                <span>...</span>
            @endif
            <a href="{{ $paginator->url($paginator->lastPage()) }}" class="active-page">{{ $paginator->lastPage() }}</a>
        @endif


        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" class="active-page">&raquo;</a>
        @else
            <a href="#" class="disabled">&raquo;</a>
        @endif
    </div>
@endif
