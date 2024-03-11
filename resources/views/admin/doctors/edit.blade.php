@extends('layout.main')

@section('title')
    Edit Doctor Detail's
@endsection

@section('breadcrumbs')
    @include('layout.breadcrumbs', ['title' => 'Edit Doctor Detail\'s'])
@endsection

@section('content')
    @include('admin.doctors._form', [
        'departments' => $departments,
        'doctor' => $doctor,
        'method' => 'PUT',
        'route' => ['doctors.update',$doctor->id],
        'specializations' => $specializations,
    ])
@endsection
