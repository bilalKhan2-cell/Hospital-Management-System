@extends('layout.main')

@section('title')
    Edit Supplier Details
@endsection

@section('breadcrumbs')
    @include('layout.breadcrumbs', ['title' => 'Edit Supplier Details'])
@endsection

@section('content')
    @include('admin.suppliers._form', [
        'method' => 'PUT',
        'route' => ['suppliers.update',$supplier->id],
        'supplier' => $supplier,
    ])
@endsection
