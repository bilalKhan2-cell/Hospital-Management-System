@extends('layout.main')

@section('title')
    Manage Doctors
@endsection

@section('breadcrumbs')
    @include('layout.breadcrumbs', ['title' => 'Manage Doctors'])
@endsection

@push('style')
    <style>
        .noarrow {
            cursor: default;
        }
    </style>
@endpush

@section('content')
    @if (session()->has('success'))
        {!! ShowAlert('success', session()->get('success'), 'Success') !!}
    @endif

    <a href="{{ route('doctors.create') }}" class="btn btn-primary float-end btn-sm">Register Doctor</a>
    <br><br>
    <table id="tblDoctors" class="table table-hover table-striped small">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Contact Info</th>
                <th>CNIC</th>
                <th>Specialization</th>
                <th>Department</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>
@endsection

@push('script')
    <script>
        $('#tblDoctors').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('doctors.index') }}",
            columns: [{
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'email',
                    name: 'email'
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
                    data: 'specialization',
                    name: 'specialization'
                },
                {
                    data: 'doctor_department',
                    name: 'doctor_department',
                    render: function(result) {
                        return result.name;
                    }
                },
                {
                    data: 'status',
                    name: 'status',
                    render: function(result) {
                        return result == 0 ? "<span class='btn btn-xs btn-danger noarrow'>Inactive</span>" :
                            "<span class='btn btn-xs btn-success noarrow'>Active</span>"
                    }
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
