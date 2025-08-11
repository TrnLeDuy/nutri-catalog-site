@if ($paginator->hasPages())
<div class="pagination">
    @if ($paginator->onFirstPage())
        <a class="disabled">❮</a>
    @else
        <a href="{{ $paginator->previousPageUrl() }}" rel="prev">❮</a>
    @endif
    @foreach ($elements as $element)
        @if (is_string($element))
            <a class="disabled">{{ $element }}</a>
        @endif
        @if (is_array($element))
            @foreach ($element as $page => $url)
                @if ($page == $paginator->currentPage())
                    <a class="active my-active">{{ $page }}</a>
                @else
                    <a href="{{ $url }}">{{ $page }}</a>
                @endif
            @endforeach
        @endif
    @endforeach
    @if ($paginator->hasMorePages())
        <a href="{{ $paginator->nextPageUrl() }}" rel="next">❯</a>
    @else
        <a class="disabled">❯</a>
    @endif
</div>
@endif 