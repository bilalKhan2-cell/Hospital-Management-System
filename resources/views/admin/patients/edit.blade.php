@extends('layout.main')

@section('title')
    Edit Patient
@endsection

@section('breadcrumbs')
    @include('layout.breadcrumbs', ['title' => 'Edit Patient Detail\'s'])
@endsection

@section('content')
    @include('admin.patients._form', [
        'method' => 'PUT',
        'patient' => $patient,
        'doctors' => $doctors,
        'route' => ['patients.update',$patient->id],
    ])
@endsection
