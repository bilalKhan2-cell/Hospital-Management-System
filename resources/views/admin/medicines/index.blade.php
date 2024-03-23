@extends('layout.main')

@section('title')
    Manage Medicines
@endsection

@section('breadcrumbs')
    @include('layout.breadcrumbs', ['title' => 'Medicines'])
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12">
            @if (session()->has('success'))
                {!! ShowUnCardAlert('success', session()->get('success')) !!}
            @endif

            <a href="{{ route('medicines.create') }}" class="btn btn-primary float-end btn-sm">Add Medicines</a>
            <br><br>
            <table class="table table-bordered table-sm table-small small table-hover table-striped" id="tblMedicines">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Strength</th>
                        <th>Generic</th>
                        <th>Price</th>
                        <th>Registered By</th>
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
        $("#tblMedicines").DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('medicines.index') }}",
            columns: [{
                data: 'name',
                name: 'name'
            }, {
                data: 'strength',
                name: 'strength'
            }, {
                data: 'dosage_form',
                name: 'dosage_form'
            }, {
                data: 'unit_price',
                name: 'unit_price',
                render: function(data) {
                    return 'RS. ' + data;
                }
            }, {
                data: 'created_by',
                name: 'created_by',
                render: function(data) {
                    return data == null ? '' : data.name;
                }
            }, {
                data: 'action',
                name: 'action',
                orderable: false,
                searchable: false
            }]
        });
    </script>
@endpush
