@extends('layout.main')

@section('title')
    Submit Outcome
@endsection

@section('breadcrumbs')
    @include('layout.breadcrumbs', ['title' => 'Submit Outcomes'])
@endsection

@section('content')
    {!! Form::open(['route' => 'patients.store_outcome', 'method' => 'POST']) !!}
    <div class="row">
        <div class="col-sm-3">
            <div class="form-group">
                {!! Form::label('Select Patient', '') !!}
                {!! Form::select('patient_id', $in_patients, '', ['id' => 'slctPatient', 'class' => 'form-control-sm']) !!}
                @error('patient_id') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="col-sm-3">
            <div class="form-group">
                {!! Form::label('Select Surgery Outcome,', '') !!}
                {!! Form::select('patient_outcome', $outcome_list, '', [
                    'id' => 'slctPatientOutcome',
                    'class' => 'form-control-sm',
                ]) !!}
            </div>
        </div>
        <div class="col-sm-3">
            <div class="form-group">
                {!! Form::label('Notes (if any):', '') !!}
                {!! Form::text('notes', '', ['id' => 'txtPatientOutcomeNotes', 'class' => 'form-control']) !!}
            </div>
        </div>
        <div class="col-sm-3">
            <div class="form-group">
                {!! Form::submit('Save', ['id' => 'btnSubmit', 'class' => 'btn btn-sm btn-success']) !!}
                <a href="{{ route('patients.show_outcome') }}" class="btn btn-danger btn-sm">Cancel</a>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
@endsection

@push('script')
    <script>
        $("#slctPatient").select2();
        $("#slctPatientOutcome").select2();
    </script>
@endpush
