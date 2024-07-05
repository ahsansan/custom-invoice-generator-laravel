@extends('layouts/master')

@section('konten')
<div class="col-md-6 col-md-offset-3">
    <h4 class="mt-4 mb-7 ml-2 text-xl font-extrabold uppercase text-[#735FF2]">Add Account</h4>
    <hr>
    <form action="{{ route('actionregister') }}" method="post">
    @csrf
        <div class="mb-5">
            <label for="fullname" class="block mb-2 text-sm font-medium text-gray-900">Full Name:</label>
            <input type="text" name="fullname" id="fullname" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Full Name" required />
        </div>
        <div class="mb-5">
            <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email:</label>
            <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Email" required />
        </div>
        <div class="mb-5">
            <label for="username" class="block mb-2 text-sm font-medium text-gray-900">Username:</label>
            <input type="text" name="username" id="username" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Username" required />
        </div>
        <div class="mb-5">
            <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Password:</label>
            <input type="password" name="password" id="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Password" required />
        </div>
        <div class="mb-5">
            <label for="role" class="block mb-2 text-sm font-medium text-gray-900">Role:</label>
            <select id="role" name="role" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                <option selected disabled>Pilih Role</option>
                @session('user_role')
                    @if(session('user_role')->role_code == 'SPA')
                        <option value="1">Super Admin</option>
                        <option value="2">Admin</option>
                    @endif
                    @if(session('user_role')->role_code == 'ADM')
                        <option value="2">Admin</option>
                    @endif
                @endsession
                        <option value="3">Staff</option>
            </select>
        </div>
        <div class="flex-1 flex justify-start ml-1 my-2 md:my-1">
            <button type="submit" class="focus:outline-none flex justify-center items-center w-[150px] text-white bg-[#735FF2] hover:bg-blue-600 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5">
            <svg class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                <path fill-rule="evenodd" d="M9 4a4 4 0 1 0 0 8 4 4 0 0 0 0-8Zm-2 9a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2v-1a4 4 0 0 0-4-4H7Zm8-1a1 1 0 0 1 1-1h1v-1a1 1 0 1 1 2 0v1h1a1 1 0 1 1 0 2h-1v1a1 1 0 1 1-2 0v-1h-1a1 1 0 0 1-1-1Z" clip-rule="evenodd"/>
            </svg>                      
            &nbsp; Add User
            </button>
        </div>
    </form>
</div>
@endsection