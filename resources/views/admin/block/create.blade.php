@extends('layout.app', ['title' => 'Manage Blocks'])

@section('content')
    @include('admin.block._form',[
        'action' => route('block.store'),
        'action_type' => 'save',
        'block' => null
    ])
@endsection