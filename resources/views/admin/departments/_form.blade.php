{!! Form::open([
    'route' => $department == null ? 'departments.store' : ['departments.update', $department->id],
    'method' => $department == null ? 'POST' : 'PUT',
]) !!}

<div class="row">
    <div class="col-sm-4">
        <div class="form-group">
            {!! Form::label('Department Name', '') !!}
            {!! Form::text('name', $department == null ? '' : $department->name, [
                'class' => 'form-control',
                'id' => 'txtDepartmentName',
            ]) !!}
            @error('name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="col-sm-8">
        <div class="form-group">
            {!! Form::label('Comments (if any):', '') !!}
            {!! Form::text('description', $department == null ? '' : $department->description, [
                'class' => 'form-control',
                'id' => 'txtDepartmentDescrption',
            ]) !!}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-4">
        <div class="form-group">
            {!! Form::label('Select Block', '') !!}
            {!! Form::select('block', $blocks, $department == null ? '' : $department->block_id, [
                'class' => 'form-control',
                'id' => 'slctBlock',
            ]) !!}
        </div>
    </div>

    <div class="col-sm-2 mt-2">
        <div class="form-group">
            @if ($department == null)
                {{ Form::submit('Register', ['class' => 'btn btn-sm btn-success']) }}
            @else
                {{ Form::submit('Update', ['class' => 'btn btn-sm btn-primary']) }}
            @endif
            <a href="{{ route('departments.index') }}" class="btn btn-sm btn-danger">Cancel</a>
        </div>
    </div>
</div>

{{ Form::close() }}
