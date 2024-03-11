{!! Form::open(['route' => $route, 'method' => $method]) !!}

<div class="row">
    <div class="col-sm-4">
        <div class="form-group">
            {!! Form::label('Patient Name', '') !!}
            {!! Form::text('name', $patient == null ? '' : $patient->name, [
                'class' => 'form-control',
                'id' => 'txtUsername',
            ]) !!}
            @error('name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="col-sm-4">
        <div class="form-group">
            {!! Form::label('Patient Father Name', '') !!}
            {!! Form::text('fname', $patient == null ? '' : $patient->fname, [
                'class' => 'form-control',
                'id' => 'txtPatientFatherName',
            ]) !!}
            @error('fname')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="col-sm-4">
        <div class="form-group">
            {!! Form::label('Age: ', '') !!}
            {!! Form::number('age', $patient == null ? '' : $patient->age, [
                'class' => 'form-control',
                'id' => 'txtPatientAge',
            ]) !!}
            @error('age')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
</div>

<div class="row mt-2">
    <div class="col-sm-4">
        <div class="form-group">
            {!! Form::label('Select Gender', '') !!}
            {!! Form::select('gender', ['Male' => 'Male', 'Female' => 'Female'], $patient == null ? '' : $patient->gender, [
                'class' => 'form-control select',
                'id' => 'slctAccountStatus',
            ]) !!}
        </div>
    </div>

    <div class="col-sm-4">
        <div class="form-group">
            {!! Form::label('CNIC', '') !!}
            {!! Form::text('cnic', $patient == null ? '' : $patient->cnic, [
                'id' => 'txtPatientCnic',
                'class' => 'form-control',
            ]) !!}
            @error('cnic')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="col-sm-4">
        <div class="form-group">
            {!! Form::label('Contact Info: ', '') !!}
            {!! Form::text('contact_info', $patient == null ? '' : $patient->contact_info, [
                'id' => 'txtContactInfo',
                'class' => 'form-control',
            ]) !!}
            @error('contact_info')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="col-sm-12">
        <div class="form-group">
            {!! Form::label('Address', '') !!}
            {!! Form::text('address', $patient == null ? '' : $patient->address, [
                'id' => 'txtPatientAddress',
                'class' => 'form-control',
            ]) !!}
            @error('address')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="col-sm-4">
        <div class="form-group">
            @if ($patient == null)
                {{ Form::submit('Register', ['class' => 'btn btn-sm btn-success']) }}
            @else
                {{ Form::submit('Update', ['class' => 'btn btn-sm btn-primary']) }}
            @endif <a href="{{ route('patients.index') }}"
                class="btn mt-2 btn-sm btn-danger">Cancel</a>
        </div>
    </div>
</div>

{!! Form::close() !!}
