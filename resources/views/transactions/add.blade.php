@extends('layouts/master')

@section('konten')
    <h4 class="mt-4 mb-7 ml-2 text-xl font-extrabold uppercase text-[#735FF2]">Create Invoice</h4>
    <form action="{{ route('submit.transaction') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="first_name">First Name:</label>
            <input class="form-control" type="text" id="first_name" name="first_name" placeholder="First Name" required>
        </div>
        <div class="form-group">
            <label for="last_name">Last Name:</label>
            <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last Name" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
        </div>
        <div class="form-group">
            <label for="phone">Phone:</label>
            <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone" required>
        </div>
        <div class="form-group">
            <label for="price">Price:</label>
            <input type="number" class="form-control" id="price" name="price" placeholder="Price" required>
        </div>
        <div>
            <button type="submit" class="btn btn-primary btn-block">Submit</button>
        </div>
    </form>
@endsection