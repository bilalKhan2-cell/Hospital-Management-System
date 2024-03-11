@extends('layout.main')

@section('title')
    Update Ward Data
@endsection

@section('breadcrumbs')
    @include('layout.breadcrumbs', ['title' => 'Update Ward Data'])
@endsection

@section('content')
    @include('admin.wards._form', [
        'departments' => $departments,
        'ward' => $ward,
        'method' => 'PUT',
        'route' => ['wards.update',$ward->id],
    ])
@endsection
