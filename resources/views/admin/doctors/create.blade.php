@extends('layout.main')

@section('title')
    Register Doctor
@endsection

@section('breadcrumbs')
    @include('layout.breadcrumbs', ['title' => 'Register Doctor'])
@endsection

@section('content')
    @include('admin.doctors._form',[
        'departments' => $departments,
        'doctor' => null,
        'method' => "POST",
        'route' => 'doctors.store',
        'specializations' => $specializations
    ])
@endsection
