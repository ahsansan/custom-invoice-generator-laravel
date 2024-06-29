{{-- <form method="GET" action="{{ route($routeSearch) }}">
    <div class="form-group">
        <label for="search">Search</label>
        <input type="text" name="search" id="search" class="form-control" value="{{ request('search') }}">
    </div>
    <button type="submit" class="btn btn-primary">Search</button>
</form> --}}


<form method="GET" action="{{ route($routeSearch) }}" class="flex items-center max-w-lg w-[350px] justify-end">   
    <label for="search" class="sr-only">Search</label>
    <div class="relative w-full">
        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
            <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
            </svg>
        </div>
        <input type="text" name="search" id="search" class="bg-gray-200 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5" placeholder="{{ $placeholder }}" value="{{ request('search') }}" />
    </div>
    <button type="submit" class="p-2.5 ms-2 text-sm font-medium text-white bg-[#735FF2] hover:bg-blue-600 rounded-lg border border-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300">
        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
        </svg>
        <span class="sr-only">Search</span>
    </button>
</form>
