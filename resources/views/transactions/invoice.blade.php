@extends('layouts/master')

@section('konten')
    <h4>Invoice @if($response){{ $response->invoice_number }}@endif</h4>
    @if($response)
        <p><span>Nama Lengkap: </span>{{ $response->first_name . ' ' . $response->last_name }}</p>
    @else
        <p>Invoice tidak ditemukan.</p>
    @endif
@endsection