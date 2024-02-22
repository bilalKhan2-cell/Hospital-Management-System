@extends('layout.main')

@section('title')
    Update Ward Data
@endsection

@section('breadcrumbs')
    @include('layout.breadcrumbs', ['title' => 'Update Ward Data'])
@endsection

@section('content')
    {!! Form::open(['route' => ['wards.update', $ward->id], 'method' => 'PUT']) !!}

    <div class="row">
        <div class="col-sm-4">
            <div class="form-group">
                {!! Form::label('Name', '') !!}
                {!! Form::text('name', $ward->name, ['class' => 'form-control', 'id' => 'txtWardName']) !!}
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                {!! Form::label('Select Department', '') !!}
                {!! Form::select('department', $departments, $ward->department->id, [
                    'class' => 'form-control',
                    'id' => 'slctDepartment',
                ]) !!}
            </div>
        </div>
    </div>

    <div class="row mt-2">
        <div class="col-sm-12">
            <div class="form-group">
                {!! Form::label('Comments (if any)', '') !!}
                {!! Form::text('description', $ward->description, ['class' => 'form-control', 'id' => 'txtWardDescription']) !!}
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
