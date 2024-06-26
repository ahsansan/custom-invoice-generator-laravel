@extends('layouts/master')

@section('title', 'List Users')

{{-- @dd($response) --}}
@section('konten')
    <h4 class="my-4 text-xl font-bold">List Akun</h4>
    @php
        $headers = ['name', 'email', 'username', 'active'];
        $headerLabels = ['Name', 'Email', 'Username', 'Status'];
        $headerStyles = ['w-[150px]', 'w-[150px]', 'w-[150px]', 'w-[100px]'];
        $data = [];
    @endphp

    @if($response['success'] == true)
            @foreach($response['data'] as $akun)
                @php
                    $data[] = [
                        'name' => $akun->name,
                        'email' => $akun->email,
                        'username' => $akun->username,
                        'active' => $akun->active == '1' ? 'Active' : 'Inactive'
                    ];
                @endphp
            @endforeach
        @include('components.tablegeneral', compact('headers', 'data', 'headerLabels', 'headerStyles'))
    @else
        <p>{{ $response['message'] }}</p>
    @endif
@endsection