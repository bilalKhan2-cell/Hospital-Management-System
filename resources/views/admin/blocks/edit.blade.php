@extends('layout.main')

@section('title')
    Register Block
@endsection

@section('breadcrumbs')
    @include('layout.breadcrumbs', ['title' => 'Register Block'])
@endsection

@section('content')
    {!! Form::open(['route' => ['blocks.update',$block->id], 'method' => 'PUT']) !!}

    <div class="row">
        <div class="col-sm-4">
            <div class="form-group">
                {!! Form::label('name', 'Name') !!}
                {{ Form::text('name', $block->name, ['class' => 'form-control', 'id' => 'txtBlockName']) }}
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-sm-8">
            <div class="form-group">
                {!! Form::label('desc', 'Description') !!}
                {{ Form::text('description', $block->description, ['class' => 'form-control', 'id' => 'txtBlockDescription']) }}
            </div>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-sm-3">
            <div class="form-group">
                {{ Form::submit('Update', ['class' => 'btn btn-sm btn-primary']) }}
                <a href="{{ route('blocks.index') }}" class="btn btn-sm btn-danger">Cancel</a>
            </div>
        </div>
    </div>

    {!! Form::close() !!}
@endsection
