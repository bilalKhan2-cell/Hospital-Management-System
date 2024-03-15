@extends('layout.main')

@section('title')
    Register Department
@endsection

@section('breadcrumbs')
    @include('layout.breadcrumbs', ['title' => 'Update Department'])
@endsection

@section('content')
    @include('admin.departments._form', ['department' => $department, 'block' => $blocks])
@endsection

@push('script')
    <script>
        $("#slctBlock").select2();
    </script>
@endpush