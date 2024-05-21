@extends('layout.app', ['title' => 'Manage Departments'])

@section('content')
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible" role="alert">
            <button class="btn btn-close float-end" data-bs-dismiss="alert">&times;</button>
            <span>{{ session()->get('success') }}</span>
        </div>
    @endif

    <a href="{{ route('department.create') }}" class="btn btn-sm btn-info float-end">Add Deparment</a>
    <br><br>
    <table id="tblDepartments" class="table table-hover small mt-2 table-striped table-bordered">
        <thead>
            <tr>
                <th>Department ID</th>
                <th>Name</th>
                <th>Block</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody></tbody>
    </table>
@endsection

@push('script')
    <script>
        $(document).ready(function() {
            $("#tblDepartments").DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('department.index') }}",
                columns: [{
                        name: "id",
                        data: "id",
                        render: function(data) {
                            return "DEPT-" + data;
                        }
                    },
                    {
                        name: "title",
                        data: "title"
                    },
                    {
                        name: 'dept_block',
                        data: 'dept_block',
                        render: function(data) {
                            return data.title;
                        }
                    },
                    {
                        data: 'action',
                        name: "action"
                    }
                ]
            });
        });
    </script>
@endpush
