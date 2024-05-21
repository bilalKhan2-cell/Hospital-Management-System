{!! Form::open(['url' => $action, 'method' => $action_type == 'edit' ? 'PUT' : 'POST']) !!}
    @csrf

    @php
        $block_name = $block->title ?? '';
        $block_comments = $block->comments ?? '';
    @endphp

    <div class="row">
        <div class="col-sm-4">
            <div class="form-group">
                {!! Form::label('title', 'Block Name:') !!}
                {!! Form::text('title', $block_name, ['class' => 'form-control']) !!}
                @error('title')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                {!! Form::label('comments', 'Description (if any):') !!}
                {!! Form::text('comments', $block_comments, ['class' => 'form-control']) !!}
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
            <a href="{{ route('block.index') }}" class="btn btn-sm btn-danger">Cancel</a>
        </div>
    </div>
{!! Form::close() !!}
