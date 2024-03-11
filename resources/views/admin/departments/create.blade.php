@extends('layout.main')

@section('title')
    Register Department
@endsection

@section('breadcrumbs')
    @include('layout.breadcrumbs', ['title' => 'Register Department'])
@endsection

@section('content')
    @include('admin.departments._form', ['department' => null, 'block' => $blocks])
@endsection
