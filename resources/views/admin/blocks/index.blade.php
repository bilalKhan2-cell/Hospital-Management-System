@extends('layout.main')

@section('title')
    Manage Blocks
@endsection

@section('breadcrumbs')
    @include('layout.breadcrumbs', ['title' => 'Manage Blocks'])
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12">
            @if (session()->has('success'))
                {!! ShowAlert('success', session()->get('success'), 'Success') !!}
            @endif

            <a href="{{ route('blocks.create') }}" class="btn btn-primary float-end btn-sm">Register Block</a>
            <br><br>
            <table class="table table-bordered table-sm table-small small table-hover table-striped" id="tblBlocks">
                <thead>
                    <tr>
                        <th>Block ID</th>
                        <th>Name</th>
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
        var table = $('#tblBlocks').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('blocks.index') }}",
            columns: [{
                    data: 'id',
                    name: 'id',
                    render: function(resp) {
                        return "BLOCK-" + resp;
                    }
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                },
            ]
        });
    </script>
@endpush
