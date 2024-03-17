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

            @if (session()->has('success'))
                {!! ShowUnCardAlert('success', session()->get('success')) !!}
            @endif

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

    <div class="modal fade" id="WardModal" data-backdrop="static" tabindex="-1" role="dialog"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Patient Admitting Request</h5>
                </div>
                <div class="modal-body">
                    {!! Form::open(['route' => 'patient.admit', 'method' => 'POST']) !!}

                    {!! Form::hidden('patient_id', '',['id' => "txtPatientID"]) !!}

                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                {!! Form::label('Select Ward', '') !!}
                                {!! Form::select('ward_id', $ward_list, '', ['id' => 'slctWards', 'class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="col-sm-2">
                            {!! Form::submit('Submit', ['id' => 'btnAdmitPatient', 'class' => 'btn btn-success btn-sm']) !!}
                        </div>
                    </div>

                    {!! Form::close() !!}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                </div>
            </div>
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

        function CreateAdmitRequest(e) {
            let patient_id = e.parentNode.parentNode.childNodes[0].innerText.substring(3);
            $("#txtPatientID").val(patient_id);
        }
    </script>
@endpush
