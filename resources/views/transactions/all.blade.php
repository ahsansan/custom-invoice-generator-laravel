@extends('layouts/master')

@section('title', 'Transaction Lists')

@section('konten')
    <h4 class="mt-4 mb-7 ml-2 text-xl font-extrabold uppercase text-[#735FF2]">Transaction Lists</h4>
    
    <div class="my-5 flex flex-col justify-start md:flex-row md:justify-between md:items-center">
      <div class="flex-1 flex justify-start ml-1 my-2 md:my-1">
        <a class="focus:outline-none flex justify-center items-center w-[150px] text-white bg-[#735FF2] hover:bg-blue-600 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5" href="{{ route('transactions.add') }}">
          <svg class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
            <path fill-rule="evenodd" d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm11-4.243a1 1 0 1 0-2 0V11H7.757a1 1 0 1 0 0 2H11v3.243a1 1 0 1 0 2 0V13h3.243a1 1 0 1 0 0-2H13V7.757Z" clip-rule="evenodd"/>
          </svg>        
          &nbsp; Add Invoice
        </a>
      </div>
      <div class="flex-1 flex md:justify-end mr-1 my-2 md:my-1">
        @php 
          $routeSearch = 'transactions.all';
          $placeholder = 'Search name, email or invoice number...';
        @endphp
        @include('components.search', compact('routeSearch', 'placeholder'))
      </div>
    </div>

    @php
        $headers = ['nomor', 'invoice_number', 'name', 'email', 'phone', 'tanggal'];
        $headerLabels = ['No', 'Nomor Invoice', 'Nama', 'Email', 'Nomor Hp', 'Tanggal Transaksi'];
        $headerStyles = ['w-[50px]', 'w-[100px]', 'w-[150px]', 'w-[150px]', 'w-[100px]', 'w-[150px]'];
        $data = [];
    @endphp

    @if($response['success'] == true)
        @foreach($response['data'] as $trans)
            @php
                $data[] = [
                    'id' => $trans->id,
                    'nomor' => $trans->index,
                    'invoice_number' => $trans->invoice_number,
                    'name' => $trans->first_name . ' ' . $trans->last_name,
                    'email' => $trans->email,
                    'phone' => $trans->phone,
                    'tanggal' => \App\Helpers\TransactionHelper::getFullTime($trans->created_at),
                    'viewlink' => "/invoice/$trans->invoice_number",
                    'editlink' => "/transactions/$trans->id/edit"
                ];
            @endphp
        @endforeach
        @include('components.tablegeneral', compact('headers', 'data', 'headerLabels', 'headerStyles'))
    @else
        <p>{{ $response['message'] }}</p>
    @endif
@endsection