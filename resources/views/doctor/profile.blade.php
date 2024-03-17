@extends('layout.doctor.main')

@section('title') Doctor Profile @endsection

@section('breadcrumbs')
    @include('layout.breadcrumbs',['title' => 'Doctor Profile'])
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-3">Name</div>
        <div class="col-sm-3">{!! $user->name !!}</div>

        <div class="col-sm-3">Date of Birth:</div>
        <div class="col-sm-3">{!! $user->dob !!}</div>
    </div>

    <br>
    <div class="row">
        <div class="col-sm-3">Gender</div>
        <div class="col-sm-3">{!! $user->gender !!}</div>

        <div class="col-sm-3">Specialization</div>
        <div class="col-sm-3">{!! $user->specialization !!}</div>
    </div>

    <br>
    <div class="row">
        <div class="col-sm-3">Contact Info</div>
        <div class="col-sm-3">{!! $user->contact_info !!}</div>

        <div class="col-sm-3">CNIC</div>
        <div class="col-sm-3">{!! $user->cnic !!}</div>
    </div>

    <br>
    <div class="row">
        <div class="col-sm-3">Department</div>
        <div class="col-sm-3">{!! $user->doctor_department->name !!}</div>
        <div class="col-sm-3">Joining Date</div>
        <div class="col-sm-3">{!! $user->joining_date !!}</div>
    </div>

    <br>
    <div class="row">
        <div class="col-sm-2">Address:</div>
        <div class="col-sm-12">{!! $user->address !!}</div>
    </div>
    
    <br>
    <a href="{{route('doctors.dashboard')}}" class="btn btn-danger btn-sm">Cancel</a>
@endsection