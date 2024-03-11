@extends('layout.main')

@section('title')
    Update User
@endsection

@section('breadcrumbs')
    @include('layout.breadcrumbs', ['title' => 'Update User'])
@endsection

@section('content')
    @include('admin.users._form', [
        'designations' => $designations,
        'method' => 'PUT',
        'route' => ['users.update', $user->id],
        'user' => $user,
    ])
@endsection
