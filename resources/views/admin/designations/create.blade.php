@extends('layout.main')

@section('title')
    Create Designation
@endsection

@section('breadcrumbs')
    @include('layout.breadcrumbs', ['title' => 'Create Designation'])
@endsection

@section('content')
    {!! Form::open(['route' => 'designations.store', 'method' => 'POST']) !!}

    <div class="row">
        <div class="col-sm-4">
            <div class="form-group">
                {!! Form::label('name', 'Name') !!}
                {{ Form::text('name', '', ['class' => 'form-control', 'id' => 'txtDesignationTitle']) }}
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-sm-8">
            <div class="form-group">
                {!! Form::label('desc', 'Description') !!}
                {{ Form::text('comments', '', ['class' => 'form-control', 'id' => 'txtDesignationDescription']) }}
            </div>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-sm-3">
            <div class="form-group">
                {{ Form::submit('Submit', ['class' => 'btn btn-sm btn-success']) }}
                <a href="{{ route('designations.index') }}" class="btn btn-sm btn-danger">Cancel</a>
            </div>
        </div>
    </div>

    {!! Form::close() !!}
@endsection
