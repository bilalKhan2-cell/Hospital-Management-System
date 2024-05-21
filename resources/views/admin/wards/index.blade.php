@extends('layout.app', ['title' => 'Manage Wards'])

@section('content')
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible" role="alert">
            <button class="btn btn-close float-end" data-bs-dismiss="alert">&times;</button>
            <span>{{ session()->get('success') }}</span>
        </div>
    @endif

    <a href="{{ route('ward.create') }}" class="btn btn-sm btn-info float-end">Register Ward</a>
    <br><br>
    <table id="tblWards" class="table table-hover small mt-2 table-striped table-bordered">
        <thead>
            <tr>
                <th>Ward ID</th>
                <th>Name</th>
                <th>Block</th>
                <th>Department</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody></tbody>
    </table>
@endsection

@push('script')
    <script>
        $(document).ready(function() {

            $("#tblWards").DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('ward.index') }}",
                columns: [{
                        name: "id",
                        data: "id",
                        render: function(data) {
                            return "WARD-" + data;
                        }
                    },
                    {
                        name: "name",
                        data: "name"
                    },
                    {
                        name: 'get_block',
                        data: 'get_block',
                        render: function(data) {
                            return data.title;
                        }
                    },
                    {
                        name: 'get_department',
                        data: 'get_department',
                        render: function(data) {
                            return data.title;
                        }
                    },
                    {
                        data: 'action',
                        name: "action",
                        orderable: false,
                        searchable: false
                    }
                ]
            });
        });
    </script>
@endpush
