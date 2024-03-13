@extends('layout.main')

@section('title')
    Register Medicine
@endsection

@section('breadcrumbs')
    @include('layout.breadcrumbs', ['title' => 'Register Medicine'])
@endsection

@section('content')
    @include('admin.medicines._form', [
        'dosage_forms' => $dosages,
        'medicine' => null,
        'method' => 'POST',
        'route' => 'medicines.store',
    ])
@endsection
