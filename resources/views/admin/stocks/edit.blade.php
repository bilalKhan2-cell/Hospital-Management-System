@extends('layout.main')

@section('title')
    Manage Stock Request
@endsection

@section('breadcrumbs')
    @include('layout.breadcrumbs', ['title' => 'Manage Stock Requests'])
@endsection

@section('content')
    <a href="{{ route('stocks.show_unapproved') }}" class="btn btn-sm btn-danger">Cancel</a>
    <br><br>
    <div class="row">
        {!! Form::open(['route' => 'stock.approve_request', 'method' => 'POST']) !!}
        <div class="col-sm-5">
            <div class="form-group">
                {!! Form::hidden('id',$stock_master) !!}
                {!! Form::label('Notes (if any):', '') !!}
                {!! Form::text('notes', '', ['id' => 'txtRequestNotes', 'class' => 'form-control']) !!}
            </div>
        </div>
        <div class="col-sm-5">
            <div class="form-group">
                {!! Form::label('Select Supplier', '') !!}
                {!! Form::select('supplier', $suppliers, '', [
                    'class' => 'form-control',
                    'id' => 'slctSupplier',
                ]) !!}
            </div>
        </div>
        <div class="col-sm-2">
            {!! Form::submit('Submit', ['id' => 'btnSubmit', 'class' => 'btn btn-sm btn-primary']) !!}
        </div>
        {!! Form::close() !!}
    </div>
    <br>
    <div class="row">
        <div class="col-sm-12">
            <table class="table small table-hover table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Item Name</th>
                        <th>Quantity</th>
                        <th>Approving Quantity</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $key => $value)
                        <tr>
                            <td>{{ $value->medicine->name }}</td>
                            <td>{{ $value->quantity }}</td>
                            <td>
                                <div class="row d-inline">
                                    <div class="col-sm-4">
                                        <input type="number" min="1" name="quantity" id="med_{{ $value->id }}"
                                            class="form-control">
                                        <input type="hidden" value="{{$value->id}}" id="request_id">
                                    </div>
                                    <div class="col-sm-2">
                                        <button id="btn_med_{{ $value->id }}" onclick="SaveQuantity(this)"
                                            class="btn btn-sm btn-info">Save</button>
                                    </div>
                                    <div class="col-sm-5">
                                        <span id="label_med_{{ $value->id }}" style=""></span>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@push('script')
    <script>
        $(document).ready(function() {
            $("#slctSupplier").select2();
        });

        function SaveQuantity(el) {
            let medicine_id = el.id.replace('btn_', '')
            let medicine_id_value = $("#" + medicine_id).val();

            $.ajax({
                url: "{{ route('stocks.approve_medicine') }}",
                type: "POST",
                data: {
                    approving_quantity: medicine_id_value,
                    request_id:$("#request_id").val()
                },
                beforeSend: function(xhr) {
                    $("#label_" + medicine_id).html('Please Wait').removeClass('text-success').addClass('text-primary');
                    xhr.setRequestHeader('X-CSRF-Token', '{{ csrf_token() }}');
                },
                success: function(resp) {
                    if (resp == 1) {
                        $("#label_" + medicine_id).html('Item Quantity Save Successfully').delay(2000).fadeOut().removeClass('text-primary').addClass('text-success');;
                    }

                    else {
                        $("#label_" + medicine_id).html("Approving Quantity Must Be Equal or Less Then Requested Quantity").removeClass('text-primary').addClass('text-danger').delay(2000).fadeOut();
                    }
                }
            })
        }
    </script>
@endpush
