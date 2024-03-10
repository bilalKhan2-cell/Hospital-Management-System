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
                        <th>Designation</th>
                        <th>Action</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">User Assignment</h5>
                </div>
                <div class="modal-body" id="modalBody">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
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
                    data: 'user_designation',
                    name: 'user_designation',
                    render: function(result) {
                        if (result == null) {
                            return '';
                        } else {
                            return result.name;
                        }
                    }
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
    <script>
        function ShowModal(userID) {
            $.ajax({
                type: "GET",
                url: "{{ route('users.manage_assignment') }}",
                data: {
                    user_id: userID
                },
                success: function(resp) {
                    $('#modalBody').empty();
                    $('#modalBody').html(resp.html);
                }
            });
        }
    </script>
@endpush


@push('script')
    <script>
        let frmUserAssign = $('#frmAssignRole');

        frmUserAssign.on('submit', function(e) {
            e.preventDefault();
            console.log('submitted');
        });
    </script>
@endpush
