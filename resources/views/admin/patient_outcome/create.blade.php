@extends('layout.main')

@section('title') Submit Outcome @endsection

@section('breadcrumbs')
    @include('layout.breadcrumbs', ['title' => "Submit Outcomes"])
@endsection

@dd($in_patients)
@php
    $patients = $in_patients->patient
@endphp

@section('content')
    <div class="row">
        <div class="col-sm-3">
            <div class="form-group">
                {!! Form::label('Select Patient','') !!}
                {!! Form::select('patient_id',$patients,'',['id' => 'slctPatient','class' => 'form-control']) !!}
            </div>
        </div>
    </div>
@endsection