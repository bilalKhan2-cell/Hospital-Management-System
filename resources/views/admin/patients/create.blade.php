@extends('layout.main')

@section('title')
    Register Patient
@endsection

@section('breadcrumbs')
    @include('layout.breadcrumbs', ['title' => 'Register Patient'])
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12">
            {!! Form::open(['route' => 'patients.store', 'method' => 'POST', 'class' => 'form-validate', 'novalidate']) !!}

            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        {!! Form::label('Patient Name', '') !!}
                        {!! Form::text('name', '', ['class' => 'form-control', 'id' => 'txtUsername', 'required']) !!}
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="form-group">
                        {!! Form::label('Patient Father Name', '') !!}
                        {!! Form::text('fname', '', ['class' => 'form-control', 'id' => 'txtPatientFatherName']) !!}
                        @error('fname')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="form-group">
                        {!! Form::label('Age: ', '') !!}
                        {!! Form::number('age', '', ['class' => 'form-control', 'id' => 'txtPatientAge']) !!}
                        @error('age')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row mt-2">
                <div class="col-sm-4">
                    <div class="form-group">
                        {!! Form::label('Select Gender', '') !!}
                        {!! Form::select('gender', ['Male' => 'Male', 'Female' => 'Female'], '', [
                            'class' => 'form-control select',
                            'id' => 'slctAccountStatus',
                        ]) !!}
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="form-group">
                        {!! Form::label('CNIC', '') !!}
                        {!! Form::text('cnic', '', ['id' => 'txtPatientCnic', 'class' => 'form-control']) !!}
                        @error('cnic')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="form-group">
                        {!! Form::label('Contact Info: ', '') !!}
                        {!! Form::text('contact_info', '', ['id' => 'txtContactInfo', 'class' => 'form-control']) !!}
                        @error('contact_info')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-sm-12">
                    <div class="form-group">
                        {!! Form::label('Address', '') !!}
                        {!! Form::text('address', '', ['id' => 'txtPatientAddress', 'class' => 'form-control']) !!}
                        @error('address')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="form-group">
                        {{ Form::submit('Register', ['class' => 'btn mt-2  btn-sm btn-success']) }}
                        <a href="{{ route('patients.index') }}" class="btn  mt-2 btn-sm btn-danger">Cancel</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {!! Form::close() !!}
@endsection
