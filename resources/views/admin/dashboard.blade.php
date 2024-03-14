@extends('layout.main')

@section('title') Admin @endsection

@section('breadcrumbs')
    @include('layout.breadcrumbs',['title' => "Welcome"])
@endsection

@section('content')
    <div class="container">
        <span class="text-success h3">Welcome, {{Auth::user()->name}}!</span>
    </div>
@endsection