@extends('layout.main')

@section('title')
    Requested Items
@endsection

@section('breadcrumbs')
    @include('layout.breadcrumbs', ['title' => 'Requested Items'])
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <table class="table small table-hover table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Medicine Name</th>
                        <th>Requested Quantity</th>
                        <th>Approved Quantity</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($medicines as $key => $value)
                        <tr>
                            <td>{{ $value->medicine->name }}</td>
                            <td>{{ $value->quantity }}</td>
                            <td>{{ $value->approved_quantity }}</td>
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
    <a href="{{route('stocks.index')}}" class="btn btn-danger btn-sm small">Cancel</a>
@endsection
