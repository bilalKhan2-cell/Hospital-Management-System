@extends('layout.main')

@section('title')
    Create Designation
@endsection

@section('breadcrumbs')
    @include('layout.breadcrumbs', ['title' => 'Create Designation'])
@endsection

@section('content')
   @include('admin.designations._form',['designation' => null])
@endsection
