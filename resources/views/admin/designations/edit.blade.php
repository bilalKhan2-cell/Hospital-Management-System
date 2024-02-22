@extends('layout.main')

@section('title')
    Update Designation
@endsection

@section('breadcrumbs')
    @include('layout.breadcrumbs', ['title' => 'Update Designation'])
@endsection

@section('content')
    {!! Form::open(['route' => ['designations.update',$designation->id], 'method' => 'PUT']) !!}

    <div class="row">
        <div class="col-sm-4">
            <div class="form-group">
                {!! Form::label('name', 'Name') !!}
                {{ Form::text('name', $designation->name, ['class' => 'form-control', 'id' => 'txtDesignationTitle']) }}
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-sm-8">
            <div class="form-group">
                {!! Form::label('desc', 'Description') !!}
                {{ Form::text('comments', $designation->comments, ['class' => 'form-control', 'id' => 'txtDesignationDescription']) }}
            </div>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-sm-3">
            <div class="form-group">
                {{ Form::submit('Update', ['class' => 'btn btn-sm btn-primary']) }}
                <a href="{{ route('designations.index') }}" class="btn btn-sm btn-danger">Cancel</a>
            </div>
        </div>
    </div>

    {!! Form::close() !!}
@endsection
