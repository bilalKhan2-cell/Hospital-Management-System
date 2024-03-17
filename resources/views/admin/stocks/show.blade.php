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
                <span>{{ count($supplier) > 0 ? $supplier[0]->name : '--' }}</span>
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
                        @if ($medicines[0]->approved_quantity != null)
                            <th>Approved Quantity</th>
                            <th>Remaining Quantity</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @forelse ($medicines as $key => $value)
                        <tr>
                            <td>{{ $value->medicine->name }}</td>
                            <td>QTY - {{ $value->quantity }}</td>
                            @if ($value->approved_quantity != null)
                                <td>QTY - {{ $value->approved_quantity }}</td>
                                <td>QTY -
                                    {{ $value->quantity == $value->approved_quantity ? '0' : $value->quantity - $value->approved_quantity }}
                                </td>
                            @endif
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
