@extends('layout.main')

@section('title')
    Edit Medicine
@endsection

@section('breadcrumbs')
    @include('layout.breadcrumbs', ['title' => 'Edit Medicine'])
@endsection

@section('content')
    @include('admin.medicines._form', [
        'dosage_forms' => $dosages,
        'medicine' => $medicine,
        'method' => 'PUT',
        'route' => ['medicines.update', $medicine->id],
    ])
@endsection
