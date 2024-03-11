{!! Form::open([
    'route' => $designation == null ? 'designations.store' : ['designations.update', $designation->id],
    'method' => $designation == null ? 'POST' : 'PUT',
]) !!}

<div class="row">
    <div class="col-sm-4">
        <div class="form-group">
            {!! Form::label('name', 'Name') !!}
            {{ Form::text('name', $designation == null ? '' : $designation->name, ['class' => 'form-control', 'id' => 'txtDesignationTitle']) }}
            @error('name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
    <div class="col-sm-8">
        <div class="form-group">
            {!! Form::label('desc', 'Description') !!}
            {{ Form::text('comments', $designation == null ? '' : $designation->description, ['class' => 'form-control', 'id' => 'txtDesignationDescription']) }}
        </div>
    </div>
</div>
<div class="row mt-2">
    <div class="col-sm-3">
        <div class="form-group">
            @if ($designation == null)
                {{ Form::submit('Register', ['class' => 'btn btn-sm btn-success']) }}
            @else
                {{ Form::submit('Update', ['class' => 'btn btn-sm btn-primary']) }}
            @endif <a href="{{ route('designations.index') }}"
                class="btn btn-sm btn-danger">Cancel</a>
        </div>
    </div>
</div>

{!! Form::close() !!}
