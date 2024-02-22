@extends('layout.main')

@section('title')
    Manage Designations
@endsection

@section('breadcrumbs')
    @include('layout.breadcrumbs', ['title' => 'Manage Designations'])
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12">
            @if (session()->has('success'))
                {!! ShowAlert('success', session()->get('success'), 'Success') !!}
            @endif

            <a href="{{ route('designations.create') }}" class="btn btn-primary float-end btn-sm">Create Designation</a>
            <br><br>
            <table class="table table-bordered table-sm table-small small table-hover table-striped" id="tblDesignations">
                <thead>
                    <tr>
                        <th>Name</th>
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
        var table = $('#tblDesignations').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('designations.index') }}",
            columns: [{
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'comments',
                    name: 'comments'
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
