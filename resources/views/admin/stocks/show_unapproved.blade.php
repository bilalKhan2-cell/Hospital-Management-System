@extends('layout.main')

@section('title')
    Process Stock Request
@endsection

@section('breadcrumbs')
    @include('layout.breadcrumbs', ['title' => 'Process Stock Request'])
@endsection

@section('content')
    @if (session()->has('success'))
        {!! ShowUnCardAlert('success', session()->get('success')) !!}
    @endif

    <div class="row">
        <div class="col-sm-12">
            <table id="tblUnApprovedStockRequests" class="table small table-hover table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Request ID</th>
                        <th>Requested By</th>
                        <th>Requested At</th>
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
        $("#tblUnApprovedStockRequests").DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('stocks.show_unapproved') }}",
            columns: [{
                    data: 'id',
                    name: 'id',
                    render: function(result) {
                        return "REQ-" + result;
                    }
                },
                {
                    data: 'initiator',
                    name: 'initiator',
                    render: function(result) {
                        return "User-" + result.id + " " + "(" + result.name + ")";
                    }
                },
                {
                    data: 'created_at',
                    name: 'created_at'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                }
            ]
        })
    </script>
@endpush
