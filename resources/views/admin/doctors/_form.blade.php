{!! Form::open(['route' => $route, 'method' => $method]) !!}
<div class="row">
    <div class="col-sm-4">
        <div class="form-group">
            {!! Form::label('Doctor Name', '') !!}
            {!! Form::text('name', $doctor == null ? '' : $doctor->name, [
                'id' => 'txtDoctorName',
                'class' => 'form-control',
            ]) !!}
            @if ($route == 'doctors.store')
                {!! Form::hidden('status', 1) !!}
            @endif
            @error('name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="col-sm-3">
        <div class="form-group">
            {!! Form::label('Select Gender', '') !!}
            {!! Form::select('gender', ['Male' => 'Male', 'Female' => 'Female'], $doctor == null ? '' : $doctor->gender, [
                'class' => 'form-control select',
                'id' => 'slctDoctorGender',
            ]) !!}
        </div>
    </div>

    <div class="col-sm-3">
        {!! Form::label('Enter Date-of-Birth:', '') !!}
        {!! Form::date('dob', $doctor == null ? '' : $doctor->dob, [
            'id' => 'txtDoctorDateofBrith',
            'class' => 'form-control',
        ]) !!}
        @error('dob')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
</div>

<div class="row mt-1">
    <div class="col-sm-3">
        <div class="form-group">
            {!! Form::label('Email Address', '') !!}
            {!! Form::email('email', $doctor == null ? '' : $doctor->email, [
                'id' => 'txtDoctorEmailAddress',
                'class' => 'form-control',
            ]) !!}
            @error('email')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="col-sm-3">
        <div class="form-group">
            {!! Form::label('Contact Info', '') !!}
            {!! Form::text('contact_info', $doctor == null ? '' : $doctor->contact_info, [
                'id' => 'txtDoctorContactInfo',
                'class' => 'form-control',
            ]) !!}
            @error('contact_info')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="col-sm-3">
        <div class="form-group">
            {!! Form::label('CNIC', '') !!}
            {!! Form::text('cnic', $doctor == null ? '' : $doctor->cnic, [
                'id' => 'txtDoctorCNIC',
                'class' => 'form-control',
            ]) !!}
            @error('cnic')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="col-sm-3">
        <div class="form-group">
            {!! Form::label('Select Specialization', '') !!}
            {!! Form::select('specialization', $specializations, $doctor == null ? '' : $doctor->specialization, [
                'class' => 'form-control select',
                'id' => 'slctDoctorSpecialization',
            ]) !!}
        </div>
    </div>
</div>

<div class="row mt-1">
    <div class="col-sm-4">
        <div class="form-group">
            {!! Form::label('Select Department', '') !!}
            {!! Form::select('department_id', $departments, $doctor == null ? '' : $doctor->department_id, [
                'class' => 'form-control',
                'id' => 'slctDoctorDepartment',
            ]) !!}
        </div>
    </div>

    <div class="col-sm-3">
        <div class="form-group">
            {!! Form::label('Joining Date', '') !!}
            {!! Form::date('joining_date', $doctor == null ? '' : $doctor->joining_date, [
                'id' => 'txtDoctorJoiningDate',
                'class' => 'form-control',
            ]) !!}
            @error('joining_date')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>

    @if ($doctor != null)
        <div class="col-sm-3">
            <div class="form-group">
                {!! Form::label('Status', '') !!}
                {!! Form::select('status', ['1' => 'Active', '0' => 'In-Active'], $doctor == null ? '' : $doctor->status, [
                    'class' => 'form-control',
                    'id' => 'slctDoctorDepartment',
                ]) !!}
            </div>
        </div>
    @endif

    <div class="col-sm-12">
        <div class="form-group">
            {!! Form::label('Address', '') !!}
            {!! Form::text('address', $doctor == null ? '' : $doctor->address, [
                'id' => 'txtDoctorAddress',
                'class' => 'form-control',
            ]) !!}
            @error('address')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="col-sm-4 mt-2">
        <div class="form-group mt-2">
            @if ($doctor == null)
                {{ Form::submit('Register', ['class' => 'btn btn-sm btn-success']) }}
            @else
                {{ Form::submit('Update', ['class' => 'btn btn-sm btn-primary']) }}
            @endif <a href="{{ route('doctors.index') }}"
                class="btn mt-2 btn-sm btn-danger">Cancel</a>
        </div>
    </div>
</div>

{!! Form::close() !!}
