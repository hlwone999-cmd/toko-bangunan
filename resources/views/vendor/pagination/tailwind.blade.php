@if ($paginator->hasPages())
<nav class="flex justify-center mt-md">
    <div class="flex items-center gap-1">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <span class="px-sm py-2 rounded-lg text-on-surface-variant cursor-not-allowed">
                <span class="material-symbols-outlined text-xl">chevron_left</span>
            </span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" class="px-sm py-2 rounded-lg text-on-surface hover:bg-surface-container transition-colors">
                <span class="material-symbols-outlined text-xl">chevron_left</span>
            </a>
        @endif

        {{-- Page Numbers --}}
        @foreach ($elements as $element)
            @if (is_string($element))
                <span class="px-sm py-2 text-on-surface-variant">{{ $element }}</span>
            @endif
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <span class="px-3 py-1 rounded-lg bg-primary text-on-primary font-label-sm text-label-sm">{{ $page }}</span>
                    @else
                        <a href="{{ $url }}" class="px-3 py-1 rounded-lg text-on-surface hover:bg-surface-container font-label-sm text-label-sm transition-colors">{{ $page }}</a>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" class="px-sm py-2 rounded-lg text-on-surface hover:bg-surface-container transition-colors">
                <span class="material-symbols-outlined text-xl">chevron_right</span>
            </a>
        @else
            <span class="px-sm py-2 rounded-lg text-on-surface-variant cursor-not-allowed">
                <span class="material-symbols-outlined text-xl">chevron_right</span>
            </span>
        @endif
    </div>
</nav>
@endif
