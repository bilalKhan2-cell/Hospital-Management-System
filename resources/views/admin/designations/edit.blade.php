@extends('layout.main')

@section('title')
    Update Designation
@endsection

@section('breadcrumbs')
    @include('layout.breadcrumbs', ['title' => 'Update Designation'])
@endsection

@section('content')
    @include('admin.designations._form',['designation' => $designation])
@endsection
