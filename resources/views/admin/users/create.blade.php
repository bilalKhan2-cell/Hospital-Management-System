@extends('layout.main')

@section('title')
    Create User
@endsection

@section('breadcrumbs')
    @include('layout.breadcrumbs', ['title' => 'Create User'])
@endsection

@section('content')
    {!! Form::open(['route' => 'users.store', 'method' => 'POST']) !!}

    <div class="row">
        <div class="col-sm-4">
            <div class="form-group">
                {!! Form::label('Username', '') !!}
                {!! Form::text('Name', '', ['class' => 'form-control', 'id' => 'txtUsername']) !!}
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="col-sm-4">
            <div class="form-group">
                {!! Form::label('Email', '') !!}
                {!! Form::email('Email', '', ['class' => 'form-control', 'id' => 'txtUserEmail']) !!}
                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                {!! Form::label('Contact Info', '') !!}
                {!! Form::text('contact_info', '', ['class' => 'form-control', 'id' => 'txtContactInfo']) !!}
                @error('contact_info')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
    </div>

    <div class="row mt-2">
        <div class="col-sm-4">
            <div class="form-group">
                {!! Form::label('CNIC', '') !!}
                {!! Form::text('cnic', '', ['class' => 'form-control', 'id' => 'txtCNIC']) !!}
                @error('cnic')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="col-sm-2">
            <div class="form-group">
                {!! Form::label('Status', '') !!}
                {!! Form::select('status', ['1' => 'Active', '0' => 'Inactive'], '', [
                    'class' => 'form-control',
                    'id' => 'slctAccountStatus',
                ]) !!}
            </div>
        </div>

        <div class="col-sm-4">
            <div class="form-group">
                {!! Form::label('Select Designation', '') !!}
                {!! Form::select('designation_id', $designations, '', [
                    'class' => 'form-control',
                    'id' => 'slctAccountStatus',
                ]) !!}
            </div>
        </div>

        <div class="col-sm-12">
            <div class="form-group">
                {!! Form::label('Address', '') !!}
                {!! Form::text('address', '', ['class' => 'form-control', 'id' => 'txtAddress']) !!}
                @error('address')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="col-sm-4">
            <div class="form-group">
                {{ Form::submit('Register', ['class' => 'btn mt-2  btn-sm btn-success']) }}
                <a href="{{ route('users.index') }}" class="btn  mt-2 btn-sm btn-danger">Cancel</a>
            </div>
        </div>
    </div>

    {!! Form::close() !!}
@endsection
