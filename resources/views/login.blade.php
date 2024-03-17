@extends('layout.login_main')

@section('title')
    Login
@endsection

@section('content')
    
    @if (session()->has('error'))
        {!! ShowUnCardAlert('danger', session()->get('error')) !!}
    @endif
    
    <span class="text-lg text-bold text-primary">HOSPITAL MANAGEMENT SYSTEM</span>
    <br><br>

    {!! Form::open(['route' => 'user.check', 'method' => 'POST']) !!}
    <div class="row">
        <div class="col-sm-12">
            <div class="form-group">
                {!! Form::label('Email:', '') !!}
                {!! Form::email('email', '', ['id' => 'txtUserEmailAddress', 'class' => 'form-control']) !!}
                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-sm-12">
            <div class="form-group">
                {!! Form::label('Password', '') !!}
                {!! Form::password('password', ['id' => 'txtUserPassword', 'class' => 'form-control']) !!}
                @error('password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                {{ Form::submit('Login', ['class' => 'btn btn-sm btn-info']) }}
            </div>
        </div>
    </div>
    {!! Form::close() !!}
@endsection

@push('script')
    <script>
        $(".alert").delay(2000).fadeOut();
    </script>
@endpush
