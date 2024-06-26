<nav class="w-full bg-slate-100 shadow-lg rounded-lg mb-5 py-7 px-5">
    <div class="flex flex-col md:flex-row justify-between items-center">
        <div class="flex-1 mb-2 md:flex-[87%]">
            @if($configData)
                <a class="text-xl font-bold text-blue-500 hover:text-blue-600 hover:underline" href="{{route('home')}}">{{ $configData->website_name }}</a>
            @else
                <a class="navbar-brand" href="{{route('home')}}">Your Website</a>
            @endif
        </div>
        <div class="flex-1 mt-2 md:flex-[13%]">
            <button onclick="toogleProfile('menu-profile')"><i class="fa fa-user"></i> {{Auth::user()->username}} <span class="caret"></span></button>
            <div id="menu-profile" class="z-10 hidden absolute bg-slate-100 divide-y divide-gray-100 rounded-lg shadow w-44 md:right-[2%] mt-4">
                <div class="px-4 py-3 text-sm text-gray-900">
                <p>{{Auth::user()->name}}</p>
                <p class="italic font-bold">{{Auth::user()->email}}</p>
                <div class="font-medium truncate">
                    <p>Level: @session('user_role'){{ session('user_role')->role_name }}@endsession</p>
                </div>
                </div>
                <ul class="py-2 text-sm text-black">
                <li>
                    <a href="#" class="block px-4 py-2 hover:bg-gray-300">Edit Profile</a>
                </li>
                <li>
                    <a href="{{route('actionlogout')}}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-300"><i class="fa fa-power-off text-red-600"></i><span class="text-red-600"> Sign out</span></a>
                </li>
                </ul>
            </div>
        </div>
    </div>
</nav>