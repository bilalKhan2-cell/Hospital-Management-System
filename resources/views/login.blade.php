@extends('layout.login_main')

@section('title') Login @endsection

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="form-group">
                {!! Form::label("Email:","") !!}
                {!! Form::email('email','',['id' => "txtUserEmailAddress",'class' => 'form-control']) !!}
                @error('email') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
        </div>
    </div>
@endsection