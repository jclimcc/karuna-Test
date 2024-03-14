@extends('layouts.layout')
@section('content')
    <div class="flex flex-row justify-between">
        <h1 class="text-3xl font-bold ">Laravel Table</h1>
        <a href="{{ route('products.create') }}"
            class="cursor-pointer content-center py-4 px-2 bg-green-500 rounded-md text-white">Create New Product</a>
    </div>
    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert"
            onclick="this.style.display='none'">
            <strong class="font-bold">Success!</strong>
            <span class="block sm:inline">{{ session('success') }}</span>
            <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 20 20">
                    <title>Close</title>
                    <path
                        d="M14.348 5.652a.5.5 0 0 1 0 .707L10.707 10l3.641 3.641a.5.5 0 0 1-.707.707L10 10.707 6.359 14.348a.5.5 0 0 1-.707-.707L9.293 10 5.652 6.359a.5.5 0 0 1 .707-.707L10 9.293l3.641-3.641a.5.5 0 0 1 .707 0z" />
                </svg>
            </span>
        </div>
    @endif
    <div class="flex justify-end my-2">
        <form action="{{ route('products.index') }}" method="GET">
            <input type="text" class="border border-gray-300 rounded-md " name="search" placeholder="Search products"
                value="{{ request('search') }}">
            <button type="submit" class="cursor-pointer content-center py-1 px-2 bg-gray-400 rounded-md">Search</button>
        </form>
    </div>
    <div class="grid pt-3">

        <table class="table-auto border-collapse border ">
            <thead>
                <tr>
                    <th class="border border-slate-300 font-bold text-xl">No</th>
                    <th class="border border-slate-300 font-bold text-xl">Name</th>
                    <th class="border border-slate-300 font-bold text-xl">Price(RM)</th>
                    <th class="border border-slate-300 font-bold text-xl">Details</th>
                    <th class="border border-slate-300 font-bold text-xl">Published</th>
                    <th class="border border-slate-300 font-bold text-xl">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td class="border border-slate-30 py-2 px-3">{{ $product->id }}</td>
                        <td class="border border-slate-300 py-2 px-3">{{ $product->name }}</td>
                        <td class="border border-slate-300 py-2 px-3">{{ $product->price }}</td>
                        <td class="border border-slate-300 py-2 px-3" title="{{ $product->details }}">
                            {{ \Illuminate\Support\Str::words($product->details, 5, '...') }}</td>
                        <td class="border border-slate-300 py-2 px-3">{{ $product->published ? 'YES' : 'NO' }}</td>
                        <td class="border border-slate-300 py-2 px-3">
                            <a href="{{ route('products.show', $product) }}" class=" btn-show"> Show </a>
                            <a href="{{ route('products.edit', $product) }}" class=" btn-edit"> Edit </a>
                            <a href="{{ route('products.destroy', $product) }}" class="btn-delete"
                                onclick="event.preventDefault(); if(confirm('Are you sure you want to delete this product?')) { document.getElementById('delete-form-{{ $product->id }}').submit(); }">
                                Delete </a>
                            <form id="delete-form-{{ $product->id }}" action="{{ route('products.destroy', $product) }}"
                                method="POST" style="display: none;">
                                @csrf
                                @method('DELETE')
                            </form>
                        </td>
                    </tr>
                @endforeach


            </tbody>
        </table>

    </div>
@endsection
