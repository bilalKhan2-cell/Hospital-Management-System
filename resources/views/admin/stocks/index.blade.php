@extends('layout.main')

@section('title')
    Stock Request
@endsection

@section('breadcrumbs')
    @include('layout.breadcrumbs', ['title' => 'Manage Stock Request'])
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12">

            @if (session()->has('success'))
                {!! ShowAlert('success', session()->get('success'), 'Success') !!}
            @endif

            <table id="tblStockRequest" class="table table-hover table-bordered table-striped small">
                <thead>
                    <tr>
                        <th>Request ID</th>
                        <th>Registration At</th>
                        <th>Approved and Processed By</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>
@endsection

@push('script')
    <script>
        $("#tblStockRequest").DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('stocks.index') }}",
            columns: [{
                    data: 'id',
                    name: 'id',
                    render: function(data) {
                        return "REQ-" + data
                    }
                },
                {
                    data: 'created_at',
                    name: 'created_at',
                },
                {
                    data: 'approver',
                    name: 'approver',
                    render: function(result) {
                        if(result!=null){
                            return "USER-" + result.id + " (" + result.name + ")";
                        }

                        else {
                            return "-----";
                        }
                    }
                },
                {
                    data: 'is_approved',
                    name: 'is_approved',
                    render: function(result) {
                        if (result == 1) {
                            return '<span class="text-success">Processed</span>';
                        } else {
                            return '<span class="text-primary">Pending</span>';
                        }
                    }
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                }
            ]
        });
    </script>
@endpush
