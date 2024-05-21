@extends('layout.app', ['title' => 'Manage Blocks'])

@section('content')
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible" role="alert">
            <button class="btn btn-close float-end" data-bs-dismiss="alert">&times;</button>
            <span>{{ session()->get('success') }}</span>
        </div>
    @endif

    <a href="{{ route('block.create') }}" class="btn btn-sm btn-info float-end">Add Block</a>
    <br><br>
    <table id="tblBlocks" class="table table-hover small mt-2 table-striped table-bordered">
        <thead>
            <tr>
                <th>Block ID</th>
                <th>Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody></tbody>
    </table>
@endsection

@push('script')
    <script>
        $(document).ready(function() {

            $("#tblBlocks").DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('block.index') }}",
                columns: [{
                        name: "id",
                        data: "id",
                        render: function(data) {
                            return "BLOCK-" + data;
                        }
                    },
                    {
                        name: "title",
                        data: "title"
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
