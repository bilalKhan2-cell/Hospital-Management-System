@extends('layout.main')

@section('title')
    Submit Request
@endsection

@section('breadcrumbs')
    @include('layout.breadcrumbs', ['title' => 'Submit Request'])
@endsection

@section('content')
    {!! Form::open(['route' => ['patients.store_admitting', 'id' => $patient->id], 'method' => 'POST']) !!}
    <div class="row">
        <div class="col-sm-3">
            <div class="form-group">
                {!! Form::label('Patient MR') !!}
                {!! Form::text('mrno', 'MR-' . $patient->id, [
                    'id' => 'txtPatientMrNo',
                    'class' => 'form-control',
                    'readonly' => 'readonly',
                ]) !!}
            </div>
        </div>
        <div class="col-sm-3">
            <div class="form-group">
                {!! Form::label('Patient Name', '') !!}
                {!! Form::text('name', $patient->name, [
                    'id' => 'txtPatientName',
                    'class' => 'form-control',
                    'readonly' => 'readonly',
                ]) !!}
            </div>
        </div>

        <div class="col-sm-3">
            <div class="form-group">
                {!! Form::label('Shifting To', '') !!}
                {!! Form::text('ward_id', $patient_recieving->ward->name, [
                    'id' => 'txtPatientWard',
                    'class' => 'form-control',
                    'readonly' => 'readonly',
                ]) !!}
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-sm-3">
            <div class="form-group">
                {!! Form::label('Attendant Name', '') !!}
                {!! Form::text('attendant_name', $patient_recieving->attendant_name, [
                    'id' => 'txtPatientAttendantName',
                    'class' => 'form-control',
                ]) !!}
                @error('attendant_name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="col-sm-3">
            <div class="form-group">
                {!! Form::label('Attendant CNIC', '') !!}
                {!! Form::text('cnic', $patient_recieving->attendant_cnic, ['id' => 'txtPatientAttendantCNIC', 'class' => 'form-control']) !!}
                @error('cnic')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="col-sm-3">
            <div class="form-group">
                {!! Form::label('Contact Info', '') !!}
                {!! Form::text('contact_info', $patient_recieving->attendant_contact_info, [
                    'id' => 'txtPatientContactInfo',
                    'class' => 'form-control',
                ]) !!}
                @error('contact_info')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="col-sm-3">
            <div class="form-group">
                {!! Form::submit('Submit', ['id' => 'btnSubmit', 'class' => 'btn btn-sm btn-primary']) !!}
                <a href="{{ route('patients.admitting') }}" class="btn btn-danger btn-sm">Cancel</a>
            </div>
        </div>
    </div>

    {!! Form::close() !!}
@endsection
