{!! Form::open(['route' => 'users.assign_user_role', 'method' => 'POST', 'id' => 'frmAssignRole']) !!}
<div class="row">
    <div class="col-sm-3">
        {{ Form::hidden('user_id', $userID, ['id' => 'txtUserID']) }}
        <div class="form-group">
            {!! Form::label('Select Department', '') !!}
            {!! Form::select('block_id', $blocks, '', [
                'class' => 'form-control',
                'id' => 'slctUserBlock',
            ]) !!}
        </div>
    </div>
    <div class="col-sm-3">
        <div class="form-group">
            {!! Form::label('Select Department', '') !!}
            {!! Form::select('ward_id', $wards, '', [
                'class' => 'form-control',
                'id' => 'slctUserDepartment',
            ]) !!}
        </div>
    </div>
    <div class="col-sm-3">
        <div class="form-group">
            {!! Form::label('Select Department', '') !!}
            {!! Form::select('department_id', $departments, '', [
                'class' => 'form-control',
                'id' => 'slctUserWard',
            ]) !!}
        </div>
    </div>
    <div class="col-sm-2">
        <div class="form-group">
            {{ Form::submit('Submit', ['class' => 'btn mt-2  btn-sm btn-success']) }}
        </div>
    </div>
</div>
{!! Form::close() !!}
<table class="table table-hover table-striped small">
    <thead>
        <tr>
            <th>Block</th>
            <th>Department</th>
            <th>Ward</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>{{ $user_block }}</td>
            <td>{{ $user_department }}</td>
            <td>{{ $user_ward }}</td>
        </tr>
    </tbody>
</table>

