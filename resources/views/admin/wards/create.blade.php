@extends('layout.app', ['title' => 'Register Ward'])

@section('content')
    @include('admin.wards._form', [
        'action' => route('ward.store'),
        'action_type' => 'save',
        'ward' => null,
    ])
@endsection

@push('script')
    <script>
        function GetDepartments() {
            var selectedValue = $('#block_data').val();

            $.ajax({
                type: "GET",
                url: "{{ route('ward.create') }}",
                data: {
                    block_id: selectedValue
                },
                success: function(data) {
                    $("#slctDepartments").html('');
                    for (var a = 0; a < data.length; a++) {
                        var option = $('<option></option>');
                        option.text(data[a].title);
                        option.val(data[a].id);
                        $("#slctDepartments").append(option);
                    }
                }
            });
        }

        $(document).ready(function() {
            $('select').select2({
                placeholder: 'Select an option',
                allowClear: true
            });

        });
    </script>
@endpush
