@extends('layout.main')

@section('title')
    Register Ward
@endsection

@section('breadcrumbs')
    @include('layout.breadcrumbs', ['title' => 'Register Ward'])
@endsection

@section('content')
    {!! Form::open(['route' => 'wards.store', 'method' => 'POST']) !!}

    <div class="row">
        <div class="col-sm-4">
            <div class="form-group">
                {!! Form::label('Name', '') !!}
                {!! Form::text('name', '', ['class' => 'form-control', 'id' => 'txtWardName']) !!}
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                {!! Form::label('Select Department', '') !!}
                {!! Form::select('department', $departments, null, ['class' => 'form-control', 'id' => 'slctDepartment']) !!}
            </div>
        </div>
    </div>

    <div class="row mt-2">
        <div class="col-sm-12">
            <div class="form-group">
                {!! Form::label('Comments (if any)', '') !!}
                {!! Form::text('description', '', ['class' => 'form-control', 'id' => 'txtWardDescription']) !!}
            </div>
        </div>
    </div>

    <div class="row mt-1">
        <div class="col-sm-4">
            <div class="form-group">
                {{ Form::submit('Register', ['class' => 'btn mt-2  btn-sm btn-success']) }}
                <a href="{{ route('wards.index') }}" class="btn  mt-2 btn-sm btn-danger">Cancel</a>
            </div>
        </div>
    </div>

    {!! Form::close() !!}
@endsection
