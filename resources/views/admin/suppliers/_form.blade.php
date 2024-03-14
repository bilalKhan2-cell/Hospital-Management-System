{!! Form::open(['route' => $route, 'method' => $method]) !!}

<div class="row">
    <div class="col-sm-4">
        <div class="form-group">
            {!! Form::label('Supplier Name: ', '') !!}
            {!! Form::text('name', $supplier == null ? '' : $supplier->name, [
                'id' => 'txtSupplierName',
                'class' => 'form-control',
            ]) !!}
        </div>
    </div>

    <div class="col-sm-4">
        <div class="form-group">
            {!! Form::label('Email Address', '') !!}
            {!! Form::email('email', $supplier == null ? '' : $supplier->email, [
                'id' => 'txtSupplierEmailAddress',
                'class' => 'form-control',
            ]) !!}
        </div>
    </div>

    <div class="col-sm-4">
        <div class="form-group">
            {!! Form::label('Contact Info: ', '') !!}
            {!! Form::text('contact_info', $supplier == null ? '' : $supplier->contact_info, [
                'id' => 'txtSupplierContactInfo',
                'class' => 'form-control',
            ]) !!}
        </div>
    </div>
</div>

<div class="row mt-1">
    <div class="col-sm-12">
        <div class="form-group">
            {!! Form::label('Supplier Address', '') !!}
            {!! Form::text('address', $supplier == null ? '' : $supplier->address, [
                'id' => 'txtSupplierAddress',
                'class' => 'form-control',
            ]) !!}
        </div>
    </div>

    <div class="col-sm-4 mt-2">
        <div class="form-group mt-2">
            @if ($supplier == null)
                {{ Form::submit('Register', ['class' => 'btn btn-sm btn-success']) }}
            @else
                {{ Form::submit('Update', ['class' => 'btn btn-sm btn-primary']) }}
            @endif <a href="{{ route('suppliers.index') }}"
                class="btn mt-2 btn-sm btn-danger">Cancel</a>
        </div>
    </div>
</div>

{!! Form::close() !!}
