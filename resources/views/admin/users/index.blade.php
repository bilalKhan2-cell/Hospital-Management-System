@extends('layout.main')

@section('title')
    Manage Users
@endsection

@section('breadcrumbs')
    @include('layout.breadcrumbs', ['title' => 'Manage Users'])
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12">

            @if (session()->has('success'))
                {!! ShowAlert('success', session()->get('success'), 'Success') !!}
            @endif

            <a href="{{ route('users.create') }}" class="btn btn-btn btn-primary btn-sm">Register User</a>
            <br><br>
            <table id="tblUsers" class="table table-hover table-striped small">
                <thead>
                    <tr>
                        <th>User ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>CNIC</th>
                        <th>Contact Info</th>
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
        let = $('#tblUsers').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('users.index') }}",
            columns: [{
                    data: 'id',
                    name: 'id',
                    render: function(resp) {
                        return "USER-" + resp;
                    }
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'email',
                    name: 'email'
                },
                {
                    data: 'cnic',
                    name: 'cnic'
                },
                {
                    data: 'contact_info',
                    name: 'contact_info'
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
