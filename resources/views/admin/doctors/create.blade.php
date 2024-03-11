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
                {!! Form::hidden('status', 1) !!}
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
                    'id' => 'slctDoctorGender',
                ]) !!}
            </div>
        </div>

        <div class="col-sm-3">
            {!! Form::label('Enter Date-of-Birth:', '') !!}
            {!! Form::date('dob', '', ['id' => 'txtDoctorDateofBrith', 'class' => 'form-control']) !!}
            @error('dob')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="row mt-1">
        <div class="col-sm-3">
            <div class="form-group">
                {!! Form::label('Email Address', '') !!}
                {!! Form::email('email', '', ['id' => 'txtDoctorEmailAddress', 'class' => 'form-control']) !!}
                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="col-sm-3">
            <div class="form-group">
                {!! Form::label('Contact Info', '') !!}
                {!! Form::text('contact_info', '', ['id' => 'txtDoctorContactInfo', 'class' => 'form-control']) !!}
                @error('contact_info')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="col-sm-3">
            <div class="form-group">
                {!! Form::label('CNIC', '') !!}
                {!! Form::text('cnic', '', ['id' => 'txtDoctorCNIC', 'class' => 'form-control']) !!}
                @error('cnic')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="col-sm-3">
            <div class="form-group">
                {!! Form::label('Select Specialization', '') !!}
                {!! Form::select('specialization', $specializations, '', [
                    'class' => 'form-control select',
                    'id' => 'slctDoctorSpecialization',
                ]) !!}
            </div>
        </div>
    </div>

    <div class="row mt-1">
        <div class="col-sm-4">
            <div class="form-group">
                {!! Form::label('Select Department', '') !!}
                {!! Form::select('department_id', $departments, null, [
                    'class' => 'form-control',
                    'id' => 'slctDoctorDepartment',
                ]) !!}
            </div>
        </div>

        <div class="col-sm-3">
            <div class="form-group">
                {!! Form::label('Joining Date', '') !!}
                {!! Form::date('joining_date', '', ['id' => 'txtDoctorJoiningDate', 'class' => 'form-control']) !!}
                @error('joining_date')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="col-sm-12">
            <div class="form-group">
                {!! Form::label('Address', '') !!}
                {!! Form::text('address', '', ['id' => 'txtDoctorAddress', 'class' => 'form-control']) !!}
                @error('address')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="col-sm-4 mt-2">
            <div class="form-group mt-2">
                {{ Form::submit('Register', ['class' => 'btn mt-2  btn-sm btn-success']) }}
                <a href="{{ route('doctors.index') }}" class="btn  mt-2 btn-sm btn-danger">Cancel</a>
            </div>
        </div>
    </div>

    {!! Form::close() !!}
@endsection
