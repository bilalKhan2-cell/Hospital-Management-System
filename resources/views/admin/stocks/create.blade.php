@extends('layout.main')

@section('title')
    Stock Request
@endsection

@section('breadcrumbs')
    @include('layout.breadcrumbs', ['title' => 'Manage Stock Request'])
@endsection

@section('content')
    @if (session()->has('success'))
        {!! ShowUnCardAlert('success', session()->get('success')) !!}
    @endif

    @if (session()->has('error'))
        {!! ShowUnCardAlert('danger', session()->get('error')) !!}
    @endif

    {!! Form::open(['route' => 'stocks.add_item', 'method' => 'POST']) !!}
    <div class="row">
        <div class="col-sm-3">
            <div class="form-group">
                {!! Form::label('Select Medicine', '') !!}
                {!! Form::select('medicine_id', $medicines, '', [
                    'class' => 'form-control',
                    'id' => 'slctMedicines',
                ]) !!}
            </div>
        </div>

        <div class="col-sm-2">
            <div class="form-group">
                {!! Form::label('Quantity: ', '') !!}
                {!! Form::number('quantity', '', ['id' => 'txtRequestedMedicineQuantity', 'class' => 'form-control']) !!}
                @error('quantity')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="col-sm-3 mt-3">
            <div class="form-group">
                {!! Form::submit('Add Item', ['class' => 'btn btn-sm small btn-warning']) !!}
            </div>
        </div>
    </div>
    <br>
    {!! Form::close() !!}

    {!! Form::open(['route' => 'stocks.submit_request', 'method' => 'POST']) !!}
    @if (count($medicines_items) > 0)
        {!! Form::submit('Create Request', ['class' => 'btn btn-sm small btn-info']) !!}
        <br><br>
    @endif
    {!! Form::close() !!}

    <table class="table table-hover table-striped small" id="tblMedicinesRequests">
        <thead>
            <tr>
                <th>Medicine Name</th>
                <th>Requested Quantity</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @forelse ($medicines_items as $key => $value)
                <tr>
                    <td>{{ $value->medicine->name }}</td>
                    <td>{{ $value->quantity }}</td>
                    <td><a href="{{ route('stocks.delete_item', ['id' => $value->id]) }}"
                            class="btn btn-sm small btn-danger">Remove</a></td>
                </tr>
            @empty
                <tr>
                    <td colspan="3">No Items Added</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection

@push('script')
    <script>
        $(document).ready(function() {
            $("#slctMedicines").select2();
            $(".alert").delay(2000).fadeOut();
        });
    </script>
@endpush
