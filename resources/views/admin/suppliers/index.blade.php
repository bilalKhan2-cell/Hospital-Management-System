@extends('layout.main')

@section('title')
    Manage Stock Suppliers
@endsection

@section('breadcrumbs')
    @include('layout.breadcrumbs', ['title' => 'Manage Suppliers'])
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12">

            @if (session()->has('success'))
                {!! ShowUnCardAlert('success', session()->get('success')) !!}
            @endif

            <a href="{{ route('suppliers.create') }}" class="btn btn-sm btn-primary float-right">Register Supplier</a>
            <br><br>
            <table id="tblSuppliers" class="table table-hover table-striped small">
                <thead>
                    <tr>
                        <th>Supplier Name</th>
                        <th>Email</th>
                        <th>Contact Info</th>
                        <th>Created By</th>
                        <th>Created At</th>
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
        $("#tblSuppliers").DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('suppliers.index') }}",
            columns: [{
                data: 'name',
                name: 'name'
            }, {
                data: 'email',
                name: 'email',

            }, {
                data: 'contact_info',
                name: 'contact_info'
            }, {
                data: 'registered_by',
                name: 'registered_by',
                render: function(user) {
                    return user.name;
                }
            }, {
                data: 'created_at',
                name: 'created_at'
            }, {
                data: 'action',
                name: 'action',
                orderable: false,
                searchable: false
            }]
        })
    </script>
@endpush
