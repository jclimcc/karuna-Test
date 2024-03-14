@extends('layouts.layout')
@section('content')
    @include('products.form', [
        'action' => route('products.store'),
        'method' => 'POST',
        'buttonText' => 'Create Product',
        'pageSubTitle' => 'Add New Product',
    ])
@endsection
