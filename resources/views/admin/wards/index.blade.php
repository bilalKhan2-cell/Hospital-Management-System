@extends('layout.main')

@section('title')
    Manage Wards
@endsection

@section('breadcrumbs')
    @include('layout.breadcrumbs', ['title' => 'Manage Wards'])
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12">

            @if (session()->has('success'))
                {!! ShowAlert('success', session()->get('success'), 'Success') !!}
            @endif

            <a href="{{ route('wards.create') }}" class="btn btn-btn btn-primary btn-sm">Register Ward</a>
            <br><br>
            <table id="tblWards" class="table table-hover table-striped small">
                <thead>
                    <tr>
                        <th>Ward ID</th>
                        <th>Name</th>
                        <th>Department</th>
                        <th>Block</th>
                        <th>Action</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection

@push('script')
    <script>
        var
        let = $('#tblWards').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('wards.index') }}",
            columns: [{
                    data: 'id',
                    name: 'id',
                    render: function(resp) {
                        return "WARD-" + resp;
                    }
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'department',
                    name: 'department',
                    render: function(resp) {
                        return resp.name;
                    }
                },
                {
                    data: 'department.block',
                    name: 'department.block',
                    render: function(data) {
                        return data.name;
                    }
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
