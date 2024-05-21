{!! Form::open(['url' => $action, 'method' => $action_type == 'edit' ? 'PUT' : 'POST']) !!}
    @csrf

    @php
        $department_name = $department->title ?? '';
        $department_comments = $department->comments ?? '';
        $department_block = $department->block_id ?? '';
    @endphp

    <div class="row">
        <div class="col-sm-4">
            <div class="form-group">
                {!! Form::label('title', 'Department Name:') !!}
                {!! Form::text('title', $department_name, ['class' => 'form-control']) !!}
                @error('title')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                {!! Form::label('', 'Select Block') !!}
                {!! Form::select('block_id', $blocks, $department_block, ['class' => 'form-select form-control']) !!}
            </div>
        </div>
        <div class="col-sm-12">
            <div class="form-group">
                {!! Form::label('comments', 'Description (if any):') !!}
                {!! Form::text('comments', $department_comments, ['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="col-sm-3">
            @if ($action_type == 'edit')
                {!! Form::button('Update', ['type' => 'submit', 'class' => 'btn btn-sm btn-info']) !!}
            @else
                {!! Form::button('Submit', ['type' => 'submit', 'class' => 'btn btn-sm btn-success']) !!}
            @endif
            <a href="{{ route('department.index') }}" class="btn btn-sm btn-danger">Cancel</a>
        </div>
    </div>
{!! Form::close() !!}
