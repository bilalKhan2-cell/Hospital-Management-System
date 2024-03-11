@extends('layout.main')

@section('title')
    Register Ward
@endsection

@section('breadcrumbs')
    @include('layout.breadcrumbs', ['title' => 'Register Ward'])
@endsection

@section('content')
    @include('admin.wards._form',[
        'departments' => $departments,
        'ward' => null,
        'method' => "POST",
        "route" => 'wards.store'
    ])
@endsection
