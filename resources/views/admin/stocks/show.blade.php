@extends('layout.main')

@section('title')
    Requested Items
@endsection

@section('breadcrumbs')
    @include('layout.breadcrumbs', ['title' => 'Requested Items'])
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-4">
            <div class="form-group">
                {!! Form::label('Supplier', '') !!}
                <span>{{ $supplier[0]->name }}</span>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="form-group">
                {!! Form::label('notes', '') !!}
                <span>{{ $notes }}</span>
            </div>
        </div>
        <div class="col-sm-12">
            <table class="table small table-hover table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Medicine Name</th>
                        <th>Requested Quantity</th>
                        <th>Approved Quantity</th>
                        <th>Remaining Quantity</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($medicines as $key => $value)
                        <tr>
                            <td>{{ $value->medicine->name }}</td>
                            <td>QTY - {{ $value->quantity }}</td>
                            <td>QTY - {{ $value->approved_quantity }}</td>
                            <td>QTY - {{ $value->quantity == $value->approved_quantity ? '0' : $value->quantity - $value->approved_quantity }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3">No Records Found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <a href="{{ route('stocks.index') }}" class="btn btn-danger btn-sm small">Cancel</a>
@endsection
