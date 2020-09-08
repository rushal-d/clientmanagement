@extends('layouts.app')
@section('styles')

@endsection

@section('content')
<section class="padding-block">
    <div class="container-fluid">
        {{ Form::open(['route' => 'quotation.bulkupdate', 'method' => 'PATCH']) }}
            <div class="row">
                    <div class="col-lg-12"><!-- first column -->
                        <div class="card custom-card create-wrapper">
                            <div class="card-header">
                                <h3>Edit Quotation</h3>
                            </div>
                            <div class="card-body">
                                <div class="contact-form">
                                    <div class="row"><!-- main row open-->
                                        <!-- opening of one field -->
                                        {{-- {!! Form::label('client', 'Client: <span class="required-field"> *</span>', ['class' => 'col-xs-2 col-md-2'], false); !!}
                                        <div class="col-xs-10 col-md-10 form-group">
                                            {!! Form::select('client_id', $client, $quotations->client, ['id' => 'client', 'class' => 'form-control', 'data-validation' => 'required', 'placeholder' => 'Choose Client']) !!}
                                        </div> --}}
                                    {{Form::label('main_taxable', 'Taxable?', ['class' => 'col-xs-2 col-md-2'])}}
                                        <div class="col-xs-10 col-md-10 form-group">
                                            {{Form::radio('main_taxable', 'Yes', $quotations->first()->main_taxable == "Yes")}}Yes
                                            {{Form::radio('main_taxable', 'No', $quotations->first()->main_taxable == "No")}}No
                                        </div>
                                    </div>
                                    <?php
                                        $numberOfCounts = $quotations->count();
                                    ?>
                                    @foreach($quotations as $quotation)
                                    <div class="row to-be-clone" data-increment-id="1" style="border: 1px solid #000;padding: 10px;margin-bottom:5px"><!-- main row open-->
                                        <!-- opening of one field -->
                                        <div class="col-lg-4">
                                            <div class="row">
                                                {!! Form::label('servicetype', 'Service Type: <span class="required-field"> *</span>', ['class' => 'col-xs-4 col-md-4'], false); !!}
                                                <div class="col-xs-8 col-md-8 form-group">
                                                    {{ Form::select("quotation[{$quotation->id}][servicetype_id]", $servicetype, $quotation->servicetype_id, ['class' => 'form-control servicetype_id_input', 'data-validation' => 'required']) }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="row">
                                                {!! Form::label('amount', 'Amount: <span class="required-field"></span>', ['class' => 'col-xs-4 col-md-4'], false); !!}
                                                <div class="col-xs-8 col-md-8 form-group">
                                                    {{ Form::text("quotation[{$quotation->id}][amount]", $quotation->amount, ['class' => 'form-control amount_input']) }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="row">
                                                {!! Form::label('taxable', 'Taxable?: <span class="required-field"><span>', ['class' => 'col-xs-4 col-md-4'], false); !!}
                                                <div class="col-xs-8 col-md-8 form-group">
                                                    {{ Form::radio("quotation[{$quotation->id}][taxable]", 'Yes',($quotation->taxable_stat == "Yes"), ['class' => 'taxable_input', 'id' => 'taxable_id'])}}Yes
                                                    {{ Form::radio("quotation[{$quotation->id}][taxable]", 'No', ($quotation->taxable_stat == "No"), ['class' => ' taxable_input', 'id' => 'taxable_id'])}}No
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="row">
                                                {!! Form::label('notes', 'Notes: <span class="required-field"></span>', ['class' => 'col-xs-4 col-md-4'], false); !!}
                                                <div class="col-xs-8 col-md-8 form-group">
                                                    {{ Form::textarea("quotation[{$quotation->id}][notes]", $quotation->notes, ['class' => 'form-control notes_input', 'rows' => 2]) }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 date_en">
                                            <div class="row">
                                                {!! Form::label('date', 'Date: <span class="required-field"></span>', ['class' => 'col-xs-4 col-md-4'], false); !!}
                                                <div class="col-xs-8 col-md-8 form-group">
                                                    {{ Form::date("quotation[{$quotation->id}][date]", $quotation->date, ['class' => 'form-control flat date_input', 'id' => "date_id-{$loop->iteration}", 'placeholder' => 'Pick a Date']) }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 date_np">
                                            <div class="row">
                                                {!! Form::label('date', 'Date (NP): <span class="required-field"></span>', ['class' => 'col-xs-4 col-md-4'], false); !!}
                                                <div class="col-xs-8 col-md-8 form-group">
                                                    {{ Form::text("quotation[{$quotation->id}][date_np]", $quotation->date_np, ['class' => "form-control flat_np date_np_input", 'id' => "date_np_id-{$loop->iteration}", 'placeholder' => 'Pick a Date']) }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="row">
                                                {!! Form::label('recurring', 'Recurring?: <span class="required-field"></span>', ['class' => 'col-xs-4 col-md-4'], false); !!}
                                                <div class="col-xs-8 col-md-8 form-group recurring-div">
                                                    {{Form::radio("quotation[{$quotation->id}][recurring]", 'Yes', ($quotation->recurring_stat == "Yes"), ['class' => 'recurring_input', 'id' => 'recurring_id'])}}Yes
                                                    {{Form::radio("quotation[{$quotation->id}][recurring]", 'No', ($quotation->recurring_stat == "No"), ['class' => 'recurring_input', 'id' => 'recurring_id'])}}No
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 recurring-type-div" id="type">
                                            <div class="row">
                                                {!! Form::label('recurring_type', 'Recurring Type: <span class="required-field"></span>', ['class' => 'col-xs-4 col-md-4'], false); !!}
                                                <div class="col-xs-8 col-md-8 form-group">
                                                    {{Form::select("quotation[{$quotation->id}][type]", array('1' => 'Every Month', '12' => '1 Year', '24' => '2 Years'), $quotation->recurring_type, ['id' => 'data', 'class' => 'col-xs-12 col-md-12 form-control type_input', 'placeholder' => 'Pick a type'])}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    <p class="text-right">
                                        <button class="btn custom-btn btn-success" type="submit">Update</button>
                                        <a href="{{URL::previous()}}" class="btn custom-btn btn-clear" type="submit">Cancel</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
        {!! Form::close() !!}
        </div>
    </div>
</section>


@endsection

@section('scripts')

<script>
    $('.flat').flatpickr();

    $(document).on('change', '.date_input', function () {
        let $this = $(this);

        let date_np = $this.closest('.date_en').siblings('.date_np').find('.date_np_input');
        date_np.val(AD2BS($this.val()));
    });

    let loop_count = {{$numberOfCounts}};

    $('.flat_np').nepaliDatePicker({
        npdMonth: true,
        npdYear: true,
        npdYearCount: 10,
        onFocus: false,
        ndpTriggerButton: true,
        ndpTriggerButtonText: 'Date',
        ndpTriggerButtonClass: 'btn btn-primary btn-sm',
        onChange: function (e) {
            for (i = 1; i <= loop_count; i++) {
                $('#date_id-'+i).val(BS2AD($('#date_np_id-'+i).val()));
            }
        }
    });

    $(document).on('change', '.date_np_input', function () {
        console.log('changed');
        let $this = $(this);

        let date_en = $this.closest('.date_np').siblings('.date_en').find('.date_input');

        // console.log(date_en, $this.val());
        date_en.val(BS2AD($this.val()));
    });

    $().ready(function(){
    $(document).on('change', '.recurring_input' ,function(e) {
        $_recurring_type_div = $(this).parent().parent().parent().parent().find('.recurring-type-div');
        if($(this).val() === 'Yes') {
            $_recurring_type_div.show();
        } else {
            $_recurring_type_div.hide();
            $_recurring_type_div.find('.type_input').val('');
        }
    });

        let recurring_div = $('.recurring-div');

        $.each(recurring_div, function(){
            let $_this = $(this);
            if($_this.find('.recurring_input:checked').val() === 'Yes'){
                $(this).parent().parent().parent().find('.recurring-type-div').show();
            }else{
                $(this).parent().parent().parent().find('.recurring-type-div').hide();
            }

        });
    });

//   $('#type').hide();
</script>

<script>
    // $('#date').flatpickr({
    //
    // });

    $('#client').selectize({
        plugins: ['remove_button'],

    });

    $('#servicetype').selectize({
        plugins: ['remove_button'],

    });
</script>



@endsection
