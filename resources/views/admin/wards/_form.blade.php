{!! Form::open(['url' => $action, 'method' => $action_type == 'edit' ? 'PUT' : 'POST']) !!}
@csrf

@php
    $ward_name = $ward->name ?? '';
    $ward_comments = $ward->comments ?? '';
    $ward_block = $ward->block_id ?? '';
    $ward_department = $ward->department_id ?? '';
@endphp

<div class="row">
    <div class="col-sm-4">
        <div class="form-group">
            {!! Form::label('name', 'Ward Name:') !!}
            {!! Form::text('name', $ward_name, ['class' => 'form-control']) !!}
            @error('name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            {!! Form::label('', 'Select Block') !!}
            {!! Form::select('block_id', ['' => 'Select a block'] + $blocks->toArray(), $ward_block, [
                'class' => 'form-select form-control',
                'onchange' => 'GetDepartments()',
                'id' => 'block_data',
            ]) !!}
            @error('block_id')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            {!! Form::label('', 'Select Department') !!}
            {!! Form::select('department_id', [], $ward_department, [
                'class' => 'form-select form-control',
                'id' => 'slctDepartments',
            ]) !!}
            @error('department_id')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
    <div class="col-sm-9">
        <div class="form-group">
            {!! Form::label('comments', 'Description (if any):') !!}
            {!! Form::text('comments', $ward_comments, ['class' => 'form-control']) !!}
            @error('comments')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
    <div class="col-sm-3 mt-4">
        @if ($action_type == 'edit')
            {!! Form::button('Update', ['type' => 'submit', 'class' => 'btn btn-sm btn-info']) !!}
        @else
            {!! Form::button('Submit', ['type' => 'submit', 'class' => 'btn btn-sm btn-success']) !!}
        @endif
        <a href="{{ route('ward.index') }}" class="btn btn-sm btn-danger">Cancel</a>
    </div>
</div>
{!! Form::close() !!}
