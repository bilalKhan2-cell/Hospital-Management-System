@extends('layout.doctor.main')

@section('title')
    Manage Patients
@endsection

@section('breadcrumbs')
    @include('layout.breadcrumbs', ['title' => 'Manage Patients'])
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <table id="tblPatients" class="table small table-hover table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Patient MRNo.</th>
                        <th>Patient Name</th>
                        <th>Age</th>
                        <th>Gender</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>
@endsection

@push('script')
    <script>
        $(document).ready(function() {
            $("#tblPatients").DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('doctors.show_patients') }}",
                columns: [{
                        data: 'id',
                        name: 'id',
                        render: function(result) {
                            return "MR-" + result;
                        }
                    },
                    {
                        data: 'name',
                        name: 'name'
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
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    }
                ]
            });
        });
    </script>
@endpush
