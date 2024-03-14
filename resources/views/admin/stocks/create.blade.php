@extends('layout.main')

@section('title')
    Stock Request
@endsection

@section('breadcrumbs')
    @include('layout.breadcrumbs', ['title' => 'Manage Stock Request'])
@endsection

@section('content')
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
            </div>
        </div>

        <div class="col-sm-3 mt-3">
            <div class="form-group">
                <button class="btn btn-primary" onclick="AddMedicine()" id="btnAddMedicine">Add</button>
            </div>
        </div>
    </div>
    <br>
    <table class="table table-hover table-striped small" id="tblMedicinesRequests">
        <thead>
            <tr>
                <th>Medicine Name</th>
                <th>Requested Quantity</th>
                <th></th>
            </tr>
        </thead>
        <tbody></tbody>
    </table>
@endsection

@push('script')
    <script>
        var total_count = 0;
        function AddMedicine(){

        }

        function RemoveMedicine(id){
            
        }
    </script>
@endpush