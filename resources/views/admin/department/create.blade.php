@extends('layout.app', ['title' => 'Manage Blocks'])

@section('content')
    @include('admin.department._form',[
        'action' => route('department.store'),
        'action_type' => 'save',
        'department' => null
    ])
@endsection

@push('script')
    <script>
        $(document).ready(function(){
            $('select').select2({
                placeholder: 'Select an option',
                allowClear: true
            });
        });
    </script>
@endpush