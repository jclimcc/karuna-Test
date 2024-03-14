@extends('layouts.layout')
@section('content')
    @include('products.form', [
        'action' => route('products.update', $product),
        'method' => 'PUT',
        'buttonText' => 'Submit',
        'pageSubTitle' => 'Edit Product',
    ])
@endsection
