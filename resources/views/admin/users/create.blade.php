@extends('layout.main')

@section('title')
    Create User
@endsection

@section('breadcrumbs')
    @include('layout.breadcrumbs', ['title' => 'Create User'])
@endsection

@section('content')
    @include('admin.users._form',[
        'designations' => $designations,
        'method' => 'POST',
        'route' => 'users.store',
        'user' => null
    ])
@endsection
