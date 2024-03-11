@extends('layout.main')

@section('title')
    Register Block
@endsection

@section('breadcrumbs')
    @include('layout.breadcrumbs', ['title' => 'Register Block'])
@endsection

@section('content')
    @include('admin.blocks._form',['block' => $block])
@endsection
