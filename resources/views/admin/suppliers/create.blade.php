@extends('layout.main')

@section('title')
    Register Supplier
@endsection

@section('breadcrumbs')
    @include('layout.breadcrumbs', ['title' => 'Register Supplier'])
@endsection

@section('content')
    @include('admin.suppliers._form', [
        'method' => 'POST',
        'route' => 'suppliers.store',
        'supplier' => null,
    ])
@endsection
