@extends('layouts/master')

@section('title', 'List Users')

{{-- @dd($response) --}}
@section('konten')
    <h4 class="my-4 ml-2 text-xl font-extrabold uppercase text-[#735FF2]">List Akun</h4>
    @php
        $headers = ['nomor', 'name', 'email', 'username', 'role', 'active'];
        $headerLabels = ['No', 'Name', 'Email', 'Username', 'Role', 'Status'];
        $headerStyles = ['w-[50px]', 'w-[150px]', 'w-[150px]', 'w-[150px]', 'w-[150px]', 'w-[100px]'];
        $data = [];
    @endphp

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
                    'active' => $akun->active == '1' ? 'Active' : 'Inactive'
                ];
            @endphp
        @endforeach
        @include('components.tablegeneral', compact('headers', 'data', 'headerLabels', 'headerStyles'))
    @else
        <p>{{ $response['message'] }}</p>
    @endif
@endsection

@section('scripts')
<script>
    const data = @json($data);
    console.log(data);
</script>
@endsection