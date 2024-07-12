@extends('layouts/master')

@section('title', 'Edit User')

@section('konten')
<div class="col-md-6 col-md-offset-3">
    <h4 class="mt-4 mb-7 ml-2 text-xl font-extrabold uppercase text-[#735FF2]">Edit Account</h4>
    <hr>
    <form action="/user/{{ $response['data']['username'] }}/edit" method="POST">
    @csrf
    @method('PATCH')
        <div class="mb-5">
            <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Full Name:</label>
            <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" value="{{ $response['data']['name'] }}" placeholder="Full Name" required />
        </div>
        <div class="mb-5">
            <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email:</label>
            <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" value="{{ $response['data']['email'] }}" placeholder="Email" required />
        </div>
        <div class="mb-5">
            <label for="username" class="block mb-2 text-sm font-medium text-gray-900">Username:</label>
            <input type="text" name="username" id="username" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" value="{{ $response['data']['username'] }}" placeholder="Username" required />
        </div>
        <div id="password-question" class="mb-5">
            <button id="edit-password-button" class="focus:outline-none text-white bg-[#735FF2] hover:bg-blue-600 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5">Change Password</button>
        </div>
        <div id="password-form" class="mb-5 hidden">
            <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Password:</label>
            <input type="password" name="password" id="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Password" />
        </div>
        <div class="mb-5">
            @session('user_role')
            <label for="role" class="block mb-2 text-sm font-medium text-gray-900">Role:</label>
            <select id="role" name="role" {{ session('user_role')->role_code == 'SPA' ? '' : 'disabled' }} class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                <option selected disabled>Pilih Role</option>
                    @if(session('user_role')->role_code == 'SPA')
                        <option value="1" {{ $response['data']['role_id'] == '1' ? 'selected' : '' }}>Super Admin</option>
                        <option value="2" {{ $response['data']['role_id'] == '2' ? 'selected' : '' }}>Admin</option>
                        <option value="3" {{ $response['data']['role_id'] == '3' ? 'selected' : '' }}>Staff</option>
                    @endif  
            </select>
            @endsession
        </div>
        <div class="flex-1 flex justify-start ml-1 my-2 md:my-1">
            <button type="submit" class="focus:outline-none flex justify-center items-center w-[150px] text-white bg-[#735FF2] hover:bg-blue-600 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5">
                <svg class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                    <path fill-rule="evenodd" d="M5 8a4 4 0 1 1 7.796 1.263l-2.533 2.534A4 4 0 0 1 5 8Zm4.06 5H7a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h2.172a2.999 2.999 0 0 1-.114-1.588l.674-3.372a3 3 0 0 1 .82-1.533L9.06 13Zm9.032-5a2.907 2.907 0 0 0-2.056.852L9.967 14.92a1 1 0 0 0-.273.51l-.675 3.373a1 1 0 0 0 1.177 1.177l3.372-.675a1 1 0 0 0 .511-.273l6.07-6.07a2.91 2.91 0 0 0-.944-4.742A2.907 2.907 0 0 0 18.092 8Z" clip-rule="evenodd"/>
                </svg>                                
            &nbsp; Edit User
            </button>
        </div>
    </form>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function () {
        $('#edit-password-button').click(function (e) { 
            e.preventDefault();
            $('#password-question').toggle('hidden');
            $('#password-form').toggle('hidden');
        });
    });
</script>
@endsection