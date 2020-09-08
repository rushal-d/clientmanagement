@extends('layouts.app')
@section('styles')

@endsection

@section('content')
<section class="padding-block">
    <div class="container-fluid">
        {{ Form::open(['route' => 'service.store']) }}
            <div class="row">
                    <div class="col-lg-8"><!-- first column -->
                        <div class="card custom-card create-wrapper">
                            <div class="card-header">
                                <h3>Update Services</h3>
                            </div>
                            <div class="card-body">
                                <div class="contact-form">
                                    <div class="row"><!-- main row open-->
                                        <!-- opening of one field -->
                                        {!! Form::label('client', 'Client: <span class="required-field"> *</span>', ['class' => 'col-xs-2 col-md-2'], false); !!}
                                        <div class="col-xs-10 col-md-10 form-group">
                                            {!! Form::select('client_id', $client, $quotation->client_id, ['class' => 'form-control', 'data-validation' => 'required']) !!}
                                        </div>
                                        {!! Form::label('servicetype', 'Service Type: <span class="required-field"> *</span>', ['class' => 'col-xs-2 col-md-2'], false); !!}
                                        <div class="col-xs-10 col-md-10 form-group">
                                            {!! Form::select('servicetype_id', $servicetype, $quotation->servicetype_id, ['class' => 'form-control', 'data-validation' => 'required']) !!}
                                        </div>
                                        {!! Form::label('amount', 'Amount: <span class="required-field"> *</span>', ['class' => 'col-xs-2 col-md-2'], false); !!}
                                        <div class="col-xs-10 col-md-10 form-group">
                                            {!! Form::text('amount', $quotation->amount, ['class' => 'form-control', 'data-validation' => 'required']) !!}
                                        </div>
                                        {{Form::label('taxable', 'Taxable?', ['class' => 'col-xs-2 col-md-2'])}}
                                        <div class="col-xs-10 col-md-10 form-group">
                                            {{Form::radio('taxable', 'Yes', ($quotation->taxable_stat=="Yes"))}}Yes
                                            {{Form::radio('taxable', 'No', ($quotation->taxable_stat=="No"))}}No
                                        </div>
                                        {!! Form::label('notes', 'Notes: <span class="required-field"> *</span>', ['class' => 'col-xs-2 col-md-2'], false); !!}
                                        <div class="col-xs-10 col-md-10 form-group">
                                            {!! Form::textarea('notes', $quotation->notes, ['class' => 'form-control', 'rows' => 2]) !!}
                                        </div>
                                        {{Form::label('recurring', 'Recurring?', ['class' => 'col-xs-2 col-md-2'])}}
                                        <div class="col-xs-10 col-md-10 form-group">
                                                {{Form::radio('recurring',  'Yes', ($quotation->recurring_stat=="Yes"))}}Yes
                                                {{Form::radio('recurring', 'No', ($quotation->recurring_stat=="No"))}}No
                                        </div>
                                        <div class="form-group col-md-12 col-xs-12" id="type">
                                            <div class="row form-group">
                                                {!!Form::label('recurring_type', 'Recurring Type', ['class' => 'col-xs-2 col-md-2'])!!}
                                                {{Form::select('type', array('none' => '', '1' => '1 Year', '2' => '2 Years'), $quotation->recurring_type, ['id' => 'data', 'class' => 'col-xs-9 col-md-9 form-control', 'style' => 'margin-left:15px'])}}
                                            </div>
                                        </div>
                                        {!! Form::label('date', 'Payment Date: <span class="required-field"> *</span>', ['class' => 'col-xs-2 col-md-2'], false); !!}
                                        <div class="col-md-10 col-xs-10 form-group">
                                            {{Form::date('date', $quotation->date, ['class' => 'form-control', 'id' => 'date', 'placeholder' => 'Select Date'])}}
                                        </div>
                                    </div>
                
                                    <p class="text-right">
                                        <button class="btn custom-btn btn-success" type="submit">Create</button>
                                        <a href="{{route('quotation.index')}}" class="btn custom-btn btn-clear" type="submit">Cancel</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                
                    </div>
        {!! Form::close() !!}
    </div>
</section>

<script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>

{{-- @if($service->recurring_stat != 'No')
<script>
$().ready(function(){
    $('input[name="recurring"]').on('change',function(e) {
        if(e.target.value === 'Yes') {
        // alert('Clicked');
            $('#type').show();
        } else {
            $('#type').hide();
            $('#data').val('');
        }
    });
  $('#type').show();
})
</script>

@elseif($service->recurring_stat == null)
{{dd($service->recurring_stat)}}
<script>
    alert('here');
    $().ready(function(){
    $('input[name="recurring"]').on('change',function(e) {
        if(e.target.value === 'Yes') {
        // alert('Clicked');
            $('#type').show();
        } else {
            $('#type').hide();
            $('#data').val('');
        }
    });
  $('#type').hide();
})
</script>

@else
    {
        <script>
            $().ready(function(){
                $('input[name="recurring"]').on('change',function(e) {
                    if(e.target.value === 'Yes') {
                    // alert('Clicked');
                        $('#type').show();
                    } else {
                        $('#type').hide();
                        $('#data').val('');
                    }
                });
                $('#type').hide();
            })
        </script> 
    }
@endif --}}



@endsection

@section('scripts')
<script>
    $_test_variable = '<?php echo $quotation->recurring_stat ?>';
        if($_test_variable != 'No' && $_test_variable.length !== 0)
        {
            $().ready(function(){
            $('input[name="recurring"]').on('change',function(e) {
            if(e.target.value === 'Yes') {
            // alert('Clicked');
                $('#type').show();
            } else {
                $('#type').hide();
                $('#data').val('');
            }
        });
            $('#type').show();
        })
        }
        else
        {
            $().ready(function(){
                $('input[name="recurring"]').on('change',function(e) {
                    if(e.target.value === 'Yes') {
                    // alert('Clicked');
                        $('#type').show();
                    } else {
                        $('#type').hide();
                        $('#data').val('');
                    }
                });
                $('#type').hide();
            })
        }
</script>

<script>
        $('#date').flatpickr({
        });
    </script>

@endsection