<a href="{{ route('shoppingcart') }}" class="relative flex mr-3">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
    </svg>
    @if ($total !== 0)
        <span
            class="w-5 h-5 bg-indigo-500 text-white flex items-center justify-center absolute text-xs rounded-full"
            style="top: -10px; right: -5px;"
        >
            {{ $total }}
        </span>
    @endif
</a>
