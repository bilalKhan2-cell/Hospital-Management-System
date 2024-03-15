@extends('layout.main')

@section('title')
    Register Patient
@endsection

@section('breadcrumbs')
    @include('layout.breadcrumbs', ['title' => 'Register Patient'])
@endsection

@section('content')
    @include('admin.patients._form',[
        'method' => "POST",
        'patient' => null,
        'route' => 'patients.store',
        'doctors' => $doctors
    ])
@endsection

@push('script')
    <script>
        $("#slctDoctor").select2();
    </script>
@endpush
