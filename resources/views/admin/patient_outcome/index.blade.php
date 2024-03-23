@extends('layout.main')

@section('title') Manage Patient Outcomes @endsection

@section('breadcrumbs')
    @include('layout.breadcrumbs',['title' => 'Manage Patient Outcomes'])
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12">

            @if(session()->has('success'))
                {!! ShowUnCardAlert('success',session()->get('success')) !!}
            @endif

            <a href="{{route('patients.create_outcomes')}}" class="btn btn-success btn-sm">Manage Outcomes</a>
            <br><br>
            <table id="tblPatientsOutcome" class="table small table-hover table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Patient MR</th>
                        <th>Patient Name</th>
                        <th>Ward</th>
                        <th>Surgery Outcome</th>
                        <th>Result Date</th>
                        <th>Submitted By</th>
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
        $("#tblPatientsOutcome").DataTable({
            processing:true,
            serverSide:true,
            ajax:"{{route('patients.show_outcome')}}",
            columns:[
                {
                    data:'patient_recieving',
                    name:'patient_recieving',
                    render:function(result){
                        return "MR-"+result.patient.id
                    }
                },
                {
                    data:'patient_recieving',
                    name:'patient_recieving',
                    render:function(result){
                        return result.patient.name;
                    }
                },
                {
                    data:'patient_recieving',
                    name:'patient_recieving',
                    render:function(result){
                        return result.ward.name
                    }
                },
                {
                    data:'patient_outcome',
                    name:'patient_outcome'
                },
                {
                    data:'result_date',
                    name:'result_date'
                },
                {
                    data:'user',
                    name:'user',
                    render:function(result){
                        return "USER-"+result.id+" (" + result.name +")";
                    }
                },
                {
                    data:'action',
                    name:'action',
                    orderable:false,
                    searchable:false
                }
            ]
        });
    </script>
@endpush
