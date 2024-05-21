@extends('layout.app', ['title' => 'Manage Blocks'])

@section('content')
    @include('admin.department._form', [
        'action' => route('department.update', $department->id),
        'action_type' => 'edit',
        'department' => $department,
    ])
@endsection

@push('script')
    <script>
        $(document).ready(function() {
            $('select').select2({
                placeholder: 'Select an option',
                allowClear: true
            });
        });
    </script>
@endpush
