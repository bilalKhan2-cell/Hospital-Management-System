@extends('layout.main')

@section('title')
    Register Doctor
@endsection

@section('breadcrumbs')
    @include('layout.breadcrumbs', ['title' => 'Register Doctor'])
@endsection

@section('content')
    {!! Form::open(['route' => 'doctors.store', 'method' => 'POST']) !!}
    <div class="row">
        <div class="col-sm-4">
            <div class="form-group">
                {!! Form::label('Doctor Name', '') !!}
                {!! Form::text('name', '', ['id' => 'txtDoctorName', 'class' => 'form-control']) !!}
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="col-sm-3">
            <div class="form-group">
                {!! Form::label('Select Gender', '') !!}
                {!! Form::select('gender', ['Male' => 'Male', 'Female' => 'Female'], '', [
                    'class' => 'form-control select',
                    'id' => 'slctAccountStatus',
                ]) !!}
            </div>
        </div>

        <div class="col-sm-3">
            {!! Form::label('Enter Date-of-Birth:', '') !!}
            {!! Form::date('dob', '', ['id' => 'txtDoctorDateofBrith', 'class' => 'form-control']) !!}
        </div>
    </div>
    {!! Form::close() !!}
@endsection
