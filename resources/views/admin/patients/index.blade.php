@extends('layout.main')

@section('title')
    Patients
@endsection

@section('breadcrumbs')
    @include('layout.breadcrumbs', ['title' => 'Manage Patients Records'])
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
                        <th>Patient MrNo</th>
                        <th>Name</th>
                        <th>Father Name</th>
                        <th>Age</th>
                        <th>Gender</th>
                        <th>CNIC</th>
                        <th>Contact Info</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>
@endsection

@push('script')
    <script>
        $('#tblPatients').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('patients.index') }}",
            columns: [{
                    data: 'id',
                    name: 'id',
                    render: function(resp) {
                        return "MR-" + resp;
                    }
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'fname',
                    name: 'fname'
                },
                {
                    data: 'age',
                    name: 'age'
                },
                {
                    data: 'gender',
                    name: 'gender'
                },
                {
                    data: 'contact_info',
                    name: 'contact_info'
                },
                {
                    data: 'cnic',
                    name: 'cnic'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                },
            ]
        });
    </script>
@endpush
