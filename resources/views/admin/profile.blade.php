@extends('layout.main')

@section('title')
    User Profile
@endsection

@section('breadcrumbs')
    @include('layout.breadcrumbs', ['title' => 'User Profile'])
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-3">Username</div>
        <div class="col-sm-3">{!! Auth::user()->name !!}</div>
        <div class="col-sm-3">Email</div>
        <div class="col-sm-3">{!! Auth::user()->email !!}</div>
    </div>

    <br>
    <div class="row">
        <div class="col-sm-3">Contact Info</div>
        <div class="col-sm-3">{!! Auth::user()->contact_info !!}</div>
        <div class="col-sm-3">CNIC No.</div>
        <div class="col-sm-3">{!! Auth::user()->cnic !!}</div>
    </div>

    <br>
    <div class="row">
        <div class="col-sm-3">Block</div>
        <div class="col-sm-3">{!! Auth::user()->user_block->name == null ? '--' : Auth::user()->user_block->name !!}</div>
        <div class="col-sm-3">Department</div>
        <div class="col-sm-3">{!! Auth::user()->user_department->name == null ? '--' : Auth::user()->user_department->name !!}</div>
    </div>

    <br>
    <div class="row">
        <div class="col-sm-3">Designation</div>
        <div class="col-sm-3">{!! Auth::user()->user_designation->name == null ? '--' : Auth::user()->user_designation->name !!}</div>
    </div>

    <br>
    <div class="row">
        <div class="col-sm-3">Address</div>
        <div class="col-sm-3">{!! Auth::user()->address !!}</div>
    </div>
    <br>
    <div class="row">
        <div class="col-sm-2">
            <a href="{{route('dashboard')}}" class="btn btn-danger small btn-sm">Cancel</a>
        </div>
    </div>
@endsection
