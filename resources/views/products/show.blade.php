@extends('layouts.layout')
@section('content')
    <div class="flex flex-row justify-between">
        <h1 class="text-3xl font-bold ">Show Product</h1>
        <a href="{{ url()->previous() }}"
            class="cursor-pointer content-center py-4 px-6 bg-blue-700  text-white font-semibold rounded-md">Back</a>
    </div>
    <div class="form-group pt-5">
        <label for="name" class="font-bold">Name</label>: <span>{{ $product->name }}</span>

    </div>

    <div class="form-group pt-5">
        <label for="price" class="font-bold">Price(RM)</label>: <span>{{ $product->price }}</span>

    </div>
    <div class="form-group pt-5">
        <label for="details" class="font-bold">Details</label>: <span>{{ $product->details }}</span>

    </div>
    <div class="form-group pt-5">
        <label for="published" class="font-bold">Publish</label>: <span>{{ $product->published ? 'YES' : 'NO' }}</span>

    </div>
@endsection
