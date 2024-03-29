{!! Form::open(['route' => $route, 'method' => $method]) !!}

<div class="row">
    <div class="col-sm-4">
        <div class="form-group">
            {!! Form::label('Username', '') !!}
            {!! Form::text('name', $user == null ? '' : $user->name, [
                'class' => 'form-control',
                'id' => 'txtUsername',
                'required',
            ]) !!}
            @error('name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="col-sm-4">
        <div class="form-group">
            {!! Form::label('Email', '') !!}
            {!! Form::email('email', $user == null ? '' : $user->email, [
                'class' => 'form-control',
                'id' => 'txtUserEmail',
                'required',
            ]) !!}
            @error('email')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            {!! Form::label('Contact Info', '') !!}
            {!! Form::text('contact_info', $user == null ? '' : $user->contact_info, [
                'class' => 'form-control',
                'id' => 'txtContactInfo',
                'required',
            ]) !!}
            @error('contact_info')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
</div>

<div class="row mt-2">
    <div class="col-sm-4">
        <div class="form-group">
            {!! Form::label('CNIC', '') !!}
            {!! Form::text('cnic', $user == null ? '' : $user->cnic, [
                'class' => 'form-control',
                'id' => 'txtCNIC',
                'required',
            ]) !!}
            @error('cnic')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="col-sm-2">
        <div class="form-group">
            {!! Form::label('Status', '') !!}
            {!! Form::select('status', ['1' => 'Active', '0' => 'Inactive'], $user == null ? '' : $user->status, [
                'class' => 'form-control',
                'id' => 'slctAccountStatus',
            ]) !!}
        </div>
    </div>

    <div class="col-sm-4">
        <div class="form-group">
            {!! Form::label('Select Designation', '') !!}
            {!! Form::select('designation_id', $designations, $user == null ? '' : $user->designation_id, [
                'class' => 'form-control',
                'id' => 'slctAccountStatus',
            ]) !!}
        </div>
    </div>

    <div class="col-sm-12">
        <div class="form-group">
            {!! Form::label('Address', '') !!}
            {!! Form::text('address', $user == null ? '' : $user->address, [
                'class' => 'form-control',
                'id' => 'txtAddress',
            ]) !!}
            @error('address')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="col-sm-4">
        <div class="form-group">
            @if ($user == null)
                {{ Form::submit('Register', ['class' => 'btn btn-sm btn-success']) }}
            @else
                {{ Form::submit('Update', ['class' => 'btn btn-sm btn-primary']) }}
            @endif <a href="{{ route('users.index') }}"
                class="btn mt-2 btn-sm btn-danger">Cancel</a>
        </div>
    </div>
</div>

{!! Form::close() !!}
