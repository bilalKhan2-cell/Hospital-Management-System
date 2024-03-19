@extends('layout.main')

@section('title')
    404 Not Found
@endsection

@section('breadcrumbs')
    @include('layout.breadcrumbs', ['title' => 'Error 404'])
@endsection

@section('content')
    <div class="col-lg-12 text-center">
        <h1><span class="text-xxxl text-light">404 <i class="fa fa-search-minus text-primary"></i></span></h1>
        <h2 class="text-light">The Requested Resource Doesn't Exist</h2>
        <a href="{{ route('dashboard') }}" class="btn btn-danger btn-sm">Go Back</a>
    </div>
@endsection
