{{-- NAV START --}}
<div class="w-full max-w-md mx-auto bg-white shadow-lg rounded-lg">
    <div class="border-b">
        <button class="w-full text-left px-4 py-2 focus:outline-none" onclick="toggleMenu('menu1')">
            <span class="font-semibold">Menu Head 1</span>
        </button>
        <div id="menu1" class="px-4 py-2 hidden">
            <ul>
                <li class="py-1">Item 1</li>
                <li class="py-1">Item 2</li>
                <li class="py-1">Item 3</li>
            </ul>
        </div>
    </div>
    <div class="border-b">
        <button class="w-full text-left px-4 py-2 focus:outline-none" onclick="toggleMenu('menu2')">
            <span class="font-semibold">Menu Head 2</span>
        </button>
        <div id="menu2" class="px-4 py-2 hidden">
            <ul>
                <li class="py-1">Item 4</li>
                <li class="py-1">Item 5</li>
                <li class="py-1">Item 6</li>
            </ul>
        </div>
    </div>
    <div class="border-b">
        <button class="w-full text-left px-4 py-2 focus:outline-none {{ Request::is('user/*') ? 'bg-gray-300 rounded-b' : '' }}" onclick="toggleMenu('menu3')">
            <span class="font-semibold"><i class="fa fa-users" aria-hidden="true"></i> Users</span>
        </button>
        <div id="menu3" class="px-4 py-2 {{ Request::is('user/*') ? '' : 'hidden' }}{{ Request::is('user/*') ? 'bg-gray-200 rounded-b' : '' }}">
            <ul>
                <a href="/user/lists"><li class="py-1">All Users</li></a>
                <a href="#"><li class="py-1">Your Profile</li></a>
            </ul>
        </div>
    </div>
</div>
{{-- NAV END --}}