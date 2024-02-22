@extends('layout.main')

@section('title')
    Register Department
@endsection

@section('breadcrumbs')
    @include('layout.breadcrumbs', ['title' => 'Update Department'])
@endsection

@section('content')
    {!! Form::open(['route' => ['departments.update',$department->id], 'method' => 'PUT']) !!}

    <div class="row">
        <div class="col-sm-4">
            <div class="form-group">
                {!! Form::label('Department Name', '') !!}
                {!! Form::text('name', $department->name, ['class' => 'form-control', 'id' => 'txtDepartmentName']) !!}
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="col-sm-8">
            <div class="form-group">
                {!! Form::label('Comments (if any):', '') !!}
                {!! Form::text('description', $department->description, ['class' => 'form-control', 'id' => 'txtDepartmentDescrption']) !!}
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-4">
            <div class="form-group">
                {!! Form::label('Select Block', '') !!}
                {!! Form::select('block', $blocks ,$department->block->id, ['class' => 'form-control', 'id' => 'slctBlock']) !!}
            </div>
        </div>

        <div class="col-sm-2 mt-2">
            <div class="form-group mt-2">
                {{ Form::submit('Update', ['class' => 'btn mt-2  btn-sm btn-primary']) }}
                <a href="{{ route('departments.index') }}" class="btn  mt-2 btn-sm btn-danger">Cancel</a>
            </div>
        </div>
    </div>

    {{ Form::close() }}
@endsection
