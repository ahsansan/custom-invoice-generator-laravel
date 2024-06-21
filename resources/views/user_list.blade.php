@extends('layouts/master')

{{-- @dd($response) --}}
@section('konten')
    <h4>List Akun</h4>
    @if($response['success'] == true)
        <ul>
            @foreach($response['data'] as $akun)
                <li>{{ $akun->name }}: {{ $akun->email }}</li>
            @endforeach
        </ul>
    @else
        <p>{{ $response['message'] }}</p>
    @endif
@endsection