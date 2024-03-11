{!! Form::open(['route' => $route, 'method' => $method]) !!}

<div class="row">
    <div class="col-sm-4">
        <div class="form-group">
            {!! Form::label('Name', '') !!}
            {!! Form::text('name', $ward == null ? '' : $ward->name, ['class' => 'form-control', 'id' => 'txtWardName']) !!}
            @error('name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            {!! Form::label('Select Department', '') !!}
            {!! Form::select('department', $departments, $ward == null ? '' : $ward->department_id, [
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
            {!! Form::text('description', $ward == null ? '' : $ward->description, [
                'class' => 'form-control',
                'id' => 'txtWardDescription',
            ]) !!}
        </div>
    </div>
</div>

<div class="row mt-1">
    <div class="col-sm-4">
        <div class="form-group">
            @if ($ward == null)
                {{ Form::submit('Register', ['class' => 'btn btn-sm btn-success']) }}
            @else
                {{ Form::submit('Update', ['class' => 'btn btn-sm btn-primary']) }}
            @endif <a href="{{ route('wards.index') }}"
                class="btn  mt-2 btn-sm btn-danger">Cancel</a>
        </div>
    </div>
</div>

{!! Form::close() !!}
