@extends('layouts/master')

@section('konten')
  <h4>Selamat Datang <b>{{Auth::user()->name}}</b>, Anda Login sebagai <b>@session('user_role'){{ session('user_role')->role_name }}@endsession</b>.</h4>
@endsection