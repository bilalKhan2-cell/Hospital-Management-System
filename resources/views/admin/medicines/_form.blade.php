{!! Form::open(['route' => $route, 'method' => $method]) !!}

<div class="row">
    <div class="col-sm-4">
        <div class="form-group">
            {!! Form::label('Name', '') !!}
            {!! Form::text('name', $medicine == null ? '' : $medicine->name, [
                'id' => 'txtMedicineName',
                'class' => 'form-control',
            ]) !!}
            @error('name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="col-sm-2">
        <div class="form-group">
            {!! Form::label('Select Dosage Form', '') !!}
            {!! Form::select('dosage_form', $dosages, $medicine == null ? '' : $medicine->dosage_form, [
                'class' => 'form-control',
                'id' => 'slctDosageForm',
            ]) !!}
            @error('dosage_form')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="col-sm-3">
        <div class="form-group">
            {!! Form::label('Strength', '') !!}
            {!! Form::text('strength', $medicine == null ? '' : $medicine->strength, [
                'id' => 'txtMedicineStrength',
                'class' => 'form-control',
            ]) !!}
            @error('strength')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="col-sm-3">
        <div class="form-group">
            {!! Form::label('Price', '') !!}
            {!! Form::number('unit_price', $medicine == null ? '' : $medicine->unit_price, [
                'id' => 'txtMedicineUnitPrice',
                'class' => 'form-control',
            ]) !!}
            @error('unit_price')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
</div>

<div class="row mt-1">
    <div class="col-sm-12">
        <div class="form-group">
            {!! Form::label('Description', '') !!}
            {!! Form::text('description', $medicine == null ? '' : $medicine->description, [
                'id' => 'txtMedicineDescription',
                'class' => 'form-control',
            ]) !!}
        </div>
    </div>

    <div class="col-sm-2 mt-2">
        <div class="form-group">
            @if ($medicine == null)
                {{ Form::submit('Register', ['class' => 'btn btn-sm btn-success']) }}
            @else
                {{ Form::submit('Update', ['class' => 'btn btn-sm btn-primary']) }}
            @endif
            <a href="{{ route('medicines.index') }}" class="btn btn-sm btn-danger">Cancel</a>
        </div>
    </div>
</div>
