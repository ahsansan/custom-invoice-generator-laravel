@extends('layouts/master')

{{-- @dd(session('user_role')) --}}
@section('konten')
  <h4 class="mt-4 mb-7 text-xl font-extrabold uppercase text-[#735FF2]">Dashboard</h4>
  <p>Selamat Datang <b>{{Auth::user()->name}}</b>, Anda Login sebagai <b>@session('user_role'){{ session('user_role')->role_name }}@endsession</b>.</p>
@endsection