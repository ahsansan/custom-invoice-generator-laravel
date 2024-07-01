@extends('layouts/master')

@section('title', 'User Lists')

{{-- @dd($response) --}}
@section('konten')
    <h4 class="mt-4 mb-7 ml-2 text-xl font-extrabold uppercase text-[#735FF2]">Account Lists</h4>

    <div class="my-5 flex flex-col justify-start md:flex-row md:justify-between md:items-center">
        <div class="flex-1 flex justify-start ml-1 my-2 md:my-1">
            <a class="focus:outline-none flex justify-center items-center w-[150px] text-white bg-[#735FF2] hover:bg-blue-600 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5" href="{{ route('user.add') }}">
            <svg class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                <path fill-rule="evenodd" d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm11-4.243a1 1 0 1 0-2 0V11H7.757a1 1 0 1 0 0 2H11v3.243a1 1 0 1 0 2 0V13h3.243a1 1 0 1 0 0-2H13V7.757Z" clip-rule="evenodd"/>
            </svg>        
            &nbsp; Add User
            </a>
        </div>
        <div class="flex-1 flex md:justify-end mr-1 my-2 md:my-1">
            Search User Harusnya
            Perbaikan query controller dulu
            {{-- @php 
                $routeSearch = 'transactions.all';
                $placeholder = 'Search name, email or invoice number...';
            @endphp
            @include('components.search', compact('routeSearch', 'placeholder')) --}}
        </div>
    </div>

    @php
        $headers = ['nomor', 'name', 'email', 'username', 'role', 'active'];
        $headerLabels = ['No', 'Name', 'Email', 'Username', 'Role', 'Status'];
        $headerStyles = ['w-[50px]', 'w-[150px]', 'w-[150px]', 'w-[150px]', 'w-[150px]', 'w-[100px]'];
        $data = [];
    @endphp

    @if(session('success'))
        <div class="flex items-center p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50" role="alert">
            <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
            </svg>
            <div>
                <span class="font-medium">{{ session('success') }}</span>
            </div>
        </div>
    @elseif(session('failed'))
        <span>Gagal</span>
    @endif

    @if($response['success'] == true)
        @foreach($response['data'] as $akun)
            @php
                $data[] = [
                    'id' => $akun->id,
                    'nomor' => $akun->index,
                    'name' => $akun->name,
                    'email' => $akun->email,
                    'username' => $akun->username,
                    'role' => $akun->role_name,
                    'active' => $akun->active == '1' ? 'Active' : 'Inactive',
                    'viewlink' => "/user/$akun->username",
                    'editlink' => "/user/$akun->username/edit"
                ];
            @endphp
        @endforeach
        @include('components.tablegeneral', compact('headers', 'data', 'headerLabels', 'headerStyles'))
        @include('components.modaldelete')
    @else
        <p>{{ $response['message'] }}</p>
    @endif
@endsection

@section('scripts')
<script>
    function confirmDelete(id) {
        var form = document.getElementById('deleteForm');
        form.action = '/user/delete/' + id;

        $('#confirmationModal').hide().removeClass('hidden').slideDown(150);
    }

    function closeModal() {
        $('#confirmationModal').slideUp(150, function() {
            $(this).addClass('hidden');
        });
    }
</script>
@endsection