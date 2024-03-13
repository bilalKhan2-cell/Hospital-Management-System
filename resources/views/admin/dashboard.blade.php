@extends('layout.main')

@section('title') Admin @endsection

@section('breadcrumbs')
    @include('layout.breadcrumbs',['title' => "Welcome"])
@endsection

@section('content')
    <div class="container">
        <h3 class="text-secondary">Welcome Admin!</h3>
    </div>
@endsection