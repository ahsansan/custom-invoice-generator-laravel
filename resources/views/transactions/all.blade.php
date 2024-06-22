@extends('layouts/master')

@section('konten')
  <h4>All Transactions</h4>
  <a href="{{ route('transactions.add') }}">Add Invoice</a>
@endsection