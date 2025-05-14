@extends('layouts.main')
@push('title')
    <title>Home Page</title>
@endpush
@section('content')

@include('categories.listcategory')
@include('products.listproduct')
@endsection