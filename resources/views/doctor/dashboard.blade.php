@extends('layout.doctor.main')

@section('title') Welcome {!! Auth::guard('doctor')->user()->id !!} @endsection

@section('breadcrumbs')
    @include('layout.breadcrumbs',['title' => "Dashboard"])
@endsection

@section('content')
    <span class="text-primary">Welcome!</span>
@endsection