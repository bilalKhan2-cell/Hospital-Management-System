@extends('layout.main')

@section('title')
    Stock Request
@endsection

@section('breadcrumbs')
    @include('layout.breadcrumbs', ['title' => 'Manage Stock Request'])
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12">

            @if (session()->has('success'))
                {!! ShowAlert('success', session()->get('success'), 'Success') !!}
            @endif

            <a href="{{ route('patients.create') }}" class="btn btn-btn btn-primary btn-sm">Register Patient</a>
            <br><br>
            <table id="tblPatients" class="table table-hover table-striped small">
                <thead>
                    <tr>
                        <th>Request ID</th>
                        <th></th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection
