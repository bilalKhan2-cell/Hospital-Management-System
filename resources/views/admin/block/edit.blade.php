@extends('layout.app', ['title' => 'Manage Blocks'])

@section('content')
    @include('admin.block._form',[
        'action' => route('block.update',$block->id),
        'action_type' => 'edit',
        'block' => $block
    ])
@endsection