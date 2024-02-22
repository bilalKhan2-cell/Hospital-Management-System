@extends('layout.main')

@section('title')
    Manage Departments
@endsection

@section('breadcrumbs')
    @include('layout.breadcrumbs', ['title' => 'Departments'])
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12">

            @if (session()->has('success'))
                {!! ShowAlert('success', session()->get('success'), 'Success') !!}
            @endif

            <a href="{{ route('departments.create') }}" class="btn btn-primary btn-sm right">Register Department</a>
            <br><br>
            <table id="tblDepartments" class="table small table-hover table-striped">
                <thead>
                    <tr>
                        <th>Department ID</th>
                        <th>Name</th>
                        <th>Block</th>
                        <th>Description</th>
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
        let table = $('#tblDepartments').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('departments.index') }}",
            columns: [{
                    data: 'id',
                    name: 'id',
                    render: function(resp) {
                        return "DEPT-" + resp;
                    }
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'block',
                    name: 'block',
                    render: function(resp) {
                        return resp.name;
                    }
                },
                {
                    data: 'description',
                    name: 'description'
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
