<nav aria-label="Page navigation example" class="flex justify-center mt-5">
    <ul class="inline-flex -space-x-px text-sm">
        <li class="inline-flex {{ $currentPage == 1 ? 'opacity-50' : 'cursor-pointer' }}">
            <button @if($currentPage == 1) disabled @endif
            onclick="handlePagination('{{ url()->current() }}', {{ $currentPage - 1 }}, {{ request()->input('limit', $limit) }}, '{{ request()->input('search', '') }}')"
            title="Previous"
            class="flex items-center justify-center px-3 h-8 ms-0 leading-tight text-gray-500 bg-white border border-e-0 border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700">Previous</button>
        </li>
        @for ($page = 1; $page <= $totalPages; $page++)
        <li class="inline-flex {{ $currentPage == $page ? 'opacity-50' : 'cursor-pointer' }}">
            <button @if($currentPage == $page) disabled @endif
            onclick="handlePagination('{{ url()->current() }}', {{ $page }}, {{ request()->input('limit', $limit) }}, '{{ request()->input('search', '') }}')"
            class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700">{{ $page }}</button>
        </li>
        @endfor
        <li class="inline-flex {{ $currentPage == $totalPages ? 'opacity-50' : 'cursor-pointer' }}">
            <button @if($currentPage == $totalPages) disabled @endif
            onclick="handlePagination('{{ url()->current() }}', {{ $currentPage + 1 }}, {{ request()->input('limit', $limit) }}, '{{ request()->input('search', '') }}')"
            class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-700">Next</button>
        </li>
    </ul>
</nav>

{{-- <nav aria-label="Page navigation example" class="flex justify-center mt-5">
    <ul class="inline-flex -space-x-px text-sm">
        <li class="inline-flex {{ $currentPage == 1 ? 'opacity-50' : 'cursor-pointer' }}">
            <button @if($currentPage == 1) disabled @endif
            onclick="window.location='{{ url()->current() }}?page={{ $currentPage - 1 }}&limit={{ request()->input('limit', $limit) }}'"
            title="Previous"
            class="flex items-center justify-center px-3 h-8 ms-0 leading-tight text-gray-500 bg-white border border-e-0 border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700">Previous</button>
        </li>
        @for ($page = 1; $page <= $totalPages; $page++)
        <li class="inline-flex {{ $currentPage == $page ? 'opacity-50' : 'cursor-pointer' }}">
            <button @if($currentPage == $page) disabled @endif
            onclick="window.location='{{ url()->current() }}?page={{ $page }}&limit={{ request()->input('limit', $limit) }}'"
            class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700">{{ $page }}</button>
        </li>
        @endfor
        <li class="inline-flex {{ $currentPage == $totalPages ? 'opacity-50' : 'cursor-pointer' }}">
            <button @if($currentPage == $totalPages) disabled @endif
            onclick="window.location='{{ url()->current() }}?page={{ $currentPage + 1 }}&limit={{ request()->input('limit', $limit) }}'"
            class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-700">Next</button>
        </li>
    </ul>
</nav> --}}

{{-- <nav class="mt-4">
    <ul class="flex justify-center items-center space-x-4">
        <li class="inline-flex {{ $currentPage == 1 ? 'opacity-50' : 'cursor-pointer' }}">
            <button class="px-2 py-1 rounded-md bg-orange-400 hover:bg-orange-500 text-white text-sm"
                    @if($currentPage == 1) disabled @endif
                    onclick="window.location='{{ url()->current() }}?page=1&limit={{ request()->input('limit', $limit) }}'" title="First Page">
                |﹤
            </button>
        </li>

        <li class="inline-flex {{ $currentPage == 1 ? 'opacity-50' : 'cursor-pointer' }}">
            <button class="px-2 py-1 rounded-md bg-orange-400 hover:bg-orange-500 text-white text-sm"
                    @if($currentPage == 1) disabled @endif
                    onclick="window.location='{{ url()->current() }}?page={{ $currentPage - 1 }}&limit={{ request()->input('limit', $limit) }}'" title="Previous Page">
                {"<"}
            </button>
        </li>

        @for ($page = 1; $page <= $totalPages; $page++)
            <li class="inline-flex {{ $currentPage == $page ? 'opacity-50' : 'cursor-pointer' }}">
                <button class="px-2 py-1 rounded-md text-sm {{ $currentPage == $page ? 'bg-gray-300' : 'bg-orange-400 hover:bg-orange-500 text-white' }}"
                        @if($currentPage == $page) disabled @endif
                        onclick="window.location='{{ url()->current() }}?page={{ $page }}&limit={{ request()->input('limit', $limit) }}'">
                    {{ $page }}
                </button>
            </li>
        @endfor

        <li class="inline-flex {{ $currentPage == $totalPages ? 'opacity-50' : 'cursor-pointer' }}">
            <button class="px-2 py-1 rounded-md bg-orange-400 hover:bg-orange-500 text-white text-sm"
                    @if($currentPage == $totalPages) disabled @endif
                    onclick="window.location='{{ url()->current() }}?page={{ $currentPage + 1 }}&limit={{ request()->input('limit', $limit) }}'" title="Next Page">
                {">"}
            </button>
        </li>

        <li class="inline-flex {{ $currentPage == $totalPages ? 'opacity-50' : 'cursor-pointer' }}">
            <button class="px-2 py-1 rounded-md bg-orange-400 hover:bg-orange-500 text-white text-sm"
                    @if($currentPage == $totalPages) disabled @endif
                    onclick="window.location='{{ url()->current() }}?page={{ $totalPages }}&limit={{ request()->input('limit', $limit) }}'" title="Last Page">
                ﹥|
            </button>
        </li>
    </ul>
</nav> --}}