@extends('layout.main')

@section('title')
    Manage Patient Recieving
@endsection

@section('breadcrumbs')
    @include('layout.breadcrumbs', ['title' => 'Manage Patient Recieving'])
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <table id="tblPatientsRecievingsRequests" class="table small table-hover table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Patient ID</th>
                        <th>Patient Name</th>
                        <th>Patient Father Name</th>
                        <th>Contact Info</th>
                        <th>CNIC</th>
                        <th>Requested By</th>
                        <th>Admitted</th>
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
        $("#tblPatientsRecievingsRequests").DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('patients.admitting') }}",
            columns: [{
                    data: 'patient',
                    name: 'patient',
                    render: function(result) {
                        return "MR-" + result.id
                    }
                },
                {
                    data: 'patient',
                    name: 'patient',
                    render: function(result) {
                        return result.name
                    }
                },
                {
                    data: 'patient',
                    name: 'patient',
                    render: function(result) {
                        return result.fname
                    }
                },
                {
                    data: 'patient',
                    name: 'patient',
                    render: function(result) {
                        return result.contact_info
                    }
                },
                {
                    data: 'patient',
                    name: 'patient',
                    render: function(result) {
                        return result.cnic
                    }
                },
                {
                    data: 'patient',
                    name: 'patient',
                    render: function(result) {
                        return "DR-" + result.doctor.name;
                    }
                },
                {
                    data: 'is_admitted',
                    name: 'is_admitted',
                    render: function(result) {
                        if (result == 1) {
                            return '<span class="text-success text-sm">Admitted</span>';
                        } else {
                            return '<span class="text-danger text-sm0">Not Admitted</span>';
                        }
                    }
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                }
            ]
        })
    </script>
@endpush
